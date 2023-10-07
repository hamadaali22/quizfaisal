@extends('layout.admin_main')
@section('content')
  <script src="{{asset('admin/vendors/js/editors/ckeditor/ckeditor.js')}}" type="text/javascript"></script>
  <script src="  {{asset('admin/js/scripts/editors/editor-ckeditor.js')}}" type="text/javascript"></script>
		<div class="content-header row">
			        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
			          <h3 class="content-header-title mb-0 d-inline-block">settings</h3><br>
			          <div class="row breadcrumbs-top d-inline-block">
			            <div class="breadcrumb-wrapper col-12">
			              <ol class="breadcrumb">
			                <li class="breadcrumb-item"><a href="index.html">Home</a>
			                </li>

			                <li class="breadcrumb-item active">settings
			                </li>
			              </ol>
			            </div>
			          </div>
			        </div>

			        @if (session('success'))
			            <div class="alert alert-success">
			                {{ session('success') }}
			            </div>
			        @endif

			        @if (count($errors) > 0)
			                <div class="alert alert-danger">
			                    <button aria-label="Close" class="close" data-dismiss="alert" type="button">
			                        <span aria-hidden="true">&times;</span>
			                    </button>
			                    <strong>error</strong>
			                    <ul>
			                        @foreach ($errors->all() as $error)
			                        <li>{{ $error }}</li>
			                        @endforeach
			                    </ul>
			                </div>
			                @endif
		</div>
		<section id="keytable">
          <div class="row">
            <div class="col-12">
              <div class="card">

                <div class="card-content collapse show">
                  <div class="card-body card-dashboard">
                   	<div class="card-body">
										<form action="{{url('admin/settings/update')}}" method="POST"
								                name="le_form"  enctype="multipart/form-data">
								                                @csrf
											<input type="hidden" name="id" value="{{Auth::user()->id}}">
											<div class="form-group">
												<label> title</label>
												<input type="text" name="title" class="form-control" value="{{$contactInfo->title}}">
											</div>
                      <div class="form-group">
												<label> title 2</label>
												<input type="text" name="title2" class="form-control" value="{{$contactInfo->title2}}">
											</div>
											<div class="form-group">
												<label> about</label>
												<textarea name="about" id="ckeditor" cols="30" rows="15"  class="form-control ckeditor">{{$contactInfo->about}}</textarea>
											</div>
											<div class="form-group">
												<label>GOETHE description </label>
												<textarea name="level_desc" id="ckeditor" cols="30" rows="15"  class="form-control ckeditor" >{{$contactInfo->level_desc}}</textarea>
											</div>
                      <div class="form-group">
                        <label>telc description </label>
                        <textarea name="telc_desc" id="ckeditor" cols="30" rows="15"  class="form-control ckeditor" >{{$contactInfo->telc_desc}}</textarea>
                      </div>
											<div class="form-group row">
												<div class="col-md-2">
													<img class="avatar-img" src="{{asset('img/settings/'.$contactInfo->image) }}" alt="Speciality" width="120" height="100">
												</div>
												<div class="col-md-10">
													<label>image about sit</label>
													<input type="file" name="image" class="form-control">
												</div>
											</div>

                      <div class="form-group row">
												<div class="col-md-2">
													<img class="avatar-img" src="{{asset('img/settings/'.$contactInfo->b1) }}" alt="Speciality" width="120" height="100">
												</div>
												<div class="col-md-10">
													<label>b1</label>
													<input type="file" name="b1" class="form-control">
												</div>
											</div>
                      <div class="form-group row">
												<div class="col-md-2">
													<img class="avatar-img" src="{{asset('img/settings/'.$contactInfo->a2) }}" alt="Speciality" width="120" height="100">
												</div>
												<div class="col-md-10">
													<label>a2</label>
													<input type="file" name="a2" class="form-control">
												</div>
											</div>
                      <div class="form-group row">
												<div class="col-md-2">
													<img class="avatar-img" src="{{asset('img/settings/'.$contactInfo->a1) }}" alt="Speciality" width="120" height="100">
												</div>
												<div class="col-md-10">
													<label>a1</label>
													<input type="file" name="a1" class="form-control">
												</div>
											</div>
                      <div class="form-group row">
												<div class="col-md-2">
													<img class="avatar-img" src="{{asset('img/settings/'.$contactInfo->b2) }}" alt="Speciality" width="120" height="100">
												</div>
												<div class="col-md-10">
													<label>b2</label>
													<input type="file" name="b2" class="form-control">
												</div>
											</div>
                      <div class="form-group row">
												<div class="col-md-2">
													<img class="avatar-img" src="{{asset('img/settings/'.$contactInfo->c1) }}" alt="Speciality" width="120" height="100">
												</div>
												<div class="col-md-10">
													<label>c1</label>
													<input type="file" name="c1" class="form-control">
												</div>
											</div>
                      <div class="form-group row">
                        <div class="col-md-2">
                          <img class="avatar-img" src="{{asset('img/settings/'.$contactInfo->m1) }}" alt="Speciality" width="120" height="100">
                        </div>
                        <div class="col-md-10">
                          <label>maindesign</label>
                          <input type="file" name="m1" class="form-control">
                        </div>
                      </div>
                      <!-- <div class="form-group row">
                        <div class="col-md-2">
                          <img class="avatar-img" src="{{asset('img/settings/'.$contactInfo->logo) }}" alt="Speciality" width="120" height="100">
                        </div>
                        <div class="col-md-10">
                          <label>logo</label>
                          <input type="file" name="logo" class="form-control">
                        </div>
                      </div> -->
											<div class="form-group row">
												<div class="col-md-2">
													<img class="avatar-img" src="{{asset('img/settings/'.$contactInfo->favicon) }}" alt="Speciality" width="120" height="100">
												</div>
												<div class="col-md-10">
													<label>Favicon</label>
													<input type="file" name="favicon" class="form-control">
												</div>
											</div>
											<button type="submit" class="btn btn-primary btn-block">Save  </button>
										</form>
									</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>


@endsection
