<?php  session_start();?>

<?php
	$_SESSION['user'] = "";
	$_SESSION['pwd'] = "";
	$_SESSION['level'] ="";
	$_SESSION['levelpwd'] = "";
	

	header('Location: login.php');

?>