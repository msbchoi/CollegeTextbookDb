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
<?php
/*
// An attempt to streamline the process of adding courses to requirements. It did not work so for time's sake just make it manual.
$course_id_query_result;
*/

$course_id = $_POST['course_id'];
$num_courses = count($course_id);
for($i = 0; $i < $num_courses; $i++){
    $sql = "INSERT INTO P_FULFILLS (course_id, req_id)
    VALUES
    ( '$course_id[$i]', $_POST['req_id'])";
    if (!mysqli_query( $db, $sql)){
        die('Error: ' . mysqli_error($db));
    }
}



?>

</body>
</html>