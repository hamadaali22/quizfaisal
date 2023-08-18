<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Traits\GeneralTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Auth;
use Validator;
use Hash;
use App\User;
use App\Level;
use App\Exam;
use App\Question;
use App\SubQuestion;
use App\Answer;
// use App\stuendAnswer;
use App\ExamAnswer;
class QuestionController extends Controller
{
    use GeneralTrait;
    public function levels(Request $request)
    {
        $data=Level::all();
        return $this->returnDataa('data', $data,'');
    }
    public function telcExams(Request $request)
    {
        $exam=Exam::where("level_id" , $request->level_id)->where('section','telc')->get();
        $level=Level::where("id" , $request->level_id)->first();
        $home  =[
            'exam'=> $exam,
            'level'=> $level,
        ];
        return $this->returnDataa('data', $home,'');
    }
    public function exams(Request $request)
    {
        $exam=Exam::where("level_id" , $request->level_id)->where('section',null)->get();
        $level=Level::where("id" , $request->level_id)->first();
        $home  =[
            'exam'=> $exam,
            'level'=> $level,
        ];
       return $this->returnDataa('data', $home,'');
    }
    // public function question(Request $request)
    // {
    //     $data=Question::where("exam_id" , $request->exam_id)->paginate(1);

    //     return $this->returnDataa('data', $data,'');
    // }
    public function question(Request $request)
    {
        $data=Question::where("exam_id" , $request->exam_id)->orderBy('order','ASC')->paginate(1);
        foreach ($data as $item) {
            if($item->type=='listening'){
                $item->file="https://xn--deutschprfungen-7vb.com/img/questions-file/".$item->file;
            }elseif($item->type=='image'){
                $item->image="https://xn--deutschprfungen-7vb.com/img/questions-image/".$item->image;
            }elseif($item->type=='listening and image'){
                $item->file="https://xn--deutschprfungen-7vb.com/img/questions-file/".$item->file;
                $item->image="https://xn--deutschprfungen-7vb.com/img/questions-image/".$item->image;
            }else{

            }

            // $item->level= Level::where('id',$item->level_id)->first();
            $item->exam=Exam::where('id',$item->exam_id)->first();
            $subquestion=SubQuestion::where('question_id',$item->id)->orderBy('order','ASC')->get();
            foreach ($subquestion as $sub) {
                if($sub->bannar){
                    $sub->bannarImage="https://xn--deutschprfungen-7vb.com/img/banner/".$sub->bannar;
                }else{
                     $sub->bannarImage=null;
                }
                if($sub->image_a){
                    $sub->image_a="https://xn--deutschprfungen-7vb.com/img/answer-image/".$sub->image_a;
                }
                if($sub->image_b){
                    $sub->image_b="https://xn--deutschprfungen-7vb.com/img/answer-image/".$sub->image_b;
                }

                $answer=Answer::where('subquestion_id',$sub->id)->first();
                if($answer){
                  $sub->answer=$answer;
                }

            }
            $item->subquestion=$subquestion;
        }
        return $this->returnDataa('data', $data,'');
    }
    public function SaveExam(Request $request)
    {
        // return $request->data[0]['user_id'];
        // return $request->data[0]['examId'];
        // return $request->data[0]['questionId'];

        // return $request->data;
        $check_examanswer=ExamAnswer::where("user_id", $request->data[0]['user_id'])->where("exam_id", $request->data[0]['examId'])->where("question_id" , $request->data[0]['questionId'])->get();
        if(count($check_examanswer) >0){
            foreach ($check_examanswer as $item) {
                // $delete_exam = ExamAnswer::findOrFail($item->id);
                $item->delete();
            }
        }
        $length = count($request->data);
        if($length > 0)
        {
            for($i=0; $i<$length; $i++)
            {
            //   return $request->data[$i]['subQuestionId'];
                // return $request->subQuestionId[$i];
                // return $request->data;
                // $check_examanswer=ExamAnswer::where("user_id", $request->data[$i]['user_id'])->where("exam_id", $request->data[$i]['examId'])->where("question_id" , $request->data[$i]['questionId'])->get();
                // if(count($check_examanswer) >0){
                //     foreach ($check_examanswer as $item) {
                //         // $delete_exam = ExamAnswer::findOrFail($item->id);
                //         $item->delete();
                //     }
                // }
                // $check_examanswer=ExamAnswer::where("user_id", $request->data[$i]['user_id'])->where("question_id" , $request->data[$i]['questionId'])->where("subquestion_id" , $request->data[$i]['subQuestionId'])->first();
                // if($check_examanswer){
                //     $check_examanswer->delete();
                // }

                $add = new ExamAnswer;
                $add->user_id    = $request->data[$i]['user_id'];
                $add->exam_id    = $request->data[$i]['examId'];
                $add->question_id    = $request->data[$i]['questionId'];
                $add->subquestion_id    = $request->data[$i]['subQuestionId'];
                $add->expected_answer    = $request->data[$i]['expected_answer'];
                $add->answer    = $request->data[$i]['answerid'];
                $add->save();
            }
        }
        // return 'ddd';
        return $this -> returnDataa('data',$add,'تم الحفظ');
    }
    public function results(Request $request)
   {
       // dd('hhhh');
       $count_listen_succes=0;
       $count_listen=0;
       $count_read_succes=0;
       $count_read=0;
       $data=ExamAnswer::where("user_id" , $request->user_id)->where("exam_id" , $request->exam_id)->get();
       foreach ($data as $item) {
           $question=Question::where('id',$item->question_id)->first();
           if($question){
               if($question->type =='listening'){
                 // $subquestion_listening=SubQuestion::where("id" , $item->id)->first();
                 // $count_listen +=count($subquestion_listening);
                   if($item->answer === $item->expected_answer){
                       $count_listen_succes +=1;
                   }
               }elseif($question->type =='listening and image'){
                 // $subquestion_listening=SubQuestion::where("id" , $item->id)->first();
                 // $count_listen +=count($subquestion_listening);
                   if($item->answer === $item->expected_answer){
                       $count_listen_succes +=1;
                   }
               }else{
                   if($item->answer === $item->expected_answer){
                       $count_read_succes +=1;
                   }
               }
           }
           $item->question=$question;
           $item->exam=Exam::where('id',$item->exam_id)->first();
           $item->user=User::where('id',$item->user_id)->first();
           // $count4=count($data);
       }
       $allquestion=Question::where('exam_id',$request->exam_id)->get();
       foreach ($allquestion as $_item) {
         if($_item->type =='listening'){
           $subquestion_listening=SubQuestion::where("question_id" , $_item->id)->get();
             $count_listen +=count($subquestion_listening);
         }elseif($_item->type =='listening and image'){
           $subquestion_listening=SubQuestion::where("question_id" , $_item->id)->get();
             $count_listen +=count($subquestion_listening);
         }else{
             $subquestion_read=SubQuestion::where("question_id" , $_item->id)->get();
             $count_read +=count($subquestion_read);
         }
       }
       // $count4=count($data);
       // return $count1;
       // return $count4;
       if($count_listen_succes !=0){
            // dd($count_listen_succes . 'count_listen_succes');
            //   dd($count_listen . 'count_listen');
           $count_listen_percent=($count_listen_succes / $count_listen) * 100;
       }else{
           $count_listen_percent=0;
       }
       if($count_read_succes !=0){
        //   dd($count_read_succes . 'count_read_succes');
        //   dd($count_read . 'count_read');
           $count_read_percent=($count_read_succes / $count_read) * 100;
       }else{
           $count_read_percent=0;
       }
       // $count_read_percent=($count_read_succes / $count_read) * 100;
       // $count_listen_percent=($count_listen_succes / $count_listen) * 100;
       $home  =[
                   'count_read_succes'=> $count_read_succes,
                   'count_read'=> $count_read,
                   'count_read_percent'=> round($count_read_percent, 1),
                   'count_listen_succes'=> $count_listen_succes,
                   'count_listen'=> $count_listen,
                   'count_listen_percent'=> round($count_listen_percent, 1),


                   // 'count4'=>$count4,
               ];
       return $this->returnDataa('data', $home,'');
    }

    // public function resultss(Request $request)
    // {
    //     // dd('hhhh');
    //     $count_listen_succes=0;
    //     $count_listen=0;
    //     $count_read_succes=0;
    //     $count_read=0;
    //     $data=ExamAnswer::where("user_id" , $request->user_id)->where("exam_id" , $request->exam_id)->get();
    //     foreach ($data as $item) {
    //         $question=Question::where('id',$item->question_id)->first();
    //         if($question->type =='listening'){
    //             if($item->answer === $item->expected_answer){
    //                 $count_listen_succes +=1;
    //             }
    //             $count_listen +=1;
    //         }else{
    //             if($item->answer === $item->expected_answer){
    //                 $count_read_succes +=1;
    //             }
    //             $count_read +=1;
    //         }
    //         $item->question=$question;
    //         $item->exam=Exam::where('id',$item->exam_id)->first();
    //         $item->user=User::where('id',$item->user_id)->first();
    //         $count4=count($data);
    //     }
    //     // $count4=count($data);
    //     // return $count1;
    //     // return $count4;
    //     if($count_listen_succes !=0){
    //         $count_listen_percent=($count_listen_succes / $count_listen) * 100;
    //     }else{
    //         $count_listen_percent=0;
    //     }
    //     if($count_read_succes !=0){
    //         $count_read_percent=($count_read_succes / $count_read) * 100;
    //     }else{
    //         $count_read_percent=0;
    //     }
    //     // $count_read_percent=($count_read_succes / $count_read) * 100;
    //     // $count_listen_percent=($count_listen_succes / $count_listen) * 100;
    //     $home  =[
    //                 'count_read_succes'=> $count_read_succes,
    //                 'count_read'=> $count_read,
    //                 'count_read_percent'=> round($count_read_percent, 1),
    //                 'count_listen_succes'=> $count_listen_succes,
    //                 'count_listen'=> $count_listen,
    //                 'count_listen_percent'=> round($count_listen_percent, 1),
    //
    //
    //                 'count4'=>$count4,
    //             ];
    //     return $this->returnDataa('data', $home,'');
    // }
    // public function results(Request $request)
    // {
    //     // dd('hhhh');
    //     $data=ExamAnswer::where("user_id" , $request->user_id)->where("exam_id" , $request->exam_id)->first();
    //     $data->question=Question::where('id',$data->question_id)->first();
    //     // $data->level=Level::where('id',$data->level_id)->first();
    //     $data->exam=Exam::where('id',$data->exam_id)->first();
    //     $data->user=User::where('id',$data->user_id)->first();

    //     return $this->returnDataa('data', $data,'');
    // }

}
