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

  <title>Sort Test</title>    
</head>



<body>
 
<div class = "main-container">
 
<section class="page-title page-title-1 bg-secondary">
		        <div class="container">
		            <div class="row">
		                <div class="col-sm-12 text-center">
		                    <h2 class="uppercase mb0">sort you classes</h2>
		                </div>
		            </div>
		            
		        </div>
		        
		        
 </section>
 <section>
		        <div class="container">
		            <div class="row">
		                <div class="col-sm-12 text-center">
		                    <div class="post-snippet mb64">
		                        <h4>
		                            <!-- result list -->
<?php

session_start();
require "dbutil.php";
$db = DbUtil::loginConnection($_SESSION['level'], $_SESSION['levelpwd']);
		#echo "<p>Logged in</p>";
		if(isset($_GET['order'])){
			$order = $_GET['order'];
		}else{
			$order = 'course_name'; #column nae of default sorting
		}
		if(isset($_GET['sort'])){
			$sort = $_GET['sort'];
		}else{
			$sort = 'ASC';
		}
		$resultSet = $db->query("SELECT * FROM P_COURSES ORDER BY $order $sort"); #the columb name 
		
		if(!empty($resultSet) && $resultSet->num_rows > 0){
			$sort == 'DESC' ? $sort = 'ASC' : $sort ='DESC';
			echo"
			<table border = '1'>
				<tr>
					<th><a href = '?order=course_id&sort=$sort'>course_id</a></th>
					<th><a href = '?order=course_name&sort=$sort'>course_name</a></th> 
			";
			while($rows = $resultSet->fetch_assoc())
			{
				$course_id = $rows['course_id'];#the column of course_id would be displayed
				$course_name = $rows['course_name'];
				#all the columns we want to sort
				echo"
				<tr>
					<td>$course_id</td>
					<td>$course_name</td>
				</tr>
				";
			}
			echo"
			</table>
			";
		}else{
			echo "Guess there's nothing";
		}
		$db->close();
?>
</h4>
		                        
		                        
		                        
		                        
		                    </div>
		                    
		                    <hr>
		                </div>
		                
		            </div>
		            
		        </div>
		        
		    </section>


<!-- go back button -->
<a href="main_page.php" class="btn btn-light">Go back</a>
<!-- footer -->
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