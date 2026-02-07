@extends('layout.admin_main')
@section('content')

<script src="{{asset('admin/vendors/js/editors/ckeditor/ckeditor.js')}}" type="text/javascript"></script>
<script src="  {{asset('admin/js/scripts/editors/editor-ckeditor.js')}}" type="text/javascript"></script>

<div class="content-header row">
  <div class="content-header-left col-md-12 col-12 mb-2 breadcrumb-new">
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

  @if(session()->has('message'))
  @include('admin.includes.alerts.success')
  @endif
</div>
<style type="text/css">
  .hidden1 {
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

            <form method="post" action=" {{route('subquestions.update',$subquestion->id)}}"
              enctype="multipart/form-data">
              @csrf
              @method('put')
              <input type="hidden" name="question_id" class="form-control" value="">


              <!-- <div class="col-md-12"><hr/></div> -->


              <div class="row form-row education-cont">
                <div class="row form-row col-md-12">
                  <div class="form-group col-md-4 col-sm-6">
                    <label> Select Answer Type </label>
                    <select name="answer_type" class="form-control formselect answerTypeId" id="answerType1"
                      onchange="answerType('answerType1','is_multy-hidden1','is_complete_hidden1','addanswer1')">
                      <option value="" selected>Select</option>
                      <option value="multiple_choice" {{ $subquestion->answer_type == 'multiple_choice' ? "selected" :
                        "" }}>Multiple Choice</option>
                      <option value="true_false" {{ $subquestion->answer_type == 'true_false' ? "selected" : "" }}> true
                        or false</option>
                      <option value="complete" {{ $subquestion->answer_type == 'complete' ? "selected" : "" }}>complete
                      </option>

                    </select>
                    <span id="answerTypeError" style="color: red;"></span>
                  </div>
                  <div class="form-group col-md-4 col-sm-6 is_multy-hidden1" id="is_multy-hidden1">
                    <label> Select text or imag </label>
                    <select name="is_multy" class="form-control formselect" id="isMulty1"
                      onchange="showTextImageAnswer('isMulty1','addanswer1')">
                      <option value="" selected>Select</option>
                      <option value="text" {{ $subquestion->is_multy == 'text' ? "selected" : "" }}>text</option>
                      <option value="image" {{ $subquestion->is_multy == 'image' ? "selected" : "" }}>image</option>
                    </select>
                    <span id="isMultyError" style="color: red;"></span>
                  </div>
                  <div class="form-group col-md-4 col-sm-6 is_complete_hidden1" id="is_complete_hidden1">
                    <label> Select number or Word </label>
                    <select name="is_complete" class="form-control formselect" id="isComplete1"
                      onchange="showNumberTextAnswer('isComplete1','addanswer1')">
                      <option value="" selected>Select</option>
                      <option value="number" {{ $subquestion->is_complete == 'number' ? "selected" : "" }}>number
                      </option>
                      <option value="text" {{ $subquestion->is_complete == 'text' ? "selected" : "" }}>text</option>
                      <option value="write" {{ $subquestion->is_complete == 'write' ? "selected" : "" }}>write</option>
                    </select>
                    <span id="isMultyError" style="color: red;"></span>
                  </div>
                  <div class="col-md-4 col-sm-6">
                    <div class="form-group">
                      <label>Title </label>
                      <input type="text" name="title" class="form-control titleId" value="{{$subquestion->title}}">
                      <span id="titleError" style="color: red;"></span>
                    </div>
                  </div>
                  <div class="col-md-4 col-sm-6 title-hidden">
                    <div class="form-group">
                      <label>Title 2</label>
                      <input type="text" name="last_title" class="form-control titleId"
                        value="{{$subquestion->last_title}}">
                      <span id="titleError" style="color: red;"></span>
                    </div>
                  </div>
                  <div class="form-group col-md-4 col-sm-6 answer-location">
                    <label> Select Answer location </label>
                    <select name="answer_location" class="form-control formselec">
                      <option value="" selected>Select</option>
                      <option value="beginning" {{ $subquestion->answer_location == 'beginning' ? "selected" : ""
                        }}>beginning</option>
                      <option value="middle" {{ $subquestion->answer_location == 'middle' ? "selected" : "" }}>middle
                      </option>
                      <option value="end" {{ $subquestion->answer_location == 'end' ? "selected" : "" }}>end</option>
                    </select>
                    <span id="isMultyError" style="color: red;"></span>
                  </div>
                  <div class="col-md-4 col-sm-6">
                    <div class="form-group">
                      <label>Expected Answer</label>
                      <input type="text" name="expected_answer" class="form-control expectedAnswerId"
                        value="{{$subquestion->expected_answer}}">
                      <span id="expectedAnswerError" style="color: red;"></span>
                    </div>
                  </div>
                  <div class="form-group col-md-6 col-sm-6 ">
                    <img class="avatar-img" src="{{asset('img/banner/'.$subquestion->bannar) }}" width="90px">
                    <label>upload bannar </label>
                    <input type="file" name="banner" id="bannerid" class="form-control" accept=".JPEG,.JPG,.TIF,.TIFF">
                    @error('banner')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    <span id="bannerError" style="color: red;"></span>
                  </div>
                  <div class="col-md-4 col-sm-6">
                    <div class="form-group">
                      <label>color</label>
                      <input type="text" name="color" class="form-control titleId">
                      <!-- <span id="titleError" style="color: red;"></span> -->
                    </div>
                  </div>
                </div>
                <div class="education-info col-md-12 " id="addanswer1">
                  <hr />


                </div>
              </div>
              <div class="col-md-12" style="color: #FF4961; padding-right: 23px;padding-left: 23px" id="upload-error">
              </div>
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
  @if($subquestion->answer)
  <input type="hidden" id="answer-one" value="{{$subquestion->answer->one}}">
  <input type="hidden" id="answer-two" value="{{$subquestion->answer->two}}">
  <input type="hidden" id="answer-three" value="{{$subquestion->answer->three}}">
  <input type="hidden" id="answer-four" value="{{$subquestion->answer->four}}">
  <input type="hidden" id="answer-five" value="{{$subquestion->answer->five}}">
  <input type="hidden" id="answer-six" value="{{$subquestion->answer->six}}">
  <input type="hidden" id="answer-seven" value="{{$subquestion->answer->seven}}">
  <input type="hidden" id="answer-eight" value="{{$subquestion->answer->eight}}">
  <input type="hidden" id="answer-nine" value="{{$subquestion->answer->nine}}">
  <input type="hidden" id="answer-ten" value="{{$subquestion->answer->ten}}">

  <input type="hidden" id="answer-eleven" value="{{$subquestion->answer->eleven}}">
  <input type="hidden" id="answer-twelve" value="{{$subquestion->answer->twelve}}">
  <input type="hidden" id="answer-thirteen" value="{{$subquestion->answer->thirteen}}">
  <input type="hidden" id="answer-fourteen" value="{{$subquestion->answer->fourteen}}">
  <input type="hidden" id="answer-fifteen" value="{{$subquestion->answer->fifteen}}">
  <input type="hidden" id="answer-sixteen" value="{{$subquestion->answer->sixteen}}">


  @endif

  @if($subquestion->expected_write_answer)
  <input type="hidden" id="answer-expected-one" value="{{$subquestion->expected_write_answer->one}}">
  <input type="hidden" id="answer-expected-two" value="{{$subquestion->expected_write_answer->two}}">
  <input type="hidden" id="answer-expected-three" value="{{$subquestion->expected_write_answer->three}}">
  <input type="hidden" id="answer-expected-four" value="{{$subquestion->expected_write_answer->four}}">
  <input type="hidden" id="answer-expected-five" value="{{$subquestion->expected_write_answer->five}}">
  <input type="hidden" id="answer-expected-six" value="{{$subquestion->expected_write_answer->six}}">
  @endif
</section>
<!-- <?php
$videos=session()->get('videos_sessions');
?> -->

<!-- <script src="http://code.jquery.com/jquery-3.4.1.js"></script> -->

<script>

  var first_choice = @json($subquestion -> first_choice);
  var second_choice = @json($subquestion -> second_choice);
  var third_choice = @json($subquestion -> third_choice);

  var image_a = @json($subquestion -> image_a);
  var image_b = @json($subquestion -> image_b);



  let complete_n_one = document.getElementById('answer-one');
  let complete_n_two = document.getElementById('answer-two');
  let complete_n_three = document.getElementById('answer-three');
  let complete_n_four = document.getElementById('answer-four');
  let complete_n_five = document.getElementById('answer-five');
  let complete_n_six = document.getElementById('answer-six');
  let complete_n_seven = document.getElementById('answer-seven');
  let complete_n_eight = document.getElementById('answer-eight');
  let complete_n_nine = document.getElementById('answer-nine');
  let complete_n_ten = document.getElementById('answer-ten');

  let complete_n_eleven = document.getElementById('answer-eleven');
  let complete_n_twelve = document.getElementById('answer-twelve');
  let complete_n_thirteen = document.getElementById('answer-thirteen');
  let complete_n_fourteen = document.getElementById('answer-fourteen');
  let complete_n_fifteen = document.getElementById('answer-fifteen');
  let complete_n_sixteen = document.getElementById('answer-sixteen');


  let complete_expected_one = document.getElementById('answer-expected-one');
  let complete_expected_two = document.getElementById('answer-expected-two');
  let complete_expected_three = document.getElementById('answer-expected-three');
  let complete_expected_four = document.getElementById('answer-expected-four');
  let complete_expected_five = document.getElementById('answer-expected-five');
  let complete_expected_six = document.getElementById('answer-expected-six');


  var answer_type = @json($subquestion -> answer_type);
  var is_multy = @json($subquestion -> is_multy);
  var is_complete = @json($subquestion -> is_complete);

  $('.loader-container').hide();
  $('.is_multy-hidden1').hide();
  $('.is_complete_hidden1').hide();
  $('.text-answer1').hide();
  $('.number-answer1').hide();
  $('.true-false1').hide();
  $('.complete-text-answer1').hide();
  $('.complete-write-answer1').hide();
  $('.title-hidden').hide();
  $('.answer-location').hide();
  $('.complete-number-answer1').hide();

  $('.image-answer1').hide();
  // $('.true-false-answer1').hide();
  $('.complete-answer1').hide();

  if (answer_type == 'multiple_choice') {
    $('.is_multy-hidden1').show();
    if (is_multy == 'text') {
      $('.text-answer1').show();

      $('#addanswer1').append(`@include('admin.subquestions.form-multiple-text-answer-edit',['first_choice' => '${first_choice}',
                              'second_choice' => '${second_choice}','third_choice' => '${third_choice}'
                            ])`);
    }
    if (is_multy == 'image') {

      $('.text-answer1').show();
      $('#addanswer1').append(`@include('admin.subquestions.form-multiple-image-answer-edit',['image_a' => '${image_a}','image_b' => '${image_b}'
                            ])`);
    }
  }
  if (answer_type == 'complete') {
    $('.is_complete_hidden1').show();


    if (is_complete == 'text') {
      $('.complete-text-answer1').show();
      $('#addanswer1').append(`@include('admin.subquestions.form-complete-text-answer-edit',[
                        'complete_n_one' => '${complete_n_one.value}',
                        'complete_n_two' => '${complete_n_two.value}',
                        'complete_n_three' => '${complete_n_three.value}',
                        'complete_n_four' => '${complete_n_four.value}',
                        'complete_n_five' => '${complete_n_five.value}',
                        'complete_n_six' => '${complete_n_six.value}',
                        'complete_n_seven' => '${complete_n_seven.value}',
                        'complete_n_eight' => '${complete_n_eight.value}',
                        'complete_n_nine' => '${complete_n_nine.value}',
                        'complete_n_ten' => '${complete_n_ten.value}',
                        'complete_n_eleven' => '${complete_n_eleven.value}',
                        'complete_n_twelve' => '${complete_n_twelve.value}',
                        'complete_n_thirteen' => '${complete_n_thirteen.value}',
                        'complete_n_fourteen' => '${complete_n_fourteen.value}',
                        'complete_n_fifteen' => '${complete_n_fifteen.value}',
                        'complete_n_sixteen' => '${complete_n_sixteen.value}'])`);
    }
    if (is_complete == 'number') {
      $('.complete-number-answer1').show();
      $('#addanswer1').append(`@include('admin.subquestions.form-complete-number-answer-edit',[
              'complete_n_one' => '${complete_n_one.value}','complete_n_two' => '${complete_n_two.value}'])`);
    }
    if (is_complete == 'write') {
      $('.title-hidden').show();
      $('.answer-location').show();
      $('.complete-write-answer1').show();
      $('#addanswer1').append(`@include('admin.subquestions.form-complete-write-answer-edit',[
                        'complete_expected_one' => '${complete_expected_one.value}',
                        'complete_expected_two' => '${complete_expected_two.value}',
                        'complete_expected_three' => '${complete_expected_three.value}',
                        'complete_expected_four' => '${complete_expected_four.value}',
                        'complete_expected_five' => '${complete_expected_five.value}',
                        'complete_expected_six' => '${complete_expected_six.value}'])`);
    }

  }
  if (answer_type == 'true_false') {
    $('.true-false1').show();
    $('#addanswer1').append(`@include('admin.subquestions.form-true-false-answer-edit', ['first_choice' => '${first_choice}', 'second_choice' => '${second_choice}'])`);
  }
  function answerType(answer_typeid, is_multy, is_complete, addanswer) {
    var answer_type = document.getElementById(answer_typeid);
    console.log(answer_type.value);
    console.log(is_complete);
    $('#' + addanswer).empty();
    if (answer_type.value == "multiple_choice") {
      $('.' + is_multy).show();
      $('.' + is_complete).hide();
    }
    if (answer_type.value == "true_false") {
      // $('#'+is_multy).empty();
      $('.' + is_multy).hide();
      $('.' + is_complete).hide();

      $('#' + addanswer).append(`@include('admin.subquestions.form-true-false-answer-edit', ['first_choice' => '${first_choice}', 'second_choice' => '${first_choice}'])`);
    }
    if (answer_type.value == "complete") {
      // $('#'+is_multy).empty();
      $('.' + is_multy).hide();
      $('.' + is_complete).show();

      // $('.'+complete_answer).show();
    }
  }
  function showTextImageAnswer(answer_typeid, addanswer) {
    var answer_val = document.getElementById(answer_typeid);
    console.log(answer_val.value);

    $('#' + addanswer).empty();
    if (answer_val.value == "text") {
      $('#' + addanswer).append(`@include('admin.subquestions.form-multiple-text-answer-edit',[
                  'first_choice' => '${first_choice}','second_choice' => '${second_choice}','third_choice' => '${third_choice}'
                            ])`);
    }
    if (answer_val.value == "image") {
      $('#' + addanswer).append(`@include('admin.subquestions.form-multiple-image-answer-edit',['image_a' => '${image_a}',
                              'image_b' => '${image_b}'
                            ])`);
    }
  }

  function showNumberTextAnswer(answer_typeid, addanswer) {
    var answer_val = document.getElementById(answer_typeid);
    console.log(answer_val.value);

    $('#' + addanswer).empty();
    if (answer_val.value == "number") {
      $('#addanswer1').append(`@include('admin.subquestions.form-complete-number-answer-edit',[
              'complete_n_one' => '${complete_n_one.value}','complete_n_two' => '${complete_n_two.value}'])`);
    }
    if (answer_val.value == "text") {
      $('#' + addanswer).append(`@include('admin.subquestions.form-complete-text-answer-edit',[
                        'complete_n_one' => '${complete_n_one.value}',
                        'complete_n_two' => '${complete_n_two.value}',
                        'complete_n_three' => '${complete_n_three.value}',
                        'complete_n_four' => '${complete_n_four.value}',
                        'complete_n_five' => '${complete_n_five.value}',
                        'complete_n_six' => '${complete_n_six.value}',
                        'complete_n_seven' => '${complete_n_seven.value}',
                        'complete_n_eight' => '${complete_n_eight.value}',
                        'complete_n_nine' => '${complete_n_nine.value}',
                        'complete_n_ten' => '${complete_n_ten.value}',

                        'complete_n_eleven' => '${complete_n_eleven.value}',
                        'complete_n_twelve' => '${complete_n_twelve.value}',
                        'complete_n_thirteen' => '${complete_n_thirteen.value}',
                        'complete_n_fourteen' => '${complete_n_fourteen.value}',
                        'complete_n_fifteen' => '${complete_n_fifteen.value}',
                        'complete_n_sixteen' => '${complete_n_sixteen.value}'])`);
    }

    if (answer_val.value == "write") {
      $('#' + addanswer).append(`@include('admin.subquestions.form-complete-write-answer-edit',[
           'complete_expected_one' => '${complete_expected_one.value}',
           'complete_expected_two' => '${complete_expected_two.value}',
           'complete_expected_three' => '${complete_expected_three.value}',
           'complete_expected_four' => '${complete_expected_four.value}',
           'complete_expected_five' => '${complete_expected_five.value}',
           'complete_expected_six' => '${complete_expected_six.value}'])`);
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
    if (!allowedExtensionsImage.exec(imageeid.value)) {
      imageeError.innerHTML = "  يجب أن يكون الأمتداد من نوع (.JPEG,.JPG,.PNG,.GIF,.TIF,.TIFF)   فقط";

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
      if (!allowedExtensions.exec(filePath)) {
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
      } else {
        fileId[i].value = null;
      }

      if (videotime[i].value == "") {
        $('#upload-error').empty();
        $('#upload-error').append(` <div class="bs-callout-pink callout-border-left mt-1 p-1 error-upload" >
      <strong></strong>
      <p>يرجى الإنتظار ثواني حتي يتم التحميل</p>
      </div>`);
        videotime[i].focus();
        return false;
      } else {
        fileId[i].value = null;
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





<!-- 
rwifheru fieruhfre frieuhfer reohfer
feorhfe rufheriuv sfvks nvwfrwd
vdsh ovsdhvfs
oiivfvf
vsfvf svsf
vsfv srfrwf
refe rfre -->