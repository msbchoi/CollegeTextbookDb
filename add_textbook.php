<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="Minsoo Choi, Matt Vick, Shen Yan, Coco Zhang">
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
<link href="css/themify-icons.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/theme-nearblack.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/custom.css" rel="stylesheet" type="text/css" media="all" />
<link href='http://fonts.googleapis.com/css?family=Lato:300,400%7CRaleway:100,400,300,500,600,700%7COpen+Sans:400,500,600' rel='stylesheet' type='text/css'>

<title>Add a Textbook</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
<script>
        $(document).ready(function(){ 
            $("#addauthor").click(function(){ 
                $("o2").append("<label>First Name: </label>");
                $("o2").append("<input type = 'text' name = 'first_name[]'/>");                
                $("o2").append("<label> Middle Initial(Optional): </label>");
                $("o2").append("<input type = 'text' name = 'middle_initial[]' size = 1 />");
                $("o2").append("<label> Last Name: </label>");
                $("o2").append("<input type = 'text' name = 'last_name[]'/></br>");
            }); 
        });
</script>
</head>
<body>
<section class="page-title page-title-1 bg-secondary">
		        <div class="container">
		            <div class="row">
		                <div class="col-sm-12 text-center">
		                    <h2 class="uppercase mb0">Add textbooks</h2>
		                </div>
		            </div>
		            
		        </div>
		        
		        
 </section>
<button onclick="window.location.href='main_page.php'"> Return to Main Page</button>
<!-- domain of adding textbooks -->
<?php

    session_start();
    require('dbutil.php');
    $db = DbUtil::loginConnection($_SESSION['level'], $_SESSION['levelpwd']);
    $stmt = $db->stmt_init();
    ?>
    


    <form action ="textbook_inserter.php" method= "post">
        
            <label>Textbook Name: </label>
            <input type = "text" name = "textbook_name" placeholder = "Name of Textbook:" length = 100 required/> <br/>
            <label>Textbook Edition: </label>
            <input type = "text" name = "textbook_edition" placeholder = "1.00"/> <br/>
            <label>Textbook Price: </label>
            <input type = "text" name = "textbook_price" placeholder = 60.00 /> </br>
            <label>Textbook for Course Id: </label> 
                <input type = "number" name = "course_id" placeholder = "4750" /> </br>
                
            <o2>
                <label>AUTHORS</label></br>
            
                <label>First Name: </label>
                <input type = 'text' name = 'first_name[]'/>
                <label>Middle Initial(Optional): </label>
                <input type = 'text' name = 'middle_initial[]' size = 1 />
                <label>Last Name: </label>
                <input type = 'text' name = 'last_name[]'/>
                </br>
           
                <!-- <input type = "text" name = "coure_name[]"/></br> -->
            </o2>
            
       
            <label>Textbook Description/Purchase Locations</label>
            <input type = "text"  name = "textbook_data"    /></br>
            <input type="submit" value="Add" name="action" />
    </form>
    <button id ="addauthor"> Add another author </button> </br>
    
    <div>
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