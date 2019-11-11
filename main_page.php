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
			
			var usr = <?php echo json_encode($_SESSION['user']); ?>;
			<!-- We print a few things common to all users-->
			var page_ol = document.getElementById("list_of_pages");
			<!-- Fill this next array with the urls for the pages everyone should be able to see-->
			var common_urls = ["search", "page2", "page3"];
			<!-- this array contains the hyperlink text, like "Click here to see all classes" -->
			var common_desc = ["Search for class", "Go to page 2", "Go to page 3"];
			<!-- Fill this next array with whatever stuff only mev8vy_a, the highest privilege user should be able to see -->
			var lv1_urls = ["lv1page4"];
			
			var lv1_desc = ["You can see this because you're a level 1 user!"];
			
			
			for(i=0; i< common_urls.length; i++)
				{
					
					var page_li = document.createElement("LI");
					page_li.innerHTML = "<a href = \""+common_urls[i]+".php\"/>"+common_desc[i]+"</a>";
					page_ol.appendChild(page_li);
					
				}
			
			if(usr == "mev8vy_a")
			{
				for(i = 0; i<lv1_urls.length; i++)
				{
					var page_li = document.createElement("LI");
					page_li.innerHTML = "<a href = \""+lv1_urls[i]+".php\"/>"+lv1_desc[i]+"</a>";
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