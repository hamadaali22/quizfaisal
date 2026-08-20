@extends('layouts.app')

@section('content')
<div class="container">
    <h2>تعديل السؤال</h2>

    <form action="{{ route('faqs.update', $faq) }}" method="POST">
        @csrf @method('PUT')
        @include('admin.faqs._form', ['faq' => $faq, 'levels' => $levels])
        <button class="btn btn-primary mt-3">تحديث</button>
    </form>
</div>
@endsection