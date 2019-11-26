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
            $("#addcourse").click(function(){ 
                $("o2").append("<label> Course Id Numbers </label>");
                $("o2").append("<input type = 'number' name = 'course_id[]'/></br>"); 
            }); 
        });
</script>
</head>
<body>
<?php

    session_start();
    require('dbutil.php');
    $db = DbUtil::loginConnection($_SESSION['level'], $_SESSION['levelpwd']);
    $stmt = $db->stmt_init();
    ?>
    


    <form action ="#" method= "post">
        
            <label>Requirement Name: </label>
            <input type = "text" name = "requirement_name" placeholder = "BACS Graduation:" size  = 50 required/> <br/>
            <label>Number of Courses: </label>
            <input type = "number" name = "number_of_credits" min = "0" max = "100"/> </br>
            <label>Department Id Number </label>
            <input type = "number" name = "department_id"/></br>
            <o2>
                <label> Course Id Numbers </label>
                <input type = "number" name = "course_id[]"/></br>
            </o2>
            <input type="submit" value="Add" name="action" />
    </form>
        <button id ="addcourse"> Add another course to the requirements </button>
    <div>
    </div>
    



</body>


</html>