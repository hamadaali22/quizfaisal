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
	myvalue1 = 50; /*** replace 1st test result percentage with the test result value (reading)*/
	myvalue2 = 70; /*** replace 1st test result percentage with the test result value (listening)*/
	myvalue3 = 80; /*** replace 2nd test result percentage with the test result value (reading)*/
	myvalue4 = 30;  /*** replace 2nd test result percentage with the test result value (listening)*/
	myvalue5 = 100; /*** replace 3rd test result percentage with the test result value (reading)*/
	myvalue6 = 10;  /*** replace 3rd test result percentage with the test result value (listening)*/
	var value = value;
function updateProgressBar1(progressBar, value) {
  value = Math.round(value);
  progressBar.querySelector(".progress__fill").style.width = `${value}%`;
  progressBar.querySelector(".progress__text").textContent = `${value}%`;

}
const myProgressBar = document.querySelector(".progress1");
const myProgressBar2 = document.querySelector(".progress2");
const myProgressBar3 = document.querySelector(".progress3");
const myProgressBar4 = document.querySelector(".progress4");
const myProgressBar5 = document.querySelector(".progress5");
const myProgressBar6 = document.querySelector(".progress6");
/* To update the bars value for testing */
	updateProgressBar1(myProgressBar , myvalue1);
	updateProgressBar1(myProgressBar2, myvalue2);
	updateProgressBar1(myProgressBar3, myvalue3);
	updateProgressBar1(myProgressBar4, myvalue4);
	updateProgressBar1(myProgressBar5, myvalue5);
	updateProgressBar1(myProgressBar6, myvalue6);
	/*****/
	
	
/* To update the pass & Fail Value ***/	

if (myvalue1 < 60){
	document.getElementById("demo1").innerHTML = "nicht bestanden";
	demo1.style.color = "red";
}
	else {
		document.getElementById("demo1").innerHTML = "bestanden";
		demo1.style.color = "green";
	}
	

if (myvalue2 < 60){
	document.getElementById("demo2").innerHTML = "nicht bestanden";
	demo2.style.color = "red";
}
	else {
		document.getElementById("demo2").innerHTML = "bestanden";
		demo2.style.color = "green";
	}

if (myvalue3 < 60){
	document.getElementById("demo3").innerHTML = "nicht bestanden";
	demo3.style.color = "red";
}
	else {
		document.getElementById("demo3").innerHTML = "bestanden";
		demo3.style.color = "green";
	}
	

if (myvalue4 < 60){
	document.getElementById("demo4").innerHTML = "nicht bestanden";
	demo4.style.color = "red";
}
	else {
		document.getElementById("demo4").innerHTML = "bestanden";
		demo4.style.color = "green";
	}
	

if (myvalue5 < 60){
	document.getElementById("demo5").innerHTML = "nicht bestanden";
	demo5.style.color = "red";
}
	else {
		document.getElementById("demo5").innerHTML = "bestanden";
		demo5.style.color = "green";
	}
	

if (myvalue6 < 60){
	document.getElementById("demo6").innerHTML = "nicht bestanden";
	demo6.style.color = "red";
}
	else {
		document.getElementById("demo6").innerHTML = "bestanden";
		demo6.style.color = "green";
	}
	
	

/************to update the date********/
	/** for testing***/
	mydate = '20/1/2024';
	mydate2 = '1/1/2024';
	mydate3 = '2/2/2024';
	/***************************/   
	
    var my2date = mydate;   /*replace mydate with the exam date*/
	var my2date2 = mydate2; /*replace mydate2 with the exam date*/
	var my2date3 = mydate3; /*replace mydate3 with the exam date*/
	document.getElementById("date1").textContent = my2date;
	document.getElementById("date2").textContent = my2date2;	
    document.getElementById("date3").textContent = my2date3;	
		</script>  


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









    <!-- <script type="text/javascript">
       $(document).bind("contextmenu",function(e){
       return false;
       });
    </script> -->
</body>
</html>
