@extends('layout.admin_main')
@section('content')
<script src="{{asset('admin/vendors/js/editors/ckeditor/ckeditor.js')}}" type="text/javascript"></script>
<script src="  {{asset('admin/js/scripts/editors/editor-ckeditor.js')}}" type="text/javascript"></script>
<div class="content-header row">
  <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
    <h3 class="content-header-title mb-0 d-inline-block"> المستوى</h3><br>
    <div class="row breadcrumbs-top d-inline-block">
      <div class="breadcrumb-wrapper col-6">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">الرئيسية</a>
          </li>
          <li class="breadcrumb-item active">المستويات
          </li>
        </ol>
      </div>
      @if(session()->has('message'))
      @include('admin.includes.alerts.success')
      @endif

    </div>
  </div>

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
            <form  method="post" action=" {{route('levels.update',$level->id)}}" enctype="multipart/form-data">
              @csrf
              @method('put')
              <div class="row form-row">
                <input type="hidden" name="id" value="{{$level->id}}" >
                <!-- <div class="col-12 col-sm-6">
                <div class="form-group">
                <label>التخصص عربي </label>
                <input type="text" name="name_ar" class="form-control" value="{{$level->title}}" >
              </div>
            </div> -->

            <div class="col-12 col-sm-12">
              <div class="form-group">
                <label>Level Name </label>
                <input type="text" name="name" class="form-control" id="name" value="{{$level->name}}">
              </div>
            </div>
            <div class="col-12 col-sm-12">
              <div class="form-group">
                <label>Level telc Name </label>
                <input type="text" name="name2" class="form-control" id="name2" value="{{$level->name2}}">
              </div>
            </div>
            <div class="col-12 col-sm-12">
              <div class="form-group">
                <label>Level quize Name </label>
                <input type="text" name="name3" class="form-control" id="name2" value="{{$level->name3}}">
              </div>
            </div>
            <div class="form-group col-md-12 col-sm-6 paragraph-hidden">
              <label>description</label>
              <textarea name="description"  cols="20" rows="2"  class="form-control ckeditor" id='descriptionId'>{{$level->description}}</textarea>
            </div>

            <div class="form-group col-md-12 col-sm-6 paragraph-hidden">
              <label>description telc</label>
              <textarea name="description_telc"  cols="20" rows="2"   class="form-control ckeditor" id='descriptionId' >{{$level->description_telc}}</textarea>
            </div>
            


            <div class="col-12 col-sm-3">
              <div class="form-group">
                <label>goethe 1 </label>
                <img class="avatar-img" src="{{asset('img/goethe/'.$level->goethe1) }}" height=" 63px"width=" 60px">
                <input type="file" name="goethe1" class="form-control" id="name2" value="{{$level->goethe1}}">
              </div>
            </div>
            <div class="col-12 col-sm-2">
              <div class="form-group">
                <label>goethe 2 </label>
                <img class="avatar-img" src="{{asset('img/goethe/'.$level->goethe2) }}" height=" 63px" width=" 60px" >
                <input type="file" name="goethe2" class="form-control" id="name2" value="{{$level->goethe2}}">
              </div>
            </div>
            <div class="col-12 col-sm-2">
              <div class="form-group">
                <label>goethe 3</label>
                <img class="avatar-img" src="{{asset('img/goethe/'.$level->goethe3) }}" height=" 63px" width=" 60px">
                <input type="file" name="goethe3" class="form-control" id="name2" value="{{$level->goethe3}}">
              </div>
            </div>
            <div class="col-12 col-sm-2">
              <div class="form-group">
                <label>goethe 4 </label>
                <img class="avatar-img" src="{{asset('img/goethe/'.$level->goethe4) }}" height=" 63px" width=" 60px">
                <input type="file" name="goethe4" class="form-control" id="name2" value="{{$level->goethe4}}">
              </div>
            </div>
            <div class="col-12 col-sm-2">
              <div class="form-group">
                <label>goethe 5 </label>
                <img class="avatar-img" src="{{asset('img/goethe/'.$level->goethe5) }}" height=" 63px" width=" 60px"">
                <input type="file" name="goethe5" class="form-control" id="name2" value="{{$level->goethe5}}">
              </div>
            </div>

            <!-- telc -->
            <div class="col-12 col-sm-3">
              <div class="form-group">
                <label>telc 1 </label>
                <img class="avatar-img" src="{{asset('img/telc/'.$level->telc1) }}" height=" 63px" width=" 60px">
                <input type="file" name="telc1" class="form-control" id="name2" value="{{$level->telc1}}">
              </div>
            </div>
            <div class="col-12 col-sm-2">
              <div class="form-group">
                <label>telc 2 </label>
                <img class="avatar-img" src="{{asset('img/telc/'.$level->telc2) }}" height=" 63px" width=" 60px">
                <input type="file" name="telc2" class="form-control" id="name2" value="{{$level->telc2}}">
              </div>
            </div>
            <div class="col-12 col-sm-2">
              <div class="form-group">
                <label>telc 3</label>
                <img class="avatar-img" src="{{asset('img/telc/'.$level->telc3) }}" height=" 63px" width=" 60px">
                <input type="file" name="telc3" class="form-control" id="name2" value="{{$level->telc3}}">
              </div>
            </div>
            <div class="col-12 col-sm-2">
              <div class="form-group">
                <label>telc 4 </label>
                <img class="avatar-img" src="{{asset('img/telc/'.$level->telc4) }}" height=" 63px" width=" 60px">
                <input type="file" name="telc4" class="form-control" id="name2" value="{{$level->telc4}}">
              </div>
            </div>
            <div class="col-12 col-sm-2">
              <div class="form-group">
                <label>telc 5 </label>
                <img class="avatar-img" src="{{asset('img/telc/'.$level->telc5) }}" height=" 63px" width=" 60px">
                <input type="file" name="telc5" class="form-control" id="name2" value="{{$level->telc5}}">
              </div>
            </div>
            



          </div>
          <br/><br/>
          <button type="submit" class="btn btn-primary btn-block">حفظ التغيير</button>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
</section>

@endsection
