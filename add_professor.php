

<?php session_start(); ?>
<?php
require('dbutil.php');
$db = DbUtil::loginConnection($_SESSION['user'], $_SESSION['pwd']);
//level and levelpwd
echo "<p>Logged in</p>";
?>
<html>

<head>
<meta charset="utf-8">
<title>Add a new Professor</title>
</head>

<body>	
    <form action ="#" method= "post">
        <label>First Name: </label>
        <input type = "text" name = "staff_first_name" required /> <br/>
        
        <label>Middle Initial Name: </label>
        <input type = "text" name = "staff_first_name"  /> <br/>
        
        <label>Last Name: </label>
        <input type = "text" name = "staff_last_name" required /> <br/>

        <label>Office Location: </label>
        <input type = "text" name = "office_location" size = "50"/></br>

        <label>Office Hours: </label>
        <input type = "text" name = "office_hours" size = "40"/></br>

        <label> Professor Id Number </label>
        <input type = "number" name = "professor_id"/></br> <!-- The nice thing about course ids -->

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

$sql="INSERT INTO P_staff_id (course_id, course_name, number_of_credits)
VALUES
('$_POST[course_id]','$_POST[course_name]','$_POST[number_of_credits]')";
if (!mysqli_query( $db, $sql)){
    die('Error: ' . mysqli_error($db));
}else{
    echo "Successfully added into the courses_id table";
}

$sql = "SELECT staff_id FROM P_STAFF WHERE staff_first_name = $_POST[staff_first_name] AND staff_last_name = $_POST = [staff_last_name]";
$staff_id_query = mysqli_query($sql);
$staff_id = mysqli_fetch_object($staff_id_query);
echo "Staff Id is" + $staff_id;


$sql="INSERT INTO P_TAUGHT_BY (course_id, staff_id, professor_reviews )
VALUES
('$_POST[course_id]','$_POST[professor_id]', '')";
if (!mysqli_query( $db, $sql)){
    die('Error: ' . mysqli_error($db));
}else{
    echo "Successfully added into the Taught_by table";
}

$sql="INSERT INTO P_WORK_FOR (course_i, department_id  )
VALUES
('$_POST[course_id]','$_POST[department_id]')";
if (!mysqli_query( $db, $sql)){
    die('Error: ' . mysqli_error($db));
}else{
    echo "Successfully added into the Taught_by table";
}





?>
</body>
</html>