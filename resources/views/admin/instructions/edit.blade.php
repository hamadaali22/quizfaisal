@extends('layout.admin_main')

@section('content')

<h2>Edit Instruction</h2>
<section id="basic-form-layouts">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-content collpase show">

                    <div class="card-body">
                        <form action="{{ route('instructions.update',$instruction->id) }}" method="POST">

                            @csrf
                            @method('PUT')

                            @include('admin.instructions.form')

                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>
</section>
@endsection