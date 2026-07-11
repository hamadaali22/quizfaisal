<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Question;
class GeminiController extends Controller
{
    public function evaluate(Request $request)
    {
        $request->validate([
            'question' => 'required|string',
            'student_text' => 'required|string',
        ]);

    $question = $request->question;
    $studentAnswer = trim($request->student_text);

    $examQuestion = Question::findOrFail($request->question_id);
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

        $response = Http::post(
            "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent?key=" . config('services.gemini.key'),
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
        $result = data_get(
            $response->json(),
            'candidates.0.content.parts.0.text'
        );
        
        // لو Gemini لم يرجع أي نص
        if (empty($result)) {
            return response()->json([
                'success' => false,
                'message' => 'Gemini returned no text.',
                'status' => $response->status(),
                'response' => $response->json()
            ]);
        }
        
        // إزالة ```json و ```
        $clean = preg_replace('/```json|```/i', '', trim($result));
        
        // استخراج أول JSON موجود داخل النص
        preg_match('/\{.*\}/s', $clean, $matches);
        
        $cleanJson = $matches[0] ?? $clean;
        
        // تحويل إلى Array
        $data = json_decode($cleanJson, true);
        
        // لو الـ JSON غير صالح
        if (json_last_error() !== JSON_ERROR_NONE) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid JSON returned from Gemini.',
                'json_error' => json_last_error_msg(),
                'raw_response' => $result,
                'clean_json' => $cleanJson
            ]);
        }
        
        // نجاح
        return response()->json([
            'success' => true,
            'data' => $data
        ]);
        // $result = data_get(
        //     $response->json(),
        //     'candidates.0.content.parts.0.text'
        // );

        // // إزالة ```json لو النموذج رجعها
        // $clean = preg_replace('/^```json|```$/m', '', trim($result));

        // $data = json_decode($clean, true);

        // if (!$data) {
        //     return response()->json([
        //         'success' => false,
        //         'raw_response' => $result
        //     ]);
        // }

        // return response()->json([
        //     'success' => true,
        //     'data' => $data
        // ]);
    }
}













/*
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GeminiController extends Controller
{
    public function evaluate(Request $request)
    {
        $request->validate([
            'student_name'=>'required',
            'student_text'=>'required'
        ]);

        // $prompt = "
        //     You are an official Goethe examiner.
        //     Student:{$request->student_name}
        //     Text:{$request->student_text}
        //     Evaluate:
        //     - Pass/Fail
        //     - Score %
        //     - Corrections
        //     ";

        // $prompt = "You are an official Goethe examiner.
        //     Student Name:
        //     {$request->student_name}

        //     Student Text:
        //     {$request->student_text}

        //     Evaluate the German text.

        //     Return ONLY valid JSON.
        //     Do not return markdown.
        //     Do not add explanations outside JSON.

        //     JSON format:

        //     {
        //     \"pass_fail\": \"Pass or Fail\",
        //     \"score\": 0,
        //     \"correction\": \"corrected German text\",
        //     \"feedback\": \"short explanation\"
        //     }
        //     ";
        $prompt = "can you get the student name from this.
            Student Name:
            {$request->student_name}

            Student Text:
            {$request->student_text}

            Evaluate the German text.

            Return ONLY valid JSON.
            Do not return markdown.
            Do not add explanations outside JSON.

            JSON format:

            {
            \"pass_fail\": \"Pass or Fail\",
            \"score\": 0,
            \"correction\": \"corrected German text\",
            \"feedback\": \"short explanation\"
             \"Student Name\": \"Student Name\"
            }
            ";

        $response = Http::post(
            "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent?key="
            . config('services.gemini.key'),

            [
                "contents"=>[
                    [
                        "parts"=>[
                            [
                                "text"=>$prompt
                            ]
                        ]
                    ]
                ]
            ]
        );

        // $result =data_get(
        //     $response->json(),
        //     'candidates.0.content.parts.0.text'
        // );

        // return response()->json([
        //     'result'=>$result
        // ]);
        $result = data_get(
            $response->json(),
            'candidates.0.content.parts.0.text'
        );

            // إزالة ```json و ```
        $clean = preg_replace(
            '/^```json|```$/m',
            '',
            trim($result)
        );

        $data = json_decode($clean, true);

        return response()->json([
        'data' => $data
        ]);
        
    }
}

**/





