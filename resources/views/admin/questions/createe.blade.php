

@extends('layout.admin_main')
@section('content') 
<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> -->
  

  <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
            <h3 class="content-header-title mb-0 d-inline-block">Exams </h3><br>
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
        <div class="content-header-right col-md-6 col-12">
            <div class="dropdown float-md-right">
                <a href="#Add_Specialities_details" data-toggle="modal" class="btn btn-primary float-right mt-2"> Add Exams </a>
            </div>
        </div>
        @if(session()->has('message'))
            @include('admin.includes.alerts.success')
          @endif   
  </div>
<style type="text/css">
  .hidden1{
    /*display: none;*/
  }
</style>
  <section id="basic-form-layouts">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                </div>
                <div class="card-content collpase show">
                    <div class="card-body">
                        <form action="{{route('questions.store')}}" method="POST" name="le_form"  enctype="multipart/form-data">
                          @csrf
                          <div class="row form-row">
                                <div class="col-md-6" >
                                    <div class="form-group">
                                        <label>select level</label>
                                        <select name="level_id" required class="form-control formselect" >
                                                 <option    disabled>Select</option>
                                                @foreach ($levels as $_item)
                                                    <option value="{{$_item->id}}" {{ old('level_id') == $_item->id ? "selected" : "" }}>{{$_item->name}}
                                                    </option>
                                                @endforeach
                                        </select>
                                        @error('level_id')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                        <span id="levelError" style="color: red;"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>select Exam</label>
                                        <select name="exam_id" required class="form-control formselect" >
                                                 <option    disabled>Select</option>
                                                @foreach ($exams as $_item)
                                                    <option value="{{$_item->id}}" {{ old('exam_id') == $_item->id ? "selected" : "" }}>{{$_item->name}}
                                                    </option>
                                                @endforeach
                                        </select>
                                        @error('exam_id')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                        <span id="categoryError" style="color: red;"></span>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">  
                                    <div class="form-group">
                                        <label>Question Bio</label>
                                        <input type="text" name="bio" class="form-control" value="{{old('bio')}}">
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-sm-6">                                   
                                    <label> Select Question Type </label>
                                    <select name="type" class="form-control formselect" id="typeid" >
                                        <option value=""  selected>Select</option>  
                                        <option value="listening" {{ old('type') == 'listening' ? "selected" : "" }}>listening</option>
                                        <option value="reading" {{ old('type') == 'reading' ? "selected" : "" }}>reading</option> 
                                        <option value="image" {{ old('type') == 'image' ? "selected" : "" }}>image</option>  
                                    </select>
                                    <span id="typeError" style="color: red;"></span>
                                </div>

                                <div class="form-group col-md-12 col-sm-6 file-hidden">
                                    <label>Select an Audio File</label>
                                    <input type="file" name="file" id="fileid" class="form-control" accept=".JPEG,.JPG,.TIF,.TIFF">
                                    @error('imagee')
                                      <span class="text-danger">{{$message}}</span>
                                    @enderror
                                    <span id="imageeError" style="color: red;"></span>
                                </div>
                                <div class="form-group col-md-12 col-sm-6 image-hidden">
                                    <label>Select Image </label>
                                    <input type="file" name="image" id="imageeid" class="form-control" accept=".JPEG,.JPG,.TIF,.TIFF">
                                    @error('image')
                                      <span class="text-danger">{{$message}}</span>
                                    @enderror
                                    <span id="imageeError" style="color: red;"></span>
                                </div>
                                <div class="form-group col-md-12 col-sm-6 paragraph-hidden">
                                    <label>Paragraph</label>
                                    <textarea name="paragraph"  cols="30" rows="2"  class="form-control ckeditor" id='paragraphid'>{{old('paragraph')}}</textarea>
                                    @error('paragraph')
                                      <span class="text-danger">{{$message}}</span>
                                    @enderror
                                    <span id="short_detailError" style="color: red;"></span>
                                </div>

                            </div>


                            

                         <!-- -->
                          <div class="col-md-12" style="color: #FF4961; padding-right: 23px;padding-left: 23px" id="upload-error">  </div>
                          <br>
                           

                          <div class="form-group col-12 col-sm-12">
                              <button type="submit" id="Save-btn-scroll" class="btn btn-primary btn-block" onclick="">Save </button>
                              
                            <div class="loader-wrapper">
                                <div class="loader-container">
                                  <div class="ball-spin-fade-loader loader-blue">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                  </div>
                                </div>
                            </div>

                          </div>
                        </form>
                   
                  
                </div>
              </div>
            </div>
          </div>
  </section>
    <?php
       $videos=session()->get('videos_sessions');
    ?>


 <script src="{{asset('admin/vendors/js/forms/select/select2.full.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('admin/js/scripts/forms/select/form-select2.js')}}" type="text/javascript"></script>


<script>
    $(document).ready(function () {
        $('#typeid').on('change', function () {
            console.log("welcome sub");
            let id = $(this).val();
            console.log(id);

            if( id == "listening"){
                $('.file-hidden').show();
                $('.paragraph-hidden').hide();
                $('.image-hidden').hide();
            }
            if(id == "reading"){
                $('.paragraph-hidden').show();
                $('.file-hidden').hide();
                $('.image-hidden').hide();
            }
            if( id == "image"){
                $('.image-hidden').show();
                $('.file-hidden').hide();
                $('.paragraph-hidden').hide();
            }
            
        });
    });
</script>
<script>
    
    $('.loader-container').hide();
    $('.file-hidden').hide();
    $('.paragraph-hidden').hide();
    $('.image-hidden').hide();
    

  let videoid = 1;
   $('.hidden1').hide();

  function Validateallinput() {
    var categoryid = document.getElementById("get_sub_category_name");
    var categoryError = document.getElementById("categoryError");
    var subcategoryid = document.getElementById("get_sub_category");
    var subcategoryError = document.getElementById("subcategoryError");
    var get_classroom = document.getElementById("get_classroom");
    var classroomError = document.getElementById("classroomError");
    var get_name = document.getElementById("get_title");
    var nameError = document.getElementById("titleError");
    var imageeid = document.getElementById("imageeid");
    var imageeidError = document.getElementById("imageeidError");
    if (get_name.value == "") {
        nameError.innerHTML = "يرجى اختيار  المنهج ";
            return false;
    }
    nameError.innerHTML = "";
       if(subcategoryid.value == "") {
        subcategoryError.innerHTML = "يرجى أختيار المادة";
            // titleid.focus();
            return false;
    }
    subcategoryError.innerHTML = "";
    if (categoryid.value == "") {
        categoryError.innerHTML = "يرجى اختيار فرع أو أكثر";
            // titleid.focus();
            return false;
    }
    categoryError.innerHTML = "";
    if (get_classroom.value == "") {
        classroomError.innerHTML = "يرجى اختيار الفصل الدراسي ";
            // titleid.focus();
            return false;
    }
    classroomError.innerHTML = "";
    if (imageeid.value == "") {
        imageeError.innerHTML = " يرجى إضافة صورة للدورة";
            // titleid.focus();
            return false;
    }
    imageeError.innerHTML = "";
    var allowedExtensionsImage = /(\.JPEG|\.JPG|\.PNG|\.GIF|\.TIF|\.TIFF)$/i;
    if(!allowedExtensionsImage.exec(imageeid.value)){
        imageeError.innerHTML = "  يجب أن يكون الأمتداد من نوع (.JPEG,.JPG,.PNG,.GIF,.TIF,.TIFF)   فقط" ;

        imageeid.value = '';
        // imageeid.focus();
        return false;
    }
     imageeError.innerHTML = "";  
  }



</script>

    <!--@toastr_js-->
    <!--@toastr_render-->
@endsection

<!-- 200 مقدم
400 عند الانتهاد من  التطبيق اندرويد و ios
100  عند الانتهاد من لوحة التحكم
100 بعد رفع التطبيق -->
