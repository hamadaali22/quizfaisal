<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Question;
use App\Exam;
use App\Level;
use App\SubQuestion;
use App\Answer;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $exams=Exam::all();
        $levels=Level::all();
        $questions=Question::orderBy('order','ASC')->get();
        foreach ($questions as $item) {
            $item->level= Level::where('id',$item->level_id)->first();
            $item->exam=Exam::where('id',$item->exam_id)->first();
        }
        return view('admin.questions.all',compact('questions','levels','exams'));
    }

    public function create()
    {
        $exams=Exam::all();
        $levels=Level::all();
        return view('admin.questions.create',compact('levels','exams'));
    }

    public function store(Request $request)
    {
        $add = new Question;
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

        // $add->level_id    = $request->le vel_id;
        $add->exam_id    = $request->exam_id;
        $add->bio    = $request->bio;
        $add->type    = $request->type;
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


                $add_video = new SubQuestion;
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

                // $add_video->level_id    = $add->level_id;
                $add_video->exam_id    = $request->exam_id;
                $add_video->question_id    = $add->id;
                if(isset($request->title[$i])){
                    $add_video->title    = $request->title[$i];
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
                    $add_answer = new Answer;
                    $add_answer->subquestion_id    = $add_video->id;
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
        return redirect('admin/questions')->with("message", 'Added successfully');
    }



// use App\Curricul;

    public function edit(Question $question)
    {
        $exams=Exam::all();

        return view('admin.questions.edit',compact('question','exams'));
    }

    public function update(Request $request, Question $question){

        $edit = Question::findOrFail($question->id);

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
        }
        if($request->type =='listening image'){
            if($files = $request->file('file')) {
                $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
                $destinationPath = 'img/questions-file';
                $files->move($destinationPath, $profileImage);
                $edit->file = $profileImage;
            }else{
                $edit->file = $edit->file;
            }

            if ($image = $request->file('image')) {
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $destinationPath = 'img/questions-image';
                $image->move($destinationPath, $profileImage);
                $edit->image = $profileImage;
            }else{
                $edit->image = $edit->image;
            }
        }


        // $add->level_id    = $request->le vel_id;
        $edit->exam_id    = $request->exam_id;
        $edit->type    = $request->type;
        $edit->bio    = $request->bio;


        $edit->save();

        // if($request->name !=''){
        //     $edit->name    = $request->name;
        //  }else{
        //     $edit->name    = $edit->name;
        //  }

        return redirect()->route('questions.index')->with("message", 'Updated successfully');
    }

    public function destroy(Request $request )
    {
            $delete = Question::findOrFail($request->id);
            // dd('gggghytghgt');
            if($delete){
                $subquestions= SubQuestion::where('question_id',$delete->id)->get();
                foreach ($subquestions as $subquestion) {
                    $subquestion->delete();
                    $answers= Answer::where('subquestion_id',$subquestion->id)->get();
                    foreach ($answers as $answer) {
                        // $delete_branch = Day::findOrFail($answer->id);
                        $answer->delete();
                    }
                }

            }
            $delete->delete();

            return redirect()->route('questions.index')->with("message",'The question has been deleted');
    }


}
