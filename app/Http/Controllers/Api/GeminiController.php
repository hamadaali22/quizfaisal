<?php
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

        $prompt = "You are an official Goethe examiner.
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