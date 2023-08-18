<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Exam;
use App\Level;
use App\Question;
use App\SubQuestion;
use App\ExamAnswer;

use Illuminate\Http\Request;

class ExamController extends Controller
{
       public function __construct()
    {
        $this->middleware('auth');
    }
    public function telcExams()
    {
        $levels=Level::get();
        $exams=Exam::orderBy('id', 'DESC')->where('section','telc')->get();
        foreach ($exams as $item) {   
            $item->level= Level::where('id',$item->level_id)->first();
        }
        return view('admin.exams.all-telc',compact('exams','levels'));
    }
    public function index()
    {
        $levels=Level::get();
        $exams=Exam::orderBy('id', 'DESC')->get();
        foreach ($exams as $item) {   
            $item->level= Level::where('id',$item->level_id)->first();
        }
        return view('admin.exams.all',compact('exams','levels'));
    }
    public function store(Request $request)
    {
        $add = new Exam;
        $add->name    = $request->name;
        $add->level_id    = $request->level_id;
        $add->section    = $request->section;
        $add->save();
        
        return back()->with("message", 'Added successfully'); 
    }

    public function edit(Exam $exam)
    {
        $levels=Level::all();
        return view('admin.exams.edit',compact('levels','exam'));
    }

    public function update(Request $request, Exam $exam){        
        $edit = Exam::findOrFail($exam->id);
        $edit->name    = $request->name;
        $edit->level_id    = $request->level_id;
        $edit->save();
        return redirect()->route('exams.index')->with("message", 'Updated successfully');
    }

    public function destroy(Request $request )
    {
            $delete = Exam::findOrFail($request->id);
            // dd('gggghytghgt');
            if($delete){
                $questions= Question::where('exam_id',$delete->id)->get();
                foreach ($questions as $question) {         
                    // $delete_question = Question::findOrFail($question->id);
                    $question->delete();
                }
                $subquestions= SubQuestion::where('exam_id',$delete->id)->get();
                foreach ($subquestions as $subquestion) {         
                    // $delete_question = SubQuestion::findOrFail($question->id);
                    $subquestion->delete();
                }
                $examanswers= ExamAnswer::where('exam_id',$delete->id)->get();
                foreach ($examanswers as $examanswer) {         
                    // $delete_question = SubQuestion::findOrFail($question->id);
                    $examanswer->delete();
                }
            }
            $delete->delete();
            // File::delete(public_path("assets_admin/img/curriculums/". $delete->image));
            // File::delete("/home/u9ak0fjx/public_html/assets_admin/img/tutorials/" . $delete->image);
       
            return redirect()->route('exams.index')->with("message",'The exam has been deleted'); 
    } 
    
}
