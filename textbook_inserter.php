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
<button onclick="window.location.href='add_textbook.php'"> Add Another Textbook</button>


<?php
/*
$sql="INSERT INTO P_TEXTBOOK_ID (textbook_id, `edition`, textbook_name, price)
VALUES
( null, '$_POST[textbook_edition]','$_POST[textbook_name]', $_POST[textbook_price])";
if (!mysqli_query( $db, $sql)){
    die('Error: ' . mysqli_error($db));
}else{
    echo "Successfully added into the requirements table";
}
*/
/*
$pdo = new PDO($db, $_SESSION['level'], $_SESSION['levelpwd']); //Creates a new pdo.
$pdosql = $pdo -> prepare("INSERT INTO P_TEXTBOOK_ID (textbook_id, `edition`, textbook_name, price)
VALUES
(?, ?, ? ,?)");
$pdosql -> execute( null, '$_POST[textbook_edition]','$_POST[textbook_name]', $_POST[textbook_price]);
*/
$InsertTextbookSql = $db -> prepare("INSERT INTO P_TEXTBOOK_ID (textbook_id, `edition`, textbook_name, price)
VALUES
(?, ? , ?, ?)");
$InsertTextbookSql-> bind_param( 'isss',$nullvariable = null, $te = $_POST['textbook_edition'] , $tn = $_POST['textbook_name'],  $tp = $_POST['textbook_price']);
$InsertTextbookSql -> execute();
/*
if (!mysqli_query( $db, $InsertTextbookSql)){
    die('Error: ' . mysqli_error($db));
}else{
    echo "Successfully added into the requirements table";
}
*/

$db = DbUtil::loginConnection($_SESSION['level'], $_SESSION['levelpwd']);
$textbook_id = "Not Found";


$findtextbookid = $db -> prepare("SELECT textbook_id FROM `P_TEXTBOOK_ID` WHERE `textbook_name` = ? AND `edition` = ? ");
$findtextbookid -> bind_param("ss", $_POST[textbook_name], $_POST[textbook_edition]);
$findtextbookid -> execute();
$textbook_id_query_result = $findtextbookid -> get_result();
if($textbook_id_query_result == false){
    echo "item was not found";
}else{
    $obj = mysqli_fetch_object($textbook_id_query_result);
    $textbook_id =$obj->textbook_id; 
    echo $textbook_id;
}


/*
$sql = "SELECT textbook_id FROM `P_TEXTBOOK_ID` WHERE `textbook_name` = '$_POST[textbook_name]' AND `edition` = '$_POST[textbook_edition]' ";
$textbook_id_query_result = mysqli_query($db ,$sql);
if($textbook_id_query_result == false){
    echo "item was not found";
}else{
    $obj = mysqli_fetch_object($textbook_id_query_result);
    $textbook_id =$obj->textbook_id; 
    echo $textbook_id;
}
*/

$sql="INSERT INTO P_TEXTBOOK_DETAILS (textbook_id, textbook_data )
VALUES
( '$textbook_id', '$_POST[textbook_data]' )";
if (!mysqli_query( $db, $sql)){
    die('Error: ' . mysqli_error($db));
}else{
    echo "Successfully added into the textbook details table";
}

$firstnames = $_POST['first_name'];
$middleInitials = $_POST['middle_initial'];
$lastnames = $_POST['last_name'];

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


$sql="INSERT INTO P_IN (textbook_id, course_id )
VALUES
( '$textbook_id', '$_POST[course_id]' )";
if (!mysqli_query( $db, $sql)){
    die('Error: ' . mysqli_error($db));
}else{
    echo "Successfully added into the textbook used in Course table";
}

?>

</body>
</html>