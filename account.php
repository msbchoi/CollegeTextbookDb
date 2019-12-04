<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Edit Account</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
        <link href="css/themify-icons.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/flexslider.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/theme.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/custom.css" rel="stylesheet" type="text/css" media="all" />
        <link href='http://fonts.googleapis.com/css?family=Lato:300,400%7CRaleway:100,400,300,500,600,700%7COpen+Sans:400,500,600' rel='stylesheet' type='text/css'>
	</head>
	<?php session_start(); 
	#once the table set up and stuff is done, actual script to change the credentials will go here. For now... nothing.
  ?>
    <body>
	<script>
		function confirm_delete()
		{
			var answer = window.confirm("Are you sure you want to delete your account? This action cannot be undone")
			if (answer) {
				//some code
				alert("You can't delete yourself just yet...sorry.");
			}
			else {
				//some code
				alert("Good choice!");
			}
					}
	</script>

				
		
		<div class="main-container">
		<section class="cover fullscreen image-slider slider-all-controls controls-inside parallax">
		        <ul class="slides">
		            <li class="overlay image-bg">
		                <div class="background-image-holder">
		                    <img alt="image" class="background-image" src="img/home22.jpg">
		                </div>
		                <div class="container v-align-transform">
		                    <div class="row">
		                        <div class="col-md-6 col-sm-8">
		                            <h1 class="mb40 mb-xs-16 large">Plan ahead</h1>
		                            <h6 class="uppercase mb16">A website make you plan EFFICIENTLY</h6>
		                            <p class="lead mb40">"Plan you work and work your plan."</p>
		                            
		                        </div>
								<div class="col-md-6 col-sm-8">
									<img alt="Logo" class="image-large mb8" src="img/logo-white.png">
		                        </div>
		                    </div>
		                    
		                </div>
		                
		            </li><li class="overlay image-bg">
		                <div class="background-image-holder">
		                    <img alt="image" class="background-image" src="img/home22.jpg">
		                </div>
		                <div class="container v-align-transform">
		                    <div class="row">
		                        <div class="col-md-6 col-sm-8">
		                            <h1 class="mb40 mb-xs-16 large">Use resources wisely</h1>
		                            <h6 class="uppercase mb16">A WEBSITE WHERE YOU COULD GET MATERIALS FOR CLASSES</h6>
		                            <p class="lead mb40">"Start where you are. Use what you have. Do what you can."</p>
		                            
		                        </div>
								<div class="col-md-6 col-sm-8">
									<img alt="Logo" class="image-large mb8" src="img/logo-white.png">
		                        </div>
		                    </div>
		                    
		                </div>
		                
		            </li>
		        </ul>
		    </section><section>
		        <div class="container">
		            <div class="row">
		                <div class="col-sm-6 col-md-5">
		                    <h2 class="uppercase">EDIT ACCOUNT</h2>
		                    <p>Change your password!</p>
							<hr>
				</div>
				<div class="col-sm-6 col-md-5 col-md-offset-1">
		                    <form method="post">
		                        <input type="password" class="form-control" name="pw1" id = "pw1"  placeholder = "New Password" autofocus  />
		                        <input type="password" class="form-control" name="pw2" id = "pw2"   placeholder = "Confirm New Password"/>
		                        <!-- <a class = "btn btn-lg" type="submit" value="Sign in">Sign In</a> -->
								<input type="submit" value="Change " class="btn btn-light"  />   
		                    </form>
							<input class = "btn btn-lg" type = "button" id = "delete_button" value="Delete My Account" onclick = "confirm_delete()"> </input>
		                </div>
		            </div>
		            
		        </div>
		        
		    </section>			
			
					
			
					
			
					
			<footer class="footer-2 bg-dark text-center-xs">
				<div class="container">
					<div class="row">
						
					
						<div class="col-sm-4 text-center">
							<span class="fade-half">
								© Copyright 2019 NOLIFE TEXTBOOK - All Rights Reserved
							</span>
						</div>
					
						
					</div>
				</div>
			</footer>
		</div>
		
				
	<script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/flexslider.min.js"></script>
        <script src="js/parallax.js"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>






