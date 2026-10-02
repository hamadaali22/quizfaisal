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

    // عدد محاولات الـ Queue
    public $tries = 3;

    // الانتظار بين محاولات الـ Queue
    public $backoff = 10;

    public function __construct($examAnswerId)
    {
        $this->examAnswerId = $examAnswerId;
    }

    public function handle()
    {
        Log::info('WRITING JOB STARTED', [
            'examAnswerId' => $this->examAnswerId,
        ]);

        $examAnswer = ExamAnswer::find($this->examAnswerId);

        if (!$examAnswer) {
            Log::error('WRITING JOB ERROR: ExamAnswer not found', [
                'examAnswerId' => $this->examAnswerId,
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

        $apiKeys = array_filter([
            config('services.gemini.key'),
            env('GEMINI_API_KEY_2'),
        ]);

        if (empty($apiKeys)) {
            Log::error('WRITING AI ERROR: No Gemini API keys configured');

            throw new \Exception('No Gemini API keys configured');
        }

        $response = null;

        /*
        |--------------------------------------------------------------------------
        | Try Gemini Keys
        |--------------------------------------------------------------------------
        */

        foreach ($apiKeys as $index => $apiKey) {

            $keyNumber = $index + 1;

            Log::info('WRITING AI REQUEST STARTED', [
                'examAnswerId' => $examAnswer->id,
                'keyNumber' => $keyNumber,
            ]);

            $response = Http::post(
                "https://generativelanguage.googleapis.com/v1beta/models/gemini-3.5-flash:generateContent?key="
                . $apiKey,
                [
                    "contents" => [
                        [
                            "parts" => [
                                [
                                    "text" => $prompt
                                ]
                            ]
                        ]
                    ],
                    "generationConfig" => [
                        "responseMimeType" => "application/json"
                    ]
                ]
            );

            Log::info('WRITING AI RESPONSE RECEIVED', [
                'examAnswerId' => $examAnswer->id,
                'keyNumber' => $keyNumber,
                'status' => $response->status(),
            ]);

            /*
            |--------------------------------------------------------------------------
            | Success
            |--------------------------------------------------------------------------
            */

            if ($response->successful()) {
                break;
            }

            /*
            |--------------------------------------------------------------------------
            | 503 - Try next key
            |--------------------------------------------------------------------------
            */

            if ($response->status() === 503) {

                Log::warning('WRITING AI 503 - TRYING NEXT KEY', [
                    'examAnswerId' => $examAnswer->id,
                    'keyNumber' => $keyNumber,
                ]);

                continue;
            }

            /*
            |--------------------------------------------------------------------------
            | Other HTTP errors
            |--------------------------------------------------------------------------
            */

            Log::error('WRITING AI HTTP ERROR', [
                'examAnswerId' => $examAnswer->id,
                'keyNumber' => $keyNumber,
                'status' => $response->status(),
                'response' => $response->json(),
            ]);

            throw new \Exception(
                'Gemini HTTP error: ' . $response->status()
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Both keys failed
        |--------------------------------------------------------------------------
        */

        if (!$response || !$response->successful()) {

            Log::warning('WRITING AI ALL KEYS FAILED - QUEUE RETRY', [
                'examAnswerId' => $examAnswer->id,
            ]);

            throw new \Exception(
                'All Gemini API keys returned an unavailable response'
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
        | Extract Result
        |--------------------------------------------------------------------------
        */

        $totalScore = $data['total_score'] ?? null;

        $correctedText = $data['corrected_text']
            ?? $data['corrected_email']
            ?? null;

        Log::info('WRITING AI DATA', [
            'data' => $data,
            'totalScore' => $totalScore,
            'correctedText' => $correctedText,
            'examAnswerId' => $examAnswer->id,
        ]);

        /*
        |--------------------------------------------------------------------------
        | Save Result
        |--------------------------------------------------------------------------
        */

        $examAnswer->totalScore = $totalScore;
        $examAnswer->correctedText = $correctedText;

        Log::info('WRITING BEFORE SAVE', [
            'examAnswerId' => $examAnswer->id,
            'totalScore' => $examAnswer->totalScore,
            'correctedText' => $examAnswer->correctedText,
        ]);

        $examAnswer->save();

        Log::info('WRITING AFTER SAVE', [
            'examAnswerId' => $examAnswer->id,
        ]);

        /*
        |--------------------------------------------------------------------------
        | Verify Database
        |--------------------------------------------------------------------------
        */

        $savedAnswer = ExamAnswer::find($examAnswer->id);

        Log::info('WRITING DB CHECK', [
            'id' => $examAnswer->id,
            'totalScore' => $savedAnswer
                ? $savedAnswer->totalScore
                : null,
            'correctedText' => $savedAnswer
                ? $savedAnswer->correctedText
                : null,
        ]);
    }
}