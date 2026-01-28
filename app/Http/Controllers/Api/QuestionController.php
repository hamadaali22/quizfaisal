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
use App\QuizesTest;
use App\QuizesAnswers;
use App\Traits\QuizeTrait;
use App\Helpers\QuizeHelpers;
class QuestionController extends Controller
{
    use GeneralTrait;
    use QuizeTrait;
    
    // public function userquizestest(Request $request)
    // {
    //     $user = Auth::guard('user-api')->user();
    //     if(!$user)
    //         return $this->returnError('يجب تسجيل الدخول أولا');
    //     $data=QuizesAnswers::with('quizes')->has('quizes')->where('user_id',$user->id)->get();
    //     return $this->returnDataa('data', $data,'');
    // }
    public function userquizestest(Request $request)
    {
        $user = Auth::guard('user-api')->user();
        if(!$user)
            return $this->returnError('يجب تسجيل الدخول أولا');
        $data=QuizesTest::with([
            'quizes_answers' => function ($query) {
                $query->with('quizes'); // تحميل العلاقة داخل العلاقة
                // ممكن تضيف شروط هنا لو حابب، مثلاً:
                // ->where('is_correct', true);
            }
        ])
        ->where('user_id',$user->id)
        ->where("status" , 0)
        ->orderBy('created_at', 'desc')->first();
        return $this->returnDataa('data', $data,'');
    }
    public function quizesResult(Request $request)
    {
        $user = Auth::guard('user-api')->user();
        if(!$user)
            return $this->returnError('يجب تسجيل الدخول أولا');
        $data=QuizesTest::where('user_id',$user->id)
        ->where("status" , 0)
        ->orderBy('created_at', 'desc')->first();
        return $this->returnDataa('data', $data,'');
    }
    public function quizes(Request $request)
    {
        $user = Auth::guard('user-api')->user();
        // inRandomOrder()->
        if($request->levelName==null){
            $data = QuizeHelpers::quizes('A2','difficult',5);
            // return $request->levelName.'555 difficult';
            return $this->returnDataa('data', $data,'');
        }else{
            // return $request->levelName.'444 difficult';
            $correct=0;
            if($request->data){
                $quiz_array = json_decode($request->data, true);
                $length = count($quiz_array);
                if($length > 0)
                {
                    for($i=0; $i<$length; $i++)
                    {
                        if($quiz_array[$i]['answer']== $quiz_array[$i]['expected_answer']){
                            $correct +=1; 
                        };
                    }
                }
            }

            $data=[];
            if($request->levelName=='A2'){
                // return $request->level_id.'0 difficult';
                if($request->type=='difficult'){
                    if( $correct >=3){
                        $data = QuizeHelpers::quizes('B1','difficult',5);
                        return $this->returnDataa('data', $data,'');
                    }else{
                        $data_middle = QuizeHelpers::quizes('A2','middle',3);
                        $data_easy = QuizeHelpers::quizes('A2','easy',3);
                        // return $request->levelName.'798 easy';
                        // $mergedData = $data_middle->merge($data_easy);
                        $mergedData = collect($data_middle)->merge($data_easy)->toArray();
                        return $this->returnDataa('data', $mergedData,'');
                    }
                    // return $request->levelName.'11 difficult';
                    
                }else{
                    // return $this->returnDataa('data', 'A2 easy','');
                    if( $correct >=3){
                        // $userq=QuizesTest::where("user_id" , $request->quizes['0']['user_id'])->first();
                        $data = Quize::where('level_name','100000')->get();
                        return $this->returnDataa('data', $data,'');
                    }else{
                        $data = QuizeHelpers::quizes('A1','difficult',5);
                        return $this->returnDataa('data', $data,'');
                    }
                }
            }elseif($request->levelName=='B1'){
                if($request->type=='difficult'){
                    // return $this->returnDataa('data', 'B1 difficult','');
                    if( $correct >=3){
                        $data = QuizeHelpers::quizes('B2','difficult',5);
                        return $this->returnDataa('data', $data,'');
                    }else{
                        $data_middle = QuizeHelpers::quizes('B1','middle',3);
                        $data_easy = QuizeHelpers::quizes('B1','easy',3);
                        // $mergedData = $data_middle->merge($data_easy);
                        $mergedData = collect($data_middle)->merge($data_easy)->toArray();
                        return $this->returnDataa('data', $mergedData,'');
                    }
                }else{
                    if( $correct >=3){
                        $data = Quize::where('level_name','100000')->get();
                        return $this->returnDataa('data', $data,'');
                    }else{
                        $data = Quize::where('level_name','100000')->get();

                        
                        $userq=QuizesTest::where("user_id" , $request->user_id)->where("status" , 1)->first();
                        if($userq){
                            $userq->levelName    = "A2";
                            $userq->type    = "difficult";
                            $userq->correct    = $correct;
                            $userq->save();
                        }


                        return $this->returnDataa('data', $data,'');
                    }
                    return $this->returnDataa('data', $data,'');
                }
            }elseif($request->levelName=='B2'){
                if($request->type=='difficult'){
                    if( $correct >=3){
                        $data = QuizeHelpers::quizes('C1','difficult',5);
                        return $this->returnDataa('data', $data,'');                        
                    }else{
                        $data_middle = QuizeHelpers::quizes('B2','middle',3);
                        $data_easy = QuizeHelpers::quizes('B2','easy',3);
                        // $mergedData = $data_middle->merge($data_easy);
                        $mergedData = collect($data_middle)->merge($data_easy)->toArray();
                        return $this->returnDataa('data', $mergedData,'');
                    }
                }else{
                    if( $correct >=3){
                        $data = Quize::where('level_name','100000')->get();
                        return $this->returnDataa('data', $data,'');   
                    }else{
                        $data = Quize::where('level_name','100000')->get();
                        $userq=QuizesTest::where("user_id" , $request->user_id)->where("status" , 1)->first();
                        if($userq){
                            $userq->levelName    = "B1";
                            $userq->type    = "difficult";
                            $userq->correct    = $correct;
                            $userq->save();
                        }
                        return $this->returnDataa('data', $data,'');   
                    }
                    return $this->returnDataa('data', $data,'');
                }
            }elseif($request->levelName=='C1'){
                if($request->type=='difficult'){
                    if( $correct >=3){
                        $data = Quize::where('level_name','100000')->get();
                        $userq=QuizesTest::where("user_id" , $request->user_id)->where("status" , 1)->first();
                        if($userq){
                            $userq->levelName    = "c2";
                            $userq->type    = "difficult";
                            $userq->correct    = $correct;
                            $userq->save();
                        }
                        return $this->returnDataa('data', $data,'');                        
                    }else{
                        $data_middle = QuizeHelpers::quizes('C1','middle',3);
                        $data_easy = QuizeHelpers::quizes('C1','easy',3);
                        // $mergedData = $data_middle->merge($data_easy);
                        $mergedData = collect($data_middle)->merge($data_easy)->toArray();
                        return $this->returnDataa('data', $mergedData,'');
                    }
                }else{
                    if( $correct >=3){
                        $data = Quize::where('level_name','100000')->get();
                        return $this->returnDataa('data', $data,'');   
                    }else{
                        $data = Quize::where('level_name','100000')->get();
                        $userq=QuizesTest::where("user_id" , $request->user_id)->where("status" , 1)->first();
                        if($userq){
                            $userq->levelName    = "B2";
                            $userq->type    = "difficult";
                            $userq->correct    = $correct;
                            $userq->save();
                        }
                        return $this->returnDataa('data', $data,'');   
                    }
                    return $this->returnDataa('data', $data,'');
                }
            }elseif($request->levelName=='A1'){
                if($request->type=='difficult'){
                    if( $correct >=3){
                        $data = Quize::where('level_name','100000')->get();
                        return $this->returnDataa('data', $data,'');   
                    }else{
                        $data_middle = QuizeHelpers::quizes('A1','middle',3);
                        $data_easy = QuizeHelpers::quizes('A1','easy',3);
                        // $mergedData = $data_middle->merge($data_easy);
                        $mergedData = collect($data_middle)->merge($data_easy)->toArray();
                        return $this->returnDataa('data', $mergedData,'');
                    }
                }else{
                    // if( $correct >=3){
                    // }else{
                    // }
                    $data = Quize::where('level_name','100000')->get();
                    return $this->returnDataa('data', $data,''); 
                }
            }
        }
       
    }
    public function SaveQuizeTest(Request $request)
    {
        
        // dd($request->all());
        $length = count($request->quizes);
        
        $correct=0;
        if($length > 0)
        {
            for($i=0; $i<$length; $i++)
            {
               if($request->quizes[$i]['answer']==$request->quizes[$i]['expected_answer']){
                    $correct +=1; 
               }
            }
        }

        $userq=QuizesTest::where("user_id" , $request->quizes['0']['user_id'])->where("status" , 1)->first();
        
        // $delet_QuizesAnswers=
        if($userq){
            $userq->user_id    = $request->quizes['0']['user_id'];
            $userq->level_id    =$request->quizes['0']['level_id'];
            $userq->quize_id    = $request->quizes['0']['quize_id'];
            $userq->levelName    = $request->quizes['0']['levelName'];
            $userq->type    = $request->quizes['0']['type'];
            $userq->correct    = $correct;
            $userq->save();
            
            if($length > 0)
            {
                for($i=0; $i<$length; $i++)
                {
                    $quize_answers = new QuizesAnswers;
                    
                    $quize_answers->quizes_test_id    = $userq->id;
                    $quize_answers->user_id    = $request->quizes[$i]['user_id'];
                    $quize_answers->level_id    = $request->quizes[$i]['level_id'];
                    $quize_answers->quize_id    = $request->quizes[$i]['quize_id'];
                    $quize_answers->answer    = $request->quizes[$i]['answer'];
                    $quize_answers->expected_answer    = $request->quizes[$i]['expected_answer'];
                    // $quize_answers->answer    = $request->quizes[$i]['answer'];
                    $quize_answers->save();
                }
            }
        }else{
            $add = new QuizesTest;
            $add->user_id    = $request->quizes['0']['user_id'];
            $add->level_id    =$request->quizes['0']['level_id'];
            $add->quize_id    = $request->quizes['0']['quize_id'];
            $add->levelName    = $request->quizes['0']['levelName'];
            $add->type    = $request->quizes['0']['type'];
            $add->correct    = $correct;
            $add->save();
            
            if($length > 0)
            {
                for($i=0; $i<$length; $i++)
                {
                    $quize_answers = new QuizesAnswers;
                    
                    $quize_answers->quizes_test_id    = $add->id;
                    $quize_answers->user_id    = $request->quizes[$i]['user_id'];
                    $quize_answers->level_id    = $request->quizes[$i]['level_id'];
                    $quize_answers->quize_id    = $request->quizes[$i]['quize_id'];
                    $quize_answers->answer    = $request->quizes[$i]['answer'];
                    $quize_answers->expected_answer    = $request->quizes[$i]['expected_answer'];
                    // $quize_answers->answer    = $request->quizes[$i]['answer'];
                    $quize_answers->save();
                }
            }
        }
        return $this -> returnDataa('data','23456','تم الحفظ');
    }
    public function editQuizeTest(Request $request){
        $QuizesTest=QuizesTest::where("user_id" , $request->user_id)->where("status" , 1)->first();
        $QuizesTest->status    = 0;
        $QuizesTest->save();
    }
    public function goethes(Request $request)
    {
        $data=Level::where('type','goethe')->get();
        return $this->returnDataa('data', $data,'');
    }
    public function exams(Request $request)
    {
        if($request->lang=='ar'){
            $level=Level::with('level_images')->where('type','goethe')->where("slug_ar" , $request->levelSlug)->first();
        }elseif($request->lang=='en'){
            $level=Level::with('level_images')->where('type','goethe')->where("slug_en" , $request->levelSlug)->first();
        }elseif($request->lang=='fr'){
            $level=Level::with('level_images')->where('type','goethe')->where("slug_fr" , $request->levelSlug)->first();
        }elseif($request->lang=='es'){
            $level=Level::with('level_images')->where('type','goethe')->where("slug_es" , $request->levelSlug)->first();
        }else{
            $level=Level::with('level_images')->where('type','goethe')->where("slug_de" , $request->levelSlug)->first();
        }

        // $level_images = [];

        //     if ($level && $level->level_images) {
        //         foreach ($level->level_images as $image) {
        //             $level_images[] = 'https://deutschtests.com/img/goethe/' . $image->image; // تأكد أن اسم العمود صحيح
        //         }
        //     }
        //     $level->level_images=$level_images;
        // $level->goethe1="https://deutschtests.com/img/goethe/".$level->goethe1;
        // $level->goethe2="https://deutschtests.com/img/goethe/".$level->goethe2;
        // $level->goethe3="https://deutschtests.com/img/goethe/".$level->goethe3;
        // $level->goethe4="https://deutschtests.com/img/goethe/".$level->goethe4;
        // $level->goethe5="https://deutschtests.com/img/goethe/".$level->goethe5;
        https://deutschtests.com/api/exams?levelSlug=%D9%86%D9%85%D8%A7%D8%B0%D8%AC-%D8%A7%D9%85%D8%AA%D8%AD%D8%A7%D9%86%D8%A7%D8%AA-%D9%85%D8%B9%D9%87%D8%AF-%D8%AC%D9%88%D8%AA%D9%87-B1&lang=de

        $exam=Exam::where("level_id" , $level->id)->where('section',null)->get();
        
        $home  =[
            'exam'=> $exam,
            'level'=> $level,
        ];
       return $this->returnDataa('data', $home,'');
    }
    public function telcs(Request $request)
    {
        $data=Level::where('type','telc')->get();
        return $this->returnDataa('data', $data,'');
    }
    public function telcExams(Request $request)
    {
        if($request->lang=='ar'){
            $level=Level::with('level_images')->where('type','telc')->where("slug_ar" , $request->levelSlug)->first();
        }elseif($request->lang=='en'){
            $level=Level::with('level_images')->where('type','telc')->where("slug_en" , $request->levelSlug)->first();    
        }elseif($request->lang=='fr'){
            $level=Level::with('level_images')->where('type','telc')->where("slug_fr" , $request->levelSlug)->first();
        }elseif($request->lang=='es'){
            $level=Level::with('level_images')->where('type','telc')->where("slug_es" , $request->levelSlug)->first();
        }else{
            $level=Level::with('level_images')->where('type','telc')->where("slug_de" , $request->levelSlug)->first();
        }
        // $level->telc1="https://deutschtests.com/img/telc/".$level->telc1;
        // $level->telc2="https://deutschtests.com/img/telc/".$level->telc2;
        // $level->telc3="https://deutschtests.com/img/telc/".$level->telc3;
        // $level->telc4="https://deutschtests.com/img/telc/".$level->telc4;
        // $level->telc5="https://deutschtests.com/img/telc/".$level->telc5;
        $exam=Exam::where("level_id" , $level->id)->where('section','telc')->get();
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
        $xam_answer=ExamAnswer::where("user_id" , $request->user_id)
        // ->orderBy('id','DESC')
        ->get();
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
								if($one_exams->answer == $expected->one){
								$count_listen_succes +=1;
								}elseif($one_exams->answer == $expected->two){
									$count_listen_succes +=1;
								}elseif($one_exams->answer == $expected->three){
									$count_listen_succes +=1;
								}elseif($one_exams->answer == $expected->four){
									$count_listen_succes +=1;
								}elseif($one_exams->answer == $expected->five){
									$count_listen_succes +=1;
								}elseif($one_exams->answer == $expected->six){
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
        $count_listen_succes=0;
        $count_listen=0;
        $count_read_succes=0;
        $count_read=0;
        $exams = Exam::where('section', 'telc')
            ->whereHas('examAnswers', function ($q) use ($request) {
                $q->where('user_id', $request->user_id);
            })
            ->with(['examAnswers' => function ($q) use ($request) {
                $q->where('user_id', $request->user_id);
            }])
            // ->orderBy('id', 'DESC')
            ->get();

       foreach ($exams as $_item) {
       
            // $_item->date=$_item->created_at->format('Y-m-d');
            $_item->name=$_item->name;
            $count_listen_succes=0;
        	$count_listen=0;
        	$count_read_succes=0;
        	$count_read=0;
            // $one_exams=ExamAnswer::where("user_id" , $request->user_id)->where("exam_id" , $_item->id)->get();
            foreach ($_item->examAnswers as $one_exam) {
                $_item->date=$one_exam->created_at->format('Y-m-d');
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
								if($one_exam->answer == $expected->one){
								$count_listen_succes +=1;
								}elseif($one_exam->answer == $expected->two){
									$count_listen_succes +=1;
								}elseif($one_exam->answer == $expected->three){
									$count_listen_succes +=1;
								}elseif($one_exam->answer == $expected->four){
									$count_listen_succes +=1;
								}elseif($one_exam->answer == $expected->five){
									$count_listen_succes +=1;
								}elseif($one_exam->answer == $expected->six){
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
			
        }
			
		    
			
        return $this->returnDataa('data', $exams,'');
    }
    public function telcUserExamss(Request $request){
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
        }
        return $this->returnDataa('data', $exams,'');
    }

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









    // $data=[];
    // if($request->quizes[$i]['level_id']=='A2'){
    //     if($request->quizes['0']['type']='sets_difficult'){
    //         if( $correct >=3){
    //             $data[] = Quize::inRandomOrder()->where('level_name','B1')->with('levels')->with('sets_difficult')->has('sets_difficult')->take(5)->get();
    //         }else{
    //             $data[] = Quize::inRandomOrder()->where('level_name','A2')->with('levels')->with('sets_middle')->has('sets_middle')->take(3)->get();
    //             $data[] = Quize::inRandomOrder()->where('level_name','A2')->with('levels')->with('sets_easy')->has('sets_easy')->take(3)->get();
    //         }
    //         return $this->returnDataa('data', $data,'');
    //     }else{
    //         if( $correct >=3){
    //             // $data = Quize::inRandomOrder()->where('level_name','A2')->with('levels')->with('sets_difficult')->has('sets_difficult')->take(5)->get();
    //         }else{
    //             $data[] = Quize::inRandomOrder()->where('level_name','A1')->with('levels')->with('sets_difficult')->has('sets_difficult')->take(5)->get();
    //         }
    //         return $this->returnDataa('data', $data,'');
    //     }
    // }elseif($request->quizes[$i]['level_id']=='B1'){
    //     if($request->quizes['0']['type']='sets_difficult'){
    //         if( $correct >=3){
    //             $data[] = Quize::inRandomOrder()->where('level_name','B2')->with('levels')->with('sets_difficult')->has('sets_difficult')->take(5)->get();
    //         }else{
    //             $data[] = Quize::inRandomOrder()->where('level_name','B1')->with('levels')->with('sets_middle')->has('sets_middle')->take(3)->get();
    //             $data[] = Quize::inRandomOrder()->where('level_name','B1')->with('levels')->with('sets_easy')->has('sets_easy')->take(3)->get();
    //         }
    //         return $this->returnDataa('data', $data,'');
    //     }else{
    //         if( $correct >=3){
    //             // $data = Quize::inRandomOrder()->where('level_name','A2')->with('levels')->with('sets_difficult')->has('sets_difficult')->take(5)->get();
    //         }else{
    //             // $data[] = Quize::inRandomOrder()->where('level_name','A1')->with('levels')->with('sets_difficult')->has('sets_difficult')->take(5)->get();
    //         }
    //         return $this->returnDataa('data', $data,'');
    //     }
    // }elseif($request->quizes[$i]['level_id']=='B2'){
    //     if($request->quizes['0']['type']='sets_difficult'){
    //         if( $correct >=3){
    //             // $data[] = Quize::inRandomOrder()->where('level_name','B2')->with('levels')->with('sets_difficult')->has('sets_difficult')->take(5)->get();
    //         }else{
    //             $data[] = Quize::inRandomOrder()->where('level_name','B2')->with('levels')->with('sets_middle')->has('sets_middle')->take(3)->get();
    //             $data[] = Quize::inRandomOrder()->where('level_name','B2')->with('levels')->with('sets_easy')->has('sets_easy')->take(3)->get();
    //         }
    //         return $this->returnDataa('data', $data,'');
    //     }else{
    //         if( $correct >=3){
    //             // $data = Quize::inRandomOrder()->where('level_name','A2')->with('levels')->with('sets_difficult')->has('sets_difficult')->take(5)->get();
    //         }else{
    //             // $data[] = Quize::inRandomOrder()->where('level_name','A1')->with('levels')->with('sets_difficult')->has('sets_difficult')->take(5)->get();
    //         }
    //         return $this->returnDataa('data', $data,'');
    //     }
    // }elseif($request->quizes[$i]['level_id']=='A1'){
    //     if($request->quizes['0']['type']='sets_difficult'){
    //         if( $correct >=3){
    //             // $data[] = Quize::inRandomOrder()->where('level_name','B2')->with('levels')->with('sets_difficult')->has('sets_difficult')->take(5)->get();
    //         }else{
    //             $data[] = Quize::inRandomOrder()->where('level_name','A1')->with('levels')->with('sets_middle')->has('sets_middle')->take(3)->get();
    //             $data[] = Quize::inRandomOrder()->where('level_name','A1')->with('levels')->with('sets_easy')->has('sets_easy')->take(3)->get();
    //         }
    //         return $this->returnDataa('data', $data,'');
    //     }else{
    //         if( $correct >=3){
    //             // $data = Quize::inRandomOrder()->where('level_name','A2')->with('levels')->with('sets_difficult')->has('sets_difficult')->take(5)->get();
    //         }else{
    //             // $data[] = Quize::inRandomOrder()->where('level_name','A1')->with('levels')->with('sets_difficult')->has('sets_difficult')->take(5)->get();
    //         }
    //         return $this->returnDataa('data', $data,'');
    //     }
    // }

}
