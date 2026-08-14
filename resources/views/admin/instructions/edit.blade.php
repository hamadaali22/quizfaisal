@extends('layout.admin_main')

@section('content')

<h2>Edit Instruction</h2>

<form action="{{ route('instructions.update',$instruction->id) }}" method="POST">

    @csrf
    @method('PUT')

    @include('admin.instructions.form')

</form>

@endsection