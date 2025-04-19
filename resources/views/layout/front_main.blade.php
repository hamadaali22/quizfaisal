<!DOCTYPE html>
<html lang="en">
<script src="https://accounts.google.com/gsi/client" async defer></script>
<script src="https://accounts.google.com/gsi/client" async></script>

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





	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script> -->

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="{{asset('front/Animation/js/bootstrap.js')}}"></script>
	<!-- Slick Slider -->
	<script type="text/javascript" src="{{asset('front/Animation/js/slick.js')}}"></script>
	<!-- mixit slider -->
	<script type="text/javascript" src="{{asset('front/Animation/js/jquery.mixitup.js')}}"></script>
	<!-- Add fancyBox -->
	<script type="text/javascript" src="{{asset('front/Animation/js/jquery.fancybox.pack.js')}}"></script>
	<!-- counter -->
	<script src="{{asset('front/Animation/js/waypoints.js')}}"></script>
	<script src="{{asset('front/Animation/js/jquery.counterup.js')}}"></script>
	<!-- Wow animation -->
	<script type="text/javascript" src="{{asset('front/Animation/js/wow.js')}}"></script>
	<!-- progress bar   -->
	<script type="text/javascript" src="{{asset('front/Animation/js/bootstrap-progressbar.js')}}"></script>
	<!-- Custom js -->
	<script type="text/javascript" src="{{asset('front/Animation/js/custom.js')}}"></script>


	<script src="https://cdn.jsdelivr.net/npm/bootstrap-vue@2/dist/bootstrap-vue.min.js"></script>

	<!-- <script type="text/javascript" src="{{asset('front/Animation/js/Radial.js')}} "></script> -->






	<!-- <script type="text/javascript">
       $(document).bind("contextmenu",function(e){
       return false;
       });
    </script> -->
</body>

</html>