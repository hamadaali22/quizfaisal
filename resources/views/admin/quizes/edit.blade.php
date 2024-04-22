@extends('layout.admin_main')
@section('content')

<link rel="stylesheet" href="{{asset('admin/vendors/css/forms/selects/select2.min.css')}}">

<div class="content-header row">
    <div class="content-header-left col-md-12 col-12 mb-2 breadcrumb-new">
        <h3 class="content-header-title mb-0 d-inline-block">Edit Exams </h3><br>
        <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a>
                    </li>

                    <li class="breadcrumb-item active">Exams
                    </li>
                </ol>
            </div>
        </div>
    </div>




    @if(session()->has('message'))
    @include('admin.includes.alerts.success')
    @endif

    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <button aria-label="Close" class="close" data-dismiss="alert" type="button">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>Error</strong>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>


<section id="basic-form-layouts">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="bordered-layout-basic-form"></h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content collpase show">
                    <div class="card-body">

                        <form method="post" action="{{route('quizes.update',$quize->id)}}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row form-row">
                                <input type="hidden" name="level_id" class="form-control" value="">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Select Level </label>
                                        <select name="level_id" required class="form-control formselect"
                                            id="level_name">
                                            <option disabled>Select</option>
                                            @foreach ($levels as $level)
                                            <option value="{{$level->id}}" {{ $quize->level_id == $level->id ?
                                                "selected" : "" }}>{{$level->name3}}
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('level_id')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                        <span id="categoryError" style="color: red;"></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>select group</label>
                                        <select name="set_id" required class="form-control formselect" id="group_name">
                                            <option disabled>Select</option>
                                            @foreach ($sets as $set)
                                            <option value="{{$set->id}}" {{ $quize->set_id == $set->id ? "selected" : ""
                                                }}>{{$set->title}}
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('exam_id')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                        <span id="categoryError" style="color: red;"></span>
                                    </div>
                                </div>
                                <!-- <div class="form-group col-md-3 col-sm-6">
                                    <label> Select Type </label>
                                    <select name="type" required class="form-control formselect">
                                        <option disabled>Select</option>
                                        <option value="difficult" {{ $quize->type == 'difficult' ? "selected" : "" }}>
                                            difficult
                                        </option>
                                        <option value="middle" {{ $quize->type == 'middle' ? "selected" : "" }}>
                                            middle
                                        </option>
                                        <option value="easy" {{ $quize->type == 'easy' ? "selected" : "" }}>easy
                                        </option>
                                    </select>
                                    <span id="typeError" style="color: red;"></span>
                                </div> -->
                                <div class="form-group col-md-4 col-sm-6">
                                    <label> Select Type </label>
                                    <select name="skill" required class="form-control formselect">
                                        <option disabled>Select</option>
                                        <option value="rules" {{$quize->skill == 'rules' ? "selected" : "" }}>rules
                                        </option>
                                        <option value="vocabulary" {{ $quize->skill == 'vocabulary' ? "selected" : ""
                                            }}>
                                            vocabulary
                                        </option>

                                    </select>
                                    <span id="typeError" style="color: red;"></span>
                                </div>
                                <div class="col-12 col-md-6  col-sm-6">
                                    <div class="form-group">
                                        <label>title</label>
                                        <input type="text" name="title" class="form-control" value="{{$quize->title}}">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label>Expected Answer</label>
                                        <input type="text" name="expected_answer" class="form-control expectedAnswerId"
                                            value="{{$quize->expected_answer}}">
                                        <span id="expectedAnswerError" style="color: red;"></span>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6 ">
                                    <div class="form-group">
                                        <label>first choice</label>
                                        <input type="text" name="first_choice" class="form-control "
                                            value="{{$quize->first_choice}}">
                                        <span id="titleError" style="color: red;"></span>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6 ">
                                    <div class="form-group">
                                        <label>second choice</label>
                                        <input type="text" name="second_choice" class="form-control "
                                            value="{{$quize->second_choice}}">
                                        <span id="titleError" style="color: red;"></span>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6 ">
                                    <div class="form-group">
                                        <label>third choice</label>
                                        <input type="text" name="third_choice" class="form-control "
                                            value="{{$quize->third_choice}}">
                                        <span id="titleError" style="color: red;"></span>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6 ">
                                    <div class="form-group">
                                        <label>fourth choice</label>
                                        <input type="text" name="fourth_choice" class="form-control "
                                            value="{{$quize->fourth_choice}}">
                                        <span id="titleError" style="color: red;"></span>
                                    </div>
                                </div>

                            </div>
                            <button type="submit" class="btn btn-primary btn-block">حفظ </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="{{asset('admin/vendors/js/forms/select/select2.full.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/js/scripts/forms/select/form-select2.js')}}" type="text/javascript"></script>


<script>
    $(document).ready(function () {
        $('#level_name').on('change', function () {
            console.log("welcome sub");
            let id = $(this).val();
            $.ajax({
                type: 'GET',
                url: "{{url('admin/get_group_name')}}/" + id,
                success: function (response) {
                    var response = JSON.parse(response)
                    console.log(response);
                    $('#group_name').empty();
                    $('#group_name').append(`<option value="0" disabled selected>أختر </option>`);
                    response.forEach(element => {
                        $('#group_name').append(`<option value="${element['id']}">
                            ${element['title']}
                            </option>`);
                    });
                }
            });
        });
    });
</script>
@endsection