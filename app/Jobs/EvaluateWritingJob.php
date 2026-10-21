<?php

namespace App\Jobs;

use App\ExamAnswer;
use App\Question;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class EvaluateWritingJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $examAnswerId;

    // أقصى مدة للمحاولة الواحدة (لازم تكون أقل من retry_after في config/queue.php)
    public $timeout = 150;


    // الأكواد اللي معناها: جرّب المفتاح اللي بعده
    const ROTATE_STATUSES = [401, 403, 429, 500, 502, 503, 504];

    public function __construct($examAnswerId)
    {
        $this->examAnswerId = $examAnswerId;
    }

    /**
     * الجوب يفضل يحاول لحد 24 ساعة، مهما كان عدد المحاولات أو الأخطاء.
     */
    public function retryUntil()
    {
        return now()->addHours(24);
    }

    /**
     * الانتظار بعد أي خطأ (JSON بايظ، مفيش total_score ...) قبل المحاولة الجاية
     * دقيقة، بعدين 2، بعدين 5، وبعد كده كل 10 دقايق
     */
    public function backoff()
    {
        return [60, 120, 300, 600];
    }

    public function handle()
    {
        Log::info('WRITING JOB STARTED', [
            'examAnswerId' => $this->examAnswerId,
            'attempt' => $this->attempts(),
        ]);

        $examAnswer = ExamAnswer::find($this->examAnswerId);

        if (!$examAnswer) {
            Log::error('WRITING JOB ERROR: ExamAnswer not found', [
                'examAnswerId' => $this->examAnswerId,
            ]);
            return;
        }

        // اتصحح قبل كده؟ متصححوش تاني
        if (!is_null($examAnswer->totalScore)) {
            Log::info('WRITING JOB SKIPPED: Already graded', [
                'examAnswerId' => $examAnswer->id,
            ]);
            return;
        }

        $examQuestion = Question::find($examAnswer->question_id);

        if (!$examQuestion) {
            Log::error('WRITING JOB ERROR: Question not found', [
                'examAnswerId' => $examAnswer->id,
                'questionId' => $examAnswer->question_id,
            ]);
            return;
        }

        if (
            $examQuestion->type !== 'writing' &&
            $examQuestion->type !== 'writing and image'
        ) {
            Log::warning('WRITING JOB SKIPPED: Invalid question type', [
                'examAnswerId' => $examAnswer->id,
                'questionType' => $examQuestion->type,
            ]);
            return;
        }

        $question = $examQuestion->paragraph
            ?? $examQuestion->bio
            ?? '';

        $studentAnswer = trim($examAnswer->answer);

        $promptText = $examQuestion->prompt;

        $prompt = <<<PROMPT
You are an official Goethe German A1 writing examiner.

Evaluate the student's answer STRICTLY according to the following JSON rubric.

The rubric defines:
- task
- scoring
- calculation
- output format

You MUST follow it exactly.

Return ONLY valid JSON.
Do NOT use markdown.
Do NOT wrap the response inside ```json.

$promptText

=========================================
ORIGINAL WRITING TASK
=========================================

$question

=========================================
STUDENT ANSWER
=========================================

$studentAnswer
PROMPT;

        /*
        |--------------------------------------------------------------------------
        | Gemini API Keys
        |--------------------------------------------------------------------------
        */
        // المفاتيح متعرّفة في config/services.php (مش env() هنا عشان تشتغل مع config:cache)
        $apiKeys = array_values(array_filter(
            (array) config('services.gemini.keys', [])
        ));

        Log::info('WRITING AI KEYS LOADED', [
            'examAnswerId' => $this->examAnswerId,
            'keysCount' => count($apiKeys),
        ]);

        if (empty($apiKeys)) {
            Log::error('WRITING AI ERROR: No Gemini API keys configured');
            throw new \Exception('No Gemini API keys configured');
        }

        $payload = [
            "contents" => [
                [
                    "parts" => [
                        ["text" => $prompt]
                    ]
                ]
            ],
            "generationConfig" => [
                "responseMimeType" => "application/json"
            ]
        ];

        $response = null;

        /*
        |--------------------------------------------------------------------------
        | Try Gemini Keys (429 / 503 / 5xx / timeout => next key)
        |--------------------------------------------------------------------------
        */
        // Round-robin: كل جوب يبدأ من المفتاح اللي بعد اللي بدأ بيه الجوب اللي قبله
        // جوب 1 يبدأ بـ 1، جوب 2 يبدأ بـ 2 ... وبعد 10 يرجع لـ 1
        $count = count($apiKeys);
        $start = ((int) Cache::increment('gemini_key_pointer')) % $count;

        $order = [];
        for ($i = 0; $i < $count; $i++) {
            $order[] = ($start + $i) % $count;
        }

        foreach ($order as $index) {
            $apiKey = $apiKeys[$index];
            $keyNumber = $index + 1;
            $cooldownKey = 'gemini_key_cooldown_' . md5($apiKey);

            // المفتاح ده لسه واخد 429 من شوية، متضيعش عليه طلب
            if (Cache::has($cooldownKey)) {
                continue;
            }

            Log::info('WRITING AI REQUEST STARTED', [
                'examAnswerId' => $examAnswer->id,
                'keyNumber' => $keyNumber,
            ]);

            try {
                $response = Http::timeout(90)
                    ->withHeaders(['x-goog-api-key' => $apiKey])
                    ->post(
                        'https://generativelanguage.googleapis.com/v1beta/models/gemini-3.5-flash:generateContent',
                        $payload
                    );
            } catch (ConnectionException $e) {
                Log::warning('WRITING AI TIMEOUT/CONNECTION - TRYING NEXT KEY', [
                    'examAnswerId' => $examAnswer->id,
                    'keyNumber' => $keyNumber,
                    'error' => $e->getMessage(),
                ]);
                $response = null;
                continue;
            }

            $status = $response->status();

            Log::info('WRITING AI RESPONSE RECEIVED', [
                'examAnswerId' => $examAnswer->id,
                'keyNumber' => $keyNumber,
                'status' => $status,
            ]);

            if ($response->successful()) {
                break;
            }

            if (in_array($status, self::ROTATE_STATUSES, true)) {
                // 429: ريّح المفتاح دقيقة | 401/403: مفتاح بايظ ريّحه ساعة | 5xx: ثواني
                if ($status === 429) {
                    $cooldown = 60;
                } elseif ($status === 401 || $status === 403) {
                    $cooldown = 3600;
                } else {
                    $cooldown = 10;
                }

                Cache::put($cooldownKey, true, $cooldown);

                Log::warning('WRITING AI ' . $status . ' - TRYING NEXT KEY', [
                    'examAnswerId' => $examAnswer->id,
                    'keyNumber' => $keyNumber,
                    'cooldown' => $cooldown,
                ]);

                continue;
            }

            // أخطاء حقيقية في الطلب نفسه (زي 400) — ملهاش لازمة نجرب مفاتيح تانية
            Log::error('WRITING AI HTTP ERROR', [
                'examAnswerId' => $examAnswer->id,
                'keyNumber' => $keyNumber,
                'status' => $status,
                'response' => $response->json(),
            ]);

            throw new \Exception('Gemini HTTP error: ' . $status);
        }

        /*
        |--------------------------------------------------------------------------
        | All keys busy => رجّع الجوب للطابور بعد شوية (من غير ما يتحسب فشل)
        |--------------------------------------------------------------------------
        */
        if (!$response || !$response->successful()) {
            $delay = min(600, 30 * $this->attempts()); // 30s, 60s, 90s ... لحد 10 دقايق

            Log::warning('WRITING AI ALL KEYS BUSY - RELEASING JOB', [
                'examAnswerId' => $examAnswer->id,
                'attempt' => $this->attempts(),
                'delay' => $delay,
            ]);

            $this->release($delay);
            return;
        }

        /*
        |--------------------------------------------------------------------------
        | Get Gemini Result
        |--------------------------------------------------------------------------
        */
        $result = data_get(
            $response->json(),
            'candidates.0.content.parts.0.text'
        );

        if (empty($result)) {
            Log::error('WRITING AI EMPTY RESPONSE', [
                'examAnswerId' => $examAnswer->id,
                'response' => $response->json(),
            ]);
            throw new \Exception('Gemini returned an empty response');
        }

        /*
        |--------------------------------------------------------------------------
        | Clean JSON
        |--------------------------------------------------------------------------
        */
        $clean = preg_replace('/```json|```/i', '', trim($result));

        preg_match('/\{.*\}/s', $clean, $matches);

        $cleanJson = $matches[0] ?? $clean;

        $data = json_decode($cleanJson, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            Log::error('WRITING JSON ERROR', [
                'examAnswerId' => $examAnswer->id,
                'jsonError' => json_last_error_msg(),
                'response' => $clean,
            ]);
            throw new \Exception('Invalid JSON returned by Gemini');
        }

        /*
        |--------------------------------------------------------------------------
        | Save Result
        |--------------------------------------------------------------------------
        */
        $totalScore = $data['total_score'] ?? null;

        $correctedText = $data['corrected_text']
            ?? $data['corrected_email']
            ?? null;

        Log::info('WRITING AI DATA', [
            'examAnswerId' => $examAnswer->id,
            'data' => $data,
        ]);

        // مفيش درجة = التصحيح ماتمش، حاول تاني
        if (is_null($totalScore)) {
            Log::error('WRITING AI MISSING total_score - WILL RETRY', [
                'examAnswerId' => $examAnswer->id,
            ]);
            throw new \Exception('Gemini response has no total_score');
        }

        // الطالب غيّر الإجابة وإحنا بنصحح؟ متحفظش درجة للنص القديم، صحّح الجديد
        $fresh = ExamAnswer::find($examAnswer->id);

        if (!$fresh) {
            return;
        }

        if (trim((string) $fresh->answer) !== $studentAnswer) {
            Log::info('WRITING ANSWER CHANGED DURING EVALUATION - RE-EVALUATING', [
                'examAnswerId' => $examAnswer->id,
            ]);
            $this->release(5);
            return;
        }

        $fresh->totalScore = $totalScore;
        $fresh->correctedText = $correctedText;
        $fresh->save();

        Log::info('WRITING SAVED', [
            'examAnswerId' => $examAnswer->id,
            'totalScore' => $totalScore,
        ]);
    }

    /**
     * بيتنفذ لما الجوب يفشل نهائيًا (عدّى 24 ساعة من غير ما يتصحح).
     * الجوب بيتحفظ في جدول failed_jobs وتقدر ترجّعه بـ php artisan queue:retry
     */
    public function failed($exception)
    {
        Log::error('WRITING JOB FAILED PERMANENTLY', [
            'examAnswerId' => $this->examAnswerId,
            'error' => $exception ? $exception->getMessage() : null,
        ]);
    }
}