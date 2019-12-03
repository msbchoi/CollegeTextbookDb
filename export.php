<?php

session_start();
require "dbutil.php";
$db = DbUtil::loginConnection($_SESSION['level'], $_SESSION['levelpwd']);

$sql = "SELECT * FROM p_courses";
  $result = $db->query("SELECT * FROM P_COURSES") ;
?>

<!DOCTYPE html>
<html>  
<head>  
<title>Export MySQL data to Excel in PHP</title>  
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="Minsoo Choi, Matt Vick, Shen Yan, Coco Zhang">
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
<link href="css/themify-icons.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/theme-nearblack.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/custom.css" rel="stylesheet" type="text/css" media="all" />
<link href='http://fonts.googleapis.com/css?family=Lato:300,400%7CRaleway:100,400,300,500,600,700%7COpen+Sans:400,500,600' rel='stylesheet' type='text/css'>
 </head>  
 <body>  
  <div class="container">  
   <br />  
   <br />  
   <br />  
   <div class="table-responsive">  
    <h2 align="center">Export MySQL data to Excel in PHP</h2><br /> 
    <table class="table table-bordered">
     <tr>  
                         <th>course_name</th>
                    <th>course_id</th>
                    <th>credits</th>
                    </tr>
     <?php
     while($row = mysqli_fetch_array($result))  
     {  
        echo '  
       <tr>  
         <td>'.$row["course_name"].'</td>  
         <td>'.$row["course_id"].'</td>  
         <td>'.$row["number_of_credits"].'</td>  
       </tr>  
        ';  
     }
     ?>
    </table>

    <br />
    <form method="post" action="export_page.php">
     <input type="submit" name="export" class="btn btn-success" value="Export" />
    </form>
   </div>  
  </div> 
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/parallax.js"></script>
  <script src="js/scripts.js"></script>
 
 </body>  
</html>
