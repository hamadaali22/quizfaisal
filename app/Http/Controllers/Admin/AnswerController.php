<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Answer;
use App\SubQuestion;

use Illuminate\Http\Request;

class AnswerController extends Controller
{
       public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $subquestions=SubQuestion::get();
        $answers=Answer::orderBy('id', 'DESC')->get();
        foreach ($answers as $item) {
            $item->subquestion= SubQuestion::where('id',$item->subquestion_id)->first();
        }
        return view('admin.answers.all',compact('answers','subquestions'));
    }
    public function store(Request $request)
    {
        $add = new Answer;
        $add->name    = $request->name;
        $add->subquestion_id    = $request->subquestion_id;
        $add->save();

        return back()->with("message", 'Added successfully');
    }



// use App\Curricul;

    public function edit(Tutorial $tutorial)
    {
        $branches=Branch::all();
        $materials=Material::all();
        $tutorial_Branch=Tutorial_Branche::where('tutorial_id',$tutorial->id)->get();
        $tutorial_days=Day::where('tutorial_id',$tutorial->id)->get();
        // dd($branches);
        return view('instructor.tutorials.edit',compact('tutorial','branches','materials','tutorial_Branch','tutorial_days'));
    }


    public function destroy(Request $request )
    {
            $delete = Tutorial::findOrFail($request->id);
            // dd('gggghytghgt');
            if($delete){
                // $curricul_video= Curricul_Video::where('curricul_id',$delete->id)->get();
                // foreach ($curricul_video as $item) {
                //     File::delete("/home/u9ak0fjx/public_html/assets_admin/img/curriculums/videos/" . $item->url);
                //     $delete_curriculum = Curricul_Video::findOrFail($item->id);
                //     $delete_curriculum->delete();
                // }

                $curricul_branch= Tutorial_Branche::where('tutorial_id',$delete->id)->get();
                foreach ($curricul_branch as $branch) {
                    $delete_branch = Tutorial_Branche::findOrFail($branch->id);
                    $delete_branch->delete();
                }
                $curricul_branch= Day::where('tutorial_id',$delete->id)->get();
                foreach ($curricul_branch as $branch) {
                    $delete_branch = Day::findOrFail($branch->id);
                    $delete_branch->delete();
                }
            }
            $delete->delete();
            // File::delete(public_path("assets_admin/img/curriculums/". $delete->image));
            File::delete("/home/u9ak0fjx/public_html/assets_admin/img/tutorials/" . $delete->image);

            return redirect()->route('tutorials.index')->with("message",'تم الحذف بنجاح');
    }
}
