<?php
        require "dbutil.php";
        $db = DbUtil::loginConnection();

        $stmt = $db->stmt_init();

        if($stmt->prepare("select * from Sailors WHERE sname like ?") or die(mysqli_error($db))) {
                $searchString = '%' . $_GET['SearchSailorName'] . '%';
                $stmt->bind_param(s, $searchString); //? was s param is String
                $stmt->execute();
                $stmt->bind_result($sid, $sname, $rating, $age);
                echo "<table border=1><th>Sailor ID</th><th>Sailor Name</th><th>Rating</th><th>Age</th>\n";
                while($stmt->fetch()) {
                        echo "<tr><td>$sid</td><td>$sname</td><td>$rating</td><td>$age</td></tr>";
                }
                echo "</table>";

                $stmt->close();
        }

        $db->close();


?>