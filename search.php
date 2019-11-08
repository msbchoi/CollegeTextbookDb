<?php
	require "dbutil.php";
	$db = DbUtil::loginConnection('mev8vy_a', 'ahG1zee5');
	
	$stmt = $db->stmt_init();
	
	if($stmt->prepare("select * from P_COURSES where course_id = 1110 ") or die(mysqli_error($db))) {
		#$searchString = '%' . $_GET['search'] . '%';
		#$stmt->bind_param(s, $searchString);
		$stmt->execute();
		$stmt->bind_result($number, $name, $credits);
		echo "<table border=1><th>Course Number</th><th>Course Name</th><th>Number of Credits</th>\n";
		while($stmt->fetch()) {
			echo "<tr><td>$number</td><td>$name</td><td>$credits</td></tr>";
		}
		echo "</table>";
	
		$stmt->close();
	}
	
	$db->close();


?>