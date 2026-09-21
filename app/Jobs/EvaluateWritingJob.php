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

class EvaluateWritingJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $examAnswerId;

    public function __construct($examAnswerId)
    {
        $this->examAnswerId = $examAnswerId;
    }

    public function handle()
    {
        /*
        |--------------------------------------------------------------------------
        | جلب إجابة الطالب
        |--------------------------------------------------------------------------
        */

        $examAnswer = ExamAnswer::find($this->examAnswerId);

        if (!$examAnswer) {
            return;
        }

        /*
        |--------------------------------------------------------------------------
        | جلب السؤال
        |--------------------------------------------------------------------------
        */

        $examQuestion = Question::find($examAnswer->question_id);

        if (!$examQuestion) {
            return;
        }

        /*
        |--------------------------------------------------------------------------
        | التأكد أن السؤال Writing
        |--------------------------------------------------------------------------
        */

        if (
            $examQuestion->type !== 'writing' &&
            $examQuestion->type !== 'writing and image'
        ) {
            return;
        }

        /*
        |--------------------------------------------------------------------------
        | بيانات السؤال والإجابة
        |--------------------------------------------------------------------------
        */

        $question = $examQuestion->paragraph ?? $examQuestion->bio ?? '';

        $studentAnswer = trim($examAnswer->answer);

        /*
        |--------------------------------------------------------------------------
        | Prompt
        |--------------------------------------------------------------------------
        */

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
        | إرسال الطلب إلى Gemini
        |--------------------------------------------------------------------------
        */

        $response = Http::post(
            "https://generativelanguage.googleapis.com/v1beta/models/gemini-3.5-flash:generateContent?key="
            . config('services.gemini.key'),
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

        /*
        |--------------------------------------------------------------------------
        | استخراج نتيجة Gemini
        |--------------------------------------------------------------------------
        */

        $result = data_get(
            $response->json(),
            'candidates.0.content.parts.0.text'
        );

        if (empty($result)) {
            return;
        }

        /*
        |--------------------------------------------------------------------------
        | تنظيف JSON
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

        /*
        |--------------------------------------------------------------------------
        | تحويل JSON إلى Array
        |--------------------------------------------------------------------------
        */

        $data = json_decode(
            $cleanJson,
            true
        );

        if (json_last_error() !== JSON_ERROR_NONE) {
            return;
        }

        /*
        |--------------------------------------------------------------------------
        | استخراج نتيجة AI
        |--------------------------------------------------------------------------
        */

        $totalScore = $data['total_score'] ?? null;

        $correctedText = $data['corrected_text'] ?? null;

        /*
        |--------------------------------------------------------------------------
        | حفظ نتيجة AI
        |--------------------------------------------------------------------------
        */

        $examAnswer->totalScore = $totalScore;

        $examAnswer->correctedText = $correctedText;

        $examAnswer->save();
    }
}