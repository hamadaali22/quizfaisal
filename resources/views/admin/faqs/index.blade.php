@extends('layout.admin_main')

@section('content')

<h2>الأسئلة الشائعة</h2>
<a href="{{ route('faqs.create') }}" class="btn btn-primary mb-3">إضافة سؤال جديد</a>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<section id="keytable">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <!-- <div class="card-header">
                    <h4 class="card-title"></h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                        </ul>
                    </div>
                </div> -->
                <div class="card-content collapse show">
                    <div class="card-body card-dashboard">

                        <table class="table table-striped table-bordered keytable-integration">
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
                                    <td>{{ $faq->level->name ?? $faq->level->name :'' }}</td>
                                    <td>
                                        <span class="badge {{ $faq->status ? 'bg-success' : 'bg-secondary' }}">
                                            {{ $faq->status ? 'نشط' : 'غير نشط' }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('faqs.edit', $faq) }}"
                                            class="btn btn-sm btn-warning">تعديل</a>
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
                </div>
            </div>
        </div>
    </div>
</section>
@endsection