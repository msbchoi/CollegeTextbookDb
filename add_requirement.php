<?php session_start(); ?>
<?php
require('dbutil.php');
require('/js/jquery-3.4.1.min.js')
$db = DbUtil::loginConnection($_SESSION['level'], $_SESSION['levelpwd']);
//level and levelpwd
echo "<p>Logged in</p>";
?>
<html>

<head>
<meta charset="utf-8">
<title> Add a Graduation Requirement! </title>
</head>

<body>	
    <form action ="#" method= "post">
        
        <label>Requirement Name: </label>
        <input type = "text" name = "requirement_name" size = "40" required /> <br/>

        <label>Department Id Number </label>
        <input type = "number" name = "department_id"/></br>

        <label>Number of Courses Required to Fulfill Requirement: </label>
        <input type = "number" name = "number_of_courses" /></br>

        <label>Courses that Fulfill The Requirements: </label>
        <input type = "number" name = "number_of_courses" /></br>

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

$sql="INSERT INTO P_STAFF ( staff_id ,staff_first_name, staff_last_name, staff_middle_initial)
VALUES
(  NULL , '$_POST[staff_first_name]','$_POST[staff_last_name]','$_POST[staff_middle_inital]')";
if (!mysqli_query( $db, $sql)){
    die('Error: ' . mysqli_error($db));
}else{
    echo "Successfully added a staff member into the staff table";
}

$sql = "SELECT `staff_id` FROM `P_STAFF` WHERE `staff_first_name` = '$_POST[staff_first_name]' AND `staff_last_name` = '$_POST[staff_last_name]' ";
$staff_id_query_result = mysqli_query($db ,$sql);
$obj = mysqli_fetch_object($staff_id_query_result);
$staff_id = $obj->staff_id; 
echo $staff_id;

$sql="INSERT INTO P_WORK_FOR (staff_id, department_id  )
VALUES
( $staff_id ,'$_POST[department_id]')";
if (!mysqli_query( $db, $sql)){
    die('Error: ' . mysqli_error($db));
}else{
    echo "Successfully added into the WORK_FOR table";
}

$sql="INSERT INTO P_PROFESSOR (staff_id, office_location, office_hour)
VALUES
( $staff_id ,'$_POST[office_location]', '$_POST[office_hour]' )";
if (!mysqli_query( $db, $sql)){
    die('Error: ' . mysqli_error($db));
}else{
    echo "Successfully added into the WORK_FOR table";
}


?>
</body>
</html>