<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Quize;
use App\Set;
use App\Level;
use App\SubQuestion;
use App\Answer;
use Illuminate\Http\Request;
use App\ExpectedAnswer;
class QuizeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $quizes=Quize::all();
        $levels=Level::all();
        $sets=Set::all();

        // foreach ($questions as $_item) {
        //     $_item->exam=Exam::where('id',$_item->exam_id)->first();
        //     $_item->level= Level::where('id',$_item->level_id)->first();
        // }
        return view('admin.quizes.all',compact('quizes','levels','sets'));
    }

    

    public function create()
    {
        $quizes=Quize::all();
        $levels=Level::all();
        $sets=Set::all();
        return view('admin.quizes.create',compact('quizes','levels','sets'));
    }

    public function store(Request $request)
    {
        $add = new Quize;
        $add->level_id    = $request->level_id;
        $add->set_id    = $request->set_id;
        $add->type    = $request->type;
        $add->skill    = $request->skill;
        $add->title    = $request->title;
        $add->first_choice    = $request->first_choice;
        $add->second_choice    = $request->second_choice;
        $add->third_choice    = $request->third_choice;
        $add->expected_answer    = $request->expected_answer;
        $add->save();

        return redirect('admin/quizes')->with("message", 'Added successfully');
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
