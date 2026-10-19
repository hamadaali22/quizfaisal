<?php

namespace App\Jobs;

use App\ExamAnswer;
use App\Question;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class EvaluateWritingJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $examAnswerId;

    // 0 = محاولات غير محدودة، الجوب مش هيتحذف غير لما يصحح
    public $tries = 0;

    // مفيش حد أقصى لعدد الأخطاء
    public $maxExceptions = null;

    // أقصى وقت للمحاولة الواحدة (10 مفاتيح × 25 ثانية + هامش)
    public $timeout = 300;

    public function __construct($examAnswerId)
    {
        $this->examAnswerId = $examAnswerId;
    }

    // الانتظار بين المحاولات (Laravel 8+)
    public function backoff()
    {
        return [10, 30, 60];
    }

    // نفس الحاجة لـ Laravel 7 وأقدم
    public function retryAfter()
    {
        return 60;
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

        /*
        |--------------------------------------------------------------------------
        | Already graded - skip
        |--------------------------------------------------------------------------
        */

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
        | Gemini API Keys (from config/services.php)
        |--------------------------------------------------------------------------
        */

        $apiKeys = array_values(array_filter(
            (array) config('services.gemini.keys', [])
        ));

        if (empty($apiKeys)) {
            Log::error('WRITING AI ERROR: No Gemini API keys configured');

            throw new \Exception('No Gemini API keys configured');
        }

        /*
        |--------------------------------------------------------------------------
        | Try every key - any failure moves to the next key
        |--------------------------------------------------------------------------
        */

        $response = null;

        foreach ($apiKeys as $index => $apiKey) {

            $keyNumber = $index + 1;

            Log::info('WRITING AI REQUEST STARTED', [
                'examAnswerId' => $examAnswer->id,
                'keyNumber' => $keyNumber,
            ]);

            try {
                $response = Http::timeout(25)
                    ->withHeaders([
                        'x-goog-api-key' => $apiKey,
                    ])
                    ->post(
                        'https://generativelanguage.googleapis.com/v1beta/models/gemini-3.5-flash:generateContent',
                        [
                            'contents' => [
                                [
                                    'parts' => [
                                        [
                                            'text' => $prompt,
                                        ],
                                    ],
                                ],
                            ],
                            'generationConfig' => [
                                'responseMimeType' => 'application/json',
                            ],
                        ]
                    );
            } catch (\Throwable $e) {

                Log::warning('WRITING AI CONNECTION ERROR - TRYING NEXT KEY', [
                    'examAnswerId' => $examAnswer->id,
                    'keyNumber' => $keyNumber,
                    'error' => $e->getMessage(),
                ]);

                $response = null;

                continue;
            }

            Log::info('WRITING AI RESPONSE RECEIVED', [
                'examAnswerId' => $examAnswer->id,
                'keyNumber' => $keyNumber,
                'status' => $response->status(),
            ]);

            if ($response->successful()) {
                break;
            }

            Log::warning('WRITING AI HTTP ERROR - TRYING NEXT KEY', [
                'examAnswerId' => $examAnswer->id,
                'keyNumber' => $keyNumber,
                'status' => $response->status(),
                'response' => $response->json(),
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | All keys failed - back to the queue (never deleted)
        |--------------------------------------------------------------------------
        */

        if (!$response || !$response->successful()) {

            Log::warning('WRITING AI ALL KEYS FAILED - WILL RETRY', [
                'examAnswerId' => $examAnswer->id,
                'attempt' => $this->attempts(),
            ]);

            throw new \Exception(
                'All Gemini API keys failed'
            );
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

            throw new \Exception(
                'Gemini returned an empty response'
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Clean JSON
        |--------------------------------------------------------------------------
        */

        $clean = preg_replace(
            '/```json|```/i',
            '',
            trim($result)
        );

        preg_match(
            '/\{.*\}/s',
            $clean,
            $matches
        );

        $cleanJson = $matches[0] ?? $clean;

        $data = json_decode(
            $cleanJson,
            true
        );

        if (json_last_error() !== JSON_ERROR_NONE) {

            Log::error('WRITING JSON ERROR', [
                'examAnswerId' => $examAnswer->id,
                'jsonError' => json_last_error_msg(),
                'response' => $clean,
            ]);

            throw new \Exception(
                'Invalid JSON returned by Gemini'
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Extract Result - no score means not graded, retry
        |--------------------------------------------------------------------------
        */

        $totalScore = $data['total_score'] ?? null;

        $correctedText = $data['corrected_text']
            ?? $data['corrected_email']
            ?? null;

        Log::info('WRITING AI DATA', [
            'examAnswerId' => $examAnswer->id,
            'data' => $data,
            'totalScore' => $totalScore,
            'correctedText' => $correctedText,
        ]);

        if (is_null($totalScore)) {

            Log::error('WRITING AI MISSING total_score - WILL RETRY', [
                'examAnswerId' => $examAnswer->id,
            ]);

            throw new \Exception(
                'Gemini response has no total_score'
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Save Result
        |--------------------------------------------------------------------------
        */

        $examAnswer->totalScore = $totalScore;
        $examAnswer->correctedText = $correctedText;
        $examAnswer->save();

        Log::info('WRITING JOB DONE', [
            'examAnswerId' => $examAnswer->id,
            'totalScore' => $examAnswer->totalScore,
        ]);
    }
}