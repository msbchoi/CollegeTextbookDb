
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/pe-icon-7-stroke.css" rel="stylesheet" type="text/css" media="all">
        <link href="css/themify-icons.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/theme.css" rel="stylesheet" type="text/css" media="all" />
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
				
		<div class="nav-container">
		</div>
		
		<div class="main-container">
		<section class="page-title page-title-3 bg-secondary">
		        <div class="container">
		            <div class="row">
		                <div class="col-sm-12 text-center">
		                    <h3 class="uppercase mb0">Add Textbookd</h3>
		                </div>
		            </div>
		            
		        </div>
		        
		        <ol class="breadcrumb breadcrumb-2">
		            <li>
		                <a href="main_page.php">return to main page</a>
		            </li>	         
		        </ol>
            </section>
<?php

    
/*
    require "dbutil.php";
    $db = DbUtil::loginConnection('mev8vy', 'ahG1zee5');
	$stmt = $db->stmt_init();
*/
    session_start();
	if($_SESSION['message'] != '')
	{
		echo "<h1>".$_SESSION['message']."</h2>";
		$_SESSION['message'] = '';
	}
    require('dbutil.php');
    $db = DbUtil::loginConnection($_SESSION['level'], $_SESSION['levelpwd']);
    $stmt = $db->stmt_init();
?>
            <section>
		        <div class="container">
		            <div class="row">
		                    <div class="feature bordered">
		                        
		                        <form action ="textbook_inserter.php" method = "post">
                                <label>Textbook Name: </label>
                                <input type = "text" name = "textbook_name" placeholder = "Name of Textbook:" length = 100 required/> <br/>
                                <label>Textbook Edition: </label>
                                <input type = "text" name = "textbook_edition" placeholder = "1.00"/> <br/>
                                <label>Textbook Price: </label>
                                <input type = "text" name = "textbook_price" placeholder = 60.00 /> </br>
                                <label>Textbook for Course Id: </label> 
                                <input type = "number" name = "course_id" placeholder = "4750" /> </br>
								<label>Department Id Number </label>
                                <input type = "number" name = "department_id"/></br>   
		                            
		                            
		                            <o2>
                                        <h4> <b>Authors</b> </h4><br>
                                        <label> First Name: </label>
                                        <input type = "text" name = "first_name[]"/>
                                        <label>Middle Initial(Optional): </label>
                                        <input type = 'text' name = 'middle_initial[]' size = 1 />
                                        <label>Last Name: </label>
                                        <input type = 'text' name = 'last_name[]'/>
                                        </br>

                                    </o2>
                                            <a id = "addauthor">
                                                        <i class="pe-7s-add-user icon-sm"></i> Add another author
    </a><br>
    <label>Textbook Description/Purchase Locations</label>
            <input type = "text"  name = "textbook_data"    /></br>
            <input type="submit" value="Add" name="action" />

		                           <!-- <button type="submit">Add</button>-->
		                        </form>

		                   
		                </div>
		            </div>
		            
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
				