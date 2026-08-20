@extends('layouts.app')

@section('content')
<div class="container">
    <h2>إضافة سؤال جديد</h2>

    <form action="{{ route('faqs.store') }}" method="POST">
        @csrf
        @include('faqs._form', ['faq' => null, 'levels' => $levels])
        <button class="btn btn-primary mt-3">حفظ</button>
    </form>
</div>
@endsection