<?php
		session_start();
		
        require "dbutil.php";
        $db = DbUtil::loginConnection($_SESSION['level'], $_SESSION['levelpwd']);
		
        $stmt = $db->stmt_init();

        if($stmt->prepare("select course_id, course_name, textbook_name, edition, price, textbook_data from P_COURSES NATURAL JOIN P_IN NATURAL JOIN TEXTBOOK_ID NATURAL JOIN TEXTBOOK_DETAILS where course_name like ?") or die(mysqli_error($db))) {
                $searchString = '%' . $_GET['SearchClassName'] . '%';
                $stmt->bind_param('s', $searchString);
                $stmt->execute();
                $stmt->bind_result($course_id, $course_name, $textbook_name, $edition, $price, $textbook_data );
                echo "<table border=1><th>Course ID</th><th>Course Name</th><th>Credits</th>\n";
                while($stmt->fetch()) {
                        echo "<tr><td>$course_id</td><td>$course_name</td><td>$textbook_name</td> <td>$textbook_edition</td> <td>$price</td></tr>";
                }
                echo "</table>";

                $stmt->close();
        }
		else
		{
			echo "<p>There was a problem</p>";
		}

        $db->close();


?>