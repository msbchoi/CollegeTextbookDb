<?php session_start(); ?>
<?php
require('dbutil.php');
$db = DbUtil::loginConnection($_SESSION['level'], $_SESSION['levelpwd']);
//level and levelpwd
echo "<p>Logged in</p>";
?>
<html>
<body>
<button onclick="window.location.href='main_page.php'"> Return to Main Page</button>
<button onclick="window.location.href='add_professor.php'"> Add Another Professor </button>

<?php

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
$_SESSION['message'] = 'Successfully added Professor!';
   header('Location: add_professor.php');

?>
</body>



</html>