<?php
		session_start();
		
        require "dbutil.php";
        $db = DbUtil::loginConnection($_SESSION['level'], $_SESSION['levelpwd']);
		
        $stmt = $db->stmt_init();

        if($stmt->prepare("SELECT department_name,req_name,number_of_courses,course_id, course_name,staff_first_name,staff_last_name,staff_middle_initial, office_location,office_hour from ((((((( P_REQUIREMENT NATURAL JOIN P_HAS) NATURAL JOIN P_DEPARTMENT ) NATURAL JOIN P_FULFILLS) NATURAL JOIN P_COURSES) NATURAL JOIN P_TAUGHT_BY) NATURAL JOIN P_STAFF) NATURAL JOIN P_PROFESSOR) where req_id like ? OR req_name like ?") or die(mysqli_error($db))) {
                $searchString = '%' . $_GET['SearchClassName'] . '%';
                //$stmt->bind_param('ssssssssssss', $val, $val2,$val3,$val4,$val5,$val6,$val7,$val8,$val9,$val10, $searchString, $searchString );
                $stmt->bind_param('ss',$searchString,$searchString );
                $stmt->execute();
				$_SESSION['query'] = "SELECT department_name,req_name,number_of_courses,course_id, course_name,staff_first_name,staff_last_name,staff_middle_initial, office_location,office_hour from ((((((( P_REQUIREMENT NATURAL JOIN P_HAS) NATURAL JOIN P_DEPARTMENT ) NATURAL JOIN P_FULFILLS) NATURAL JOIN P_COURSES) NATURAL JOIN P_TAUGHT_BY) NATURAL JOIN P_STAFF) NATURAL JOIN P_PROFESSOR) where req_id like '".$searchString."' OR req_name like '".$searchString."'";
                $_SESSION['query_source'] = 'req_search';
				$stmt->bind_result($department_name, $req_name, $number_of_courses, $course_id,
                $course_name, $first_name, $last_name, $middle_initial, 
                $office_location, $office_hour);
                echo "<table border=1><th>Requirement_Name</th><th>Department_Name</th><th>Number Of Courses to Fulfill</th>
                <th>Course_ID</th><th>Course_Name</th><th>Professor Who Teaches the Course</th> <th> Office Location</th> <th>Office Hours</th>\n";
                while($stmt->fetch()) {
                        echo "<tr> <td>$req_name</td> <td>$department_name</td><td>$number_of_courses</td><td> $course_id</td>
                        <td>$course_name</td> <td>$first_name, $last_name, $middle_initial</td> 
                        <td>$office_location</td> <td>$office_hour</td></tr>";
                        //echo "<tr><td>$course_id </td><td> $course_name</td><td> $number_of_credits</td><td> $textbook_id</td><td> $edition</td><td> $textbook_name</td><td>$textbook_price</td><td>$textbook_data</td><td>$first_name</td><td>$last_name</td><td>$middle_initial</td></tr>";
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