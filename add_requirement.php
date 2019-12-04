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
<title>Add a new Requirement</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"> </script> 



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
<section class="page-title page-title-1 bg-secondary">
		        <div class="container">
		            <div class="row">
		                <div class="col-sm-12 text-center">
		                    <h2 class="uppercase mb0">Add Requirements</h2>
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


    <form action ="requirement_inserter.php" method= "post">
        
            <label>Requirement Name: </label>
            <input type = "text" name = "req_name" placeholder = "BACS Graduation:" size  = 50 required/> <br/>
            <label>Number of Courses: </label>
            <input type = "number" name = "number_of_courses" min = "0" max = "100"/> </br>
            <label>Department Id Number </label>
            <input type = "number" name = "department_id"/></br>
            <o2>
                <label> Course Id Numbers </label>
                <input type = "number" name = "course_id[]"/></br>
                <!-- <input type = "text" name = "course_name[]"/></br> -->
            </o2>
            <a id = "addcourse">
                                                        <i class="pe-7s-add-user icon-sm"></i> Add another course to the requirement
            <input type="submit" value="Add" name="action" />
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
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/parallax.js"></script>
    <script src="js/scripts.js"></script>

</body>



</html>