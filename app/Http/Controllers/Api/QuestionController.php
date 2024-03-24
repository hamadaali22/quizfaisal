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
use App\ExpectedAnswer;
use App\Quize;
class QuestionController extends Controller
{
    use GeneralTrait;

    public function quizes(Request $request)
    {
        $data = Quize::inRandomOrder()->with('levels')->has('levels')->with('sets_difficult')->has('sets_difficult')->take(5)->get();
        return $this->returnDataa('data', $data,'');
    }
    
    public function levels(Request $request)
    {
        $data=Level::all();
        return $this->returnDataa('data', $data,'');
    }
    public function telcExams(Request $request)
    {
        $level=Level::where("slug2" , $request->levelSlug)->first();
      
        $level->telc1="https://deutschtests.com/img/telc/".$level->telc1;
        $level->telc2="https://deutschtests.com/img/telc/".$level->telc2;
        $level->telc3="https://deutschtests.com/img/telc/".$level->telc3;
        $level->telc4="https://deutschtests.com/img/telc/".$level->telc4;
        $level->telc5="https://deutschtests.com/img/telc/".$level->telc5;
        $exam=Exam::where("level_id" , $level->id)->where('section','telc')->get();
        $home  =[
            'exam'=> $exam,
            'level'=> $level,
        ];
        return $this->returnDataa('data', $home,'');
    }
    public function exams(Request $request)
    {
        $level=Level::where("slug" , $request->levelSlug)->first();
        $level->goethe1="https://deutschtests.com/img/goethe/".$level->goethe1;
        $level->goethe2="https://deutschtests.com/img/goethe/".$level->goethe2;
        $level->goethe3="https://deutschtests.com/img/goethe/".$level->goethe3;
        $level->goethe4="https://deutschtests.com/img/goethe/".$level->goethe4;
        $level->goethe5="https://deutschtests.com/img/goethe/".$level->goethe5;
        
        $exam=Exam::where("level_id" , $level->id)->where('section',null)->get();
        
        $home  =[
            'exam'=> $exam,
            'level'=> $level,
        ];
       return $this->returnDataa('data', $home,'');
    }


    public function goetheUserExams(Request $request)
    {
        // $date = "2020-04-12";
        // $from_date = "2020-04-10";
        // if($date < $from_date ){
        //     return 'g';
        // }else{
        //     return 'n';
        // }
        $xam_answer=ExamAnswer::where("user_id" , $request->user_id)->orderBy('id','DESC')->get();
        $values=[];
        $exams=[];
        $date='2020-01-20';
        foreach ($xam_answer as $item) {
            $exam=Exam::where("id" , $item->exam_id)->where('section',null)->first();
            if($exam){
                if (!in_array($item->exam_id, $values)) {
    				$values[]=$item->exam_id;
    				// $values[]=$item->exam_id;
    				$exams[]=$exam;
    			}
            }
        }
        foreach ($exams as $_item) {
            // $_item->date=$_item->created_at->format('Y-m-d');
            $count_listen_succes=0;
        	$count_listen=0;
        	$count_read_succes=0;
        	$count_read=0;
            $one_exams=ExamAnswer::where("user_id" , $request->user_id)->where("exam_id" , $_item->id)->get();
            foreach ($one_exams as $one_exam) {
                $last_exam_date=$one_exam->created_at->format('Y-m-d');
                if($date < $last_exam_date ){
                    $date=$last_exam_date;
                    $_item->date=$last_exam_date;
                }else{
                    $_item->date=$date;
                }
                $question=Question::where('id',$one_exam->question_id)->first();
				$subquestion=SubQuestion::where('id',$one_exam->subquestion_id)->first();
				if($question){
                    if($subquestion){
                        
						if($subquestion->is_complete !='write'){
						    
							if($question->type =='listening'){
							    
    							if($one_exam->answer === $one_exam->expected_answer){
    								$count_listen_succes +=1;
    								
    							}
							}elseif($question->type =='listening and image'){
								if($one_exam->answer === $one_exam->expected_answer){
								$count_listen_succes +=1;
							}
							}else{
								if($one_exam->answer === $one_exam->expected_answer){
									$count_read_succes +=1;
								}
							}
						}else{
							$expected_answer=ExpectedAnswer::where('subquestion_id',$subquestion->id)->get();
							foreach ($expected_answer as $expected) {
								if($item->answer == $expected->one){
								$count_listen_succes +=1;
								}elseif($item->answer == $expected->two){
									$count_listen_succes +=1;
								}elseif($item->answer == $expected->three){
									$count_listen_succes +=1;
								}elseif($item->answer == $expected->four){
									$count_listen_succes +=1;
								}elseif($item->answer == $expected->five){
									$count_listen_succes +=1;
								}elseif($item->answer == $expected->six){
									$count_listen_succes +=1;
								}else {
								}
							}
						}
                    }
				}
				
				// $one_exam->count_listen_succes= $count_listen_succes;
			}
			
// 			dd($_item);
// 			dd('vvv');
		    $allquestion=Question::where('exam_id',$_item->id)->get();
			foreach ($allquestion as $sub) {
			    $subquestion_listening=SubQuestion::where("question_id" , $sub->id)->get();
			    $subquestion_read=SubQuestion::where("question_id" , $sub->id)->get();
				if($sub->type =='listening'){
					$count_listen +=count($subquestion_listening);
				}elseif($sub->type =='listening and image'){
					$count_listen +=count($subquestion_listening);
				}else{
					$count_read +=count($subquestion_read);
				}
			}
			if($count_listen_succes !=0){
				$count_listen_percent=($count_listen_succes / $count_listen) * 100;
			}else{
				$count_listen_percent=0;
			}
			if($count_read_succes !=0){
				$count_read_percent=($count_read_succes / $count_read) * 100;
			}else{
				$count_read_percent=0;
			}

			$_item->count_read_succes= $count_read_succes;
			$_item->count_read= $count_read;
			$_item->count_read_percent=round($count_read_percent, 1);
			$_item->count_listen_succes= $count_listen_succes;
			$_item->count_listen= $count_listen;
			$_item->count_listen_percent= round($count_listen_percent, 1);
			
// 			echo $count_listen_succes;
// 			dd($_item);
// 			$_item->one_exams=$one_exams;
        }
        
        return $this->returnDataa('data', $exams,'');
    }
    // public function goetheUserExamss(Request $request)
    // {
    //     $exams=ExamAnswer::where("user_id" , $request->user_id)->get();
    //     $values=[];
    //     $data=[];
    //     foreach ($exams as $item) {
    //         if (!in_array($item->exam_id, $values)) {
    //             $values[]=$item->exam_id;
    //             $exam=Exam::where("id" , $item->exam_id)->where('section',null)->first();
    //             if($exam){
    //               $values[]=$item->exam_id;
    //               $data[]=$exam;
    //             }
    //         }
    //     }
    //     return $this->returnDataa('data', $data,'');
    // }

    public function goetheReportExams(Request $request)
    {
        $data=Question::where("exam_id" , $request->exam_id)->orderBy('order','ASC')->paginate(1);
        foreach ($data as $item) {
            if($item->type=='listening'){
                $item->file="https://deutschtests.com/img/questions-file/".$item->file;
            }elseif($item->type=='image'){
                $item->image="https://deutschtests.com/img/questions-image/".$item->image;
            }elseif($item->type=='listening and image'){
                $item->file="https://deutschtests.com/img/questions-file/".$item->file;
                $item->image="https://deutschtests.com/img/questions-image/".$item->image;
            }else{

            }

            // $item->level= Level::where('id',$item->level_id)->first();
            $item->exam=Exam::where('id',$item->exam_id)->first();
            $subquestion=SubQuestion::where('question_id',$item->id)->orderBy('order','ASC')->get();
            foreach ($subquestion as $sub) {
                if($sub->bannar){
                    $sub->bannarImage="https://deutschtests.com/img/banner/".$sub->bannar;
                }else{
                     $sub->bannarImage=null;
                }
                if($sub->image_a){
                    $sub->image_a="https://deutschtests.com/img/answer-image/".$sub->image_a;
                }
                if($sub->image_b){
                    $sub->image_b="https://deutschtests.com/img/answer-image/".$sub->image_b;
                }

                $answer=Answer::where('subquestion_id',$sub->id)->first();
                if($answer){
                  $sub->answer=$answer;
                }
                $sub->exam_answer=ExamAnswer::where("user_id" , $request->user_id)
                                              ->where("subquestion_id" , $sub->id)->first();
                $expectedanswer=ExpectedAnswer::where("subquestion_id" , $sub->id)->first();
                if($expectedanswer){
                    $sub->expectedanswer=$expectedanswer;
                }
            }
            $item->subquestion=$subquestion;


        }
        return $this->returnDataa('data', $data,'');
    }
    public function telcUserExams(Request $request){
        $xam_answer=ExamAnswer::where("user_id" , $request->user_id)->orderBy('id','DESC')->get();
        $values=[];
        $exams=[];
        
        foreach ($xam_answer as $item) {
            $exam=Exam::where("id" , $item->exam_id)->where('section','telc')->first();
            if($exam){
                if (!in_array($item->exam_id, $values)) {
    				$values[]=$item->exam_id;
    				// $values[]=$item->exam_id;
    				$exams[]=$exam;
    			}
            }
        }
        foreach ($exams as $_item) {
            $_item->date=$_item->created_at->format('Y-m-d');
            $count_listen_succes=0;
        	$count_listen=0;
        	$count_read_succes=0;
        	$count_read=0;
            $one_exams=ExamAnswer::where("user_id" , $request->user_id)->where("exam_id" , $_item->id)->get();
            foreach ($one_exams as $one_exam) {
                $question=Question::where('id',$one_exam->question_id)->first();
				$subquestion=SubQuestion::where('id',$one_exam->subquestion_id)->first();
				if($question){
                    if($subquestion){
                        
						if($subquestion->is_complete !='write'){
						    
							if($question->type =='listening'){
							    
    							if($one_exam->answer === $one_exam->expected_answer){
    								$count_listen_succes +=1;
    								
    							}
							}elseif($question->type =='listening and image'){
								if($one_exam->answer === $one_exam->expected_answer){
								$count_listen_succes +=1;
							}
							}else{
								if($one_exam->answer === $one_exam->expected_answer){
									$count_read_succes +=1;
								}
							}
						}else{
							$expected_answer=ExpectedAnswer::where('subquestion_id',$subquestion->id)->get();
							foreach ($expected_answer as $expected) {
								if($item->answer == $expected->one){
								$count_listen_succes +=1;
								}elseif($item->answer == $expected->two){
									$count_listen_succes +=1;
								}elseif($item->answer == $expected->three){
									$count_listen_succes +=1;
								}elseif($item->answer == $expected->four){
									$count_listen_succes +=1;
								}elseif($item->answer == $expected->five){
									$count_listen_succes +=1;
								}elseif($item->answer == $expected->six){
									$count_listen_succes +=1;
								}else {
								}
							}
						}
                    }
				}
			}
			
		    $allquestion=Question::where('exam_id',$_item->id)->get();
			foreach ($allquestion as $sub) {
			    $subquestion_listening=SubQuestion::where("question_id" , $sub->id)->get();
			    $subquestion_read=SubQuestion::where("question_id" , $sub->id)->get();
				if($sub->type =='listening'){
					$count_listen +=count($subquestion_listening);
				}elseif($sub->type =='listening and image'){
					$count_listen +=count($subquestion_listening);
				}else{
					$count_read +=count($subquestion_read);
				}
			}
// 			dd($allquestion);
//             dd($count_listen);
			if($count_listen_succes !=0){
				$count_listen_percent=($count_listen_succes / $count_listen) * 100;
			}else{
				$count_listen_percent=0;
			}
			if($count_read_succes !=0){
				$count_read_percent=($count_read_succes / $count_read) * 100;
			}else{
				$count_read_percent=0;
			}

			$_item->count_read_succes= $count_read_succes;
			$_item->count_read= $count_read;
			$_item->count_read_percent=round($count_read_percent, 1);
			$_item->count_listen_succes= $count_listen_succes;
			$_item->count_listen= $count_listen;
			$_item->count_listen_percent= round($count_listen_percent, 1);
			
// 			echo $count_listen_succes;
// 			dd($_item);
// 			$_item->one_exams=$one_exams;
        }
        return $this->returnDataa('data', $exams,'');
    }
    // public function telcUserExamss(Request $request)
    // {
    //         $exams=ExamAnswer::where("user_id" , $request->user_id)->get();
    //         $values=[];
    //         $data=[];
    //         foreach ($exams as $item) {
    //             if (!in_array($item->exam_id, $values)) {
    //                 $exam=Exam::where("id" , $item->exam_id)->where('section','telc')->first();
    //                 if($exam){
    //                   $values[]=$item->exam_id;
    //                   $data[]=$exam;
    //                 }
    //             }
    //         }
    //         return $this->returnDataa('data', $data,'');
    // }
    public function question(Request $request)
    {
        $data=Question::where("exam_id" , $request->exam_id)->orderBy('order','ASC')->paginate(1);
        foreach ($data as $item) {
            if($item->type=='listening'){
                $item->file="https://deutschtests.com/img/questions-file/".$item->file;
            }elseif($item->type=='image'){
                $item->image="https://deutschtests.com/img/questions-image/".$item->image;
            }elseif($item->type=='listening and image'){
                $item->file="https://deutschtests.com/img/questions-file/".$item->file;
                $item->image="https://deutschtests.com/img/questions-image/".$item->image;
            }else{

            }

            // $item->level= Level::where('id',$item->level_id)->first();
            $item->exam=Exam::where('id',$item->exam_id)->first();
            $subquestion=SubQuestion::where('question_id',$item->id)->orderBy('order','ASC')->get();
            foreach ($subquestion as $sub) {
                if($sub->bannar){
                    $sub->bannarImage="https://deutschtests.com/img/banner/".$sub->bannar;
                }else{
                     $sub->bannarImage=null;
                }
                if($sub->image_a){
                    $sub->image_a="https://deutschtests.com/img/answer-image/".$sub->image_a;
                }
                if($sub->image_b){
                    $sub->image_b="https://deutschtests.com/img/answer-image/".$sub->image_b;
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
           $subquestion=SubQuestion::where('id',$item->subquestion_id)->first();
            if ($question) {
                // dd($subquestion);
                if($subquestion){
                    if($subquestion->is_complete !='write'){
                        if($question->type =='listening'){
                           if($item->answer === $item->expected_answer){
                               $count_listen_succes +=1;
                           }
                        }elseif($question->type =='listening and image'){
                            if($item->answer === $item->expected_answer){
                               $count_listen_succes +=1;
                           }
                        }else{
                            if($item->answer === $item->expected_answer){
                                $count_read_succes +=1;
                            }
                        }
                    }else{
                        $expected_answer=ExpectedAnswer::where('subquestion_id',$subquestion->id)->get();
                        foreach ($expected_answer as $expected) {
                            if($item->answer == $expected->one){
                              $count_listen_succes +=1;
                            }elseif($item->answer == $expected->two){
                                $count_listen_succes +=1;
                            }elseif($item->answer == $expected->three){
                                $count_listen_succes +=1;
                            }elseif($item->answer == $expected->four){
                                $count_listen_succes +=1;
                            }elseif($item->answer == $expected->five){
                                $count_listen_succes +=1;
                            }elseif($item->answer == $expected->six){
                                $count_listen_succes +=1;
                            }else {
                            }
                        }
                     }
                }
            }
           $item->question=$question;
           $item->exam=Exam::where('id',$item->exam_id)->first();
           $item->user=User::where('id',$item->user_id)->first();
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

       if($count_listen_succes !=0){
           $count_listen_percent=($count_listen_succes / $count_listen) * 100;
       }else{
           $count_listen_percent=0;
       }
       if($count_read_succes !=0){
           $count_read_percent=($count_read_succes / $count_read) * 100;
       }else{
           $count_read_percent=0;
       }
       $home  =[
                   'count_read_succes'=> $count_read_succes,
                   'count_read'=> $count_read,
                   'count_read_percent'=> round($count_read_percent, 1),
                   'count_listen_succes'=> $count_listen_succes,
                   'count_listen'=> $count_listen,
                   'count_listen_percent'=> round($count_listen_percent, 1),
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
