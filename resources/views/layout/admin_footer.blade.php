  <footer class="footer footer-static footer-light navbar-border navbar-shadow">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
      <span class="float-md-left d-block d-md-inline-block">Copyright &copy; 2023 <a class="text-bold-800 grey darken-2" href="https://elnamat.com/poems/roaya/"
        target="_blank">Deutschprüfungen </a>, All rights reserved. </span>
      <span class="float-md-right d-block d-md-inline-blockd-none d-lg-block">Hand-crafted & Made with <i class="ft-heart pink"></i></span>
    </p>
  </footer>

    @if(Route::is(['admin.dashboard']))
        <script src="{{asset('admin/js/scripts/pages/dashboard-crypto.js')}}" type="text/javascript"></script>
    @endif

    @if(Route::is(['admin-login','register']))
      <script src="{{asset('admin/vendors/js/forms/icheck/icheck.min.js')}}"></script>
      <script src="{{asset('admin/vendors/js/forms/validation/jqBootstrapValidation.js')}}"></script>
      <script src="{{asset('admin/js/scripts/forms/form-login-register.js')}}"></script>
    @endif

    <script src="{{asset('admin/vendors/js/vendors.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/vendors/js/tables/datatable/dataTables.autoFill.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/vendors/js/tables/datatable/dataTables.colReorder.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/vendors/js/tables/datatable/dataTables.fixedColumns.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/vendors/js/tables/datatable/dataTables.select.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/js/core/app-menu.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/js/core/app.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/js/scripts/customizer.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/js/scripts/tables/datatables-extensions/datatable-autofill.js')}}" type="text/javascript"></script>

    <!--for error-->

    <!---->
 <script src="{{asset('admin/vendors/js/forms/select/select2.full.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('admin/js/scripts/forms/select/form-select2.js')}}" type="text/javascript"></script>



  <!-- start //  من اجل ترتيب الفيديوهات فقط -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.js"></script>
  <!-- end // من اجل ترتيب الفيديوهات فقط-->
  <script src="{{asset('admin/vendors/js/tables/datatable/datatables.min.js')}}" type="text/javascript"></script>
