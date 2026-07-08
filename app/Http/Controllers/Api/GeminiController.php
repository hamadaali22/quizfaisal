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
            'question' => 'required|string',
            'student_text' => 'required|string',
        ]);

        $question = $request->question;
        $studentAnswer = trim($request->student_text);

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

        {
          "task": {
            "level": "A1",
            "type": "email",
            "description": "Write an email inviting a friend to your birthday party",
            "required_points": [
              "Why are you writing? (birthday invitation)",
              "Say when and where the party is",
              "Ask if she can help"
            ],
            "constraints": {
              "word_count_min": 15,
              "word_count_max": 40,
              "must_include": [
                "greeting",
                "closing"
              ]
            }
          },
          "scoring": {
            "content": {
              "max_points": 9,
              "criteria": {
                "point_1": {
                  "description": "Why are you writing? (birthday invitation)",
                  "max": 3,
                  "levels": {
                    "3": "fully addressed, clear and understandable",
                    "1.5": "partially addressed or unclear",
                    "0": "missing or incomprehensible"
                  }
                },
                "point_2": {
                  "description": "Say when and where the party is",
                  "max": 3,
                  "levels": {
                    "3": "fully addressed, clear and understandable",
                    "1.5": "partially addressed or unclear",
                    "0": "missing or incomprehensible"
                  }
                },
                "point_3": {
                  "description": "Ask if she can help",
                  "max": 3,
                  "levels": {
                    "3": "fully addressed, clear and understandable",
                    "1.5": "partially addressed or unclear",
                    "0": "missing or incomprehensible"
                  }
                }
              }
            },
            "communication": {
              "max_points": 1,
              "criteria": {
                "1": "correct email format with greeting and closing",
                "0.5": "partially correct format (missing greeting or closing)",
                "0": "no clear email structure"
              }
            }
          },
          "calculation": {
            "total_max": 10,
            "formula": "content_score + communication_score",
            "grading": {
              "type": "linear",
              "mapping": {
                "10": 10,
                "9": 9,
                "8": 8,
                "7": 7,
                "6": 6,
                "5": 5,
                "4": 4,
                "3": 3,
                "2": 2,
                "1": 1,
                "0": 0
              }
            }
          },
          "output_format": {
            "must_return": [
              
              "total_score",
              "corrected_text"
            ],
            "structure": {
              
              "total_score": "0-10",
            
            },
            "corrected_text_rules": [
              "fix grammar",
              "fix spelling",
              "keep meaning unchanged",
              "keep A1 level"
            ]
          }
        }

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
                ]
            ]
        );

        $result = data_get(
            $response->json(),
            'candidates.0.content.parts.0.text'
        );

        // إزالة ```json لو النموذج رجعها
        $clean = preg_replace('/^```json|```$/m', '', trim($result));

        $data = json_decode($clean, true);

        if (!$data) {
            return response()->json([
                'success' => false,
                'raw_response' => $result
            ]);
        }

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
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





