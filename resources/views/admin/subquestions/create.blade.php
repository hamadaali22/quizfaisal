@extends('layout.admin_main')
@section('content')

  <script src="{{asset('admin/vendors/js/editors/ckeditor/ckeditor.js')}}" type="text/javascript"></script>
  <script src="  {{asset('admin/js/scripts/editors/editor-ckeditor.js')}}" type="text/javascript"></script>

<div class="content-header row">
  <div class="content-header-left col-md-12 col-12 mb-2 breadcrumb-new">
    <h3 class="content-header-title mb-0 d-inline-block">Add Subquestions </h3><br>
    <div class="row breadcrumbs-top d-inline-block">
      <div class="breadcrumb-wrapper col-12">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a>
          </li>
          <li class="breadcrumb-item active">Add Subquestions
          </li>
        </ol>
      </div>
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

            <form action="{{route('subquestions.store')}}" method="POST" name="le_form"  enctype="multipart/form-data">
              @csrf
                <input type="hidden" name="question_id" class="form-control" value="{{$id}}" >


              <!-- <div class="col-md-12"><hr/></div> -->


                <div class="row form-row education-cont" >
                    <div class="row form-row col-md-12">
                        <div class="col-md-4 col-sm-6">
                          <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control titleId">
                            <span id="titleError" style="color: red;"></span>
                          </div>
                        </div>

                        <div class="form-group col-md-4 col-sm-6">
                          <label> Select Answer Type </label>
                          <select name="answer_type" class="form-control formselect answerTypeId" id="answerType1"

                          onchange="answerType('answerType1','is_multy-hidden1','is_complete_hidden1','addanswer1')">
                          <option value=""  selected>Select</option>
                          <option value="multiple_choice">
                            Multiple Choice
                          </option>
                          <option value="true_false">
                            true or false
                          </option>
                          <option value="complete">
                            complete
                          </option>
                            </select>
                            <span id="answerTypeError" style="color: red;"></span>
                        </div>
                        <div class="form-group col-md-4 col-sm-6 is_multy-hidden1" id="is_multy-hidden1">
                            <label> Select text or imag </label>
                            <select name="is_multy" class="form-control formselect" id="isMulty1"
                            onchange="showTextImageAnswer('isMulty1','addanswer1')" >
                                <option value=""  selected>Select</option>
                                <option value="text" >text</option>
                                <option value="image">image</option>
                            </select>
                            <span id="isMultyError" style="color: red;"></span>
                        </div>
                        <div class="form-group col-md-4 col-sm-6 is_complete_hidden1" id="is_complete_hidden1">
                            <label> Select number or Word </label>
                            <select name="is_complete" class="form-control formselect" id="isComplete1"
                            onchange="showNumberTextAnswer('isComplete1','addanswer1')" >
                                <option value=""  selected>Select</option>
                                <option value="number" >Number</option>
                                <option value="text">text</option>
                                <option value="write">write</option>
                            </select>
                            <span id="isMultyError" style="color: red;"></span>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="form-group">
                                <label>Expected Answer</label>
                                <input type="text" name="expected_answer" class="form-control expectedAnswerId">
                                <span id="expectedAnswerError" style="color: red;"></span>
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-sm-6 ">
                            <label>upload bannar </label>
                            <input type="file" name="banner" id="bannerid" class="form-control" accept=".JPEG,.JPG,.TIF,.TIFF">
                            @error('banner')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                            <span id="bannerError" style="color: red;"></span>
                        </div>
                    </div>
                    <div class="education-info col-md-12 " id="addanswer1">
                      <hr />
                    </div>
                </div>
        <div class="col-md-12" style="color: #FF4961; padding-right: 23px;padding-left: 23px" id="upload-error">  </div>
        <br>


        <div class="form-group col-12 col-sm-12">
          <button type="submit" id="Save-btn-scroll" class="btn btn-primary btn-block">حفظ </button>

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
</div>
</section>
<!-- <?php
$videos=session()->get('videos_sessions');
?> -->

<!-- <script src="http://code.jquery.com/jquery-3.4.1.js"></script> -->




<script>
$('.loader-container').hide();
// $('.file-hidden').hide();
// $('.paragraph-hidden').hide();
// $('.image-hidden').hide();
$('.is_multy-hidden1').hide();
$('.is_complete_hidden1').hide();

$('.text-answer1').hide();
$('.image-answer1').hide();
// $('.true-false-answer1').hide();
$('.complete-answer1').hide();


function answerType(answer_typeid,is_multy,is_complete,addanswer){
  var answer_type = document.getElementById(answer_typeid);
  console.log(answer_type.value);
  console.log(is_complete);
  $('#'+addanswer).empty();
  if(answer_type.value == "multiple_choice"){
    $('.'+is_multy).show();
    $('.'+is_complete).hide();
  }
  if(answer_type.value == "true_false"){
    // $('#'+is_multy).empty();
    $('.'+is_multy).hide();
    $('.'+is_complete).hide();
    $('#'+addanswer).append(`@include('admin.questions.form-true-false-answer-add')`);
    // $('.'+true_false).show();
  }
  if(answer_type.value == "complete"){
    // $('#'+is_multy).empty();
    $('.'+is_multy).hide();
    $('.'+is_complete).show();

    // $('.'+complete_answer).show();
  }
}
function showTextImageAnswer(answer_typeid,addanswer){
  var answer_val = document.getElementById(answer_typeid);
  console.log(answer_val.value);

  $('#'+addanswer).empty();
  if(answer_val.value == "text"){
    $('#'+addanswer).append(`@include('admin.questions.form-multiple-text-answer-add')`);
  }
  if(answer_val.value == "image"){
    $('#'+addanswer).append(`@include('admin.questions.form-multiple-image-answer-add')`);
  }
}

function showNumberTextAnswer(answer_typeid,addanswer){
  var answer_val = document.getElementById(answer_typeid);
  console.log(answer_val.value);

  $('#'+addanswer).empty();
  if(answer_val.value == "number"){
     $('#'+addanswer).append(`@include('admin.questions.form-complete-number-answer-add')`);
  }
  if(answer_val.value == "text"){
    $('#'+addanswer).append(`@include('admin.questions.form-complete-text-answer-add')`);
  }
  if(answer_val.value == "write"){
    $('#'+addanswer).append(`@include('admin.questions.form-complete-write-answer-add')`);
  }
}





</script>
<script>
$('.loader-container').hide();
let videoid = 1;
$('.hidden1').hide();

/// remove video from list and session


function Validateallinput() {


  var categoryid = document.getElementById("get_sub_category_name");
  var categoryError = document.getElementById("categoryError");

  var subcategoryid = document.getElementById("get_sub_category");
  var subcategoryError = document.getElementById("subcategoryError");

  var titleid = document.getElementById("titleid");
  var titleError = document.getElementById("titleError");

  var titlearid = document.getElementById("titlearid");
  var titlearError = document.getElementById("titlearError");


  // var levelid = document.getElementById("levelid");
  // var levelError = document.getElementById("levelError");

  var short_detailid = document.getElementById("short_detailid");
  var short_detailError = document.getElementById("short_detailError");

  var detailid = document.getElementById("detailid");
  var detailError = document.getElementById("detailError");

  var requirementid = document.getElementById("requirementid");
  var requirementidError = document.getElementById("requirementError");

  // var durationid = document.getElementById("durationid");
  // var durationError = document.getElementById("durationError");

  var metakeyid = document.getElementById("metakeyid");
  var metakeyError = document.getElementById("metakeyError");

  // var metadescid = document.getElementById("meta_descid");
  // var metadescError = document.getElementById("meta_descError");

  var imageeid = document.getElementById("imageeid");
  var imageeidError = document.getElementById("imageeidError");

  if (categoryid.value == "") {
    categoryError.innerHTML = "يرجى ادخال المستوى الرئيسي";
    // titleid.focus();
    return false;
  }
  categoryError.innerHTML = "";

  if (subcategoryid.value == "") {
    subcategoryError.innerHTML = "يرجي إدخال المستوى الفرعي";
    // titleid.focus();
    return false;
  }
  subcategoryError.innerHTML = "";



  if (titleid.value == "") {
    titleError.innerHTML = "يرجى كتابة العنوان";
    // titleid.focus();
    return false;
  }
  titleError.innerHTML = "";

  if (titlearid.value == "") {
    titlearError.innerHTML = "يرجى كتابة العنوان انجليزي";
    // titleid.focus();
    return false;
  }
  titlearError.innerHTML = "";


  if (detailid.value == "") {
    detailError.innerHTML = " يرجى كتابة وصف للدورة ";
    // titleid.focus();
    return false;
  }
  detailError.innerHTML = "";

  if (short_detailid.value == "") {
    short_detailError.innerHTML = "يرجى ادخال تفاصيل قصيرة للدورة";
    // titleid.focus();
    return false;
  }
  short_detailError.innerHTML = "";

  if (requirementid.value == "") {
    requirementError.innerHTML = "يرجى ادخال متطلبات للدورة";
    // titleid.focus();
    return false;
  }
  requirementError.innerHTML = "";

  if (metakeyid.value == "") {
    metakeyError.innerHTML = "يرجى كتابة كلمات دلالية عن للدورة";
    // titleid.focus();
    return false;
  }
  metakeyError.innerHTML = "";



  // if (metadescid.value == "") {
  //     metadescError.innerHTML = "يرجى كتابة العنوان";
  //         // titleid.focus();
  //         return false;
  // }
  // metadescError.innerHTML = "";


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





  var nameId = document.querySelectorAll(".nameId");
  var nameError = document.getElementById("nameError");
  let fileId = document.querySelectorAll(".fileId");
  var fileError = document.getElementById("fileError");
  let videovalue = document.querySelectorAll(".videovalue");

  let videotime = document.querySelectorAll(".videotime");


  for (let i = 0; i < nameId.length; i++) {

    if (nameId[i].value == "") {
      $('#upload-error').empty();
      // nameError.innerHTML = "ادخل عنوان الفيديو  <b>";
      $('#upload-error').append(` <div class="bs-callout-pink callout-border-left mt-1 p-1 error-upload" >
      <strong></strong>
      <p>ادخل عنوان الفيديو </p>
      </div>`);
      nameId[i].focus();
      return false;
    }


    if (fileId[i].value == "") {
      $('#upload-error').empty();

      $('#upload-error').append(`<div class="bs-callout-pink callout-border-left mt-1 p-1 error-upload" >
      <strong></strong>
      <p>يرجى إرفاق فيديو </p>
      </div>`);
      fileId[i].focus();
      return false;
    }


    var filePath = fileId[i].value;
    var allowedExtensions = /(\.MP4|\.FLV|\.ogg|\.webm|\.mov)$/i;
    if(!allowedExtensions.exec(filePath)){
      $('#upload-error').append(`<div class="bs-callout-pink callout-border-left mt-1 p-1 error-upload" >
      <strong> </strong>
      <p> يجب أن يكون الأمتداد من نوع (.MP4,.FLV,.ogg,.webm.)فقط </p>
      </div>`);

      fileId[i].value = '';
      fileId[i].focus();
      return false;
    }



    if (videovalue[i].value == "") {
      $('#upload-error').empty();
      $('#upload-error').append(` <div class="bs-callout-pink callout-border-left mt-1 p-1 error-upload" >
      <strong></strong>
      <p>يرجى الإنتظار حتي يتم التحميل</p>
      </div>`);
      videovalue[i].focus();
      return false;
    }

    if (videotime[i].value == "") {
      $('#upload-error').empty();
      $('#upload-error').append(` <div class="bs-callout-pink callout-border-left mt-1 p-1 error-upload" >
      <strong></strong>
      <p>يرجى الإنتظار ثواني حتي يتم التحميل</p>
      </div>`);
      videotime[i].focus();
      return false;
    }

  }
  for (let i = 0; i < nameId.length; i++) {

    if (videovalue[i].value == "") {
      $('#upload-error').empty();
      $('#upload-error').append(` <div class="bs-callout-pink callout-border-left mt-1 p-1 error-upload" >
      <strong></strong>
      <p>يرجى الإنتظار حتي يتم التحميل</p>
      </div>`);
      videovalue[i].focus();
      return false;
    }else{
      fileId[i].value= null;
    }

    if (videotime[i].value == "") {
      $('#upload-error').empty();
      $('#upload-error').append(` <div class="bs-callout-pink callout-border-left mt-1 p-1 error-upload" >
      <strong></strong>
      <p>يرجى الإنتظار ثواني حتي يتم التحميل</p>
      </div>`);
      videotime[i].focus();
      return false;
    }else{
      fileId[i].value= null;
    }

  }

  // for (let i = 0; i < nameId.length; i++) {
  //     fileId[i].value= null;

  // }
  $('.loader-container').show();
  // return false;
}

</script>
@endsection
