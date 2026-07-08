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
  "exam_type": "goethe_B1_writing_task_1_email_experience",
  "level": "B1",

  "task": {
    "type": "email",
    "description": "Write an email about attending a job fair in Dortmund",
    "context": "Friend could not attend because they were at a job interview",

    "required_content": [
      {
        "id": "I1",
        "description": "Describe the job fair: How was the event?"
      },
      {
        "id": "I2",
        "description": "Explain what you liked most and why"
      },
      {
        "id": "I3",
        "description": "Make a suggestion for meeting the friend"
      }
    ],

    "constraints": {
      "word_count_min": 40,
      "word_count_max": 90,
      "must_include": [
        "greeting",
        "introduction",
        "logical_order_of_points",
        "closing"
      ],
      "text_structure_required": true,
      "coherence_expectation": "B1 level structured email"
    }
  },
"critical_global_rules": {
"automatic_fail_conditions": {
"rule_1": "If topic is off-topic or does not match the task → total score = 0 automatically",
"rule_2": "If word count is below 40 words → total score = 0 automatically"
},
  "scoring_system": {
    "max_total_points": 40,

    "criteria": {
      "fulfillment": {
        "max_points": 10,
        "levels": {
          "A": {
            "points": 10,
            "description": "All 3 content points fully and appropriately addressed (B1-B2 level job fair context)"
          },
          "B": {
            "points": 7.5,
            "description": "2 points fully or 1 fully + 2 partially addressed"
          },
          "C": {
            "points": 5,
            "description": "1 fully + 1 partially OR all partially addressed"
          },
          "D": {
            "points": 2.5,
            "description": "Only 1 point partially addressed"
          },
          "E": {
            "points": 0,
            "description": "Task not fulfilled or topic missed"
          }
        }
      },

      "coherence": {
        "max_points": 10,
        "levels": {
          "A": {
            "points": 10,
            "description": "Clear B1-level structure: introduction, body, conclusion with logical flow"
          },
          "B": {
            "points": 7.5,
            "description": "Mostly clear structure with minor issues"
          },
          "C": {
            "points": 5,
            "description": "Partially clear structure, limited linking"
          },
          "D": {
            "points": 2.5,
            "description": "Weak structure, difficult to follow"
          },
          "E": {
            "points": 0,
            "description": "No clear structure"
          }
        }
      },

      "vocabulary": {
        "max_points": 10,
        "levels": {
          "A": {
            "points": 10,
            "description": "Appropriate and varied B1 vocabulary for job fair and career topics"
          },
          "B": {
            "points": 7.5,
            "description": "Mostly appropriate vocabulary with some repetition"
          },
          "C": {
            "points": 5,
            "description": "Limited vocabulary, but understandable"
          },
          "D": {
            "points": 2.5,
            "description": "Very limited vocabulary (A2 level)"
          },
          "E": {
            "points": 0,
            "description": "Insufficient vocabulary"
          }
        }
      },

      "grammar": {
        "max_points": 10,
        "levels": {
          "A": {
            "points": 10,
            "description": "Very good control of B1 grammar (past tense, connectors, descriptive structures)"
          },
          "B": {
            "points": 7.5,
            "description": "Good control with some errors"
          },
          "C": {
            "points": 5,
            "description": "Frequent errors but meaning understandable"
          },
          "D": {
            "points": 2.5,
            "description": "Very frequent errors, comprehension difficult"
          },
          "E": {
            "points": 0,
            "description": "Grammar below B1 level"
          }
        }
      }
    },

    "special_rule": {
      "critical_fail_condition": "If fulfillment = E (0 points), total score = 0 automatically"
    }
  },

  "calculation": {
    "formula": "fulfillment + coherence + vocabulary + grammar",
    "max_score": 40,
    "note": "All criteria weighted equally for B1 writing task 1"
  },

  "output_format": {
    "must_return": [
      "total_score",
      "corrected_email"
    ],

    "structure": {
      "total": "0-40"
    },

    "correction_rules": [
      "fix grammar",
      "fix spelling",
      "keep meaning unchanged",
      "maintain B1 level language",
      "use past tense appropriately",
      "ensure email structure (greeting, introduction, body, closing)",
      "improve coherence without changing content"
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





