
@extends('layout.admin_main')
@section('content')

@toastr_css
<style>
    .table th, .table td {
         padding: 0.75rem 1rem !important;
    }
</style>

    <div class="content-header row">
                    <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                      <h3 class="content-header-title mb-0 d-inline-block">subquestions </h3><br>
                      <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                          <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a>
                            </li>

                            <li class="breadcrumb-item active">subquestions
                            </li>
                          </ol>
                        </div>
                      </div>
                    </div>
                    <div class="content-header-right col-md-6 col-12">
                      <div class="dropdown float-md-right">
                           <a href="{{url('admin/subquestions',$id)}}"  class="btn btn-primary float-right mt-2"> Add subquestions </a>
                      </div>
                    </div>


                    @if(session()->has('message'))
                        @include('admin.includes.alerts.success')
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
                <div class="table-responsive">
                                    <table class="table table-striped table-bordered keytable-integration">
                                        <thead>
                            <tr>
                                <th>#</th>
                                <th>exam </th>
                                <th>title </th>
                                <th>answer_type </th>
                                <!-- <th>expected answer </th> -->
                                <th>first choice </th>
                                <th>second choice </th>
                                <th>third choice </th>
                                <th>image A </th>
                                <th>image B</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subquestions as $_item)
                            <tr>
                                <td>
                                    {{ $_item->id }}
                                </td>
                                <td>
                                    {{ $_item->exam->name }}
                                </td>
                                <td>
                                    {{ $_item->title }}
                                </td>


                                <td>
                                    {{ $_item->answer_type }} -{{ $_item->is_multy }}
                                </td>
                                <!-- <td>
                                    {{ $_item->expected_answer }}
                                </td>  -->
                                <td>
                                    {{ $_item->first_choice }}
                                </td>
                                <td>
                                    {{ $_item->second_choice }}
                                </td>
                                <td>
                                    @if($_item->answer_type =="multiple_choice")
                                      {{ $_item->third_choice }}
                                    @endif
                                </td>

                                <td>
                                    @if($_item->image_a)
                                    <img class="avatar-img" src="{{asset('img/answer-image/'.$_item->image_a) }}" width="50px">
                                     @endif
                                </td>
                                <td>
                                    @if($_item->image_b)
                                    <img class="avatar-img" src="{{asset('img/answer-image/'.$_item->image_b) }}" width="50px">
                                    @endif
                                </td>

                                <td class="text-center col-sm-3">
                                    <div class="actions">
                                        <a href="{{route('subquestions.edit',$_item->id)}}" class="edit-course" >
                                              <button type="button" class="btn btn-outline-success "><i class="la la-edit"></i></button>
                                              <span class="editcourse"> edit</span>
                                        </a>
                                        <a  data-toggle="modal" data-catid="{{ $_item->id }}" data-target="#delete" class="delete-course">
                                           <button type="button" class=" btn btn-outline-warning"><i class="la la-trash-o"></i></button>
                                           <span class="deletecourse">delete</span>
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


            <div class="modal fade" id="delete" aria-hidden="true" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document" >
                                                        <div class="modal-content">

                                                            <div class="modal-body">
                                                                <div class="form-content p-2">
                                                                    <h4 class="modal-title"></h4>
                                                                    <p class="mb-4">هل انت متأكد من حذف هذا العنصر</p>
                                                                    <div class="row text-center">
                                                                        <div class="col-sm-3">
                                                                        </div>
                                                                        <div class="col-sm-2">
                                                                            <form method="post" action="{{route('subquestions.destroy','test')}}">
                                                                                 @csrf
                                                                                 @method('delete')
                                                                                 <input type="hidden" name="id" id="cat_id">
                                                                                <button type="submit" class="btn btn-primary">حذف </button>
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




<style>
    .add-video {
      position: relative;
      display: inline-block;
    }

    .add-video .addvideo {
      visibility: hidden;
      width: 76px;
      font-size: 10px;
      background-color: black;
      color: #fff;
      text-align: center;
      border-radius: 6px;
      padding: 5px 0;

      position: absolute;
      z-index: 1;
      bottom: 100%;
      left: 50%;
      margin-left: -35px;
    }

    .add-video:hover .addvideo {
      visibility: visible;
    }
    /*//////////////*/

    .all-video {
      position: relative;
      display: inline-block;
    }

    .all-video .allvideo {
      visibility: hidden;
      width: 75px;
      font-size: 10px;
      background-color: black;
      color: #fff;
      text-align: center;
      border-radius: 6px;
      padding: 5px 0;

      position: absolute;
      z-index: 1;
      bottom: 100%;
      left: 50%;
      margin-left: -35px;
    }

    .all-video:hover .allvideo {
      visibility: visible;
    }

    /*//////////////*/

    .edit-course {
      position: relative;
      display: inline-block;
    }

    .edit-course .editcourse {
      visibility: hidden;
      width: 75px;
      font-size: 10px;
      background-color: black;
      color: #fff;
      text-align: center;
      border-radius: 6px;
      padding: 5px 0;

      position: absolute;
      z-index: 1;
      bottom: 100%;
      left: 50%;
      margin-left: -35px;
    }

    .edit-course:hover .editcourse {
      visibility: visible;
    }

    /*//////////////*/

    .delete-course {
      position: relative;
      display: inline-block;
    }

    .delete-course .deletecourse {
      visibility: hidden;
      width: 75px;
      font-size: 10px;
      background-color: black;
      color: #fff;
      text-align: center;
      border-radius: 6px;
      padding: 5px 0;

      position: absolute;
      z-index: 1;
      bottom: 100%;
      left: 50%;
      margin-left: -35px;
    }

    .delete-course:hover .deletecourse {
      visibility: visible;
    }
</style>

<script>

    $('#delete').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var cat_id = button.data('catid')
        var modal = $(this)
        modal.find('.modal-body #cat_id').val(cat_id);
    })
</script>
    @toastr_js
    @toastr_render
@endsection
