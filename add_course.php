
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>ADD COURSE</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/pe-icon-7-stroke.css" rel="stylesheet" type="text/css" media="all">
        <link href="css/themify-icons.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/theme.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/theme-nearblack.css" rel="stylesheet" type="text/css" media="all" />
 <link href="css/custom.css" rel="stylesheet" type="text/css" media="all" />
        <link href='http://fonts.googleapis.com/css?family=Lato:300,400%7CRaleway:100,400,300,500,600,700%7COpen+Sans:400,500,600' rel='stylesheet' type='text/css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"> 
    </script> 
    <script>
        $(document).ready(function(){ 
            $("#addprof").click(function(){ 
                $("o2").append("<label> Professor Id Number </label>");
                $("o2").append("<input type = 'number' name = 'professor_id[]'/></br>"); 
            }); 
        });

    </script>
	
    </head>
    <body >
				
		<div class="nav-container">
		</div>
		
		<div class="main-container">
		<section class="page-title page-title-3 bg-secondary">
		        <div class="container">
		            <div class="row">
		                <div class="col-sm-12 text-center">
		                    <h3 class="uppercase mb0">add courses</h3>
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
		                <div class="col-sm-6">
		                    <div class="feature bordered">
		                        
		                        <form action ="course_inserter.php" method = "post">
                                <label>Course Id Number: </label>
                                <input type = "text" name = "course_id" placeholder = "1110" required /> <br/>
                                <label>Course Name: </label>
                                <input type = "text" name = "course_name" placeholder = "Intro to Programming" size  = 50 required/> <br/>
                                <label>Number of Credits: </label>
                                <input type = "number" name = "number_of_credits" min = "0" max = "5"/> </br>
                                <label>Department Id Number </label>
                                <input type = "number" name = "department_id"/></br>        
		                            
		                            
		                            <o2>
                                    <label> Professor Id Number </label>
                                    <input type = "number" name = "professor_id[]"/></br> <!-- The nice thing about course ids -->

                                    </o2>
                                            <a id = "addprof">
                                                        <i class="pe-7s-add-user icon-sm"></i> Add another professor
    </a>
		                            <button type="submit">Add</button>
		                        </form>
		                    </div>
		                </div>
		                    <div class="feature bordered">
		                        <h4 class="uppercase">reference table</h4>
		                        <div class = "row">
                                <?php
                                $stmt = $db->stmt_init();
                                if($stmt->prepare("select * from P_DEPARTMENT") or die(mysqli_error($db))) {
                                        $stmt->execute();
                                        $stmt->bind_result($department_id, $department_name);
                                        echo "<table border=1><th>Department Name</th><th>Department Id</th></th>\n";
                                        while($stmt->fetch()) {
                                                echo "<tr><td>$department_name</td><td>$department_id</td></tr>";
                                        }
                                        echo "</table>";
            
                                        $stmt->close();
                                }
                                $stmt = $db->stmt_init();
            if($stmt->prepare("select * from P_STAFF  ORDER BY `P_STAFF`.`staff_last_name` ASC") or die(mysqli_error($db))) {
                    $stmt->execute();
                    $stmt->bind_result($staff_id, $firstname, $lastname, $middleInitial);
                    echo "<table border=1><th>Staff ID</th><th>Last Name</th><th>First Name</th><th>Middle Initial</th>\n";
                    while($stmt->fetch()) {
                            echo "<tr><td>$staff_id</td><td>$lastname</td><td>$firstname</td><td>$middleInitial</td></tr>";
                    }
                    echo "</table>";

                    $stmt->close();
            }
        
        

        ?>
                                </div>
		                    </div>
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
				