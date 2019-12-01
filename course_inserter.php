<?php session_start(); ?>
<?php
require('dbutil.php');
$db = DbUtil::loginConnection($_SESSION['level'], $_SESSION['levelpwd']);
//level and levelpwd
echo "<p>Logged in</p>";
?>
<html>
<body>
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




/*

$sql="INSERT INTO P_TAUGHT_BY (course_id, staff_id, professor_reviews )
VALUES
('$_POST[course_id]','$_POST[professor_id]', '')";
if (!mysqli_query( $db, $sql)){
    die('Error: ' . mysqli_error($db));
}else{
    echo "Successfully added into the Taught_by table";
}
*/


$sql="INSERT INTO P_COURSES (course_id, course_name, number_of_credits)
VALUES
('$_POST[course_id]','$_POST[course_name]','$_POST[number_of_credits]')";
if (!mysqli_query( $db, $sql)){
    die('Error: ' . mysqli_error($db));
}else{
    echo "Successfully added into the courses_id table";
}


/*
$numAuthors = count($lastnames);
echo("There are $numAuthors author(s) </br>" );
for($i = 0; $i < $numAuthors; $i++){
    $sql = "INSERT INTO P_TEXTBOOK_AUTHOR (textbook_id, author_first_name, author_last_name, author_middle_initial)
    VALUES
    ($textbook_id, '$firstnames[$i]', '$lastnames[$i]', '$middleInitials[$i]')";
    if (!mysqli_query( $db, $sql)){
        die('Error: ' . mysqli_error($db));
    }else{
        echo "Author was added into the textbook_authors table";
    }

    

}
*/


if(isset( $_POST["professor_id"])){
    foreach( $_POST["professor_id"] as $oneprofid ){
        $sql="INSERT INTO P_TAUGHT_BY (course_id, staff_id )
        VALUES
        ('$_POST[course_id]', $oneprofid)";
        if (!mysqli_query( $db, $sql)){
            die('Error: ' . mysqli_error($db));
        }else{
            echo "Successfully added into the Taught_by table";
        }
    }
}





$sql="INSERT INTO P_BELONGS (course_id, department_id  )
VALUES
('$_POST[course_id]','$_POST[department_id]')";
if (!mysqli_query( $db, $sql)){
    die('Error P_Belongs:  ' . mysqli_error($db));
}else{
    echo "Successfully added into the Taught_by table";
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