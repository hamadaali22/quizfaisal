<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Instruction;
use App\Level;
use Illuminate\Http\Request;

class InstructionController extends Controller
{

    public function index()
    {
        $instructions = Instruction::with('level')->latest()->paginate(20);

        return view('admin.instructions.index', compact('instructions'));
    }


    public function create()
    {
        $levels = Level::all();

        return view('admin.instructions.create', compact('levels'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'level_id' => 'nullable|exists:levels,id',
            'desc_de' => 'required',
            'desc_ar' => 'required',
            'desc_en' => 'required',
            'desc_fr' => 'required',
            'desc_es' => 'required',
        ]);

        Instruction::create($request->all());

        return redirect()
            ->route('instructions.index')
            ->with('success', 'Instruction Added Successfully');
    }


    public function show($id)
    {
        $instruction = Instruction::findOrFail($id);

        return view('admin.instructions.show', compact('instruction'));
    }


    public function edit($id)
    {
        $instruction = Instruction::findOrFail($id);

        $levels = Level::all();

        return view('admin.instructions.edit', compact('instruction', 'levels'));
    }


    public function update(Request $request, $id)
    {

        $request->validate([
            'level_id' => 'nullable|exists:levels,id',
            'desc_de' => 'required',
            'desc_ar' => 'required',
            'desc_en' => 'required',
            'desc_fr' => 'required',
            'desc_es' => 'required',
        ]);

        $instruction = Instruction::findOrFail($id);

        $instruction->update($request->all());

        return redirect()
            ->route('instructions.index')
            ->with('success', 'Instruction Updated Successfully');
    }


    public function destroy($id)
    {
        Instruction::findOrFail($id)->delete();

        return redirect()
            ->route('instructions.index')
            ->with('success', 'Instruction Deleted Successfully');
    }
}