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

		$resultSet = $db->query("SELECT * FROM ____ ORDER BY $order $sort"
		); #the columb name 

		if($resultSet->num_rows > 0){

			$sort == 'DESC' ? sort = 'ASC' : $sort ='DESC';

			echo"
			<table border = '1'>
				<tr>
					<th><a herf = '?order=...&sort=$sort'>_______</a></th>
					<th><a herf = '?order=...&sort=$sort'>________</a></th> #the columns that needed to be displayed
			";
			while($rows = $resultSet->fetch_assoc())
			{
				$course_id = $rows['']#the column of course_id would be displayed
				$....
				#all the columns we want to sort

				echo"
				<tr>
					<td>$course_id</td>
					<td>$....</td>

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