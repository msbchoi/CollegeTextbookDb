<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Insert into the Textbook</title>
</head>
<body>
<?php
/*
    require "dbutil.php";
    $db = DbUtil::loginConnection('mev8vy', 'ahG1zee5');
	$stmt = $db->stmt_init();
  */  
    require('dbutil.php');
    $db = DbUtil::loginConnection($_SESSION['level'], $_SESSION['levelpwd']);
    
    ?>
    <form action ="course_inserter.php" method= "post">
        <label>Course Id Number: </label>
        <input type = "text" name = "course_id" required /> <br/>
        <label>Course Name: </label>
        <input type = "text" name = "course_name" placeholder = "CS:1110 Intro to Programming" size  = 50 required/> <br/>
        <label>Number of Credits: </label>
        <input type = "number" name = "number_of_credits" min = "0" max = "5"/> </br>
        <label>Department Id Number </label>
        <input type = "number" name = "department_id"/></br>        
        <label> Professor Id Number </label>
        <input type = "number" name = "professor_id"/></br> <!-- The nice thing about course ids -->
        <input type="submit" value="Add" name="action" />
    </form>

</body>


</html>