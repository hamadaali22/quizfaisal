<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Set;
use Illuminate\Http\Request;
use App\Level;

class SetController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('permission:specialities', ['only' => ['index']]);
        // $this->middleware('permission:اضافة صلاحية', ['only' => ['create','store']]);
        // $this->middleware('permission:تعديل صلاحية', ['only' => ['edit','update']]);
        // $this->middleware('permission:حذف صلاحية', ['only' => ['destroy']]);

    }

    public function index()
    {
        $sets=Set::all();
        $levels=Level::where('type','quize')->get();
        return view('admin.sets.all',compact('sets','levels'));
    }

    public function create()
    {
        return view('admin.levels.create');
    }



    public function store(Request $request)
    {
        $this->validate( $request,[
                'title'=>'required',
            ],
            [
                'title.required'=>'please Enter group title',
            ]
        );
        $add = new Set;
        $add->title    = $request->title;
        $add->level_id    = $request->level_id;
        $add->type    = $request->type;
        $add->save();
        return redirect()->back()->with("message", 'Added successfully');
    }


    // public function edit(Set $level)
    // {
    //     return view('admin.levels.edit',compact('level'));
    // }

    public function update(Request $request)
    {
        $this->validate( $request,[
                'title'=>'required',
                'type'=>'required'
            ],
            [
                'title.required'=>'يرجى ادخال نوع العقار',
                'type.required'=>'يرجى اختيار النوع ',

            ]
        );

        $edit = Set::findOrFail($request->id);
        $edit->title    = $request->title;   
        $edit->level_id    = $request->level_id; 
        $edit->type    = $request->type;
        $edit->save();
        return redirect()->route('sets.index')->with("message", 'Updated successfully');
    }

    public function destroy(Request $request )
    {
        $level = Set::findOrFail($request->id);
        // $subcategory=SubCategory::where('id',$category->categoryId)->get();
        // foreach ($subcategory as $item) {
            //     $category= SubCategory::where('id',$item->id)->first();
            //     $category->delete();

            // }
        $level->delete();
        return redirect()->route('sets.index')->with("message",'The level has been deleted');
    }
}
