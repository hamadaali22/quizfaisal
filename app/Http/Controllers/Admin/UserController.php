<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Spatie\Permission\Models\Role;
use DB;
use Crypt;
use Hash;
use App\Traits\GeneralTrait;
use App\Instructor;
use App\Student;
use App\ExamAnswer;
use App\Exam;
use App\Question;
use App\SubQuestion;
class UserController extends Controller
{
    use GeneralTrait;

    public function __construct()
    {
        $this->middleware('auth');
    }  
	
	public function allexam()
    {
        $exams=ExamAnswer::where("user_id" ,'!=', 1)->orderBy('id', 'DESC')->get();
		foreach ($exams as $item) {            
         	$item->exam=Exam::where("id" , $item->exam_id)->first();
			$user=User::where("id" , $item->user_id)->first();
			if($user)
				$item->user_name=$user->name;
			 
        }
		// dd($exams);
		return view('admin.users.allexam',compact('exams'));
	}
	public function examsGoethe($id)
    {
        $xam_answer=ExamAnswer::where("user_id" , $id)->get();
        $values=[];
        $exams=[];
        
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
            $count_listen_succes=0;
        	$count_listen=0;
        	$count_read_succes=0;
        	$count_read=0;
            $one_exams=ExamAnswer::where("user_id" , $id)->where("exam_id" , $_item->id)->get();
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
        return view('admin.users.exam',compact('exams'));
    }
    public function examsTelc($id){
        $xam_answer=ExamAnswer::where("user_id" , $id)->get();
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
            $count_listen_succes=0;
        	$count_listen=0;
        	$count_read_succes=0;
        	$count_read=0;
            $one_exams=ExamAnswer::where("user_id" , $id)->where("exam_id" , $_item->id)->get();
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
        return view('admin.users.exam',compact('exams'));
    }
//     public function examsGoethee($id)
//     {
//         $exams=ExamAnswer::where("user_id" , $id)->get();
//         $values=[];
//         $data=[];
//         foreach ($exams as $item) {
// 			$count_listen_succes=0;
// 			$count_listen=0;
// 			$count_read_succes=0;
// 			$count_read=0;

//             //$exam=Exam::where("id" , $item->exam_id)->where('section',null)->first();
//             $exam=Exam::where("id" , $item->exam_id)->first();
// 			if($exam){
// 				$question=Question::where('id',$item->question_id)->first();
// 				$subquestion=SubQuestion::where('id',$item->subquestion_id)->first();
// 				if ($question) {
					
// 					if($subquestion){
// 						if($subquestion->is_complete !='write'){
// 							if($question->type =='listening'){
// 							if($item->answer === $item->expected_answer){
// 								$count_listen_succes =1;
// 							}
// 							}elseif($question->type =='listening and image'){
// 								if($item->answer === $item->expected_answer){
// 								$count_listen_succes +=1;
// 							}
// 							}else{
// 								if($item->answer === $item->expected_answer){
// 									$count_read_succes +=1;
// 								}
// 							}
// 						}else{
// 							$expected_answer=ExpectedAnswer::where('subquestion_id',$subquestion->id)->get();
// 							foreach ($expected_answer as $expected) {
// 								if($item->answer == $expected->one){
// 								$count_listen_succes +=1;
// 								}elseif($item->answer == $expected->two){
// 									$count_listen_succes +=1;
// 								}elseif($item->answer == $expected->three){
// 									$count_listen_succes +=1;
// 								}elseif($item->answer == $expected->four){
// 									$count_listen_succes +=1;
// 								}elseif($item->answer == $expected->five){
// 									$count_listen_succes +=1;
// 								}elseif($item->answer == $expected->six){
// 									$count_listen_succes +=1;
// 								}else {
// 								}
// 							}
// 						}

// 					}
					

// 					$allquestion=Question::where('exam_id',$item->exam_id)->get();
// 					foreach ($allquestion as $_item) {
// 						if($_item->type =='listening'){
// 						$subquestion_listening=SubQuestion::where("question_id" , $_item->id)->get();
// 							$count_listen +=count($subquestion_listening);
// 						}elseif($_item->type =='listening and image'){
// 						$subquestion_listening=SubQuestion::where("question_id" , $_item->id)->get();
// 							$count_listen +=count($subquestion_listening);
// 						}else{
// 							$subquestion_read=SubQuestion::where("question_id" , $_item->id)->get();
// 							$count_read +=count($subquestion_read);
// 						}
// 					}

// 					if($count_listen_succes !=0){
// 						$count_listen_percent=($count_listen_succes / $count_listen) * 100;
// 					}else{
// 						$count_listen_percent=0;
// 					}
// 					if($count_read_succes !=0){
// 						$count_read_percent=($count_read_succes / $count_read) * 100;
// 					}else{
// 						$count_read_percent=0;
// 					}


// 					$exam->count_read_succes= $count_read_succes;
// 					$exam->count_read= $count_read;
// 					$exam->count_read_percent=round($count_read_percent, 1);
// 					$exam->count_listen_succes= $count_listen_succes;
// 					$exam->count_listen= $count_listen;
// 					$exam->count_listen_percent= round($count_listen_percent, 1);
// 				}
// 				if (!in_array($item->exam_id, $values)) {
// 					$values[]=$item->exam_id;
					
					
// 					$values[]=$item->exam_id;
// 					$data[]=$exam;
					
// 				}
// 			}
//         }
//         // 	dd($data);
//         return view('admin.users.exam',compact('data'));
//     }
// 	public function examsTelc($id)
//     {
//             $exams=ExamAnswer::where("user_id" , $id)->get();
//             $values=[];
//             $data=[];
			
//             foreach ($exams as $item) {
//                 if (!in_array($item->exam_id, $values)) {
//                     $exam=Exam::where("id" , $item->exam_id)->where('section','telc')->first();
//                     if($exam){
//                       $values[]=$item->exam_id;
//                       $data[]=$exam;
//                     }
//                 }
//             }
// 			return view('admin.users.exam',compact('data'));
//     }







    
	public function index(Request $request)
	{
		$data = User::orderBy('id','DESC')->get();
		
		return view('admin.users.all',compact('data'));
		// ->with('i', ($request->input('page', 1) - 1) * 5);
	}

	public function create()
	{
		$roles = Role::pluck('name','name')->all();
		return view('admin.users.Add_user',compact('roles'));
	}

	public function store(Request $request)
	{
		$this->validate($request, [
			'name' => 'required',
			// 'photo' => 'required',
			'mobile' => 'required',
			'address' => 'required',
			'email' => 'required|email|unique:users,email',
			'password' => 'required|same:confirm-password',
			'roles_name' => 'required'
		]);
		$input = $request->all();
		if($file=$request->file('photo'))
         {
            $file_extension = $request -> file('photo') -> getClientOriginalExtension();
            $file_name = time().'.'.$file_extension;
            $file_nameone = $file_name;
            $path = 'img/users';
            $request-> file('photo') ->move($path,$file_name);
            $input['photo'] = $file_nameone;
         }else{
            $input['photo'] = "profile_image.png";
         }

		$input['password'] = Hash::make($input['password']);
		// dd($file_nameone);
        $user= User::create($input);

		// $user = User::create($input);
		$user->assignRole($request->input('roles_name'));
		return redirect()->route('users.index')
		->with('success','تم اضافة المستخدم بنجاح');
	}


	public function show($id)
	{
		$user = User::find($id);
		return view('admin.users.show',compact('user'));
	}

	public function edit($id)
	{
		$user = User::find($id);
		// $decrypt=Crypt::decrypt($user->password);
		$roles = Role::pluck('name','name')->all();
		$userRole = $user->roles->pluck('name','name')->all();
		return view('admin.users.edit',compact('user','roles','userRole'));
	}

	public function update(Request $request, $id)
	{
		$this->validate($request, [
			'name' => 'required',
			'email' => 'required|email|unique:users,email,'.$id,
			// 'password' => 'same:confirm-password',
// 			'password' => 'required',
			'roles' => 'required'
		]);
		$input = $request->all();
		if($file=$request->file('photo'))
         {
            $file_extension = $request -> file('photo') -> getClientOriginalExtension();
            $file_name = time().'.'.$file_extension;
            $file_nameone = $file_name;
            $path = 'img/users';
            $request-> file('photo') ->move($path,$file_name);

            $input['photo'] = $file_nameone;
         }else{
            $input['photo'] = $request->url;
         }

// 		if(!empty($input['password'])){
// 			$input['password'] = Hash::make($input['password']);
// 		}else{
// 			$input = array_except($input,array('password'));
// 		}
		$user = User::find($id);
		$user->update($input);
		DB::table('model_has_roles')->where('model_id',$id)->delete();
		$user->assignRole($request->input('roles'));
		return redirect()->route('users.index')
		->with('success','تم تحديث معلومات المستخدم بنجاح');
	}

	public function destroy(Request $request)
	{
		User::find($request->user_id)->delete();
		$exams=ExamAnswer::where("user_id" , $request->user_id)->get();
		
		foreach ($exams as $item) {         
			$delete_exams = ExamAnswer::findOrFail($item->id);
			$delete_exams->delete();
		}

		return redirect()->route('users.index')->with('success','تم حذف المستخدم بنجاح');
	}

	public function userActivation($token){
	    $check = DB::table('user_activations')->where('token',$token)->first();
	  	if(!is_null($check)){
		    $user = User::find($check->id_user);
		    if ($user->is_activated ==1){
		      return redirect()->to('/login/user')->with('success',"حسابكم مفعل ");
		    }
		    $user->update(['is_activated' => 1]);
		    DB::table('user_activations')->where('token',$token)->delete();
		    return redirect()->to('/login/user')->with('success',"تم تفعيل حسابك");
	  	}
	    return redirect()->to('/login/user')->with('Warning',"الرمز الخاص بك غير صالح");
	}

	public function instructorActivation($token){
	    $check = DB::table('user_activations')->where('token',$token)->first();
	  	if(!is_null($check)){
		    $user = Instructor::find($check->id_user);
		    if ($user->is_activated ==1){
		      //  return $this -> returnSuccessMessage('حسابكم مفعل');
		        return redirect()->to('activated')->with('message'," الحساب مفعل ");
		    }
		    $user->update(['is_activated' => 1]);
		    DB::table('user_activations')->where('token',$token)->delete();
		  //  return $this -> returnSuccessMessage('تم تفعيل حسابك');
	        return redirect()->to('activated')->with('message',"تم تفعيل حسابك");
	  	}
	  	// return $this -> returnError('رمز التفعيل غير صالح');
	  	return redirect()->to('/activated')->with('Warning',"رمز التفعيل غير صالج");
	}

	public function studentActivation($token){
	    $check = DB::table('user_activations')->where('token',$token)->first();
	  	if(!is_null($check)){
		    $user = Student::find($check->id_user);
		    if ($user->is_activated ==1){
		        return redirect()->to('activated')->with('message'," الحساب مفعل ");
		    }
		    $user->update(['is_activated' => 1]);
		    DB::table('user_activations')->where('token',$token)->delete();
            return redirect()->to('activated')->with('message',"تم تفعيل حسابك");
    	}
	  	return redirect()->to('/activated')->with('Warning',"رمز التفعيل غير صالج");

	}


}
