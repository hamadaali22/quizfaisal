<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Level;
use Illuminate\Http\Request;

class LevelController extends Controller
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
        $levels=Level::all();
        return view('admin.levels.all',compact('levels'));
    }

    public function create()
    {
        return view('admin.levels.create');
    }
    

    
    public function store(Request $request)
    {
        $this->validate( $request,[          
                'name'=>'required',
            ],
            [
                'name.required'=>'please Enter level name',
            ]
        );
        $add = new Level;
        $add->name    = $request->name;
        $add->description    = $request->description;
        $add->save();
        return redirect()->back()->with("message", 'Added successfully'); 
    }

    
    public function edit(Level $level)
    {
        return view('admin.levels.edit',compact('level'));
    }

    public function update(Request $request)
    {
        $edit = Level::findOrFail($request->id);
       
        if($request->name !=''){
            $edit->name    = $request->name;
        }else{
            $edit->name    = $edit->name;
        }

        if($request->name !=''){
            $edit->description    = $request->description;
         }else{
            $edit->description    = $edit->description;
         }
       
         $edit->save();
        return redirect()->route('levels.index')->with("message", 'Updated successfully'); 
    }


    public function destroy(Request $request )
    {
        
            $level = Level::findOrFail($request->id);
            // $subcategory=SubCategory::where('id',$category->categoryId)->get();
            // foreach ($subcategory as $item) {
            //     $category= SubCategory::where('id',$item->id)->first();
            //     $category->delete();
               
            // }
             $level->delete();
             return redirect()->route('levels.index')->with("message",'The level has been deleted'); 
    } 
}
