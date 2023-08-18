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
                   
			        <form  method="post"  action="{{route('exams.update',$exam->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                            <div class="row form-row">
                                <div class="form-group col-md-6 col-sm-6">           
                                    <label> Name </label>
                                    <input type="text" name="name" class="form-control" value="{{$exam->name}}">
                                </div>
                                <div class="form-group col-md-6 col-sm-6">               
                                    <label> select level  </label>
                                    <select name="level_id" class="form-control formselect">
                                        <option  value="" selected>Select </option>  
                                        @foreach ($levels as $_item) 
                                            <option value="{{$_item->id}}" {{ $exam->level_id == $_item->id ? "selected" : "" }}>{{$_item->name}}
                                                </option>
                                        @endforeach
                                    </select>
                                    @error('name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
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


@endsection

