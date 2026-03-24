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
    @foreach ($meta_pages as $_item)
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-content collapse show">
                    <div class="card-body card-dashboard">

                        <div class="card-body">
                            <h3 class="content-header-title mb-0 d-inline-block">{{$_item->type}} page meta</h3>
                            <hr><br><br>
                            <form action="{{url('admin/meta-pages-update')}}" method="POST" name="le_form"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="type" value="{{$_item->type}}">
                                <div class="row g-3">
                                    <div class="col">
                                        <label class="form-label">title de</label>
                                        <input type="text" name="title_de" class="form-control"
                                            value="{{$_item->title_de}}">
                                    </div>

                                    <div class="col">
                                        <label class="form-label">title ar</label>
                                        <input type="text" name="title_ar" class="form-control"
                                            value="{{$_item->title_ar}}">
                                    </div>

                                    <div class="col">
                                        <label class="form-label">title en</label>
                                        <input type="text" name="title_en" class="form-control"
                                            value="{{$_item->title_en}}">
                                    </div>

                                    <div class="col">
                                        <label class="form-label">title fr</label>
                                        <input type="text" name="title_fr" class="form-control"
                                            value="{{$_item->title_fr}}">
                                    </div>

                                    <div class="col">
                                        <label class="form-label">title es</label>
                                        <input type="text" name="title_es" class="form-control"
                                            value="{{$_item->title_es}}">
                                    </div>
                                </div>
                                <div class="row g-3 pt-3">
                                    <div class="col">
                                        <label class="form-label">keyword de</label>
                                        <input type="text" name="keyword_de" class="form-control"
                                            value="{{$_item->keyword_de}}">
                                    </div>

                                    <div class="col">
                                        <label class="form-label">keyword ar</label>
                                        <input type="text" name="keyword_ar" class="form-control"
                                            value="{{$_item->keyword_ar}}">
                                    </div>

                                    <div class="col">
                                        <label class="form-label">keyword en</label>
                                        <input type="text" name="keyword_en" class="form-control"
                                            value="{{$_item->keyword_en}}">
                                    </div>

                                    <div class="col">
                                        <label class="form-label">keyword fr</label>
                                        <input type="text" name="keyword_fr" class="form-control"
                                            value="{{$_item->keyword_fr}}">
                                    </div>

                                    <div class="col">
                                        <label class="form-label">keyword es</label>
                                        <input type="text" name="keyword_es" class="form-control"
                                            value="{{$_item->keyword_es}}">
                                    </div>
                                </div>
                                <div class="row g-3 pt-3">
                                    <div class="col">
                                        <label class="form-label">desc de</label>
                                        <textarea name="desc_de" cols="7" rows="3"
                                            class="form-control ">{{$_item->desc_de}}</textarea>
                                    </div>

                                    <div class="col">
                                        <label class="form-label">desc ar</label>
                                        <textarea name="desc_ar" cols="7" rows="3"
                                            class="form-control ">{{$_item->desc_ar}}</textarea>
                                    </div>

                                    <div class="col">
                                        <label class="form-label">desc en</label>
                                        <textarea name="desc_en" cols="7" rows="3"
                                            class="form-control ">{{$_item->desc_en}}</textarea>
                                    </div>
                                </div>
                                <div class="row g-3 pt-3">
                                    <div class="col">
                                        <label class="form-label">desc fr</label>
                                        <textarea name="desc_fr" cols="7" rows="3"
                                            class="form-control ">{{$_item->desc_fr}}</textarea>
                                    </div>

                                    <div class="col">
                                        <label class="form-label">desc es</label>
                                        <textarea name="desc_es" cols="7" rows="3"
                                            class="form-control ">{{$_item->desc_es}}</textarea>
                                    </div>
                                </div><br>
                                <button type="submit" class="btn btn-primary ">Save </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</section>


@endsection