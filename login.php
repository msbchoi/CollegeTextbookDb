<?php session_start(); ?>
<?php

	$_SESSION['user'] = "";
	$_SESSION['pwd'] = "";
	$_SESSION['level'] ="";
	$_SESSION['levelpwd'] = "";

	$gen_error = "";
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		
		
		
		
		if(!empty($_POST['username']) && strlen($_POST['username']) > 0 && !empty($_POST['pwd']) && strlen($_POST['pwd']) > 0)
		{
			require "dbutil.php";
			$host = "cs4750.cs.virginia.edu";
			$schema = "mev8vy"; 
			$db = DbUtil::loginConnection('mev8vy_b', 'ahG1zee5');
			
			$stmt = $db->stmt_init();
	
			
			
			$query = "SELECT * FROM P_USERTABLE WHERE Username = ? AND Password =?";
			$statement = $db->prepare($query);
			
			#$error = $db->errno . ' ' . $db->error;
			#echo $error;
			
			#$statement->bindValue(':curr_user', $_POST['username']);
			#$statement->bindValue(':pwd', $_POST['pwd']);
			$statement->bind_param('ss', $_POST['username'], $_POST['pwd']);
			
			$statement->execute();
			$statement->bind_result($user, $userpw, $usertype);
			if(!empty($statement->fetch()))
			{
			
				while($statement->fetch())
				{
					$_SESSION['user'] = $user;
					$_SESSION['pwd'] = $userpw;
					$_SESSION['levelpwd'] = 'ahG1zee5';
					
					if($usertype == 0)
					{
						$_SESSION['level'] = 'mev8vy_b';
					}
					else if ($usertype == 1)
					{
						$_SESSION['level'] = 'mev8vy_d';
					}
					else if ($usertype == 2)
					{
						$_SESSION['level'] = 'mev8vy_a';
					}
				}
				$statement->close();
				header('Location: main_page.php');
			}
			else
			{
				$gen_error = "Sorry, we could not find a user matching this username and password";
			}
			$statement->close();
			
			
			
			
			
			#$_SESSION['user'] = $_POST['username'];
			#$_SESSION['pwd'] = $_POST['pwd'];
			#from here on out, every time you want to connect to the db call the loginConnection function with the $_SESSION['level'] and 
			# $_SESSION['levelpwd'] as arguments
			
			
		}
	}
?>  
   
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
        <link href="css/themify-icons.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/flexslider.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/theme.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/custom.css" rel="stylesheet" type="text/css" media="all" />
        <link href='http://fonts.googleapis.com/css?family=Lato:300,400%7CRaleway:100,400,300,500,600,700%7COpen+Sans:400,500,600' rel='stylesheet' type='text/css'>
    </head>
    <body>
				
		<div class="nav-container">
		</div>
		
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
		                    <h2 class="uppercase">lOGIN</h2>
		                    <p>Welcome Back. It's time to make some plan towards your life!</p>
		                    <hr>

		                    
		                </div>
		                <div class="col-sm-6 col-md-5 col-md-offset-1">
		                    <form action="login.php" method="post">
		                        <input type="text" class="form-control" name="username" placeholder="Username" autofocus required />
		                        <input type="password" class="form-control" name="pwd" placeholder="Password" required >
		                        <!-- <a class = "btn btn-lg" type="submit" value="Sign in">Sign In</a> -->
								<span class="error"><?php echo $gen_error;?></span><br/>
								<input type="submit" value="Sign in" class="btn btn-light"  />   
		                    </form>
							<a class = "btn btn-lg" href= "signup.php"> Sign Up</a>
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
				






