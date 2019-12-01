<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Insert into the Textbook</title>
<script src=" 
https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"> 
    </script> 

<!-- 
    <script> type = "text/javascript" src = "js/jquery-3.4.1.min" </script>
-->

<script>
        $(document).ready(function(){ 
            $("#addprof").click(function(){ 
                $("o2").append("<label> Professor Id Number </label>");
                $("o2").append("<input type = 'number' name = 'professor_id[]'/></br>"); 
            }); 
        });

</script>
</head>
<body>
<?php

    
/*
    require "dbutil.php";
    $db = DbUtil::loginConnection('mev8vy', 'ahG1zee5');
	$stmt = $db->stmt_init();
*/
    session_start();

    require('dbutil.php');
    $db = DbUtil::loginConnection($_SESSION['level'], $_SESSION['levelpwd']);
    $stmt = $db->stmt_init();
    ?>
    


    <form action ="course_inserter.php" method= "post">
        
            <label>Course Id Number: </label>
            <input type = "text" name = "course_id" placeholder = "1110" required /> <br/>
            <label>Course Name: </label>
            <input type = "text" name = "course_name" placeholder = "Intro to Programming" size  = 50 required/> <br/>
            <label>Number of Credits: </label>
            <input type = "number" name = "number_of_credits" min = "0" max = "5"/> </br>
            <label>Department Id Number </label>
            <input type = "number" name = "department_id"/></br>        
            <label>Professor Notes: </label>
            <input type = "text" name = "professor_notes" placeholder = "Optional: Write up to a 200 character note about the course." size  = 200/> <br/>
            
            <o2>
                <label> Professor Id Number </label>
                <input type = "number" name = "professor_id[]"/></br> <!-- The nice thing about course ids -->
            </o2>
            <input type="submit" value="Add" name="action" />
    </form>

            <button id ="addprof">Add another Professor</button>
    
    <div>
    </div>
    



</body>


</html>