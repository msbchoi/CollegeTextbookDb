
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
        <link href="css/themify-icons.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/theme-nearblack.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/custom.css" rel="stylesheet" type="text/css" media="all" />
        <link href='http://fonts.googleapis.com/css?family=Lato:300,400%7CRaleway:100,400,300,500,600,700%7COpen+Sans:400,500,600' rel='stylesheet' type='text/css'>
		<script src="js/jquery-1.6.2.min.js" type="text/javascript"></script> 
		<script src="js/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
		<?php session_start(); 
			$_SESSION['query'] = '';
			$_SESSION['query_source'] = '';
		?>
 		<title>Search for class</title>
		<script>
	$(document).ready(function() {
		$( "#Classinput" ).change(function() {
			
			$.ajax({
				url: 'class_search_test.php', 
				data: {SearchClassName: $( "#Classinput" ).val()},
				type: 'get',
				success: function(data){
					$('#Classresult').html(data);	
				
				}
			});
		});
		
	});
	</script>
    </head>
    <body>
				
	<!-- navigate bar -->
		
		<div class="main-container">
		
			<section class="page-title page-title-1 bg-secondary">
		        <div class="container">
		            <div class="row">
		                <div class="col-sm-12 text-center">
		                    <h2 class="uppercase mb0">Welcome back</h2>
		                </div>
		            </div>
		            
		        </div>
		        
		        
		    </section>
					
			<section class="cover fullscreen overlay parallax">
		        <div class="background-image-holder">
		            <img alt="image" class="background-image" src="img/home13.jpg">
		        </div>
		        <div class="container v-align-transform">
		            <div class="row">
		                <div class="col-md-10 col-md-offset-1 col-sm-12 text-center">
		                    <h1 class="mb8">Search for Classes</h1>
		                    <p class="lead mb48">
		                        You can search substrings of Class Name</p>
		                        <input type="text" id = "Classinput" class="validate-required validate-email signup-email-field " placeholder="Class Name Contains">
								
								<br/><br/>
						</div>
						<div class = "row">

						<div class="col-md-10 col-md-offset-1 col-sm-12 text-center" >
						<h4 id="Classresult">Search Result</h4>
		            	</div>
						
					</div>
					 
		        </div>
				<form method="post" action="export_page.php">
				 <input type="submit" name="export" class="btn btn-success" value="Export" />
				</form>
		        
		    </section>
		
			<footer class="footer-2 bg-dark text-center-xs">
				<div class="container">
					<div class="row">
						<div class="col-sm-4">
							<a href="#"><img alt="Logo" class="image-mediem mb8" src="img/logo-white.png"></a>
						</div>
					
						<div class="col-sm-4 text-center">
							<span class="fade-half">
								© Copyright 2019 NOLIFE TB - All Rights Reserved
							</span>
						</div>
					
						
					</div>
				</div>
			</footer>
		</div>
		
				
	<script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/parallax.js"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
				