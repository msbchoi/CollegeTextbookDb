

<!DOCTYPE html>

<html>
<head>

    <script src="js/jquery-1.6.2.min.js" type="text/javascript"></script> 
	<script src="js/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
	<?php session_start(); 
	$_SESSION['query'] = '';
	$_SESSION['query_source'] = '';?>
 	<title>Search for Textbooks by Course Name or Course Id</title>
	<script>
	$(document).ready(function() {
		$( "#Classinput" ).change(function() {
			$.ajax({
				url: 'Search_For_Textbook_information.php', 
				data: {SearchClassName: $( "#Classinput" ).val()},
				type: 'get',
				success: function(data){
					$('#Classresult').html(data);
				}
			});
		});
	});
	</script>
</head>
<body>

<button onclick="window.location.href='main_page.php'"> Return to Main Page</button>
	
	<h3>Search for Textbooks By Class Name or Course Id Numbers</h3>	
           
	<input class="xlarge" id="Classinput" type="search" size="30" placeholder="Class Name Contains"/>

	<div id="Classresult">Search Result</div>
<form method="post" action="export_page.php">
				 <input type="submit" name="export" class="btn btn-success" value="Export" />
				</form>
	<br/><br/>



</body>
</html>
