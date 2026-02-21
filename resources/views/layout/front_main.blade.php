<!DOCTYPE html>
<!-- <html lang="en"> -->




<html lang="{{str_replace('_','-', app()->getLocale())}}" 
dir="{{app()->getLocale() =='ar' ? 'rtl' :'ltr' }}">

<script src="https://accounts.google.com/gsi/client" async defer></script>
<!-- <script src="https://accounts.google.com/gsi/client" async></script> -->

<head>
	@include('layout.front_head')
	<!-- <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}"> -->
	<!-- <link href="{{ mix('css/app.css') }}" rel="stylesheet"> -->
	<style>
		/*  */
		/* body {
			-webkit-user-select: none;
			-moz-user-select: none;
			-ms-user-select: none;
			user-select: none;
		} */
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
	<!-- prettier-ignore -->


	<script id="messenger-widget-b" src="https://cdn.botpenguin.com/website-bot.js"defer>69491c482cd09804d72aa732, 69491abde2d15bcd0ce034b9</script>


	<script src="{{asset('front/bootstrap-4.0.0-dist/js/popper.min.js')}}"></script>
	<script src="{{asset('front/bootstrap-4.0.0-dist/js/jquery-3.6.3.min.js')}}"></script>
	<script src="{{asset('front/bootstrap-4.0.0-dist/js/bootstrap.js')}}"></script>
	<script src="{{asset('front/main.js')}}"></script>
	<!-- <script src="{{asset('js/app.js')}}"></script> -->
	<script src="{{ mix('js/app.js') }}" defer></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap-vue@2/dist/bootstrap-vue.min.js"></script>
</body>

</html>