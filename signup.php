<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" />
  <title>Login</title>    
</head>

<body>
<?php session_start(); ?>
<?php
	$gen_error = "";
	
		require "dbutil.php";
		
	
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		echo "<h1>".$_POST['username'].'+'.$_POST['pwd'].'+'.$_POST['level']."</h1>";
		
		if(!empty($_POST['username']) and !empty($_POST['pwd']) and !empty($_POST['confirm_pwd']) and ($_POST['pwd'] == $_POST['confirm_pwd']))
		{
			#to do- add more specific error handling, add a "this user already exists" type thing
			#require "dbutil.php";
			echo "<h1>".$_POST['username'].'+'.$_POST['pwd'].'+'.$_POST['level']."</h1>";
			$host = "cs4750.cs.virginia.edu";
			$schema = "mev8vy"; 
			$db = DbUtil::loginConnection('mev8vy_a', 'ahG1zee5');
			$stmt = $db->stmt_init();
	
			
			$query = "INSERT INTO P_USERTABLE (Username,Password,Type) VALUES (?, ?, ?)";
			$statement = $db->prepare($query);
			
			#$error = $db->errno . ' ' . $db->error;
			#echo $error;
			
			#$statement->bindValue(':curr_user', $_POST['username']);
			#$statement->bindValue(':pwd', $_POST['pwd']);
			$statement->bind_param('ssi', $_POST['username'], $_POST['pwd'], $_POST['level']);
			
			$statement->execute();
			$statement->close();
			$_SESSION['user'] = $_POST['username'];
			$_SESSION['pwd'] = $_POST['pwd'];
			if($_POST['level'] == 0)
			{
				$_SESSION['level'] = 'mev8vy_b';
			}
			else if ($_POST['level'] == 1)
			{
				$_SESSION['level'] = 'mev8vy_d';
			}
			else if ($_POST['level'] == 2)
			{
				$_SESSION['level'] = 'mev8vy_a';
			}
			$_SESSION['levelpwd']= 'ahG1zee5';
			
		}
		
		
			
		header('Location: main_page.php');
		
	}
?>  
    <header class="logo">
	  <h1 class = "main_title">Sign Up</h1>
	</header>
	
  <div class="container">
    <form action="signup.php" method="post">
		<h1> Username: <input type="text" name="username" class="form-control" autofocus required /> </h1>
		<h1> Password: <input type="password" name="pwd" class="form-control" required /> <span class="error"></h1>
		<h1> Confirm Password: <input type="password" name="confirm_pwd" class="form-control" required /> <span class="error"></h1>
		<h1>I am a: </h1>
		<input type="radio" name="level" checked="checked"  value=0> Student<br>
		<input type="radio" name="level" value=1> Professor<br>
		<input type="radio" name="level" value=2> Administrator
      
	  <input type="submit" value="Sign up" class="btn btn-light"  />   
    </form>
  </div>
</body>
</html>
