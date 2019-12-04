
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>ADD DEPARTMENTS</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/pe-icon-7-stroke.css" rel="stylesheet" type="text/css" media="all">
        <link href="css/themify-icons.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/theme.css" rel="stylesheet" type="text/css" media="all" />
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
    <body>
				
		<div class="nav-container">
		</div>
		
		<div class="main-container">
		<section class="page-title page-title-3 bg-secondary">
		        <div class="container">
		            <div class="row">
		                <div class="col-sm-12 text-center">
		                    <h3 class="uppercase mb0">ADD DEPARTMENTS</h3>
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

    require('dbutil.php');
    $db = DbUtil::loginConnection($_SESSION['level'], $_SESSION['levelpwd']);
    $stmt = $db->stmt_init();
?>
            <section>
		        <div class="container">
		            <div class="row">
		                <div class="col-sm-6">
		                    <div class="feature bordered">
		                        
                            <form action ="department_inserter.php" method= "post">
                                <label>Department_Name: </label>
                                <input type = "text" name = "department_name" size = 40/></br>
    </form>		                            
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
				



