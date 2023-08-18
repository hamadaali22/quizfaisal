


@extends('layout.admin_main')
@section('content')	

		<div class="content-header row">
			        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
			          <h3 class="content-header-title mb-0 d-inline-block">حسابي</h3><br>
			          <div class="row breadcrumbs-top d-inline-block">
			            <div class="breadcrumb-wrapper col-12">
			              <ol class="breadcrumb">
			                <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">الرئيسية</a>
			                </li>
			                <li class="breadcrumb-item active">حسابي
			                </li>
			              </ol> 
			            </div>
			          </div>
			        </div>
			        <div class="content-header-right col-md-6 col-12">
			          <div class="dropdown float-md-right">
			           
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
               
                <div class="card-content collapse show">
                  <div class="card-body card-dashboard">
                    <div class="card-body">
						<div class="row">
						<div class="col-md-12">
							<div class="profile-header">
								<div class="row align-items-center">
									<div class="col-auto profile-image">
										<a href="#">
											<img class="rounded-circle" alt="User Image" src="{{asset('assets_admin/img/users/'.$instructor->photo) }}" width="120px">
										</a>
									</div>
									<div class="col ml-md-n2 profile-user-info">
										<h4 class="user-name mb-0">{{$instructor->name}}</h4>
										<h6 class="text-muted">{{$instructor->email}}</h6>
										<div class="user-Location"><i class="fa fa-map-marker"></i> {{$instructor->address}}</div>
										<!-- <div class="about-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div> -->
									</div>
									<!-- <div class="col-auto profile-btn">
										
										<a href="" class="btn btn-primary">
											Edit
										</a>
									</div> -->
								</div>
							</div>
							<div class="profile-menu">
								<ul class="nav nav-tabs nav-tabs-solid">
									<li class="nav-item">
										<a class="nav-link active" data-toggle="tab" href="#per_details_tab">من أنا</a>
									</li>
									
									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#courses_live_tab">الاستشارات</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#reviews_tab">التقييمات</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#bank_tab">بيانات البنك</a>
									</li>

									<!-- <li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#password_tab">كلمة المرور</a>
									</li> -->

								</ul>
							</div>	
							<div class="tab-content profile-tab-cont">
								<!-- Personal Details Tab -->
								<div class="tab-pane fade show active" id="per_details_tab">
									<!-- Personal Details -->
									<div class="row">
										<div class="col-lg-12">
											<div class="card">
												<div class="card-body">
													<h5 class="card-title d-flex justify-content-between">
														<span>البيانات الشخصية	</span> 
														<a class="edit-link" data-toggle="modal" href="#edit_personal_details"><i class="fa fa-edit mr-1"></i>تعديل</a>
													</h5>
													<div class="row">
														<p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">الاسم</p>
														<p class="col-sm-10">{{$instructor->name}}</p>
													</div>
													<!-- <div class="row">
														<p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">تاريخ الميلاد</p>
														<p class="col-sm-10">{{$instructor->dateOfBirth}}</p>
													</div> -->
													<div class="row">
														<p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">البريد الالكتروني</p>
														<p class="col-sm-10">{{$instructor->email}}</p>
													</div>
													<div class="row">
														<p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">الهاتف</p>
														<p class="col-sm-10">{{$instructor->mobile}}</p>
													</div>
													<!-- <div class="row">
														<p class="col-sm-2 text-muted text-sm-right mb-0">العنوان</p>
														<p class="col-sm-10">{{$instructor->address}}</p>
																
													</div> -->
												</div>
											</div>
											
											<!-- Edit Details Modal -->
											<div class="modal fade" id="edit_personal_details" aria-hidden="true" role="dialog">
												<div class="modal-dialog modal-dialog-centered" role="document" >
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title">البيانات الشخصية</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
															<form action="{{url('/admin/profile/update')}}" method="POST" 
								                                name="le_form"  enctype="multipart/form-data">
								                                @csrf
																<div class="row form-row">           
																 
																	<input type="hidden" name="id" value="{{Auth::user()->id}}">
																	<div class="col-12 col-sm-12">
																		<div class="form-group">
																			<label> الاسم</label>
																			<input type="text" name="name" class="form-control" value="{{Auth::user()->name}}">
																		</div>
																	</div>
																	
																	<!-- <div class="col-12">
																		<div class="form-group">
																			<label>تاريخ الميلاد</label>
																			<div class="cal-icon">
																				<input type="date" name="dateOfBirth" class="form-control" value="{{Auth::user()->dateOfBirth}}">
																			</div>
																		</div>
																	</div> -->
																	<!-- <div class="col-12 col-sm-6">
																		<div class="form-group">
																			<label>Email ID</label>
																			<input type="email" class="form-control" value="johndoe@example.com">
																		</div>
																	</div> -->
																	<div class="col-12 col-sm-12">
																		<div class="form-group">
																			<label>الهاتف</label>
																			<input type="text" name="mobile" value="{{Auth::user()->mobile}}" class="form-control">
																		</div>
																	</div>
																	<!-- <div class="col-12">
																		<h5 class="form-title"><span>Address</span></h5>
																	</div> -->
																	<!-- <div class="col-12">
																		<div class="form-group">
																		<label>العنوان</label>
																			<input type="text" name="address" class="form-control"
																			 value="{{Auth::user()->address}}">
																		</div>
																	</div> -->
																	<div class="col-12 col-sm-12">
																		<div class="form-group">
																			<label>الصورهة الشخصية</label>
																			<input type="hidden" name="url" value="{{Auth::user()->photo}}" >
																			<input type="file" name="photo" class="form-control" value="Miami" accept=".JPEG,.JPG,.PNG,.GIF,.TIF,.TIFF">
																		</div>
																	</div>
																	
																</div>
																<button type="submit" class="btn btn-primary btn-block">حفظ التغيير </button>
															</form>
														</div>
													</div>
												</div>
											</div>
											<!-- /Edit Details Modal -->
											
										</div>
									</div>
									<!-- /Personal Details -->
								</div>
								<!-- /Personal Details Tab -->
								<!-- Change Password Tab -->
								<div id="password_tab" class="tab-pane fade">
								
									<div class="card">
										<div class="card-body">
											<h5 class="card-title">تغيير كلمة المرور</h5>
											<div class="row">
												<div class="col-md-10 col-lg-6">
															<form action="{{route('user.changepassword')}}" method="POST" 
	                                name="le_form"  enctype="multipart/form-data">
	                                @csrf
	                                					<input type="hidden" name="id" value="{{Auth::user()->id}}">
														<div class="form-group">
															<label>كلمة المرور الحالية</label>
															<input type="password" name="current-password" class="form-control">
														</div>
														<div class="form-group">
															<label>كلمة المرور الجديدة</label>
															<input type="password" name="new-password" class="form-control">
														</div>
														<!-- <div class="form-group">
															<label>Confirm Password</label>
															<input type="password" class="form-control">
														</div> -->
														<button class="btn btn-primary" type="submit">حفظ التغيير</button>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- /Change Password Tab -->


								<!-- courses live  Tab -->
								<div id="courses_live_tab" class="tab-pane fade">
									<div class="card">
										<div class="card-body">
											<h5 class="card-title">الكورسات المسجلة</h5>
											<div class="card-content collapse show">
									            <div class="card-body card-dashboard">
										            <p class="card-text"></p>
										            <table class="table table-striped table-bordered keytable-integration">
										                        <thead>
										                            <tr>                                                    
										                                <th>الصورة</th>
										                                <th>العنوان </th>
										                                <th>الوصف </th>
										                                <th class="text-center">العمليات</th>
										                            </tr>
										                        </thead>
										                        <tbody>                     
										                            @foreach ($courses as $_item)
										                            <tr>
										                                <td>
										                                    <a href="profile" class="avatar avatar-sm mr-2">
										                                      <img class="avatar-img" src="{{asset('assets_admin/img/courses/'.$_item->image) }}" alt="Speciality">
										                                    </a>
										                                </td>
										                                <td>{{ $_item->title }}</td>                                                
										                                <td>
										                                    {{ $_item->description }}
										                                </td>           
										                                <td class="text-center">
										                                    <div class="actions">
										                                        <a href="{{url('instructor/addvideos',$_item->id)}}" class="add-video" >
										                                             <button type="button" class="btn btn-outline-info "><i class="la la-plus-circle"></i></button>
										                                             <span class="addvideo">إضافة فيديو جديد</span>
										                                        </a>
										                                        <a href="{{url('instructor/allvideos',$_item->id)}}" class="all-video" >
										                                             <button type="button" class="btn btn-outline-danger "><i class="la la-file-video-o"></i></button>
										                                             <span class="allvideo">الفيديوهات</span>
										                                        </a>
										                                        <a href="{{route('courses.edit',$_item->id)}}" class="edit-course" >
										                                              <button type="button" class="btn btn-outline-success "><i class="la la-edit"></i></button>
										                                              <span class="editcourse">تعديل الكورس</span>
										                                        </a>
										                                        <a  data-toggle="modal" data-catid="{{ $_item->id }}" data-target="#delete" class="delete-course">
										                                           <button type="button" class=" btn btn-outline-warning"><i class="la la-trash-o"></i></button>
										                                           <span class="deletecourse">حذف الكورس</span>
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
								<!-- /courses live Tab -->

								<!-- reviews  Tab -->
								<div id="reviews_tab" class="tab-pane fade">
									<div class="page-header">
												<div class="row">
													<div class="col-sm-7 col-auto">
														<h3 class="page-title">التقييمات  </h3>
													</div>
													<!-- <div class="col-sm-5 col">
														<a data-target="#Add_services_details"  data-toggle="modal" class="btn btn-primary float-right mt-2">إضافة خدمة جديدة</a>
													</div> -->
												</div>
										</div>
										<div class="row">
											<div class="col-sm-12">
												<div class="card">
													<div class="card-body">
														

														<div class="table-responsive">
							                                <table
							                                    class="table table-bordered table-striped table-hover js-basic-example dataTable">
							                                    <thead>
																	<tr>
																		<th>اسم الطالب</th>

																		<th>التقييم</th>
																		<th>الوصف</th>
																		<th>التاريخ</th>
																		<th class="text-right">أكشن</th>
																	</tr>
																</thead>

																<tbody>
																	@foreach ($reviews as $_item)
																
																	
																	<tr role="row" class="odd">
																		<td class="sorting_1">
																			<h2 class="table-avatar">
																				<a href="profile.html" class="avatar avatar-sm mr-2">
																					<img class="avatar-img rounded-circle" src="{{asset('assets_admin/img/patients/'.$_item->patient['photo']) }}" alt="User Image" width="60px" height="60px">
																				<a href="profile.html"> {{$_item->patient['first_name_ar']}}</a>
																			</h2>
																		</td>
																	
																		<td>
																			@for ($i = 0; $i < $_item->rate; $i++)
																				<i class="fe fe-star text-warning"></i>
																		    @endfor							        
																		</td>
																		<td>
																			{{$_item->comment}}
																		<td>{{ mb_strimwidth($_item->created_at,0,10) }} <br>
																			<small>{{ substr($_item->created_at,10,11) }}</small></</td>
																		<td class="text-right">
																			<div class="actions">

																				<a  data-toggle="modal" data-catid="{{ $_item->id }}" data-target="#delete_review" class="btn btn-sm bg-danger-light">
																							<i class="fe fe-trash"></i> حذف
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
								<!-- reviews Tab -->

								<!-- banks Tab -->
								<div id="bank_tab" class="tab-pane fade">
								
									<div class="row">
										<div class="col-lg-12">
											<div class="card-body" style="direction:ltr">
					                    		<form action="{{route('bankdetails')}}" method="POST" 
					                                name="le_form"  enctype="multipart/form-data" style="text-align: left;">
					                                @csrf
													<div class="row form-row">	
														<div class="col-md-4 col-sm-6">
															<div class="form-group">
																<label>Beneficiary Name</label>
																<input type="text" name="persone_name" class="form-control" value="{{$bankdetails->persone_name}}">
															</div>
														</div>	                	
														<div class="col-md-4 col-sm-6">
																<div class="form-group ">
																	<label>Country</label>
																	<select name="countryId" class="form-control select2-diacritics required" placeholder="Select Category" id="get_city_name">
																	<option   disabled selected>Select</option>

																	@foreach ($country as $_item)
																	   <option value="{{$_item->id}}" {{($_item->id==$bankdetails->countryId) ? 'selected' : '' }}>{{$_item->getTranslation('name','en')}}</option>
																	@endforeach
																</select>
															</div>
														</div>

														<div class="col-md-4 col-sm-6">
															<div class="form-group ">									 
															        <label>city</label>
															        <select name="cityId" class="form-control formselect"  id="get_city">
															        @foreach ($cities as $_item)
																	   <option value="{{$_item->id}}" {{($_item->id==$bankdetails->cityId) ? 'selected' : '' }}>
																	   	{{$_item->getTranslation('name','en')}}
																	   </option>
																	@endforeach
															        </select>
															</div>
														</div>

														
														
														<div class="col-md-4 col-sm-6">
															<div class="form-group">
																<label>Bank name</label>
																<input type="text" name="bank_name" class="form-control" value="{{$bankdetails->bank_name}}">
															</div>
														</div>
														<div class="col-md-4 col-sm-6">
															<div class="form-group">
																<label>Bank branch name</label>
																<input type="text" name="bank_sub_name" class="form-control" value="{{$bankdetails->bank_sub_name}}">
															</div>
														</div>
														<div class="col-md-4 col-sm-6">
															<div class="form-group">
																<label>Account Number</label>
																<input type="text" name="acount_number" class="form-control" value="{{$bankdetails->acount_number}}">
															</div>
														</div>
														
								                        <div class="col-12 col-sm-6">
															<div class="form-group">
																<label>IBAN  </label>
																<input type="text" name="iban" class="form-control" value="{{$bankdetails->iban}}">
															</div>
														</div>
														<div class="col-12 col-sm-6">
															<div class="form-group">
																<label>SWIFT code (optional)</label>
																<input type="text" name="swift_code" class="form-control" value="{{$bankdetails->swift_code}}">
															</div>
														</div>
													<button type="submit" class="btn btn-primary btn-block">save change </button>
												</form>
				                  			</div>
										</div>
									</div>
								</div>
								<!-- /banks Tab -->

								
							</div>
						</div>
					</div>			
					</div>
                  </div>
                </div>
              </div>
            </div>
        </div>



@endsection