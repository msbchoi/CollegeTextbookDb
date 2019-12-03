<?php

session_start();
require "dbutil.php";
$db = DbUtil::loginConnection($_SESSION['level'], $_SESSION['levelpwd']);
#echo "<p>Logged in</p>";
echo "<p>".$_SESSION['query']."</p>";

$output = '';


if(isset($_POST["export"]))
{
  $sql = "SELECT * FROM p_courses";
  $result = $db->query($_SESSION['query']);


if(mysqli_num_rows($result) > 0)
 {
	if($_SESSION['query_source'] == 'class_search')
	{
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                         <th>Course ID</th>  
                         <th>Course Name </th>  
                         <th>Credits</th>  
                    </tr>
  ';
	}
	else if($_SESSION['query_source'] == 'textbook_search')
	{
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                         <th>Course ID</th>  
                         <th>Course Name</th>  
                         <th>Textbook Name</th>
						 <th>Edition</th>
						 <th>Price</th>
						<th>Author</th>
                    </tr>
  ';
	}
	else if($_SESSION['query_source'] == 'req_search')
	{
		$output .= '
   <table class="table" bordered="1">  
                    <tr>  
                         <th>Requirement Name</th>  
                         <th>Department Name</th>  
                         <th>Number of Courses to Fulfill</th>
						 <th>Course ID</th>
						 <th>Course Name</th>
						<th>Professor(s)</th>
						<th>Office Location</th>
						<th>Office Hours</th>
                    </tr>
  ';
	}
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>';  
                         

						if($_SESSION['query_source'] == 'class_search')
						{
							$output .= '<td>'.$row["course_id"].'</td>';
                         $output .= '<td>'.$row["course_name"].'</td>';
                        $output .= '<td>'.$row["number_of_credits"].'</td> '; 
						}
						else if($_SESSION['query_source'] == 'req_search')
						{
							$output .= '<td>'.$row["req_name"].'</td>';
							
							$output .= '<td>'.$row["department_name"].'</td>';
							$output .= '<td>'.$row["number_of_courses"].'</td> ';
							$output .= '<td>'.$row["course_id"].'</td> ';
							$output .= '<td>'.$row["course_name"].'</td> ';
							
							$output .= '<td>'.$row["staff_first_name"].' '.$row["staff_middle_initial"].' '.$row["staff_last_name"].'</td> ';
							$output .= '<td>'.$row["office_location"].'</td> ';
							$output .= '<td>'.$row["office_hour"].'</td> ';
						}
						else if($_SESSION['query_source'] == 'textbook_search')
						{
							$output .= '<td>'.$row["course_id"].'</td>';
							$output .= '<td>'.$row["course_name"].'</td>';
							$output .= '<td>'.$row["textbook_name"].'</td> ';
							$output .= '<td>'.$row["edition"].'</td> ';
							$output .= '<td>'.$row["price"].'</td> ';
							$output .= '<td>'.$row["author_first_name"].' '.$row["author_middle_initial"].' '.$row["author_last_name"].'</td> ';
						}
                    $output.= '</tr>
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