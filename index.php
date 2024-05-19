<!doctype html>
<html class="no-js" lang="en">

    <head>
        <!-- meta data -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

        <!--font-family-->
		<link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        
        <!-- title of site -->
        <title>LinkedIn-Insights</title>

        <!-- For favicon png -->
		<link rel="shortcut icon" type="image/icon" href="assets/logo/favicon.png"/>
       
        <!--font-awesome.min.css-->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">

        <!--linear icon css-->
		<link rel="stylesheet" href="assets/css/linearicons.css">

		<!--animate.css-->
        <link rel="stylesheet" href="assets/css/animate.css">

		<!--flaticon.css-->
        <link rel="stylesheet" href="assets/css/flaticon.css">

		<!--slick.css-->
        <link rel="stylesheet" href="assets/css/slick.css">
		<link rel="stylesheet" href="assets/css/slick-theme.css">
		
        <!--bootstrap.min.css-->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- bootsnav -->
		<link rel="stylesheet" href="assets/css/bootsnav.css" >	
        
        <!--style.css-->
        <link rel="stylesheet" href="assets/css/style.css">
        
        <!--responsive.css-->
        <link rel="stylesheet" href="assets/css/responsive.css">
		<script>
		var topName = [];
		var topValue = [];
		var barChart, lineChart, pieChart, doughnutChart;
		function getCompanyData(){
			showCharts()
			topName = [];
			topValue = [];
			document.getElementById('PositionAhref').style.color = "#343a3f";
			document.getElementById('CompanyAhref').style.color = "#ff545a";
			const urlParams = new URLSearchParams(window.location.search);
			if(urlParams.get("dataExists") == "true")
			{
				const topCompanies = urlParams.get('topCompanies');
				var topCompaniesJson = JSON.parse(topCompanies);
				// Iterate over the keys of the JSON object
				for (var key in topCompaniesJson) {
					// Check if the property is a direct property of the object (not inherited)
					if (topCompaniesJson.hasOwnProperty(key)) {
						// Push the value corresponding to the current key into the array
						topValue.push(topCompaniesJson[key]);
					}
				}
				// Iterate over the keys of the JSON object
				for (var key in topCompaniesJson) {
					// Check if the property is a direct property of the object (not inherited)
					if (topCompaniesJson.hasOwnProperty(key)) {
						// Push the value corresponding to the current key into the array
						topName.push(key);
					}
				}
				showCharts();
			}
		}
		function getPositionData(){
			topName = [];
			topValue = [];
			document.getElementById('CompanyAhref').style.color = "#343a3f";
			document.getElementById('PositionAhref').style.color = "#ff545a";
			const urlParams = new URLSearchParams(window.location.search);
			if(urlParams.get("dataExists") == "true")
			{
				const topCompanies = urlParams.get('topPositions');
				var topCompaniesJson = JSON.parse(topCompanies);
				// Iterate over the keys of the JSON object
				for (var key in topCompaniesJson) {
					// Check if the property is a direct property of the object (not inherited)
					if (topCompaniesJson.hasOwnProperty(key)) {
						// Push the value corresponding to the current key into the array
						topValue.push(topCompaniesJson[key]);
					}
				}
				// Iterate over the keys of the JSON object
				for (var key in topCompaniesJson) {
					// Check if the property is a direct property of the object (not inherited)
					if (topCompaniesJson.hasOwnProperty(key)) {
						// Push the value corresponding to the current key into the array
						topName.push(key);
					}
				}
				showCharts();
			}
		}
		</script>
    </head>
	
	<body onload="getCompanyData()">
		<!-- top-area Start -->
		<section class="top-area">
			<div class="header-area">
				<!-- Start Navigation -->
			    <nav class="navbar navbar-default bootsnav  navbar-sticky navbar-scrollspy"  data-minus-value-desktop="70" data-minus-value-mobile="55" data-speed="1000">

			        <div class="container">

			            <!-- Start Header Navigation -->
			            <div class="navbar-header">
			                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
			                    <i class="fa fa-bars"></i>
			                </button>
			                <a class="navbar-brand" href="index.html">LinkedIn<span>Insights</span></a>

			            </div><!--/.navbar-header-->
			            <!-- End Header Navigation -->

			            <!-- Collect the nav links, forms, and other content for toggling -->
			            <div class="collapse navbar-collapse menu-ui-design" id="navbar-menu">
			                <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
			                    <li class=" scroll active"><a href="#home">home</a></li>
			                </ul><!--/.nav -->
			            </div><!-- /.navbar-collapse -->
			        </div><!--/.container-->
			    </nav><!--/nav-->
			    <!-- End Navigation -->
			</div><!--/.header-area-->
		    <div class="clearfix"></div>

		</section><!-- /.top-area-->
		<!-- top-area End -->

		<!--welcome-hero start -->
		<section id="home" class="welcome-hero">
			<div class="container">
				<div class="welcome-hero-txt">
					<h2>Discovery and Exploration: All Your Insights in One Place.</h2>
					<p>
						Unlocking LinkedIn's Data Tapestry: Unveiling Insights and Trends.
					</p>
				</div>
				<div class="welcome-hero-serch-box">
					<form action="PHP/uploadFile.php" method="post" enctype="multipart/form-data" style="width: 100%;display:flex">
						<div class="welcome-hero-form">
							<div class="single-welcome-hero-form" style="width: 100%;display: flex;">
								<h3>File</h3>
								<input type="file" id="fileToUpload" name="fileToUpload" placeholder="Ex: Excel" required/>
								<div class="welcome-hero-form-icon">
									<i class="flaticon-gps-fixed-indicator"></i>
								</div>
							</div>
						</div>
						<div class="welcome-hero-serch">
							<button class="welcome-hero-btn" type="submit">Upload</button>
						</div>
					</form>
				</div>
			</div>

		</section><!--/.welcome-hero-->
		<!--welcome-hero end -->
		<div style="margin: 3rem;display:flex;margin-left: 6rem;margin-right: 16rem;justify-content: space-between">
			<div style="display:flex;gap:3rem">
				<a onclick="getCompanyData()" style="cursor:pointer;color: #ff545a" id="CompanyAhref">Company Charts</a>
				<a onclick="getPositionData()" style="cursor:pointer" id="PositionAhref">Position Charts</a>
			</div>
		</div>
		<div style="display: flex;flex-direction: column;margin: 5rem;gap: 5rem;">
			<div style="display: flex;gap: 2rem">
				<div style="display: flex;align-items:center;justify-content: center;width: 100%;height: 30rem;">
					<canvas id="barChart"></canvas>
				</div>
				<div style="display: flex;align-items:center;justify-content: center;width: 100%;height: 30rem;">
					<canvas id="pieChart"></canvas>
				</div>
			</div>
			<hr>
			<div style="display: flex;gap: 2rem">
				<div style="display: flex;align-items:center;justify-content: center;width: 100%;height: 30rem;">
					<canvas id="lineChart"></canvas>
				</div>
				<div style="display: flex;align-items:center;justify-content: center;width: 100%;height: 30rem;">
					<canvas id="doughnutChart"></canvas>
				</div>
			</div>
		</div>

		<!-- statistics strat -->
		<section id="statistics"  class="statistics">
			<div class="container">
				<div class="statistics-counter"> 
					<div class="col-md-3 col-sm-6">
						<div class="single-ststistics-box">
							<div class="statistics-content">
								<div class="counter">90 </div> <span>K+</span>
							</div><!--/.statistics-content-->
							<h3>listings</h3>
						</div><!--/.single-ststistics-box-->
					</div><!--/.col-->
					<div class="col-md-3 col-sm-6">
						<div class="single-ststistics-box">
							<div class="statistics-content">
								<div class="counter">40</div> <span>k+</span>
							</div><!--/.statistics-content-->
							<h3>listing categories</h3>
						</div><!--/.single-ststistics-box-->
					</div><!--/.col-->
					<div class="col-md-3 col-sm-6">
						<div class="single-ststistics-box">
							<div class="statistics-content">
								<div class="counter">65</div> <span>k+</span>
							</div><!--/.statistics-content-->
							<h3>visitors</h3>
						</div><!--/.single-ststistics-box-->
					</div><!--/.col-->
					<div class="col-md-3 col-sm-6">
						<div class="single-ststistics-box">
							<div class="statistics-content">
								<div class="counter">50</div> <span>k+</span>
							</div><!--/.statistics-content-->
							<h3>happy clients</h3>
						</div><!--/.single-ststistics-box-->
					</div><!--/.col-->
				</div><!--/.statistics-counter-->	
			</div><!--/.container-->

		</section><!--/.counter-->	
		<!-- statistics end -->


		<!--footer start-->
		<footer id="footer"  class="footer">
			<div class="container">
				<div class="footer-menu">
		           	<div class="row">
			           	<div class="col-sm-3">
			           		 <div class="navbar-header">
				                <a class="navbar-brand" href="index.html">LinkedIn<span>Insights</span></a>
				            </div><!--/.navbar-header-->
			           	</div>
			           	<div class="col-sm-9">
			           		<ul class="footer-menu-item">
								<li class="scroll"><a href="#works">Home</a></li>
			                </ul><!--/.nav -->
			           	</div>
		           </div>
				</div>
				<div class="hm-footer-copyright">
					<div class="row">
						<div class="col-sm-5">
							<p>
								&copy;copyright. Developed by LinkedIn-Insights Team</a>
							</p><!--/p-->
						</div>
						<div class="col-sm-7">
							<div class="footer-social">
								<a href="#"><i class="fa fa-facebook"></i></a>	
								<a href="#"><i class="fa fa-twitter"></i></a>
								<a href="#"><i class="fa fa-linkedin"></i></a>
								<a href="#"><i class="fa fa-google-plus"></i></a>
							</div>
						</div>
					</div>
					
				</div><!--/.hm-footer-copyright-->
			</div><!--/.container-->

			<div id="scroll-Top">
				<div class="return-to-top">
					<i class="fa fa-angle-up " id="scroll-top" data-toggle="tooltip" data-placement="top" title="" data-original-title="Back to Top" aria-hidden="true"></i>
				</div>
				
			</div><!--/.scroll-Top-->
			
        </footer><!--/.footer-->
		<!--footer end-->
		
		<!-- Include all js compiled plugins (below), or include individual files as needed -->

		<script src="assets/js/jquery.js"></script>
        
        <!--modernizr.min.js-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
		
		<!--bootstrap.min.js-->
        <script src="assets/js/bootstrap.min.js"></script>
		
		<!-- bootsnav js -->
		<script src="assets/js/bootsnav.js"></script>

        <!--feather.min.js-->
        <script  src="assets/js/feather.min.js"></script>

        <!-- counter js -->
		<script src="assets/js/jquery.counterup.min.js"></script>
		<script src="assets/js/waypoints.min.js"></script>

        <!--slick.min.js-->
        <script src="assets/js/slick.min.js"></script>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
		     
        <!--Custom JS-->
        <script src="assets/js/custom.js"></script>
        
		<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
		<script>
			var barChartCanv;
			var lineChartCanv;
			var pieChartCanv;
			var doughnutChartCanv;
			function destroyOldCanvases()
			{
				if(barChartCanv) barChartCanv.destroy();
				if(lineChartCanv) lineChartCanv.destroy();
				if(pieChartCanv) pieChartCanv.destroy();
				if(doughnutChartCanv) doughnutChartCanv.destroy();
			}
			function showCharts()
			{
				destroyOldCanvases();
				var barColors = [
					"#FF5733",  // Fiery Red
					"#33FF57",  // Bright Green
					"#3357FF",  // Vivid Blue
					"#FF33A1",  // Hot Pink
					"#8E44AD",  // Purple
					"#F39C12",  // Orange
					"#1ABC9C",  // Aqua
					"#F1C40F",  // Yellow
					"#3498DB",  // Sky Blue
					"#2ECC71",  // Lime Green
					"#E74C3C",  // Bright Red
					"#27AE60",  // Mint Green
					"#2980B9",  // Bright Blue
					"#E67E22",  // Coral
					"#9B59B6",  // Lavender
					"#D35400",  // Pumpkin
					"#16A085",  // Teal
					"#F7DC6F",  // Light Yellow
					"#5DADE2",  // Light Sky Blue
					"#58D68D"   // Bright Lime
			];


			//barChart:
				const barChartXValues = topName;
				const barChartYValues = topValue;
				barChartCanv = new Chart("barChart", {
				type: 'bar',
				data: {
					labels: barChartXValues,
					datasets: [{
					backgroundColor: barColors,
					data: barChartYValues
					}]
				},
				options: {
					responsive: true,
					interaction: {
					mode: 'index',
					intersect: false,
					},
					legend: {display: false},
					title: {
					display: false,
					}
				}
				});

			//lineChart:
				const lineXValues = topName;
				const lineYValues = topValue;

				lineChartCanv = new Chart("lineChart", {
				type: "line",
				data: {
					labels: lineXValues,
					datasets: [{
					backgroundColor: barColors,
					lineTension: 0,
					fill: false,
					data: lineYValues
					}]
				},
				options: {	
					legend: {display: false}
				}
				});

			//pieChart:
				const pieXValues = topName;
				const pieYValues = topValue;

				pieChartCanv = new Chart("pieChart", {
				type: "pie",
				data: {
					labels: pieXValues,
					datasets: [{
					backgroundColor: barColors,
					data: pieYValues
					}]
				},
				options: {
					title: {
					display: true,
					}
				}
				});

			//doughnut:
				const doughnutXValues = topName;
				const doughnutYValues = topValue;

				doughnutChartCanv = new Chart("doughnutChart", {
				type: "doughnut",
				data: {
					labels: doughnutXValues,
					datasets: [{
					backgroundColor: barColors,
					data: doughnutYValues
					}]
				},
				options: {
					responsive: true,
					interaction: {
					mode: 'index',
					intersect: false,
					},
					title: {
					display: true,
					}
				}
				});

			}
		  </script>
    </body>
	
</html>