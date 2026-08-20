@extends('layout.admin_main')

@section('content')
<div class="container">
    <h2>الأسئلة الشائعة</h2>
    <a href="{{ route('faqs.create') }}" class="btn btn-primary mb-3">إضافة سؤال جديد</a>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>السؤال (عربي)</th>
                <th>المستوى</th>
                <th>الحالة</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($faqs as $faq)
            <tr>
                <td>{{ $faq->id }}</td>
                <td>{{ Str::limit($faq->question_ar, 50) }}</td>
                <td>{{ $faq->level->name ?? '-' }}</td>
                <td>
                    <span class="badge {{ $faq->status ? 'bg-success' : 'bg-secondary' }}">
                        {{ $faq->status ? 'نشط' : 'غير نشط' }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('faqs.edit', $faq) }}" class="btn btn-sm btn-warning">تعديل</a>
                    <form action="{{ route('faqs.destroy', $faq) }}" method="POST" class="d-inline"
                        onsubmit="return confirm('متأكد من الحذف؟')">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger">حذف</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $faqs->links() }}
</div>
@endsection