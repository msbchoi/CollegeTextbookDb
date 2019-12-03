<?php session_start();?>
<?php 

$logged_in = "Yes";

if(empty($_SESSION['user']) and empty($_SESSION['user']))
	{
			$_SESSION['user'] = "";
			$_SESSION['pwd'] = "";
			$_SESSION['level'] = "";
			$_SESSION['levelpwd'] = "";
			$logged_in = "No";
			
	}


 ?>


<script>
function prep_list()
		{
			
			var usr_level  = <?php echo json_encode($_SESSION['level']); ?>;
			var logged_in = <?php echo json_encode($logged_in); ?>;
			if(usr_level == 'mev8vy_b' || logged_in == 'No')
			{
				usr_level = 0;
			}
			else if (usr_level == 'mev8vy_d')
			{
				usr_level = 1;
			}
			else if(usr_level =='mev8vy_a'){
				usr_level = 2;
			}
			
			<!-- We print a few things common to all users-->
			var student_ol = document.getElementById("student_menu");
			var professor_ol = document.getElementById("professor_menu");
			var prof_d = document.getElementById("prof_drop");
			var admin_ol = document.getElementById("admin_menu");
			var ad_d = document.getElementById("admin_drop");
			<!-- Fill this next array with the urls for the pages everyone should be able to see-->
			var common_urls = ["class_search_test_home",  "sort",  "Search_For_Textbook_Information_Home", "Search_By_Requirements_Home"];
			
			
			<!-- this array contains the hyperlink text, like "Click here to see all classes" -->
			var common_desc = ["Search for class",  "Course Sorting Test",  "Search for Textbook By Classname", "Search for Classes By Requirements"];
			
			<!--urls and descriptions for teacher only pages -->
			var teacher_urls = ["add_course", "will_teach", "add_textbook"];
			var teacher_desc = ["Add New Course", "Add Professor To Existing Course", "Add Textbook for Course"];
			
			<!-- Fill this next array with whatever stuff only the admins, the highest privilege users should be able to see -->
		

			var admin_urls = ["add_department", "add_professor", "add_requirement", "add_to_existing_requirement"];
			var admin_desc = ["Add Department", "Add Professor", "Add Requirement", "Add Course to Existing Requirement"];
			
			
			for(i=0; i< common_urls.length; i++)
				{
					
					var page_li = document.createElement("LI");
					page_li.innerHTML = "<a href = \""+common_urls[i]+".php\"/>"+common_desc[i]+"</a>";
					student_ol.appendChild(page_li);
					
				}
			
			if(usr_level >= 1)
			{
				prof_d.style.display = 'block';
				for(i = 0; i<teacher_urls.length; i++)
				{
					var page_li = document.createElement("LI");
					page_li.innerHTML = "<a href = \""+teacher_urls[i]+".php\"/>"+teacher_desc[i]+"</a>";
					professor_ol.appendChild(page_li);
				}
			} 
			if(usr_level == 2)
			{
				ad_d.style.display='block';
				for(i = 0; i<admin_urls.length; i++)
				{
					var page_li = document.createElement("LI");
					page_li.innerHTML = "<a href = \""+admin_urls[i]+".php\"/>"+admin_desc[i]+"</a>";
					admin_ol.appendChild(page_li);
				}
			}
			
			var logoutdiv = document.getElementById("logout");
			var logoutlink = document.createElement("p");
			if(logged_in == "Yes")
			{
				
				logoutlink.innerHTML = "<a class = 'tiny' href = 'logout.php' title = 'Sign Out'>Sign Out</a>";
				
			}
			else{
				logoutlink.innerHTML= "You are not logged in <a class = 'tiny' href='login.php' title='Sign In'>Sign in</a> or <a class='tiny' href='signup.php' title='Sign up'>Sign up</a>";
			}
			logoutdiv.appendChild(logoutlink);
			
		}
		</script>





<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>MAIN PAGE</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
        <link href="css/themify-icons.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/theme-nearblack.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/custom.css" rel="stylesheet" type="text/css" media="all" />
        <link href='http://fonts.googleapis.com/css?family=Lato:300,400%7CRaleway:100,400,300,500,600,700%7COpen+Sans:400,500,600' rel='stylesheet' type='text/css'>
    </head>
    <body onload = "prep_list();">
				
		<div class="nav-container">
		      
		    <nav>
		        <div class="nav-bar">
		            <div class="module left">
		                <a href="index.html">
		                    <img class="logo logo-light" alt="Foundry" src="img/logo-light.png">
		                    <img class="logo logo-dark" alt="Foundry" src="img/title-black.png">
		                </a>
		            </div>
		            <div class="module widget-handle mobile-toggle right visible-sm visible-xs">
		                <i class="ti-menu"></i>
		            </div>
		            <div class="module-group right">
		                <div class="module left" >
		                    <ul class="menu">
		                        
								
		                        <li class="has-dropdown">
		                            <a href="#">
		                                Student
		                            </a>
		                            <ul class="mega-menu">
		                                <li>
		                                    <ul>
		                                        <li id = "student_menu">
		                                        </li>
		                                    </ul>
		                                </li>
		                            </ul>
		                        </li>
								<li class="has-dropdown" id = 'prof_drop' style="display: none;">
		                            <a href="#">
		                                Professor
		                            </a>
		                            <ul class="mega-menu" >
		                                <li>
		                                    <ul>
		                                        <li id = "professor_menu">
		                                            
		                                        </li>
		                                    </ul>
		                                </li>
		                            </ul>
		                        </li>
								
								<li class="has-dropdown" id = 'admin_drop' style="display: none;">
		                            <a href="#">
		                                Admin
		                            </a>
		                            <ul class="mega-menu">
		                                <li>
		                                    <ul>
		                                        <li id = "admin_menu">
		                                            
		                                        </li>
		                                    </ul>
		                                </li>
		                            </ul>
		                        </li>
								<li class="has-dropdown" id = 'account_drop'>
		                            <a href="#">
		                                Account
		                            </a>
		                            <ul class="mega-menu">
		                                <li>
		                                    <ul>
		                                        <li id = "account_menu">
													<li>
														<a href = "account.php"> Edit my Account</a>
													</li>
													<li>
														<a href = "logout.php">Log out</a>
													</li>
		                                        </li>
		                                    </ul>
		                                </li>
		                            </ul>
		                        </li>
								<li class="has-dropdown" id = 'invis_drop' style="display: none;">
		                            <a href="#">
		                                
		                            </a>
		                            <ul class="mega-menu">
		                                <li>
		                                    <ul>
		                                        <li id = "invis_menu">
		                                            
		                                        </li>
		                                    </ul>
		                                </li>
		                            </ul>
		                        </li>
		                        
		                    </ul>
		                </div>
		                
		                <!--<div class="module widget-handle language left">
		                    <ul class="menu">
		                        <li class="has-dropdown">
		                            <a href="#">ENG</a>
		                            <ul>
		                                <li>
		                                    <a href="#">French</a>
		                                </li>
		                                <li>
		                                    <a href="#">Deutsch</a>
		                                </li>
		                            </ul>
		                        </li>
		                    </ul>
		                </div>-->
		            </div>
		            
		        </div>
		    </nav>
		
		       
		
		</div>
		
		<div class="main-container">
					
			
					
			
					
			
					
			<section class="page-title page-title-1 bg-secondary">
		        <div class="container">
		            <div class="row">
		                <div class="col-sm-12 text-center">
		                    <h2 class="uppercase mb0"><?php if(!empty($_SESSION['user'])){ echo "Welcome back ",$_SESSION['user'];} ?></h2>
		                </div>
		            </div>
		            
		        </div>
		        
		        
		    </section><section class="image-bg overlay parallax pt180 pb180 pt-xs-80 pb-xs-80">
				<div class="background-image-holder">
					<img alt="image" class="background-image" src="img/background-black-logo.png">
				</div>
				
				
				
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
				