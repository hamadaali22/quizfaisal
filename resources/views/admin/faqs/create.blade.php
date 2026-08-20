@extends('layout.admin_main')

@section('content')
<h2>إضافة سؤال جديد</h2>
<section id="basic-form-layouts">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-content collpase show">

                    <div class="card-body">
                        <form action="{{ route('faqs.store') }}" method="POST">
                            @csrf
                            @include('admin.faqs._form', ['faq' => null, 'levels' => $levels])
                            <button class="btn btn-primary mt-3">حفظ</button>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>
</section>
@endsection