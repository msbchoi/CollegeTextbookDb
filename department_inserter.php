<?php session_start(); ?>
<?php
require('dbutil.php');
$db = DbUtil::loginConnection($_SESSION['user'], $_SESSION['pwd']);
echo "<p>Logged in</p>";
?>
<html>
<body>

<button onclick="window.location.href='main_page.php'"> Return to Main Page</button>

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
$sql="INSERT INTO P_DEPARTMENT (department_name)
VALUES
( '$_POST[department_name]')";
if (!mysqli_query( $db, $sql)){
    die('Error: ' . mysqli_error($db));
}else{
    echo "Successfully added into the department table";
}
$_SESSION['message'] = 'Successfully added Department!';
   header('Location: add_department.php');
?>
</body>
</html>