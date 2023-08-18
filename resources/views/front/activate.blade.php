<!DOCTYPE html>
<html lang="en">
<head>
  @include('layout.front_head')
</head>
<body>
   	<div id="app">
	    <header>

	    </header>
    </div>
    <br>
    <br>
    <center>
    @if (session('message'))
	    <div class="container card text-center w-50">
		  	<!-- <h5 class="card-header">activation</h5> -->
			<div class="card-body">
			    <!-- <h5 class="card-title">Special title treatment</h5> -->
			    <!-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> -->
			    <div class="alert alert-success">
					{{ session('message') }}
				</div>
			    <a href="/public/login" class="btn btn-primary" style="background-color: #3e83b3 !important;
    border-color: #3e83b3 !important; ">Gehen Sie zum Anmelden</a>
			</div>
		</div>
	@endif
	@if(Session::has('Warning'))
	    <div class="container card text-center w-50">
		  	<h5 class="card-header">activation</h5>
			<div class="card-body">
			    <!-- <h5 class="card-title">Special title treatment</h5> -->
			    <!-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> -->
			    <button type="text" class="btn btn-lg btn-block btn-outline-danger mb-2"
		                    id="type-error">{{Session::get('Warning')}}
		            </button>
			    <a href="/public/login" class="btn btn-primary" style="background-color: #3e83b3 !important;
    border-color: #3e83b3 !important; ">Gehen Sie zum Anmelden</a>
			</div>
		</div>
	@endif
	</center>


    <script src="{{asset('front/bootstrap-4.0.0-dist/js/popper.min.js')}}"></script>
    <script src="{{asset('front/bootstrap-4.0.0-dist/js/jquery-3.6.3.min.js')}}"></script>
    <script src="{{asset('front/bootstrap-4.0.0-dist/js/bootstrap.js')}}"></script>
    <script src="{{asset('front/main.js')}}"></script>

    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>
