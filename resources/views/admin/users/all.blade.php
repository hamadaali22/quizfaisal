@extends('layout.admin_main')
@section('content')

<div class="content-header row">
  <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
    <h3 class="content-header-title mb-0 d-inline-block">users</h3><br>
    <div class="row breadcrumbs-top d-inline-block">
      <div class="breadcrumb-wrapper col-12">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a>
          </li>

          <li class="breadcrumb-item active">users
          </li>
        </ol>
      </div>
    </div>
  </div>
  <div class="content-header-right col-md-6 col-12">
    <div class="dropdown float-md-right">
      @can('اضافة مستخدم')
      <a class="btn btn-primary float-right " href="{{ route('users.create') }}">اضافة مستخدم</a>
      @endcan
    </div>
  </div>
  @if (session('success'))
  <div class="alert alert-success">
    {{ session('success') }}
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
            <!--<p class="card-text">If you are looking to emulate the UI of spreadsheet programs-->
            <!--  such as Excel with DataTables, the combination of KeyTable-->
            <!--  and AutoFill will take you a long way there!</p>-->
            <table class="table table-striped table-bordered keytable-integration">

              <thead>
                <tr>
                  <th class="wd-10p border-bottom-0">#</th>
                  <th class="wd-15p border-bottom-0">اسم المستخدم</th>
                  <th class="wd-20p border-bottom-0">البريد الالكتروني</th>

                  <th class="wd-10p border-bottom-0">الامتحانات</th>
                  <th class="wd-10p border-bottom-0">العمليات</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data as $key => $user)
                @if($user->email !="admin@admin.com" && $user->email != "Jordandeutschlehrer@gmail.com" )
                <tr>
                  <td>{{$key}}</td>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->email }}</td>

                  <td class="text-center col-md-2">
                    <div class="actions">
                      <!-- <i class="la la-users"></i> -->
                      <a href="{{url('admin/exam/goethe/'.$user->id)}}">
                        <button type="button" class="btn btn-outline-success ">Goethe</button>
                      </a>
                      <a href="{{url('admin/exam/telc/'.$user->id)}}">
                        <button type="button" class="btn btn-outline-success ">Telc</button>
                      </a>
                    </div>
                  </td>
                  <td class="text-center col-md-2">
                    <div class="actions">
                      @can('تعديل مستخدم')
                      <a href="{{ route('users.edit', $user->id) }}" class="edit-course">
                        <button type="button" class="btn btn-outline-success "><i class="la la-edit"></i></button>
                      </a>
                      @endcan
                      @can('حذف مستخدم')
                      <a data-toggle="modal" data-user_id="{{ $user->id }}" data-target="#delete" class="delete-course">
                        <button type="button" class=" btn btn-outline-warning"><i class="la la-trash-o"></i></button>
                      </a>
                      @endcan
                    </div>
                  </td>
                  <!-- <td>
                                        @can('تعديل مستخدم')
                                            <a href="{{ route('users.edit', $user->id) }}"  class="btn btn-sm bg-success-light"  >
                                                <i class="fe fe-pencil"></i> تعديل
                                            </a>
                                        @endcan
                                        @can('حذف مستخدم')
                                        <a class="btn btn-sm bg-danger-light" data-effect="effect-scale"
                                                                        data-user_id="{{ $user->id }}" data-username="{{ $user->name }}"
                                                                        data-toggle="modal" href="#delete" title="حذف">
                                                                        <i class="fe fe-trash"></i> حذف
                                        </a>
                                        @endcan
                                    </td> -->
                </tr>
                @endif
                @endforeach
              </tbody>

            </table>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="modal fade" id="delete" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">

        <div class="modal-body">
          <div class="form-content p-2">
            <h4 class="modal-title">حذف</h4>
            <p class="mb-4">هل متأكد من الحذف ؟</p>
            <div class="row text-center">
              <div class="col-sm-3">
              </div>
              <div class="col-sm-2">
                <form method="post" action="{{route('users.destroy','test')}}">
                  @csrf
                  @method('delete')
                  <input type="hidden" name="user_id" id="user_id">
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
<script src="{{asset('js/app.js')}}"></script>
<script>

  $('#delete').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget)

    var user_id = button.data('user_id')
    var modal = $(this)

    modal.find('.modal-body #user_id').val(user_id);
  })


</script>






@endsection