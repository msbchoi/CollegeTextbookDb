<?php
session_start();
require "dbutil.php";
$db = DbUtil::loginConnection($_SESSION['level'], $_SESSION['levelpwd']);
echo "<p>Logged in</p>";
if(isset($_POST['search']))
{
  $valueToSearch = $_POST['ba;ueToSearch'];
  $query = "SELECT * FROM 'P_COURSES' WHERE CONCAT('course_name','course_id','number_of_credits') LIKE '%". $valueToSearch."%'";
  $search_result = filterTable($query);
}
else{
  $query="SELECT * FROM 'course_id'";
  $search_result = filterTable($query);
}

function filterTable($query)
{
  $filter_Result = mysqli_query($db, $query);
  return $filter_Result;
}
$db->close();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>PHP HTML TABLE DATA SEARCH</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    </head>
    <body>
        
        <form action="filter.php" method="post">
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

         
        
    </body>
    <body>  
  <div class="container">  
   <br />  
   <br />  
   <br />  
   <div class="table-responsive">  
    <h2 align="center">Export MySQL data to Excel in PHP</h2><br /> 
    <form action="filter.php" method="post">
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
    <br />
   </div>  
  </div>  
 </body>
</html>