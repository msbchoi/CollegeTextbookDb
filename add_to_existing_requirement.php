<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>ADD REQUIREMENT</title>
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
            $("#addcourse").click(function(){ 
                $("o2").append("<label> Course Id Numbers </label>");
                $("o2").append("<input type = 'number' name = 'course_id[]'/></br>"); 
            }); 
        });
</script>
</head>
<body>

<div class="main-container">
		<section class="page-title page-title-3 bg-secondary">
		        <div class="container">
		            <div class="row">
		                <div class="col-sm-12 text-center">
		                    <h3 class="uppercase mb0">add requirement</h3>
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

    session_start();
    require('dbutil.php');
    $db = DbUtil::loginConnection($_SESSION['level'], $_SESSION['levelpwd']);
    $stmt = $db->stmt_init();
    ?>
 
 <section>
		        <div class="container">
		            <div class="row">
		                <div class="col-sm-6">
		                    <div class="feature bordered">
		                        
                            <form action ="requirement_modifier.php" method= "post">
        
        <label>Requirement ID </label>
        <input type = "text" name = "req_id" placeholder = "" size  = 50 required/> <br/>
        <o2>
            <label> Course Id Numbers </label>
            <input type = "number" name = "course_id[]" placeholder = "1110" required/></br>
            <!-- <input type = "text" name = "course_name[]"/></br> -->
        </o2>
        <a id = "addcourse">
                                                        <i class="ti ti-bookmark-alt icon-sm"></i> Add another course to the requirements
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
                    if($stmt->prepare("select * from P_REQUIREMENT NATURAL JOIN P_FULFILLS" ) or die(mysqli_error($db))) {
                            $stmt->execute();
                            $stmt->bind_result($req_id, $req_name, $number_of_courses, $course_id);
                            echo "<table border=1><th>Requirement ID</th><th>Requirement Name</th><th>Num Courses to Fill Req</th><th>Course Id</th>\n";
                            while($stmt->fetch()) {
                                echo "<tr><td>$req_id </td><td>$req_name</td><td> $number_of_courses</td><td> $course_id</td></tr>";
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

<!--  -->
    
  