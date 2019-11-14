<?php
$db = DbUtil::loginConnection($_SESSION['level'], $_SESSION['levelpwd']);
		echo "<p>Logged in</p>";

		if(isset($_GET['order'])){
			$order = $_GET['oreder'];
		}else{
			$order = ''; #column nae of default sorting

		}
		if(isset($_GET['sort'])){
			$sort = $_GET['sort'];
		}else{
			$sort = 'ASC'
		}

		$resultSet = $db->query("SELECT * FROM P_COURSES ORDER BY $order $sort"
		); #the columb name 

		if($resultSet->num_rows > 0){

			$sort == 'DESC' ? sort = 'ASC' : $sort ='DESC';

			echo"
			<table border = '1'>
				<tr>
					<th><a herf = '?order=course_id&sort=$sort'>course_id</a></th>
					<th><a herf = '?order=course_name&sort=$sort'>course_name</a></th> 
			";
			while($rows = $resultSet->fetch_assoc())
			{
				$course_id = $rows['course_id']#the column of course_id would be displayed
				$course_name = $rows['course_name']
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

		}
		$db->close();
?>