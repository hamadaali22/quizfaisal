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
        $quizes=Quize::with('levels')->with("sets")->get();
        $levels=Level::all();
        $sets=Set::all();

        // foreach ($questions as $_item) {
        //     $_item->exam=Exam::where('id',$_item->exam_id)->first();
        //     $_item->level= Level::where('id',$_item->level_id)->first();
        // }
        return view('admin.quizes.all',compact('quizes','levels','sets'));
    }
     public function quizeBySet($id)
    {
        $quizes=Quize::where('set_id',$id)->get();
       
         return view('admin.quizes.all',compact('quizes'));
    }

    

    public function create()
    {
        $quizes=Quize::all();
        $levels=Level::where('type','quize')->get();
        $sets=Set::all();
        return view('admin.quizes.create',compact('quizes','levels','sets'));
    }
    public function getGroupName($id,$skillId){
        echo json_encode(Set::where('level_id', $id)->where('skill', $skillId)->get());
       // echo json_encode(DB::table('sub_categories')->where('categoryId', $id)->get());
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
        $add->fourth_choice    = $request->fourth_choice;
        $add->expected_answer    = $request->expected_answer;
        $add->save();

        return redirect('admin/quizes')->with("message", 'Added successfully');
    }



// use App\Curricul;

    public function edit(Quize $quize)
    {
        $levels=Level::where('type','quize')->get();
        $sets=Set::all();

        return view('admin.quizes.edit',compact('quize','levels','sets'));
    }
    public function update(Request $request, Quize $quize){
        
        $edit = Quize::findOrFail($quize->id);
        $edit->level_id    = $request->level_id;
        $edit->set_id    = $request->set_id;
        $edit->type    = $request->type;
        $edit->skill    = $request->skill;
        $edit->title    = $request->title;
        $edit->first_choice    = $request->first_choice;
        $edit->second_choice    = $request->second_choice;
        $edit->third_choice    = $request->third_choice;
        $edit->fourth_choice    = $request->fourth_choice;
        $edit->expected_answer    = $request->expected_answer;
        $edit->save();

        return redirect()->route('quizes.index')->with("message", 'Updated successfully');
    }

    public function destroy(Request $request )
    {
            $delete = Quize::findOrFail($request->id);
            $delete->delete();

            return redirect()->route('quizes.index')->with("message",'The question has been deleted');
    }


}
