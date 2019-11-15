<?php

session_start();
require "dbutil.php";
$db = DbUtil::loginConnection($_SESSION['level'], $_SESSION['levelpwd']);
echo "<p>Logged in</p>";
$output = '';
$search_result = '';
if(isset($_POST['search']))
{
	$valueToSearch = $_POST['ba;ueToSearch'];
	$query = "SELECT * FROM 'P_COURSES' WHERE CONCAT('course_name','course_id','number_of_credits') LIKE '%". $valueToSearch."%'";
	$search_result = filterTable($query);
}
else{
	$query="SELECT * FROM 'course_id'";
	$search_result = filterTable($query);
}

function filterTable($query)
{
	$filter_Result = mysqli_query($db, $query);
	return $filter_Result;
}


if(isset($_POST["export"]))
{
 $result = $search_result;
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                         <th>course_name</th>  
                         <th>course_id</th>  
                         <th>Credits</th>  
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                         <td>'.$row["course_name"].'</td>  
                         <td>'.$row["course_id"].'</td>  
                         <td>'.$row["number_of_credits"].'</td>  
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=download.xls');
  echo $output;
 }
}
$db->close();
?>
<!DOCTYPE html>
<html>  
 <head>  
  <title>Export MySQL data to Excel in PHP</title>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
 </head>  
 <body>  
  <div class="container">  
   <br />  
   <br />  
   <br />  
   <div class="table-responsive">  
    <h2 align="center">Export MySQL data to Excel in PHP</h2><br /> 
    <form action="export.php" method="post">
            <input type="text" name="valueToSearch" placeholder="Value To Search"><br><br>
            <input type="submit" name="search" value="Filter"><br><br>
    <table class="table table-bordered">
     <tr>  
                         <th>Name</th>  
                         <th>Address</th>  
                         <th>City</th>  
       <th>Postal Code</th>
       <th>Country</th>
                    </tr>
     <?php
     while($row = mysqli_fetch_array($search_result))  
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
</form>
    <br />
    <form method="post" action="export.php">
     <input type="submit" name="export" class="btn btn-success" value="Export" />
    </form>
   </div>  
  </div>  
 </body>  
</html>
