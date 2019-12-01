

<?php session_start(); ?>
<?php

require('dbutil.php');
$db = DbUtil::loginConnection($_SESSION['level'], $_SESSION['levelpwd']);
//level and levelpwd
echo "<p>Logged in</p>";
?>
<html>

<head>
<meta charset="utf-8">
<title>Add a new Professor</title>
</head>

<body>	
    <form action ="professor_inserter.php" method= "post">
        <label>First Name: </label>
        <input type = "text" name = "staff_first_name" required /> <br/>
        
        <label>Middle Initial: </label>
        <input type = "text" name = "staff_middle_inital" size = "2" /> <br/>
        
        <label>Last Name: </label>
        <input type = "text" name = "staff_last_name" required /> <br/>

        <label>Office Location: </label>
        <input type = "text" name = "office_location" size = "50"/></br>

        <label>Office Hours: </label>
        <input type = "text" name = "office_hour" size = "40"/></br>

        <label>Department Id Number </label>
        <input type = "number" name = "department_id"/></br>
        <input type="submit" value="Add" name="action" />
    </form>


<?php
//Order in which we have to insert.
// ADD DEPARTMENT -> ADD PROFESSOR -> ADD COURSE -> ADD REQUIREMENTS
//                                               -> ADD TEXTBOOK.
//
// ADMIN STARTS HERE
// ADD_department -> Add an existing Department id
// |
// V 
// Create a new Department
// NEXT STAGE
// ADD a new Professor / tag existing professor
// Add Course -> Add additional Professor to existing course / Add Textbook 
// 
// REQUIREMENTS PAGE: 
// ADD new REQUIREMENT / add course to existing requirements.
// 


?>
</body>
</html>