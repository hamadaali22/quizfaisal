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
				group</a>
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
											<th>group name</th>
											<th> type</th>
											<th> skill</th>
											<th> quize</th>
											<th class="text-center">Actions</th>
										</tr>
									</thead>
									<tbody>

										@foreach ($sets as $_item)
										<tr>
											<td class="text-center">
												{{$_item->id}}
											</td>
											<td class="text-center">
												{{$_item->title}} - ({{$_item->quizes_count}})
											</td>
											<td class="text-center">
												{{$_item->type}}
											</td>
											<td class="text-center">
												{{$_item->type2}}
											</td>
											<td class="text-center">
												<a href="{{('quize/'.$_item->id)}}" class="btn btn-sm bg-success-light">
													<button type="button" class="btn btn-outline-success "><i
															class="la la-eye"></i></button></a>
											</td>
											<td class="text-center">
												<div class="actions">

													<a class="btn btn-sm bg-success-light" data-toggle="modal"
														data-title="{{ $_item->title }}" data-type="{{ $_item->type }}"
														data-type2="{{ $_item->type2 }}"
														data-level="{{ $_item->level_id }}"
														data-catid="{{ $_item->id }}" data-target="#edit">
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
					<h5 class="modal-title">Add group</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="{{route('sets.store')}}" method="POST" name="le_form" enctype="multipart/form-data">
						@csrf
						<div class="row form-row">
							<div class="col-12 col-md-12  col-sm-6">
								<div class="form-group">
									<label>title</label>
									<input type="text" name="title" class="form-control" value="{{old('title')}}">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label>Select Level </label>
									<select name="level_id" required class="form-control formselect">
										<option disabled>Select</option>
										@foreach ($levels as $level)
										<option value="{{$level->id}}" {{ old('level_id')==$level->id ? "selected" : ""
											}}>{{$level->name}}
										</option>
										@endforeach
									</select>
									@error('level_id')
									<span class="text-danger">{{$message}}</span>
									@enderror
									<span id="categoryError" style="color: red;"></span>
								</div>
							</div>
							<div class="col-12 col-md-12  col-sm-6">
								<div class="form-group">
									<label>Select type </label>
									<select name="type" required class="form-control formselect">
										<option disabled>Select</option>

										<option value="difficult" {{ old('level_id')=='difficult' ? "selected" : "" }}>
											difficult
										</option>
										<option value="middle" {{ old('level_id')=='middle' ? "selected" : "" }}>middle
										</option>
										<option value="easy" {{ old('level_id')=='easy' ? "selected" : "" }}>easy
										</option>
									</select>
									@error('level_id')
									<span class="text-danger">{{$message}}</span>
									@enderror
									<span id="categoryError" style="color: red;"></span>
								</div>
							</div>
							<div class="col-12 col-md-12  col-sm-6">
								<div class="form-group">
									<label>Select grammar or vocabulary</label>
									<select name="skill" required class="form-control formselect">
										<option disabled>Select</option>

										<option value="grammar" {{ old('level_id')=='grammar' ? "selected" : "" }}>
											grammar
										</option>
										<option value="vocabulary" {{ old('level_id')=='vocabulary' ? "selected" : ""
											}}>vocabulary
										</option>

									</select>
									@error('level_id')
									<span class="text-danger">{{$message}}</span>
									@enderror
									<span id="categoryError" style="color: red;"></span>
								</div>
							</div>

						</div>
						<button type="submit" class="btn btn-primary btn-block">Add group </button>
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
					<form method="post" action="{{route('sets.update','test')}}" enctype="multipart/form-data">
						@csrf
						@method('put')
						<div class="row form-row">
							<input type="hidden" name="id" id="cat_id">
							<div class="col-12 col-md-12  col-sm-6">
								<div class="form-group">
									<label>title</label>
									<input type="text" name="title" class="form-control" id="titleId">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label>Select Level </label>
									<select name="level_id" required class="form-control formselect" id="levelId">
										<option disabled>Select</option>
										@foreach ($levels as $level)
										<option value="{{$level->id}}" {{ old('level_id')==$level->id ? "selected" : ""
											}}>{{$level->name}}
										</option>

										@endforeach
									</select>
									@error('level_id')
									<span class="text-danger">{{$message}}</span>
									@enderror
									<span id="categoryError" style="color: red;"></span>
								</div>
							</div>
							<div class="col-12 col-md-12  col-sm-6">
								<div class="form-group">
									<label>Select type </label>
									<select name="type" required class="form-control formselect" id="typeId">
										<option disabled>Select</option>

										<option value="difficult" {{ old('level_id')=='difficult' ? "selected" : "" }}>
											difficult
										</option>
										<option value="middle" {{ old('level_id')=='middle' ? "selected" : "" }}>middle
										</option>
										<option value="easy" {{ old('level_id')=='easy' ? "selected" : "" }}>easy
										</option>
									</select>
									@error('level_id')
									<span class="text-danger">{{$message}}</span>
									@enderror
									<span id="categoryError" style="color: red;"></span>
								</div>
							</div>
							<div class="col-12 col-md-12  col-sm-6">
								<div class="form-group">
									<label>Select grammar or vocabulary</label>
									<select name="skill" required class="form-control formselect" id="type2Id" required>
										<option disabled>Select</option>

										<option value="grammar" {{ old('level_id')=='grammar' ? "selected" : "" }}>
											grammar
										</option>
										<option value="vocabulary" {{ old('level_id')=='vocabulary' ? "selected" : ""
											}}>vocabulary
										</option>

									</select>
									@error('level_id')
									<span class="text-danger">{{$message}}</span>
									@enderror
									<span id="categoryError" style="color: red;"></span>
								</div>
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
								<form method="post" action="{{route('sets.destroy','test')}}">
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
		var title = button.data('title')
		var level = button.data('level')
		var type = button.data('type')
		var type2 = button.data('type2')

		var cat_id = button.data('catid')
		var modal = $(this)

		modal.find('.modal-body #titleId').val(title);

		modal.find('.modal-body #levelId').val(level);
		modal.find('.modal-body #typeId').val(type);
		modal.find('.modal-body #type2Id').val(type2);

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