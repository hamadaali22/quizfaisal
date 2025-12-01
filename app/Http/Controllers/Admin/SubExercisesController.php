<?php
  namespace App\Http\Controllers\Admin;
  use App\Http\Controllers\Controller;
  use App\SubExercise;
  use App\Exercise;
  use App\Exam;
  use App\Level;
  use Illuminate\Http\Request;
  use App\Answer;
  use App\ExpectedAnswer;

class SubExercisesController extends Controller
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
    public function allSubexercises($id)
    {
        // $exams=Exam::all();
        $levels=Level::all();
        $subexercises=SubExercise::where('exercise_id',$id)->orderBy('order','ASC')->get();
        // $subquestions=SubQuestion::get();
        
        foreach ($subexercises as $item){
            $item->level= Level::where('id',$item->level_id)->first();
            // $item->exam=Exam::where('id',$item->exam_id)->first();
        }
        return view('admin.subexercises.all',compact('subexercises','levels','id'));
    }
    public function show($id)
    {
        return view('admin.subexercises.create',compact('id'));
    }

    public function create()
    {
        $exams=Exam::all();
        $levels=Level::all();
        $exercises=Exercise::all();
        return view('admin.subexercises.create',compact('levels','exams','exercises'));
    }

    public function store(Request $request)
    {
        $exercises=Exercise::where('id',$request->exercise_id)->first();
        $add = new SubExercise;
        // $add->exam_id    = $questions->exam_id;
        $add->exercise_id    = $exercises->id;
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
              $add_answer->subexercise_id    = $add->id;
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
              $expecte_answer->subexercise_id    = $add->id;
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

    public function edit(SubExercise $subexercise)
    {
        $subexercise->answer=Answer::where('subexercise_id',$subexercise->id)->first();
        $subexercise->expected_write_answer=ExpectedAnswer::where('subexercise_id',$subexercise->id)->first();
        // dd($subquestion);
        return view('admin.subexercises.edit',compact('subexercise'));
    }

    public function update(Request $request, SubExercise $subexercise){

        $edit = SubExercise::findOrFail($subexercise->id);
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
        if(isset($request->color)){
            $edit->color    = $request->color;
        }
        $edit->save();
        if($request->answer_type=='complete'){
            if ($request->is_complete !='write') {
              $delete_answer = Answer::where('subexercise_id',$subexercise->id)->first();
              $delete_answer->delete();

              $add_answer = new Answer;
              $add_answer->subexercise_id    = $edit->id;
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
              $delete_answer_expected = ExpectedAnswer::where('subexercise_id',$subexercise->id)->first();
              $delete_answer_expected->delete();

              $expecte_answer = new ExpectedAnswer;
              $expecte_answer->subexercise_id    = $edit->id;
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
        $delete = SubExercise::findOrFail($request->id);
        if($delete){
            $answers= Answer::where('subexercise_id',$delete->id)->get();
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
