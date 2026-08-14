@extends('layout.admin_main')

@section('content')

<h2>Add Instruction</h2>

<form action="{{ route('instructions.store') }}" method="POST">

    @csrf

    @include('admin.instructions.form')

</form>

@endsection