
<!DOCTYPE html>
<html>
    <head>
        <title>PHP HTML TABLE DATA SEARCH</title>
        <style>
            table,tr,th,td
            {
                border: 1px solid black;
            }
        </style>
    </head>
    <body>
        
        <form action="export.php" method="post">
            <input type="text" name="valueToSearch" placeholder="Value To Search"><br><br>
            <input type="submit" name="search" value="Filter"><br><br>
            
            <table>
                <tr>
                    <th>course_name</th>
                    <th>course_id</th>
                    <th>credits</th>
                </tr>

      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['course_name'];?></td>
                    <td><?php echo $row['course_id'];?></td>
                    <td><?php echo $row['number_of_credits'];?></td>
                </tr>
                <?php endwhile;?>
            </table>
        </form>

        <div class="container">  
   <br />  
   <br />  
   <br />  
   			<div class="table-responsive">  
    				<h2 align="center">Export MySQL data to Excel in PHP</h2><br /> 
    					<table class="table table-bordered">
     						<tr>  
                        			 <th>course_name</th>  
                         			 <th>course_id</th>  
                        			 <th>Credits</th>  
       
                    		</tr>
     <script>
	$(document).ready(function() {
		$( "#Classinput" ).change(function() {
			
			$.ajax({
				url: 'export.php', 
				data: {SearchClassName: $( "#Classinput" ).val()},
				type: 'get',
				success: function(data){
					$('#Classresult').html(data);	
				
				}
			});
		});
		
	});
	</script>
    </table>
    <br />
    <form method="post" action="export.php">
     <input type="submit" name="export" class="btn btn-success" value="Export" />
    </form>
   </div>  
  </div>  
        
    </body>
</html>