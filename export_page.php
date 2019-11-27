<?php

session_start();
require "dbutil.php";
$db = DbUtil::loginConnection($_SESSION['level'], $_SESSION['levelpwd']);
echo "<p>Logged in</p>";
$output = '';


if(isset($_POST["export"]))
{
  $sql = "SELECT * FROM p_courses";
  $result = $db->query("SELECT * FROM P_COURSES") ;

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