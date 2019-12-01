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
<button onclick="window.location.href='will_teach.php'"> Add Professors to Existing Courses</button>

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






if(isset( $_POST["professor_id"])){
    foreach( $_POST["professor_id"] as $oneprofid ){
        $sql="INSERT INTO P_TAUGHT_BY (course_id, staff_id )
        VALUES
        ('$_POST[course_id]', $oneprofid)";
        if (!mysqli_query( $db, $sql)){
            die('Error: ' . mysqli_error($db));
        }else{
            echo "Successfully added into the Taught_by table \n";
            echo "";
        }
    }
}





//

/*

$sql="INSERT INTO P_COURSES (course_name, number_of_credits)
VALUES
('$_POST[course_name]','$_POST[number_of_credits]')";
if (!mysqli_query( $db, $sql)){
    die('Error: ' . mysqli_error($db));
}else{
    echo "Successfully added into the course_details table";
    header("Location: http://www.yourwebsite.com/user.php");
    exit();
}
*/
//echo("Failed to redirect");




?>
</body>
</html>