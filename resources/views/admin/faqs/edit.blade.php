@extends('layout.admin_main')

@section('content')

<h2>تعديل السؤال</h2>
<section id="basic-form-layouts">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-content collpase show">

                    <div class="card-body">
                        <form action="{{ route('faqs.update', $faq) }}" method="POST">
                            @csrf @method('PUT')
                            @include('admin.faqs._form', ['faq' => $faq, 'levels' => $levels])
                            <button class="btn btn-primary mt-3">تحديث</button>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>
</section>
@endsection