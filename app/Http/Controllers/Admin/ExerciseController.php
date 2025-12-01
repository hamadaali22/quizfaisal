<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Question;
use App\Exam;
use App\Level;
use App\SubExercise;
use App\Answer;
use App\Exercise;
use Illuminate\Http\Request;
use App\ExpectedAnswer;
class ExerciseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $levels=Level::where('type','exercise')->get();
        $exercises=Exercise::with('levels')->orderBy('order','ASC')->get();
       
        return view('admin.exercises.all',compact('exercises','levels'));
    }
    
    public function create()
    {
        
        $levels=Level::where('type','exercise')->get();
        return view('admin.exercises.create',compact('levels'));
    }
    
    public function store(Request $request)
    {
        
        $add = new Exercise;
        if ($files = $request->file('file')) {
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $destinationPath = 'img/questions-file';
            $files->move($destinationPath, $profileImage);
            $add->file = $profileImage;
        }

        if ($image = $request->file('image')) {
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $destinationPath = 'img/questions-image';
            $image->move($destinationPath, $profileImage);
            $add->image = $profileImage;
        }

        $add->level_id    = $request->level_id;
        // $add->exam_id    = $request->exam_id;
        $add->bio    = $request->bio;
        $add->type    = $request->type;
        $add->mark    = $request->mark;
        if(isset($request->paragraph)){
            $add->paragraph    = $request->paragraph;
        }
        $add->save();

        $length = count($request->title);
        if($length > 0)
        {
            for($i=0; $i<$length; $i++)
            {
                // dd($request->first_choice[$i]);
                //dd($request->second_choice[$i]);

                //dd($request->third_choice[$i]);


                $add_video = new SubExercise;
                if(isset($request->banner[$i])){
                    $file1=$request->banner[$i];
                    $file_extension1 = $file1 -> getClientOriginalExtension();
                    $file_name1 = time().rand(1,100).'.'.$file_extension1;
                    $file1->move('img/banner/', $file_name1);
                    $add_video->bannar    = $file_name1;
                }
                if(isset($request->image_a[$i])){
                    $file2=$request->image_a[$i];
                    $file_extension2 = $file2 -> getClientOriginalExtension();
                    $file_name2 = time().rand(1,100).'.'.$file_extension2;
                    $file2->move('img/answer-image/', $file_name2);
                    $add_video->image_a    = $file_name2;
                }
                if(isset($request->image_b[$i])){
                    $file3 =$request->image_b[$i];
                    $file_extension3 = $file3 -> getClientOriginalExtension();
                    $file_name3 = time().rand(1,100).'.'.$file_extension3;
                    $file3->move('img/answer-image/', $file_name3);
                    $add_video->image_b    = $file_name3;
                }

                // if(isset($file1)){
                //     $file_extension1 = $file1 -> getClientOriginalExtension();
                //     $file_name1 = time().rand(1,100).'.'.$file_extension1;
                //     $file1->move('img/banner/', $file_name1);
                //     $add_video->bannar    = $file_name1;
                // }
                // if(isset($file2)){
                //     $file_extension2 = $file2 -> getClientOriginalExtension();
                //     $file_name2 = time().rand(1,100).'.'.$file_extension2;
                //     $file2->move('img/answer-image/', $file_name2);
                //     $add_video->image_a    = $file_name2;
                // }
                // if(isset($file3)){
                //     $file_extension3 = $file3 -> getClientOriginalExtension();
                //     $file_name3 = time().rand(1,100).'.'.$file_extension3;
                //     $file3->move('img/answer-image/', $file_name3);
                //     $add_video->image_b    = $file_name3;
                // }

                $add_video->level_id    = $add->level_id;
                // $add_video->exam_id    = $request->exam_id;
                $add_video->exercise_id    = $add->id;
                if(isset($request->title[$i])){
                    $add_video->title    = $request->title[$i];
                }
                if(isset($request->last_title[$i])){
                    $add_video->last_title    = $request->last_title[$i];
                }
                if(isset($request->answer_location[$i])){
                    $add_video->answer_location    = $request->answer_location[$i];
                }

                if(isset($request->answer_type[$i])){
                    $add_video->answer_type    = $request->answer_type[$i];
                }
                if(isset($request->is_multy[$i])){
                    $add_video->is_multy    = $request->is_multy[$i];
                }
                if(isset($request->is_complete[$i])){
                    $add_video->is_complete    = $request->is_complete[$i];
                }
                $add_video->expected_answer    = $request->expected_answer[$i];
                if(isset($request->first_choice[$i])){
                    $add_video->first_choice    = $request->first_choice[$i];
                }
                if(isset($request->second_choice[$i])){
                    $add_video->second_choice    = $request->second_choice[$i];
                }
                if(isset($request->third_choice[$i])){
                    $add_video->third_choice    = $request->third_choice[$i];
                }
                $add_video->save();


                if($request->answer_type[$i]=='complete'){
                    if ($request->is_complete[$i] !='write') {
                      $add_answer = new Answer;
                      $add_answer->subexercise_id   = $add_video->id;
                      $add_answer->one    = $request->one[$i];
                      $add_answer->two    = $request->two[$i];
                      $add_answer->three    = $request->three[$i];
                      $add_answer->four    = $request->four[$i];
                      $add_answer->five    = $request->five[$i];
                      $add_answer->six    = $request->six[$i];
                      $add_answer->seven    = $request->seven[$i];
                      $add_answer->eight    = $request->eight[$i];
                      $add_answer->nine    = $request->nine[$i];
                      $add_answer->ten    = $request->ten[$i];
                      $add_answer->eleven    = $request->eleven[$i];
                      $add_answer->twelve    = $request->twelve[$i];
                      $add_answer->thirteen    = $request->thirteen[$i];
                      $add_answer->fourteen    = $request->fourteen[$i];
                      $add_answer->fifteen    = $request->fifteen[$i];
                      $add_answer->sixteen    = $request->sixteen[$i];
                      $add_answer->save();
                   }else {
                     $add_expecte_answer = new ExpectedAnswer;
                     $add_expecte_answer->subexercise_id    = $add_video->id;
                     $add_expecte_answer->one    = $request->one[$i];
                     $add_expecte_answer->two    = $request->two[$i];
                     $add_expecte_answer->three    = $request->three[$i];
                     $add_expecte_answer->four    = $request->four[$i];
                     $add_expecte_answer->five    = $request->five[$i];
                     $add_expecte_answer->six    = $request->six[$i];
                     $add_expecte_answer->save();
                   }



                    // $length = count($request->title);
                    // if($length > 0)
                    // {
                    //     for($i=0; $i<$length; $i++)
                    //     {

                    //     }
                    // }
                }
            }

        }
        return redirect('admin/exercises')->with("message", 'Added successfully');
    }
   

// use App\Curricul;

    public function edit(Exercise $exercise)
    {
        $levels=Level::where('type','exercise')->get();

        return view('admin.exercises.edit',compact('exercise','levels'));
    }

    public function update(Request $request, Exercise $exercise){
        $edit = Exercise::findOrFail($exercise->id);

        if($request->type =='listening'){
            if($files = $request->file('file')) {
                $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
                $destinationPath = 'img/questions-file';
                $files->move($destinationPath, $profileImage);
                $edit->file = $profileImage;
            }else{
                $edit->file = $edit->file;
            }
        }

        if($request->type =='image'){
            if ($image = $request->file('image')) {
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $destinationPath = 'img/questions-image';
                $image->move($destinationPath, $profileImage);
                $edit->image = $profileImage;
            }else{
                $edit->image = $edit->image;
            }
        }
        if($request->type =='reading'){
            if(isset($request->paragraph)){
                $edit->paragraph = $request->paragraph;
            }else{
                $edit->paragraph = $edit->paragraph;
            }
            if(isset($request->paragraph_ar)){
                $edit->paragraph_ar = $request->paragraph_ar;
            }else{
                $edit->paragraph_ar = $edit->paragraph_ar;
            }
            if(isset($request->paragraph_en)){
                $edit->paragraph_en = $request->paragraph_en;
            }else{
                $edit->paragraph_en = $edit->paragraph_en;
            }
            if(isset($request->paragraph_fr)){
                $edit->paragraph_fr = $request->paragraph_fr;
            }else{
                $edit->paragraph_fr = $edit->paragraph_fr;
            }
            if(isset($request->paragraph_es)){
                $edit->paragraph_es = $request->paragraph_es;
            }else{
                $edit->paragraph_es = $edit->paragraph_es;
            }
        }
        if($request->type =='listening and image'){
            if($files = $request->file('file')) {
                $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
                $destinationPath = 'img/questions-file';
                $files->move($destinationPath, $profileImage);
                $edit->file = $profileImage;
            }else{
                $edit->file = $edit->file;
            }
            // dd($request->file('image'));
            if ($image = $request->file('image')) {
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $destinationPath = 'img/questions-image';
                $image->move($destinationPath, $profileImage);
                $edit->image = $profileImage;
            }else{
                $edit->image = $edit->image;
            }
        }


        $edit->level_id    = $request->level_id;
        // $edit->exam_id    = $request->exam_id;
        $edit->type    = $request->type;
        $edit->mark    = $request->mark;
        $edit->bio    = $request->bio;
        $edit->bio_ar    = $request->bio_ar;
        $edit->bio_en    = $request->bio_en;
        $edit->bio_fr    = $request->bio_fr;
        $edit->bio_es    = $request->bio_es;


        $edit->save();

        // if($request->name !=''){
        //     $edit->name    = $request->name;
        //  }else{
        //     $edit->name    = $edit->name;
        //  }

        return redirect()->route('exercises.index')->with("message", 'Updated successfully');
    }

    public function destroy(Request $request)
    {
        $delete = Exercise::findOrFail($request->id);
        // dd('gggghytghgt');
        if($delete){
            $subquestions= SubExercise::where('subexercise_id',$delete->id)->get();
            foreach ($subquestions as $subquestion) {
                $subquestion->delete();
                $answers= Answer::where('subexercise_id',$subquestion->id)->get();
                foreach ($answers as $answer) {
                    // $delete_branch = Day::findOrFail($answer->id);
                    $answer->delete();
                }
            }

        }
        $delete->delete();

        return redirect()->route('exercises.index')->with("message",'The question has been deleted');
    }


}
