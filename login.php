<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" />
  <link rel="shortcut icon" type="image/png" href="{%  static 'favicon.ico' %}"/>
  <link rel="canonical" href="https://getbootstrap.com/docs/3.3/examples/carousel/">
  <meta name="author" content="">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Login</title>  
  <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Satisfy' rel='stylesheet' type='text/css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/static/skillshare/carousel.css">
    <link rel="icon" href="/static/skillshare/img/fav.png" type="image/x-icon">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" />
  <meta name="author" content="">
  <title>Login</title>    
</head>

<body>
<?php session_start(); ?>
<?php

	$_SESSION['user'] = "";
	$_SESSION['pwd'] = "";
	$_SESSION['level'] ="";
	$_SESSION['levelpwd'] = "";

	$gen_error = "";
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		
		
		
		
		if(!empty($_POST['username']) && strlen($_POST['username']) > 0 && !empty($_POST['pwd']) && strlen($_POST['pwd']) > 0)
		{
			require "dbutil.php";
			$host = "cs4750.cs.virginia.edu";
			$schema = "mev8vy"; 
			$db = DbUtil::loginConnection('mev8vy_b', 'ahG1zee5');
			
			$stmt = $db->stmt_init();
	
			
			
			$query = "SELECT * FROM P_USERTABLE WHERE Username = ? AND Password =?";
			$statement = $db->prepare($query);
			
			#$error = $db->errno . ' ' . $db->error;
			#echo $error;
			
			#$statement->bindValue(':curr_user', $_POST['username']);
			#$statement->bindValue(':pwd', $_POST['pwd']);
			$statement->bind_param('ss', $_POST['username'], $_POST['pwd']);
			
			$statement->execute();
			$statement->bind_result($user, $userpw, $usertype);
			#$results = $statement->fetchAll();
			
			
			while($statement->fetch())
			{
				$_SESSION['user'] = $user;
				$_SESSION['pwd'] = $userpw;
				$_SESSION['levelpwd'] = 'ahG1zee5';
				
				if($usertype == 0)
				{
					$_SESSION['level'] = 'mev8vy_b';
				}
				else if ($usertype == 1)
				{
					$_SESSION['level'] = 'mev8vy_d';
				}
				else if ($usertype == 2)
				{
					$_SESSION['level'] = 'mev8vy_a';
				}
			}
			
			$statement->close();
			
			
			
			
			
			#$_SESSION['user'] = $_POST['username'];
			#$_SESSION['pwd'] = $_POST['pwd'];
			#from here on out, every time you want to connect to the db call the loginConnection function with the $_SESSION['level'] and 
			# $_SESSION['levelpwd'] as arguments
			
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
  <!-- FOOTER -->
  <footer style="color:#1e1e1e;">
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p>&copy; We Rock </p>
      </footer>
  <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../../assets/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
