<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Insert into the Textbook</title>
</head>
<body>
<?php
    require "dbutil.php";
	$db = DbUtil::loginConnection('mev8vy_a', 'ahG1zee5');
	$stmt = $db->stmt_init();
	?>
    
    <form action ="course_inserter.php" method= "post">
        <label>Course Id Number: </label>
        <input type = "text" name = "Course_Id" required /> <br/>
        <label>Course Name: </label>
        <input type = "text" name = "Course_name" placeholder = "CS:1110 Intro to Programming" size  = 50 required/> <br/>
        <label>Number of Credits: </label>
        <input type = "number" name = "Number_Of_Credits" min = "0" max = "5"/> </br>
        <label>Department Id Number </label>
        <input type = "number" name = "Department_Id"/></br>        
        <label> Professor Id Number </label>
        <input type = "number" name = "Professor_Id"/></br>

        
    </form>



<?php
/* 

        <label>Requirement Id Number</label>
        <input type = number name = "Req_Id"/> </br>






    <form action="main.php" method="post">
        <label>Textbook Name: </label>
        <input type="text" name="textbook_name" required /> <br/>
        <label>Course_Title: </label>      
        <input type="text" name="title" size="40" required /> <br/>
        <label>Prerequisite: </label>      
        <input type="text" name="prereq" size="40" required /> <br/>
        <label style="vertical-align:top">Description: </label>      
        <textarea name="desc" rows="3" cols="60" required></textarea> <br/>
        <label>Units: </label>      
        <input type="number" name="units" min="1" max="9" required /> <br/>                 
        <input type="submit" value="Add" name="action"  />   
    </form>
    */

    ?>

</body>


</html>