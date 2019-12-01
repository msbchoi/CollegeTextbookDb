<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" />
  <meta name="author" content="Minsoo Choi, Matt Vick, Shen Yan, Coco Zhang">
  <title>Login</title>    
</head>

<?php session_start();?>
<?php 

$logged_in = "Yes";

if(empty($_SESSION['user']) and empty($_SESSION['user']))
	{
			$_SESSION['user'] = "";
			$_SESSION['pwd'] = "";
			$_SESSION['level'] = "";
			$_SESSION['levelpwd'] = "";
			$logged_in = "No";
			
	}


 ?>


<script>
function prep_list()
		{
			
			var usr_level  = <?php echo json_encode($_SESSION['level']); ?>;
			var logged_in = <?php echo json_encode($logged_in); ?>;
			if(usr_level == 'mev8vy_b' || logged_in == 'No')
			{
				usr_level = 0;
			}
			else if (usr_level == 'mev8vy_d')
			{
				usr_level = 1;
			}
			else if(usr_level =='mev8vy_a'){
				usr_level = 2;
			}
			
			<!-- We print a few things common to all users-->
			var page_ol = document.getElementById("list_of_pages");
			<!-- Fill this next array with the urls for the pages everyone should be able to see-->
			var common_urls = ["class_search_test_home", "account", "sort", "export"];
			
			
			<!-- this array contains the hyperlink text, like "Click here to see all classes" -->
			var common_desc = ["Search for class", "Edit My Account", "Course Sorting Test", "Export Data"];
			
			<!--urls and descriptions for teacher only pages -->
			var teacher_urls = ["add_course", "add_textbook"];
			var teacher_desc = ["Add New Course", "Add Textbook for Course"];
			
			<!-- Fill this next array with whatever stuff only the admins, the highest privilege users should be able to see -->
		

			var admin_urls = ["add_department", "add_professor", "add_requirement"];
			var admin_desc = ["Add Department", "Add Professor", "Add Requirement"];
			
			
			for(i=0; i< common_urls.length; i++)
				{
					
					var page_li = document.createElement("LI");
					page_li.innerHTML = "<a href = \""+common_urls[i]+".php\"/>"+common_desc[i]+"</a>";
					page_ol.appendChild(page_li);
					
				}
			
			if(usr_level >= 1)
			{
				for(i = 0; i<teacher_urls.length; i++)
				{
					var page_li = document.createElement("LI");
					page_li.innerHTML = "<a href = \""+teacher_urls[i]+".php\"/>"+teacher_desc[i]+"</a>";
					page_ol.appendChild(page_li);
				}
			} 
			if(usr_level == 2)
			{
				for(i = 0; i<admin_urls.length; i++)
				{
					var page_li = document.createElement("LI");
					page_li.innerHTML = "<a href = \""+admin_urls[i]+".php\"/>"+admin_desc[i]+"</a>";
					page_ol.appendChild(page_li);
				}
			}
			
			var logoutdiv = document.getElementById("logout");
			var logoutlink = document.createElement("p");
			if(logged_in == "Yes")
			{
				
				logoutlink.innerHTML = "<a class = 'tiny' href = 'logout.php' title = 'Sign Out'>Sign Out</a>";
				
			}
			else{
				logoutlink.innerHTML= "You are not logged in <a class = 'tiny' href='login.php' title='Sign In'>Sign in</a> or <a class='tiny' href='signup.php' title='Sign up'>Sign up</a>";
			}
			logoutdiv.appendChild(logoutlink);
			
		}
		</script>
<body onload = "prep_list();">
    <header class="logo">
	  <h1 class = "main_title">Main page</h1>
	  <h3><?php if(!empty($_SESSION['user'])){ echo "Welcome ",$_SESSION['user'];} ?></h3>
	</header>
	
  <div class = "row justify-content-left" id = "page_list">
		
		<ol id = "list_of_pages">
			
		</ol>
		</br>
		
		
	</div>
	
	<div class = "row justify-content-center" id = "logout">
	
	</div>
	
</body>
</html>