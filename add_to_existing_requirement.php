<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Add a new Requirement</title>
<script src=" 
https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"> 
    </script> 



    <script>
     //src = "jquery-3.4.1.min"
      </script>

<script>
        $(document).ready(function(){ 
            $("#addcourse").click(function(){ 
                $("o2").append("<label> Course Id Numbers </label>");
                $("o2").append("<input type = 'number' name = 'course_id[]'/></br>"); 
            }); 
        });
</script>
</head>
<body>
<button onclick="window.location.href='main_page.php'"> Return to Main Page</button>

<?php

    session_start();
    require('dbutil.php');
    $db = DbUtil::loginConnection($_SESSION['level'], $_SESSION['levelpwd']);
    $stmt = $db->stmt_init();
    ?>
    


    <form action ="requirement_modifier.php" method= "post">
        
            <label>Requirement ID </label>
            <input type = "text" name = "req_id" placeholder = "" size  = 50 required/> <br/>
            <o2>
                <label> Course Id Numbers </label>
                <input type = "number" name = "course_id[]" placeholder = "1110" required/></br>
                <!-- <input type = "text" name = "course_name[]"/></br> -->
            </o2>
            <input type="submit" value="Add" name="action" />
    </form>
        <button id ="addcourse"> Add another course to the requirements </button>
    <div>
    </div>
        <?php        
        $stmt = $db->stmt_init();
                    if($stmt->prepare("select * from P_REQUIREMENT NATURAL JOIN P_FULFILLS" ) or die(mysqli_error($db))) {
                            $stmt->execute();
                            $stmt->bind_result($req_id, $req_name, $number_of_courses, $course_id);
                            echo "<table border=1><th>Requirement ID</th><th>Requirement Name</th><th>Num Courses to Fill Req</th><th>Course Id</th>\n";
                            while($stmt->fetch()) {
                                echo "<tr><td>$req_id </td><td>$req_name</td><td> $number_of_courses</td><td> $course_id</td></tr>";
                            }
                            echo "</table>";

                            $stmt->close();
                    }

        ?>


</body>



</html>