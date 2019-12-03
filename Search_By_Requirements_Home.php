

<!DOCTYPE html>

<html>
<head>



    <script src="js/jquery-1.6.2.min.js" type="text/javascript"></script> 
	<script src="js/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
	<?php session_start(); ?>

    
 	<title>Search for Textbooks by Course Name or Course Id</title>
	<script>
	$(document).ready(function() {
		$( "#RequirementInput" ).change(function() {
			$.ajax({
				url: 'Search_By_Requirement_Sql.php', 
				data: {SearchClassName: $( "#RequirementInput" ).val()},
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

<?php

require('dbutil.php');
$db = DbUtil::loginConnection($_SESSION['level'], $_SESSION['levelpwd']);
//level and levelpwd
echo "<p>Logged in</p>";
?>

<button onclick="window.location.href='main_page.php'"> Return to Main Page</button>
	
	<h3>Search for Classes By Requirements: </h3>	
           
	<input class="xlarge" id="RequirementInput" type="search" size="30" placeholder="Requirement Name Contains"/>

	<div id="Classresult">
        Search Result
    </div>

    
    <?php        
        $stmt = $db->stmt_init();
                    if($stmt->prepare("select req_id, req_name from P_REQUIREMENT") or die(mysqli_error($db))) {
                            $stmt->execute();
                            $stmt->bind_result($req_id, $req_name, );
                            echo "<table border=1><th>Requirement Name</th><th>Requirement Id</th></th>\n";
                            while($stmt->fetch()) {
                                    echo "<tr><td>$req_name</td><td>$req_id</td></tr>";
                            }
                            echo "</table>";

                            $stmt->close();
                    }

        ?>
   

	<br/><br/>



</body>
</html>
