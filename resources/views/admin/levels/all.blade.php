@extends('layout.admin_main')
@section('content')
<script src="{{asset('admin/vendors/js/editors/ckeditor/ckeditor.js')}}" type="text/javascript"></script>
<script src="  {{asset('admin/js/scripts/editors/editor-ckeditor.js')}}" type="text/javascript"></script>
<div class="content-header row">
	<div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
		<h3 class="content-header-title mb-0 d-inline-block">levels</h3><br>
		<div class="row breadcrumbs-top d-inline-block">
			<div class="breadcrumb-wrapper col-12">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">home</a>
					</li>

					<li class="breadcrumb-item active">levels
					</li>
				</ol>
			</div>
		</div>
	</div>
	<div class="content-header-right col-md-6 col-12">
		<div class="dropdown float-md-right">
			<a href="#Add_Specialities_details" data-toggle="modal" class="btn btn-primary float-right mt-2">Add
				Level</a>
		</div>
	</div>

	@if (session('message'))
	<div class="alert alert-success">
		{{ session('message') }}
	</div>
	@endif

	@if (count($errors) > 0)
	<div class="alert alert-danger">
		<button aria-label="Close" class="close" data-dismiss="alert" type="button">
			<span aria-hidden="true">&times;</span>
		</button>
		<strong>خطا</strong>
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
				<div class="card-header">
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
				</div>
				<div class="card-content collapse show">
					<div class="card-body card-dashboard">
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-striped table-bordered keytable-integration">
									<thead>
										<tr>
											<th>#</th>
											<th>level Name</th>
											<!-- <th>telc name</th>
											<th>quize name</th> -->
											<th class="text-center">Actions</th>
										</tr>
									</thead>
									<tbody>

										@foreach ($levels as $_item)
										<tr>
											<td class="text-center">
												{{$_item->id}}
											</td>
											<td class="text-center">
												{{$_item->name}}
											</td>
											<!-- <td class="text-center">
												{{$_item->name2}}
											</td>
											<td class="text-center">
												{{$_item->name3}}
											</td> -->
											<!-- <td class="text-center">
														{{$_item->description}}
													</td>
													<td class="text-center">
														{{$_item->description_telc}}
													</td> -->
											<td class="text-center">
												<div class="actions">
													<!-- <a class="btn btn-sm bg-success-light" data-toggle="modal"
																data-name="{{ $_item->name }}"
																data-description="{{ $_item->description }}"
																data-description_telc="{{ $_item->description_telc }}"
																data-catid="{{ $_item->id }}"
																data-target="#edit">
																 <button type="button" class="btn btn-outline-success "><i class="la la-edit"></i></button>
															</a> -->
													<a href="{{route('levels.edit',$_item->id)}}" class="edit-course">
														<button type="button" class="btn btn-outline-success "><i
																class="la la-edit"></i></button>
													</a>
													<a data-toggle="modal" data-catid="{{ $_item->id }}"
														data-target="#delete" class="delete-course">
														<button type="button" class=" btn btn-outline-warning"><i
																class="la la-trash-o"></i></button>
													</a>
												</div>
											</td>
										</tr>
										@endforeach

									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>



	<div class="modal fade" id="Add_Specialities_details" aria-hidden="true" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Add Level</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="{{route('levels.store')}}" method="POST" name="le_form" enctype="multipart/form-data">
						@csrf
						<div class="row form-row">
							<div class="col-12 col-md-12  col-sm-6">
								<div class="form-group">
									<label>Level Name</label>
									<input type="text" name="name" class="form-control" value="{{old('name')}}">
								</div>
							</div>
							<div class="col-12 col-md-12  col-sm-6">
								<div class="form-group">
									<label>Select type </label>
									<select name="type" required class="form-control formselect">
										<option disabled>Select</option>
										<option value="goethe">goethe</option>
										<option value="telc">telc</option>
										<option value="quize">quize</option>
									</select>
									<!-- @error('level_id')
									<span class="text-danger">{{$message}}</span>
									@enderror
									<span id="categoryError" style="color: red;"></span> -->
								</div>
							</div>
							<!-- <div class="col-12 col-md-12  col-sm-6">
								<div class="form-group">
									<label>Level telc Name</label>
									<input type="text" name="name2" class="form-control" value="{{old('name2')}}">
								</div>
							</div>
							<div class="col-12 col-md-12  col-sm-6">
								<div class="form-group">
									<label>Level quize Name</label>
									<input type="text" name="name3" class="form-control" value="{{old('name3')}}">
								</div>
							</div> -->
							<div class="form-group col-md-12 col-sm-6 ">
								<label>description DE</label>
								<textarea name="description_de" cols="20" rows="1" class="form-control ckeditor"
									id='descriptionid'>{{old('description_de')}}</textarea>
								@error('description_de')
								<span class="text-danger">{{$message}}</span>
								@enderror
								<span id="descriptionError" style="color: red;"></span>
							</div>
							<div class="form-group col-md-12 col-sm-6 ">
								<label>description AR</label>
								<textarea name="description_ar" cols="20" rows="1" class="form-control ckeditor"
									id='descriptionid'>{{old('description_ar')}}</textarea>
								@error('description_ar')
								<span class="text-danger">{{$message}}</span>
								@enderror
								<span id="descriptionArError" style="color: red;"></span>
							</div>
							<div class="form-group col-md-12 col-sm-6 ">
								<label>description EN</label>
								<textarea name="description_en" cols="20" rows="1" class="form-control ckeditor"
									id='descriptionid'>{{old('description_en')}}</textarea>
								@error('description')
								<span class="text-danger">{{$message}}</span>
								@enderror
								<span id="descriptionEnError" style="color: red;"></span>
							</div>
							<div class="form-group col-md-12 col-sm-6 ">
								<label>description FR</label>
								<textarea name="description_fr" cols="20" rows="1" class="form-control ckeditor"
									id='descriptionid'>{{old('description_fr')}}</textarea>
								@error('description')
								<span class="text-danger">{{$message}}</span>
								@enderror
								<span id="descriptionFrError" style="color: red;"></span>
							</div>
							<div class="form-group col-md-12 col-sm-6 ">
								<label>description ES</label>
								<textarea name="description_es" cols="20" rows="1" class="form-control ckeditor"
									id='descriptionid'>{{old('description_es')}}</textarea>
								@error('description_es')
								<span class="text-danger">{{$message}}</span>
								@enderror
								<span id="descriptionESError" style="color: red;"></span>
							</div>

						</div>
						<button type="submit" class="btn btn-primary btn-block">Add level </button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- /ADD Modal -->

	<!-- Edit Details Modal -->
	<div class="modal fade" id="edit" aria-hidden="true" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Update Level</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="post" action="{{route('levels.update','test')}}" enctype="multipart/form-data">
						@csrf
						@method('put')
						<div class="row form-row">
							<input type="hidden" name="id" id="cat_id">
							<div class="col-12 col-sm-12">
								<div class="form-group">
									<label>Level Name </label>
									<input type="text" name="name" class="form-control" id="name">
								</div>
							</div>

							<div class="form-group col-md-12 col-sm-6 paragraph-hidden">
								<label>description</label>
								<textarea name="description" cols="20" rows="1" class="form-control ckeditor"
									id='descriptionId'></textarea>
								@error('description')
								<span class="text-danger">{{$message}}</span>
								@enderror
								<span id="short_detailError" style="color: red;"></span>
							</div>

							<div class="form-group col-md-12 col-sm-6 paragraph-hidden">
								<label>description telc</label>
								<textarea name="description_telc" cols="20" rows="1" class="form-control "></textarea>
								@error('description_telc')
								<span class="text-danger">{{$message}}</span>
								@enderror
								<span id="short_detailError" style="color: red;"></span>
							</div>

						</div>
						<button type="submit" class="btn btn-primary btn-block"> Save Changing</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- /Edit Details Modal -->

	<!-- Delete Modal -->
	<div class="modal fade" id="delete" aria-hidden="true" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<div class="form-content p-2">
						<h4 class="modal-title">remove</h4>
						<p class="mb-4">Are you sure to delete this item?</p>
						<div class="row text-center">
							<div class="col-sm-3">
							</div>
							<div class="col-sm-2">
								<form method="post" action="{{route('levels.destroy','test')}}">
									@csrf
									@method('delete')
									<input type="hidden" name="id" id="cat_id">
									<button type="submit" class="btn btn-primary">remove </button>
								</form>
							</div>
							<div class="col-sm-2">
								<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>



<script src="{{asset('js/app.js')}}"></script>

<script>
	$('#edit').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget)
		var name = button.data('name')
		var description = button.data('description')
		var description_telc = button.data('description_telc')

		var cat_id = button.data('catid')
		var modal = $(this)

		modal.find('.modal-body #name').val(name);
		modal.find('.modal-body #descriptionId').val(description);
		modal.find('.modal-body #description_telcId').val(description_telc);

		modal.find('.modal-body #cat_id').val(cat_id);
	})


	$('#delete').on('show.bs.modal', function (event) {

		var button = $(event.relatedTarget)

		var cat_id = button.data('catid')
		var modal = $(this)

		modal.find('.modal-body #cat_id').val(cat_id);
	})


</script>

@endsection