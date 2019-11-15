<?php
$db = DbUtil::loginConnection($_SESSION['level'], $_SESSION['levelpwd']);
$output = '';
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
?>