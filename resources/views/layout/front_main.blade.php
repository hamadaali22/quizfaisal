<!DOCTYPE html>
<html lang="en">
<head>
  @include('layout.front_head')
  <!-- <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}"> -->
  <style>
     body {
     -webkit-user-select: none;
     -moz-user-select: none;
     -ms-user-select: none;
     user-select: none;
     }
  </style>




</head>
<body>
   <div id="app">
    <header>
          @include('layout.front_header')
    </header>
    @yield('content')
    @include('layout.front_footer')

    </div>

    <script src="{{asset('front/bootstrap-4.0.0-dist/js/popper.min.js')}}"></script>
    <script src="{{asset('front/bootstrap-4.0.0-dist/js/jquery-3.6.3.min.js')}}"></script>
    <script src="{{asset('front/bootstrap-4.0.0-dist/js/bootstrap.js')}}"></script>
    <script src="{{asset('front/main.js')}}"></script>

    <script src="{{asset('js/app.js')}}"></script>

    <script type="text/javascript">
       $(document).bind("contextmenu",function(e){
       return false;
       });
    </script>
</body>
</html>
