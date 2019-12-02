<?php
		session_start();
		
        require "dbutil.php";
        $db = DbUtil::loginConnection($_SESSION['level'], $_SESSION['levelpwd']);
		
        $stmt = $db->stmt_init();


        if($stmt->prepare("select * from ((((P_COURSES NATURAL JOIN P_IN) NATURAL JOIN P_TEXTBOOK_ID) NATURAL JOIN P_TEXTBOOK_DETAILS) NATURAL JOIN P_TEXTBOOK_AUTHOR) where course_name like ?") or die(mysqli_error($db))) {
            $searchString = '%' . $_GET['SearchClassName'] . '%';
            $stmt->bind_param('s', $searchString);
            $stmt->execute();
            $stmt->bind_result($textbook_id, $course_id, $course_name, $number_of_credits, $edition, $textbook_name, $textbook_price, $textbook_data, $first_name, $last_name, $middle_initial);
            echo "<table border=1><th>Course ID</th><th>Course Name</th><th>Textbook Name</th><th>Edition</th><th>Price</th> <th>Author</th>\n";
            while($stmt->fetch()) {
                    echo "<tr><td>$course_id</td><td>$course_name</td><td>$textbook_name</td><td>$edition</td><td>$textbook_price</td><td> $first_name $middle_initial $last_name</td></tr>";
                    //echo "<tr><td>$course_id </td><td> $course_name</td><td> $number_of_credits</td><td> $textbook_id</td><td> $edition</td><td> $textbook_name</td><td>$textbook_price</td><td>$textbook_data</td><td>$first_name</td><td>$last_name</td><td>$middle_initial</td></tr>";
                }
            echo "</table>";

            $stmt->close();
    }
    else
    {
        echo "<p>There was a problem</p>";
    }
        /*
        if($stmt->prepare("select * from ((((P_COURSES NATURAL JOIN P_IN) NATURAL JOIN P_TEXTBOOK_ID) NATURAL JOIN P_TEXTBOOK_DETAILS) NATURAL JOIN P_TEXTBOOK_AUTHOR) where course_name like ?") or die(mysqli_error($db))) {
                $searchString = '%' . $_GET['SearchClassName'] . '%';
                $stmt->bind_param('s', $searchString);
                $stmt->execute();
                $stmt->bind_result($textbook_id, $course_id, $course_name, $number_of_credits, $edition, $textbook_name, $textbook_price, $textbook_data, $first_name, $last_name, $middle_initial);
                echo "<table border=1><th>Course ID</th><th>Course Name</th><th>Textbook Name</th><th>Edition</th><th>Price</th> <th>Author</th>\n";
                while($stmt->fetch()) {
                        echo "<tr><td>$course_id</td><td>$course_name</td><td>$textbook_name</td><td>$edition</td><td>$textbook_price</td><td> $first_name $middle_initial $last_name</td></tr>";
                        //echo "<tr><td>$course_id </td><td> $course_name</td><td> $number_of_credits</td><td> $textbook_id</td><td> $edition</td><td> $textbook_name</td><td>$textbook_price</td><td>$textbook_data</td><td>$first_name</td><td>$last_name</td><td>$middle_initial</td></tr>";
                    }
                echo "</table>";

                $stmt->close();
        }
		else
		{
			echo "<p>There was a problem</p>";
        }
        */

        $db->close();


?>