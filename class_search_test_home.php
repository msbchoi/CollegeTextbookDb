

<!DOCTYPE html>

<html>
<head>

    <script src="js/jquery-1.6.2.min.js" type="text/javascript"></script> 
	<script src="js/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
	<?php session_start(); ?>
 	<title>Search for class test</title>
	<script>
	$(document).ready(function() {
		$( "#Classinput" ).change(function() {
			
			$.ajax({
				url: 'class_search_test.php', 
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

	
	<h3>Search substring of Class Name</h3>	
           
	<input class="xlarge" id="Classinput" type="search" size="30" placeholder="Class Name Contains"/>

	<div id="Classresult">Search Result</div>

	<br/><br/>



</body>
</html>
