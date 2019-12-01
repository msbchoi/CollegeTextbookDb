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
    


    <form action ="requirement_inserter.php" method= "post">
        
            <label>Requirement Name: </label>
            <input type = "text" name = "req_name" placeholder = "BACS Graduation:" size  = 50 required/> <br/>
            <label>Number of Courses: </label>
            <input type = "number" name = "number_of_courses" min = "0" max = "100"/> </br>
            <label>Department Id Number </label>
            <input type = "number" name = "department_id"/></br>
            <o2>
                <label> Course Id Numbers </label>
                <input type = "number" name = "course_id[]"/></br>
                <!-- <input type = "text" name = "course_name[]"/></br> -->
            </o2>
            <input type="submit" value="Add" name="action" />
    </form>
        <button id ="addcourse"> Add another course to the requirements </button>
    <div>
    </div>
        <?php        
        $stmt = $db->stmt_init();
                    if($stmt->prepare("select * from P_DEPARTMENT") or die(mysqli_error($db))) {
                            $stmt->execute();
                            $stmt->bind_result($department_id, $department_name);
                            echo "<table border=1><th>Department Name</th><th>Department Id</th></th>\n";
                            while($stmt->fetch()) {
                                    echo "<tr><td>$department_name</td><td>$department_id</td></tr>";
                            }
                            echo "</table>";

                            $stmt->close();
                    }

        ?>

</body>



</html>