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

$sql="INSERT INTO P_REQUIREMENT (req_id, req_name, number_of_courses)
VALUES
( null,'$_POST[req_name]','$_POST[number_of_courses]')";
if (!mysqli_query( $db, $sql)){
    die('Error: ' . mysqli_error($db));
}else{
    echo "Successfully added into the requirements table";
}


$sql = "SELECT `req_id` FROM `P_REQUIREMENT` WHERE `req_name` = '$_POST[req_name]' AND `number_of_courses` = $_POST[number_of_courses] ";
$req_id_query_result = mysqli_query($db ,$sql);
if($req_id_query_result == false){
    echo "No item was not inserted.";
}else{
    $obj = mysqli_fetch_object($req_id_query_result);
    $req_id = $obj->req_id; 
    echo $req_id;
}

$sql="INSERT INTO P_HAS (req_id, department_id  )
VALUES
( '$req_id', '$_POST[department_id]' )";
if (!mysqli_query( $db, $sql)){
    die('Error: ' . mysqli_error($db));
}else{
    echo "Successfully added into the Has table";
}
/*
// An attempt to streamline the process of adding courses to requirements. It did not work so for time's sake just make it manual.

$course_id_query_result;
//Get the course names, then for each course name get all the course_ids and insert into the fulfills
if(isset( $_POST["course_name"])){
    foreach( $_POST["course_name"] as $onecoursename){
        echo $onecoursename;
        $sql = "SELECT `course_id` FROM `P_COURSES` WHERE `course_name` = $onecoursename";
        $course_id_query_result = mysqli_query($db, $sql);
        if(mysqli_num_rows($course_id_query_result) > 0){
            //for each row of data. Note this just contains course_ids
            while($row = mysqli_fetch_assoc($course_id_query_result)){
                echo "CourseIDs";
                echo $row['course_id'];
                $sql= "INSERT INTO P_FULFILLS (course_id, req_id ) 
                VALUES 
                ('$row[course_id]', $req_id)";
                if (!mysqli_query( $db, $sql)){
                    die('Error: ' . mysqli_error($db));
                }else{
                    echo "Successfully added into the course_id table";
                }
            }
        }
    }
}

*/

if(isset( $_POST["course_id"])){
    foreach( $_POST["course_id"] as $onecoursename){
        $sql= "INSERT INTO P_FULFILLS (course_id, req_id ) 
        VALUES 
        ($onecoursename, $req_id)";
        if (!mysqli_query( $db, $sql)){
            die('Error: ' . mysqli_error($db));
        }else{
            echo "Successfully added into the course_id table";
        }
    }
}


?>

</body>
</html>