<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Faq;     
use App\Level;
class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::with('level')->latest()->paginate(15);
        // dd($faqs);
        return view('admin.faqs.index', compact('faqs'));
    }

    public function create()
    {
        $levels = Level::all();
        return view('admin.faqs.create', compact('levels'));
    }

    public function store(Request $request)
    {
        $validated = $this->validateFaq($request);
        Faq::create($validated);

        return redirect()->route('faqs.index')->with('success', 'تم إضافة السؤال بنجاح');
    }

    public function edit(Faq $faq)
    {
        $levels = Level::all();
        return view('admin.faqs.edit', compact('faq', 'levels'));
    }

    public function update(Request $request, Faq $faq)
    {
        $validated = $this->validateFaq($request);
        $faq->update($validated);

        return redirect()->route('admin.faqs.index')->with('success', 'تم تعديل السؤال بنجاح');
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();
        return redirect()->route('faqs.index')->with('success', 'تم حذف السؤال بنجاح');
    }

    private function validateFaq(Request $request)
    {
        return $request->validate([
            'level_id'    => 'nullable|exists:levels,id',
            'question_de' => 'required|string',
            'question_ar' => 'required|string',
            'question_en' => 'required|string',
            'question_fr' => 'required|string',
            'question_es' => 'required|string',
            'answer_de'   => 'required|string',
            'answer_ar'   => 'required|string',
            'answer_en'   => 'required|string',
            'answer_fr'   => 'required|string',
            'answer_es'   => 'required|string',
            'status'      => 'required|boolean',
        ]);
    }
}