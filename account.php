<!DOCTYPE html>
<html lang="en">
	<head>
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">  
		<!-- <link rel="stylesheet" href="styles/main.css"> -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
		<title>Edit Account</title>
  </head>
  
  <?php 
    
	#once the table set up and stuff is done, actual script to change the credentials will go here. For now... nothing.
  ?>
  
<body >	
	<script>
		function confirm_delete()
		{
			var answer = window.confirm("Are you sure you want to delete your account? This action cannot be undone")
			if (answer) {
				//some code
				alert("You can't delete yourself just yet...sorry.");
			}
			else {
				//some code
				alert("Good choice!");
			}
		}



		function confirm_update()
		{
			$pw1 = $_POST["pw1"]
			$pw2 = $_POST["pw2"]
			if ($pw1 != $pw2) {
				alert("Password does not match!");
			}
			else if ($pw1 == $_POST["pwd"]) {
				alert("This is the same pw...");
			}
		}	
			
	</script>
		


    <header class="logo">
	    <h1 class = "main_title">Account Information</h1>
    </header>
		
		<div class="container">
        <form method = "post" action="account_checker.php">
				<h1  style="font-size: 32px">New Password</h1>
				<input type="password" id = "pw1" name = "pw1"  required="required" style="width: 400px; font-size: 30px" autofocus>
				<br>
				<h1  style="font-size: 32px">Confirm New Password</h1> 
				<input type="password" id = "pw2" name = "pw2"  required="required" style="width: 400px; font-size: 30px">
        <br><br>
        <input type="submit" value="Change Password" name = 'Submitform' onclick="confirm_update()" style = "width: 10em; height: 2em; font-size: 20px">
		 </form>
		 
		<input type="button" class="btn btn-light col-sm-4" id = "delete_button" value="Delete My Account" onclick = "confirm_delete()"></a> 
    </div>
  </body>
</html>