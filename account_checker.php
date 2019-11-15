<?php session_start(); ?>
<?php
require('dbutil.php');
$db = DbUtil::loginConnection('mev8vy_a', 'ahG1zee5');
//level and levelpwd
echo "<p>Logged in</p>";
?>
<html>
<body>
<?php 
if ($_POST["pw1"] != $_POST["pw2"]) {
    echo "<script>
    alert('Password does not match...');
    window.location.href='account.php';
    </script>";
}
else if ($_POST["pw1"] == $_SESSION["pwd"]){
	echo "<script>
    alert('This is the same password...');
    window.location.href='account.php';
    </script>";
}

$sql= "UPDATE P_USERTABLE
SET Password = '$_POST[pw1]'
WHERE Username = '$_SESSION[user]'";

if (!mysqli_query( $db, $sql)){
    die('Error: ' . mysqli_error($db));
}else{
    echo "Successfully updateds password!";
} 
?>

<p><a href="login.php">Relog to use your new password!</a></p>

</body>
</html>