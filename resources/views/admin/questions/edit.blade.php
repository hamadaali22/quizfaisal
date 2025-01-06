@extends('layout.admin_main')
@section('content')

<script src="{{asset('admin/vendors/js/editors/ckeditor/ckeditor.js')}}" type="text/javascript"></script>
<script src="  {{asset('admin/js/scripts/editors/editor-ckeditor.js')}}" type="text/javascript"></script>

<div class="content-header row">
  <div class="content-header-left col-md-12 col-12 mb-2 breadcrumb-new">
    <h3 class="content-header-title mb-0 d-inline-block">Edit Questions </h3><br>
    <div class="row breadcrumbs-top d-inline-block">
      <div class="breadcrumb-wrapper col-12">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a>
          </li>
          <li class="breadcrumb-item active">Edit Questions
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

            <form method="post" action="{{route('questions.update',$question->id)}}" enctype="multipart/form-data">
              @csrf
              @method('put')
              <div class="row form-row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>select Exam</label>
                    <select name="exam_id" required class="form-control formselect">
                      <option disabled>Select</option>
                      @foreach ($exams as $_item)

                      <option value="{{$_item->id}}" {{ $question->exam_id == $_item->id ? "selected" : ""
                        }}>{{$_item->name}}
                      </option>
                      @endforeach
                    </select>
                    @error('exam_id')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    <span id="categoryError" style="color: red;"></span>
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-6">
                  <label> Select Question Type </label>
                  <select name="type" class="form-control formselect" id="typeid">
                    <option value="" selected>Select</option>
                    <option value="listening" {{ $question->type == 'listening' ? "selected" : "" }}>listening</option>
                    <option value="listening and image" {{ $question->type == 'listening and image' ? "selected" : ""
                      }}>listening and image</option>
                    <option value="reading" {{ $question->type == 'reading' ? "selected" : "" }}>reading</option>
                    <option value="image" {{ $question->type == 'image' ? "selected" : "" }}>image</option>
                    <option value="sub" {{ $question->type == 'sub' ? "selected" : "" }}>sub</option>
                  </select>
                  <span id="typeError" style="color: red;"></span>
                </div>
                <div class="form-group col-md-12 col-sm-6 file-hidden">
                  <audio controls class="align-items-center w-50">
                    <source src="{{asset('img/questions-file/'.$question->file) }}" type="audio/ogg">
                    <source src="{{asset('img/questions-file/'.$question->file) }}" type="audio/mpeg">
                    Your browser does not support the audio element.
                  </audio>
                  <label>Select an Audio File</label>
                  <input type="file" name="file" id="fileid" class="form-control" accept=".mp3">
                  @error('imagee')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                  <span id="imageeError" style="color: red;"></span>
                </div>
                <div class="form-group col-md-12 col-sm-6 image-hidden">
                  <img class="avatar-img" src="{{asset('img/questions-image/'.$question->image) }}" width="90px">
                  <label>Select Image </label>
                  <input type="file" name="image" id="imageeid" class="form-control" accept=".JPEG,.JPG,.TIF,.TIFF">
                  @error('image')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                  <span id="imageeError" style="color: red;"></span>
                </div>
                <div class="form-group col-md-12 col-sm-6 paragraph-hidden">
                  <label>Paragraph DE</label>
                  <textarea name="paragraph" cols="20" rows="1" class="form-control ckeditor"
                    id='paragraphid'>{{$question->paragraph}}</textarea>
                  @error('paragraph')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                  <span id="short_detailError" style="color: red;"></span>
                </div>
                <div class="form-group col-md-12 col-sm-6 paragraph-hidden">
                  <label>Paragraph AR</label>
                  <textarea name="paragraph_ar" cols="20" rows="1" class="form-control ckeditor"
                    id='paragraphid'>{{$question->paragraph_ar}}</textarea>
                  @error('paragraph')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                  <span id="short_detailError" style="color: red;"></span>
                </div>
                <div class="form-group col-md-12 col-sm-6 paragraph-hidden">
                  <label>Paragraph EN</label>
                  <textarea name="paragraph_en" cols="20" rows="1" class="form-control ckeditor"
                    id='paragraphid'>{{$question->paragraph_en}}</textarea>
                  @error('paragraph')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                  <span id="short_detailError" style="color: red;"></span>
                </div>
                <div class="form-group col-md-12 col-sm-6 paragraph-hidden">
                  <label>Paragraph FR</label>
                  <textarea name="paragraph_fr" cols="20" rows="1" class="form-control ckeditor"
                    id='paragraphid'>{{$question->paragraph_fr}}</textarea>
                  @error('paragraph')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                  <span id="short_detailError" style="color: red;"></span>
                </div>
                <div class="form-group col-md-12 col-sm-6 paragraph-hidden">
                  <label>Paragraph ES</label>
                  <textarea name="paragraph_es" cols="20" rows="1" class="form-control ckeditor"
                    id='paragraphid'>{{$question->paragraph_es}}</textarea>
                  @error('paragraph')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                  <span id="short_detailError" style="color: red;"></span>
                </div>
                <div class="form-group col-md-12 col-sm-6 ">
                  <label>Question Bio DE </label>
                  <textarea name="bio" cols="20" rows="1" class="form-control ckeditor"
                    id='bioId'>{{$question->bio}}</textarea>
                  @error('bio')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                  <span id="bioError" style="color: red;"></span>
                </div>
                <div class="form-group col-md-12 col-sm-6 ">
                  <label>Question Bio Ar</label>
                  <textarea name="bio_ar" cols="20" rows="1" class="form-control ckeditor"
                    id='bioId'>{{$question->bio_ar}}</textarea>
                  @error('bio')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                  <span id="bioError" style="color: red;"></span>
                </div>
                <div class="form-group col-md-12 col-sm-6 ">
                  <label>Question Bio EN </label>
                  <textarea name="bio_en" cols="20" rows="1" class="form-control ckeditor"
                    id='bioId'>{{$question->bio_en}}</textarea>
                  @error('bio')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                  <span id="bioError" style="color: red;"></span>
                </div>
                <div class="form-group col-md-12 col-sm-6 ">
                  <label>Question Bio FR </label>
                  <textarea name="bio_fr" cols="20" rows="1" class="form-control ckeditor"
                    id='bioId'>{{$question->bio_fr}}</textarea>
                  @error('bio')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                  <span id="bioError" style="color: red;"></span>
                </div>
                <div class="form-group col-md-12 col-sm-6 ">
                  <label>Question Bio ES </label>
                  <textarea name="bio_es" cols="20" rows="1" class="form-control ckeditor"
                    id='bioId'>{{$question->bio_es}}</textarea>
                  @error('bio')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                  <span id="bioError" style="color: red;"></span>
                </div>


              </div>
              <div class="col-md-12">
                <hr />
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
</section>
<?php
$videos=session()->get('videos_sessions');
?>

<!-- <script src="http://code.jquery.com/jquery-3.4.1.js"></script> -->




<script>
  var q_type =<? php echo json_encode($question -> type) ?>;
  console.log(q_type);
  if (q_type == 'listening') {
    $('.file-hidden').show();
  } else {
    $('.file-hidden').hide();
  }
  if (q_type == 'image') {
    $('.image-hidden').show();
  } else {
    $('.image-hidden').hide();
  }
  if (q_type == 'reading') {
    $('.paragraph-hidden').show();
  } else {
    $('.paragraph-hidden').hide();
  }
  if (q_type === 'listening and image') {
    $('.file-hidden').show();
    $('.image-hidden').show();
  } else {
    // $('.file-hidden').hide();
    // $('.image-hidden').hide();
  }
  // if(q_type =='listening and image'){
  //     $('.file-hidden').show();
  //     $('.image-hidden').show();
  // }else{
  //     $('.file-hidden').hide();
  //     $('.image-hidden').hide();
  // }

  // $('.file-hidden').hide();
  // $('.paragraph-hidden').hide();
  // $('.image-hidden').hide();

  $('.loader-container').hide();


  $('.is_multy-hidden1').hide();
  $('.is_complete_hidden1').hide();

  $('.text-answer1').hide();
  $('.image-answer1').hide();
  // $('.true-false-answer1').hide();
  $('.complete-answer1').hide();


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
      $('#' + addanswer).append(`@include('admin.questions.form-true-false-answer')`);
      // $('.'+true_false).show();
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
      $('#' + addanswer).append(`@include('admin.questions.form-multiple-text-answer')`);
    }
    if (answer_val.value == "image") {
      $('#' + addanswer).append(`@include('admin.questions.form-multiple-image-answer')`);
    }
  }

  function showNumberTextAnswer(answer_typeid, addanswer) {
    var answer_val = document.getElementById(answer_typeid);
    console.log(answer_val.value);

    $('#' + addanswer).empty();
    if (answer_val.value == "number") {
      $('#' + addanswer).append(`@include('admin.questions.form-complete-text-answer')`);
    }
    if (answer_val.value == "text") {
      $('#' + addanswer).append(`@include('admin.questions.form-complete-number-answer')`);
    }
  }






  $(document).ready(function () {
    $('#typeid').on('change', function () {
      console.log("welcome sub");
      let id = $(this).val();
      console.log(id);

      if (id == "listening") {
        $('.file-hidden').show();
        $('.paragraph-hidden').hide();
        $('.image-hidden').hide();
      }
      if (id == "reading") {
        $('.paragraph-hidden').show();
        $('.file-hidden').hide();
        $('.image-hidden').hide();
      }
      if (id == "image") {
        $('.image-hidden').show();
        $('.file-hidden').hide();
        $('.paragraph-hidden').hide();
      }

      if (id == "listening and image") {
        $('.file-hidden').show();
        $('.paragraph-hidden').hide();
        $('.image-hidden').show();
      }
      if (id == "sub") {
        $('.file-hidden').hide();
        $('.paragraph-hidden').hide();
        $('.image-hidden').hide();
      }

    });
    // $('#answerTypeId').on('change', function () {
    //     let id = $(this).val();

    //     if( id == "multiple_choice"){
    //         $('.is_multy-hidden').show();

    //     }
    // });

  });
</script>
<script>
  $('.loader-container').hide();
  let videoid = 1;
  $('.hidden1').hide();

  /// remove video from list and session


</script>
@endsection