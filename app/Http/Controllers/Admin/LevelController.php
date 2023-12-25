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
        $add->name2    = $request->name2;
        $add->description    = $request->description;
        $add->description_telc    = $request->description_telc;
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
        if($request->name2 !=''){
            $edit->name2    = $request->name2;
        }else{
            $edit->name2    = $edit->name2;
        }

        if($request->description !=''){
            $edit->description    = $request->description;
         }else{
            $edit->description    = $edit->description;
         }
         if($request->description_telc !=''){
             $edit->description_telc    = $request->description_telc;
          }else{
             $edit->description_telc    = $edit->description_telc;
          }
        
        // goethe
        if($file=$request->file('goethe1'))
        {
            $fileName = $file->getClientOriginalName();
            $path = 'img/goethe';
            $request-> file('goethe1') ->move($path,$fileName);
            $edit->goethe1  =$fileName; 
        }else{
             $edit->goethe1  = $request->goethe1;
        }
        if($file=$request->file('goethe2'))
        {
            $fileName = $file->getClientOriginalName();
            $path = 'img/goethe';
            $request-> file('goethe2') ->move($path,$fileName);
            $edit->goethe2  =$fileName; 
        }else{
             $edit->goethe2  = $request->goethe2;
        }

        if($file=$request->file('goethe3'))
        {
            $fileName = $file->getClientOriginalName();
            $path = 'img/goethe';
            $request-> file('goethe3') ->move($path,$fileName);
            $edit->goethe3  =$fileName; 
        }else{
             $edit->goethe3  = $request->goethe3;
        }

        if($file=$request->file('goethe4'))
        {
            $fileName = $file->getClientOriginalName();
            $path = 'img/goethe';
            $request-> file('goethe4') ->move($path,$fileName);
            $edit->goethe4  =$fileName; 
        }else{
             $edit->goethe4  = $request->goethe4;
        }

        if($file=$request->file('goethe5'))
        {
            $fileName = $file->getClientOriginalName();
            $path = 'img/goethe';
            $request-> file('goethe5') ->move($path,$fileName);
            $edit->goethe5  =$fileName; 
        }else{
             $edit->goethe5  = $request->goethe5;
        }

       
        // telc
        if($file=$request->file('telc1'))
        {
            $fileName = $file->getClientOriginalName();
            $path = 'img/telc';
            $request-> file('telc1') ->move($path,$fileName);
            $edit->telc1  =$fileName; 
        }else{
             $edit->telc1  = $request->telc1;
        }

        if($file=$request->file('telc2'))
        {
            $fileName = $file->getClientOriginalName();
            $path = 'img/telc';
            $request-> file('telc2') ->move($path,$fileName);
            $edit->telc2  =$fileName; 
        }else{
             $edit->telc2  = $request->telc2;
        }

        if($file=$request->file('telc3'))
        {
            $fileName = $file->getClientOriginalName();
            $path = 'img/telc';
            $request-> file('telc3') ->move($path,$fileName);
            $edit->telc3  =$fileName; 
        }else{
             $edit->telc3  = $request->telc3;
        }

        if($file=$request->file('telc4'))
        {
            $fileName = $file->getClientOriginalName();
            $path = 'img/telc';
            $request-> file('telc4') ->move($path,$fileName);
            $edit->telc4  =$fileName; 
        }else{
             $edit->telc4  = $request->telc4;
        }

        if($file=$request->file('telc5'))
        {
            $fileName = $file->getClientOriginalName();
            $path = 'img/telc';
            $request-> file('telc5') ->move($path,$fileName);
            $edit->telc5  =$fileName; 
        }else{
             $edit->telc5  = $request->telc5;
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
