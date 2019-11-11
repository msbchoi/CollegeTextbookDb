<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" />
  <meta name="author" content="Matt Vick, Yoon Kim">
  <title>Login</title>    
</head>

<body>
<?php session_start(); ?>
<?php
	$gen_error = "";
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		
		
		if(!empty($_POST['username']) && strlen($_POST['username']) > 0 && !empty($_POST['pwd']) && strlen($_POST['pwd']) > 0)
		{
			require "dbutil.php";
			$host = "cs4750.cs.virginia.edu";
			$schema = "mev8vy"; 
			$db = DbUtil::loginConnection($_POST['username'], $_POST['pwd']);
			$_SESSION['user'] = $_POST['username'];
			$_SESSION['pwd'] = $_POST['pwd'];
			#from here on out, every time you want to connect to the db call the loginConnection function with the $_SESSION['user'] and 
			# $_SESSION['pwd'] as arguments
			
			header('Location: main_page.php');
		}
	}
?>  
    <header class="logo">
	  <h1 class = "main_title">Welcome back!</h1>
	</header>
	
  <div class="container">
    <form action="login.php" method="post">
      <h1> Username: <input type="text" name="username" class="form-control" autofocus required /> </h1>
      <h1> Password: <input type="password" name="pwd" class="form-control" required /> <span class="error"></h1>
      <span class="error"><?php echo $gen_error;?></span><br/>
	  <input type="submit" value="Sign in" class="btn btn-light"  />   
    </form>
  </div>
</body>
</html>
