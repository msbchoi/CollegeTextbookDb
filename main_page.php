<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" />
  <meta name="author" content="Matt Vick, Yoon Kim">
  <title>Login</title>    
</head>


<?php session_start(); ?>


<script>
function prep_list()
		{
			
			var usr_level  = <?php echo json_encode($_SESSION['level']); ?>;
			<!-- We print a few things common to all users-->
			var page_ol = document.getElementById("list_of_pages");
			<!-- Fill this next array with the urls for the pages everyone should be able to see-->
			var common_urls = ["search", "page2", "page3"];
			<!-- this array contains the hyperlink text, like "Click here to see all classes" -->
			var common_desc = ["Search for class", "Go to page 2", "Go to page 3"];
			
			<!--urls and descriptions for teacher only pages -->
			var teacher_urls = ["Teacherurl1"];
			var teacher_desc = ["You can see this because you're a teacher or higher"];
			
			<!-- Fill this next array with whatever stuff only the admins, the highest privilege users should be able to see -->
		

			var admin_urls = ["lv1page4"];
			var admin_desc = ["You can see this because you're a level 1 user!"];
			
			
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
			
		}
		</script>
<body onload = "prep_list();">
    <header class="logo">
	  <h1 class = "main_title">Main page</h1>
	</header>
	
  <div class = "row justify-content-left" id = "page_list">
		<ol id = "list_of_pages">
			
		</ol>
		<a href = "account.php" />Edit my account </a>
		<a href = "class_search_test_home.php" />Course Search </a>
	</div>
	
</body>
</html>