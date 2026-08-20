@php
$languages = ['ar' => 'عربي', 'en' => 'إنجليزي', 'de' => 'ألماني', 'fr' => 'فرنسي', 'es' => 'إسباني'];
@endphp

<div class="mb-3">
    <label>المستوى</label>
    <select name="level_id" class="form-control">
        <option value="">بدون مستوى</option>
        @foreach($levels as $level)
        <option value="{{ $level->id }}" {{ old('level_id', $faq->level_id ?? '') == $level->id ? 'selected' : '' }}>
            {{ $level->name }}
        </option>
        @endforeach
    </select>
</div>

@foreach($languages as $code => $label)
<div class="border p-3 mb-3">
    <h5>{{ $label }}</h5>
    <div class="mb-2">
        <label>السؤال</label>
        <textarea name="question_{{ $code }}" class="form-control"
            required>{{ old("question_{$code}", $faq->{"question_{$code}"} ?? '') }}</textarea>
        @error("question_{$code}") <small class="text-danger">{{ $message }}</small> @enderror
    </div>
    <div class="mb-2">
        <label>الإجابة</label>
        <textarea name="answer_{{ $code }}" class="form-control"
            required>{{ old("answer_{$code}", $faq->{"answer_{$code}"} ?? '') }}</textarea>
        @error("answer_{$code}") <small class="text-danger">{{ $message }}</small> @enderror
    </div>
</div>
@endforeach

<div class="mb-3">
    <label>الحالة</label>
    <select name="status" class="form-control">
        <option value="1" {{ old('status', $faq->status ?? 1) == 1 ? 'selected' : '' }}>نشط</option>
        <option value="0" {{ old('status', $faq->status ?? 1) == 0 ? 'selected' : '' }}>غير نشط</option>
    </select>
</div>