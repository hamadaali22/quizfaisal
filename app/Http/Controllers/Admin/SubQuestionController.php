<?php
  namespace App\Http\Controllers\Admin;
  use App\Http\Controllers\Controller;
  use App\SubQuestion;
  use App\Question;
  use App\Exam;
  use App\Level;
  use Illuminate\Http\Request;
  use App\Answer;
  use App\ExpectedAnswer;

class SubQuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // public function index()
    // {
    //     $exams=Exam::all();
    //     $levels=Level::all();
    //     $questions=Question::all();
    //     $subquestions=SubQuestion::get();
    //     foreach ($subquestions as $item){
    //         $item->level= Level::where('id',$item->level_id)->first();
    //         $item->exam=Exam::where('id',$item->exam_id)->first();
    //         $item->question=Question::where('id',$item->question_id)->first();
    //     }
    //     return view('admin.subquestions.all',compact('subquestions','questions','levels','exams'));
    // }
    public function allSubquestions($id)
    {
        $exams=Exam::all();
        $levels=Level::all();
        $subquestions=SubQuestion::where('question_id',$id)->orderBy('order','ASC')->get();
        // $subquestions=SubQuestion::get();
        foreach ($subquestions as $item){
            $item->level= Level::where('id',$item->level_id)->first();
            $item->exam=Exam::where('id',$item->exam_id)->first();
        }
        return view('admin.subquestions.all',compact('subquestions','levels','exams','id'));
    }
    public function show($id)
    {
        return view('admin.subquestions.create',compact('id'));
    }

    public function create()
    {
        $exams=Exam::all();
        $levels=Level::all();
        $questions=Question::all();
        return view('admin.subquestions.create',compact('levels','exams','questions'));
    }

    public function store(Request $request)
    {
        $questions=Question::where('id',$request->question_id)->first();
        $add = new SubQuestion;
        $add->exam_id    = $questions->exam_id;
        $add->question_id    = $questions->id;
        if(isset($request->banner)){
            $file1=$request->banner;
            $file_extension1 = $file1 -> getClientOriginalExtension();
            $file_name1 = time().rand(1,100).'.'.$file_extension1;
            $file1->move('img/banner/', $file_name1);
            $add->bannar    = $file_name1;
        }
        if(isset($request->image_a)){
            $file2=$request->image_a;
            $file_extension2 = $file2 -> getClientOriginalExtension();
            $file_name2 = time().rand(1,100).'.'.$file_extension2;
            $file2->move('img/answer-image/', $file_name2);
            $add->image_a    = $file_name2;
        }
        if(isset($request->image_b)){
            $file3 =$request->image_b;
            $file_extension3 = $file3 -> getClientOriginalExtension();
            $file_name3 = time().rand(1,100).'.'.$file_extension3;
            $file3->move('img/answer-image/', $file_name3);
            $add->image_b    = $file_name3;
        }

        if(isset($request->title)){
            $add->title    = $request->title;
        }
        if(isset($request->last_title)){
            $add->last_title    = $request->last_title;
        }
        if(isset($request->answer_location)){
            $add->answer_location    = $request->answer_location;
        }

        if(isset($request->answer_type)){
            $add->answer_type    = $request->answer_type;
        }
        if(isset($request->is_multy)){
            $add->is_multy    = $request->is_multy;
        }
        if(isset($request->is_complete)){
            $add->is_complete    = $request->is_complete;
        }
        $add->expected_answer    = $request->expected_answer;
        if(isset($request->first_choice)){
                $add->first_choice    = $request->first_choice;
        }
        if(isset($request->second_choice)){
            $add->second_choice    = $request->second_choice;
        }
        if(isset($request->third_choice)){
            $add->third_choice    = $request->third_choice;
        }
        $add->save();
        if($request->answer_type=='complete'){
            if ($request->is_complete !='write') {
              $add_answer = new Answer;
              $add_answer->subquestion_id    = $add->id;
              $add_answer->one    = $request->one;
              $add_answer->two    = $request->two;
              $add_answer->three    = $request->three;
              $add_answer->four    = $request->four;
              $add_answer->five    = $request->five;
              $add_answer->six    = $request->six;
              $add_answer->seven    = $request->seven;
              $add_answer->eight    = $request->eight;
              $add_answer->nine    = $request->nine;
              $add_answer->ten    = $request->ten;
              $add_answer->eleven    = $request->eleven;
              $add_answer->twelve    = $request->twelve;
              $add_answer->thirteen    = $request->thirteen;
              $add_answer->fourteen    = $request->fourteen;
              $add_answer->fifteen    = $request->fifteen;
              $add_answer->sixteen    = $request->sixteen;
              $add_answer->save();
            }else {
              $expecte_answer = new ExpectedAnswer;
              $expecte_answer->subquestion_id    = $add->id;
              $expecte_answer->one    = $request->one;
              $expecte_answer->two    = $request->two;
              $expecte_answer->three    = $request->three;
              $expecte_answer->four    = $request->four;
              $expecte_answer->five    = $request->five;
              $expecte_answer->six    = $request->six;
              $expecte_answer->save();
            }
        }

        return back()->with("message", 'Added successfully');
    }



// use App\Curricul;

    public function edit(SubQuestion $subquestion)
    {
        $subquestion->answer=Answer::where('subquestion_id',$subquestion->id)->first();
        $subquestion->expected_write_answer=ExpectedAnswer::where('subquestion_id',$subquestion->id)->first();
        // dd($subquestion);
        return view('admin.subquestions.edit',compact('subquestion'));
    }

    public function update(Request $request, SubQuestion $subquestion){

        $edit = SubQuestion::findOrFail($subquestion->id);
        if(isset($request->banner)){
            $file1=$request->banner;
            $file_extension1 = $file1 -> getClientOriginalExtension();
            $file_name1 = time().rand(1,100).'.'.$file_extension1;
            $file1->move('img/banner/', $file_name1);
            $edit->bannar    = $file_name1;
        }
        if(isset($request->image_a)){

            $file2=$request->image_a;
            $file_extension2 = $file2 -> getClientOriginalExtension();
            $file_name2 = time().rand(1,100).'.'.$file_extension2;
            $file2->move('img/answer-image/', $file_name2);
            $edit->image_a    = $file_name2;
        }
        if(isset($request->image_b)){

            $file3 =$request->image_b;
            $file_extension3 = $file3 -> getClientOriginalExtension();
            $file_name3 = time().rand(1,100).'.'.$file_extension3;
            $file3->move('img/answer-image/', $file_name3);
            $edit->image_b    = $file_name3;
        }

        if(isset($request->title)){
            $edit->title    = $request->title;
        }
        if(isset($request->last_title)){
            $edit->last_title    = $request->last_title;
        }
        if(isset($request->answer_location)){
            $edit->answer_location    = $request->answer_location;
        }
        if(isset($request->answer_type)){
            $edit->answer_type    = $request->answer_type;
        }
        if(isset($request->is_multy)){
            $edit->is_multy    = $request->is_multy;
        }
        if(isset($request->is_complete)){
            $edit->is_complete    = $request->is_complete;
        }
        $edit->expected_answer    = $request->expected_answer;
        if(isset($request->first_choice)){
                $edit->first_choice    = $request->first_choice;
        }
        if(isset($request->second_choice)){
            $edit->second_choice    = $request->second_choice;
        }
        if(isset($request->third_choice)){
            $edit->third_choice    = $request->third_choice;
        }
        $edit->save();
        if($request->answer_type=='complete'){
            if ($request->is_complete !='write') {
              $delete_answer = Answer::where('subquestion_id',$subquestion->id)->first();
              $delete_answer->delete();

              $add_answer = new Answer;
              $add_answer->subquestion_id    = $edit->id;
              $add_answer->one    = $request->one;
              $add_answer->two    = $request->two;
              $add_answer->three    = $request->three;
              $add_answer->four    = $request->four;
              $add_answer->five    = $request->five;
              $add_answer->six    = $request->six;
              $add_answer->seven    = $request->seven;
              $add_answer->eight    = $request->eight;
              $add_answer->nine    = $request->nine;
              $add_answer->ten    = $request->ten;
              $add_answer->eleven    = $request->eleven;
              $add_answer->twelve    = $request->twelve;
              $add_answer->thirteen    = $request->thirteen;
              $add_answer->fourteen    = $request->fourteen;
              $add_answer->fifteen    = $request->fifteen;
              $add_answer->sixteen    = $request->sixteen;
              $add_answer->save();
            }else {
              $delete_answer_expected = ExpectedAnswer::where('subquestion_id',$subquestion->id)->first();
              $delete_answer_expected->delete();

              $expecte_answer = new ExpectedAnswer;
              $expecte_answer->subquestion_id    = $edit->id;
              $expecte_answer->one    = $request->one;
              $expecte_answer->two    = $request->two;
              $expecte_answer->three    = $request->three;
              $expecte_answer->four    = $request->four;
              $expecte_answer->five    = $request->five;
              $expecte_answer->six    = $request->six;
              $expecte_answer->save();
            }
        }
        // dd($request->all());

        return back()->with("message", 'Updated successfully');
    }

    public function destroy(Request $request )
    {
            $delete = SubQuestion::findOrFail($request->id);
            if($delete){
                $answers= Answer::where('subquestion_id',$delete->id)->get();
                foreach ($answers as $answer) {
                    // $answer = Tutorial_Branche::findOrFail($branch->id);
                    $answer->delete();
                }
            }
            $delete->delete();
            // File::delete(public_path("assets_admin/img/curriculums/". $delete->image));
            // File::delete("/home/u9ak0fjx/public_html/assets_admin/img/tutorials/" . $delete->image);

            return back()->with("message",'The question has been deleted');
    }

}
