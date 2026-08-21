@extends('layout.admin_main')

@section('content')

<h2>Add Instruction</h2>
<section id="basic-form-layouts">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-content collpase show">

                    <div class="card-body">
                        <form action="{{ route('instructions.store') }}" method="POST">

                            @csrf
                            <div class="form-group">
                                <label>exercise fr</label>
                                <textarea name="exercise_fr" id="ckeditor" cols="30" rows="15"
                                    class="form-control ckeditor">{{ old('desc_de',$instruction->desc_de ?? '') }}</textarea>
                            </div>
                            @include('admin.instructions.form')

                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>
</section>
@endsection