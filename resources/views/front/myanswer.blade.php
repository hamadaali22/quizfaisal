
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Deutschtests | Fortschrittsbericht</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/icon" href="assets/images/favicon.ico"/>
    <!-- Font Awesome -->
    <link href="assets/css/font-awesome.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="front/bootstrap-4.0.0-dist/css/bootstrap.css" rel="stylesheet"> 
	<link href="front/Animation/bootstrap.css" rel="stylesheet"> 
    <!-- Slick slider -->
    <link rel="stylesheet" type="text/css" href="front/Animation/slick.css"/> 
    <!-- Fancybox slider -->
    <link rel="stylesheet" href="front/Animation/jquery.fancybox.css" type="text/css" media="screen" /> 
    <!-- Animate css -->
    <link rel="stylesheet" type="text/css" href="front/Animation/animate.css"/> 
    <!-- Bootstrap progressbar  --> 
    <link rel="stylesheet" type="text/css" href="front/Animation/bootstrap-progressbar-3.3.4.css"/> 
     <!-- Theme color -->
    <!-- Main Style -->
    <link href="front/Animation/style.css" rel="stylesheet">
    <!-- Fonts -->
    <!-- Open Sans for body font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
    <!-- Lato for Title -->
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">    
  </head>
  <body> 
<section id="about">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
         <div class="title-area">
            <h2 class="title-about">Ihr Ergebnis</h2>
          </div>
        </div> 
		 	<div class="col-md-12">
				<div class="single-service wow zoomIn" align="center">
				<img class="resultphoto" src="front/Animation/Deutschtests-Ergebnis.jpg" alt="Deutschtest"/>
				</div>
		  </div>
		   </div>
		<div class="row"><p>&nbsp;</p></div>
		 <div class="row justify-content-center"> 
				<div class="col-lg-12 col-md-12 center-block">		
					<div class="col-lg-5 col-md-10 center-block "  style="border:solid">
						<div class="row bigrow" style="border-bottom:solid">
						<img class="book" src="front/Animation/book.png" alt="book"> 
							<div class="mywhite">
							<p><strong>Lesen</strong></p>
						</div></div>
					<div class="col-lg-4 col-md-12 text-center">
						<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
						<canvas id="chartProgress"></canvas>					 </div> 

					<div  class="col-lg-4 col-md-12 center-block ">
						<canvas id="chartProgress2"></canvas>
					</div>
					<div class="col-lg-3 col-md-12 center-block" >
						<div class="row center-block " >
							<div class="wow zoomIn facesize centerImge img-fluid"   id="face"></div>
							<div class="row justify-content-center ">
						<h5 id="facetext"></h5>
						</div></div>
						</div>
					</div>				
					<div class="col-md-1"><p>&nbsp;</p><p>&nbsp;</p></div>		
					<div class="col-md-1 "><p>&nbsp;</p><p>&nbsp;</p></div>	
					<div class="col-lg-5 col-md-10 center-block " style="border:solid">
						<div class="row bigrow" style="border-bottom:solid">
						<img class="book" src="front/Animation/headphones.png" alt="book"> 
							<div class="mywhite">
							<p><strong>Hören</strong></p>
						</div>
					</div>
					<div class="col-lg-4 col-md-12 center-block ">						
							<canvas id="chartProgress3"></canvas>
					</div>
					<div  class="col-lg-4 col-md-12 center-block">
						<canvas id="chartProgress4"></canvas>
					</div>
					<div class="col-lg-3 col-md-12 center-block " style="text-align: center"> 
						<div class="row center-block "> 
						<div class="wow zoomIn centerImge facesize img-fluid" id="face2"></div>
						<div class="row center-block justify-content-center">
						<h5  id="facetext2"></h5>
						</div></div></div></div>
					  </div></div></div>
	
	<div class="row "><p>&nbsp;</p></div>
	<div class="row justify-content-center">
	 <button class="button " type="button">Ihr detailliertes Ergebnis</button>
	</div>
	<div class="row"><p>&nbsp;</p></div>
	<div class="row"><p>&nbsp;</p></div>
	 
 </section>
<script>
	/*** first box ***/
	mytotalmodelltest = 15;
	var totalmedelltest = mytotalmodelltest; /**update mytotalmodelltest with the test total number of exams (reading)**/
	mymodelltest = 5;
	var modelltest = mymodelltest;	/**update mymodelltest with the test total number of exams taken (reading)**/

	var myChartCircle = new Chart('chartProgress', {
  type: 'doughnut',
  data: {
    datasets: [{
      percent: modelltest,
      backgroundColor: ['#5283ff']
    }]
  },
  plugins: [{
      beforeInit: (chart) => {
        const dataset = chart.data.datasets[0];
        chart.data.labels = [dataset.label];
        dataset.data = [dataset.percent, totalmedelltest - dataset.percent];
      }
    },
    {
      beforeDraw: (chart) => {
        var width = chart.chart.width,
          height = chart.chart.height,
          ctx = chart.chart.ctx;
        ctx.restore();
        var fontSize = (height / 120).toFixed(2);
        ctx.font = fontSize + "em sans-serif";
        ctx.fillStyle = "#9b9b9b";
        ctx.textBaseline = "middle";
        var text = modelltest + "/" + totalmedelltest ,
			
          textX = Math.round((width - ctx.measureText(text).width) / 2),
          textY = height / 2;
        ctx.fillText(text, textX, textY);
        ctx.save();
      }
    }
  ],
  options: {
    maintainAspectRatio: false,
    cutoutPercentage: 70,
    rotation: Math.PI / 2,
    legend: {
      display: false,
    },
    tooltips: {
      filter: tooltipItem => tooltipItem.index == 0
    }
  }
});
	
	
	totalscore2 = 30;
	var mytotalscore2 = totalscore2; /**update totalscore with the test total scrore percentage (reading)**/
	var myChartCircle = new Chart('chartProgress2', {
  type: 'doughnut',
  data: {
    datasets: [{
      percent: mytotalscore2,
      backgroundColor: ['#800080']
			  }]
  },
  plugins: [{
      beforeInit: (chart) => {
        const dataset = chart.data.datasets[0];
        chart.data.labels = [dataset.label];
        dataset.data = [dataset.percent, 100 - dataset.percent];
      }
    },
    {
      beforeDraw: (chart) => {
        var width = chart.chart.width,
          height = chart.chart.height,
          ctx = chart.chart.ctx;
        ctx.restore();
        var fontSize = (height / 120).toFixed(2);
        ctx.font = fontSize + "em sans-serif";
        ctx.fillStyle = "#9b9b9b";
        ctx.textBaseline = "middle";
        var text =  chart.data.datasets[0].percent + "%",
          textX = Math.round((width - ctx.measureText(text).width) / 2),
          textY = height / 2;
        ctx.fillText(text, textX, textY);
        ctx.save();
      }
    }
  ],
  options: {
    maintainAspectRatio: false,
    cutoutPercentage: 70,
    rotation: Math.PI / 2,
    legend: {
      display: false,
    },
    tooltips: {
      filter: tooltipItem => tooltipItem.index == 0
    }
  }
});	
	
	
	if (mytotalscore2 < 60){
		
		document.getElementById("face").innerHTML='<img src="front/Animation/sad-face.png" />';
		
		document.getElementById("facetext").innerHTML= "nicht bestanden";
	    facetext.style.color = "red";

}
	else {
		document.getElementById("face").innerHTML='<img src="front/Animation/happy-face.png" />' ;
		document.getElementById("facetext").innerHTML= "bestanden";
		facetext.style.color = "green";
	}
	
	
	
	/*** Second box ***/
	mytotalmodelltest2 = 10; 
	var totalmedelltest2 = mytotalmodelltest2;  /**update mytotalmodelltest2 with the test total number of exams (listening)**/
	
	mymodelltest2 = 5;
	var modelltest2 = mymodelltest2; /**update mymodelltest2 with the test total number of exams taken (Listening)**/

	var myChartCircle = new Chart('chartProgress3', {
  type: 'doughnut',
  data: {
    datasets: [{
      percent: modelltest2,
      backgroundColor: ['#5283ff']
    }]
  },
  plugins: [{
      beforeInit: (chart) => {
        const dataset = chart.data.datasets[0];
        chart.data.labels = [dataset.label];
        dataset.data = [dataset.percent, totalmedelltest2 - dataset.percent];
      }
    },
    {
      beforeDraw: (chart) => {
        var width = chart.chart.width,
          height = chart.chart.height,
          ctx = chart.chart.ctx;
        ctx.restore();
        var fontSize = (height / 120).toFixed(2);
        ctx.font = fontSize + "em sans-serif";
        ctx.fillStyle = "#9b9b9b";
        ctx.textBaseline = "middle";
        var text = modelltest2 + "/" + totalmedelltest2 ,
          textX = Math.round((width - ctx.measureText(text).width) / 2),
          textY = height / 2;
        ctx.fillText(text, textX, textY);
        ctx.save();
      }
    }
  ],
  options: {
    maintainAspectRatio: false,
    cutoutPercentage: 70,
    rotation: Math.PI / 2,
    legend: {
      display: false,
    },
    tooltips: {
      filter: tooltipItem => tooltipItem.index == 0
    }
  }
});

		
	totalscore4 = 90;
	var mytotalscore4 = totalscore4;  /**update totalscore with the test total scrore percentage (reading)**/
	
	
		var myChartCircle = new Chart('chartProgress4', {
  type: 'doughnut',
  data: {
    datasets: [{
      percent: mytotalscore4,
      backgroundColor: ['#800080']
  
			
			  }]
  },
  plugins: [{
      beforeInit: (chart) => {
        const dataset = chart.data.datasets[0];
        chart.data.labels = [dataset.label];
        dataset.data = [dataset.percent, 100 - dataset.percent];
      }
    },
			
    {
	
      beforeDraw: (chart) => {
        var width = chart.chart.width,
          height = chart.chart.height,
          ctx = chart.chart.ctx;
        ctx.restore();
        var fontSize = (height / 120).toFixed(2);
        ctx.font = fontSize + "em sans-serif";
        ctx.fillStyle = "#9b9b9b";
        ctx.textBaseline = "middle";
        var text = chart.data.datasets[0].percent + "%",
          textX = Math.round((width - ctx.measureText(text).width) / 2),
          textY = height / 2;
        ctx.fillText(text, textX, textY);
        ctx.save();
      }
    }
  ],
  options: {
    maintainAspectRatio: false,
    cutoutPercentage: 70,
    rotation: Math.PI / 2,
    legend: {
      display: false,
    },
    tooltips: {
      filter: tooltipItem => tooltipItem.index == 0
    }
  }
});	

	if (mytotalscore4 < 60){
		
		document.getElementById("face2").innerHTML='<img src="front/Animation/sad-face.png" />';
		document.getElementById("facetext2").innerHTML= "nicht bestanden";
		facetext2.style.color = "red";
}
	else {
		document.getElementById("face2").innerHTML='<img src="front/Animation/happy-face.png" />';
		document.getElementById("facetext2").innerHTML= "bestanden";
		facetext2.style.color = "green";
	}
	  </script>			  

		
		
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>    
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <!-- Bootstrap -->
  <script src="front/Animation/js/bootstrap.js"></script>
  <!-- Slick Slider -->
  <script type="text/javascript" src="front/Animation/js/slick.js"></script>    
  <!-- mixit slider -->
  <script type="text/javascript" src="front/Animation/js/jquery.mixitup.js"></script>
  <!-- Add fancyBox -->        
  <script type="text/javascript" src="front/Animation/js/jquery.fancybox.pack.js"></script>
 <!-- counter -->
  <script src="front/Animation/js/waypoints.js"></script>
  <script src="front/Animation/js/jquery.counterup.js"></script>
  <!-- Wow animation -->
  <script type="text/javascript" src="front/Animation/js/wow.js"></script> 
  <!-- progress bar   -->
  <script type="text/javascript" src="front/Animation/js/bootstrap-progressbar.js"></script>  
  <script type="text/javascript" src="front/Animation/js/Radial.js"></script> 
 
  <!-- Custom js -->
  <script type="text/javascript" src="front/Animation/js/custom.js"></script>
    
  </body>
</html>  
