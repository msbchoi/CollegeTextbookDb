<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Add a Textbook</title>
<script src=" 
https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"> 
    </script> 



    <script>
     //src = "jquery-3.4.1.min"
      </script>

<script>
        $(document).ready(function(){ 
            $("#addauthor").click(function(){ 
                $("o2").append("<label>First Name: </label>");
                $("o2").append("<input type = 'text' name = 'first_name[]'/>");                
                $("o2").append("<label> Middle Initial(Optional): </label>");
                $("o2").append("<input type = 'text' name = 'middle_initial[]' size = 1 />");
                $("o2").append("<label> Last Name: </label>");
                $("o2").append("<input type = 'text' name = 'last_name[]'/></br>");
            }); 
        });
</script>
</head>
<body>
<button onclick="window.location.href='main_page.php'"> Return to Main Page</button>

<?php

    session_start();
    require('dbutil.php');
    $db = DbUtil::loginConnection($_SESSION['level'], $_SESSION['levelpwd']);
    $stmt = $db->stmt_init();
    ?>
    


    <form action ="textbook_inserter.php" method= "post">
        
            <label>Textbook Name: </label>
            <input type = "text" name = "textbook_name" placeholder = "Name of Textbook:" length = 100 required/> <br/>
            <label>Textbook Edition: </label>
            <input type = "text" name = "textbook_edition" placeholder = "1.00"/> <br/>
            <label>Textbook Price: </label>
            <input type = "text" name = "textbook_price" placeholder = 60.00 /> </br>
            <label>Textbook for Course Id: </label> 
                <input type = "number" name = "course_id" placeholder = "4750" /> </br>
                
            <o2>
                <label>AUTHORS</label></br>
            
                <label>First Name: </label>
                <input type = 'text' name = 'first_name[]'/>
                <label>Middle Initial(Optional): </label>
                <input type = 'text' name = 'middle_initial[]' size = 1 />
                <label>Last Name: </label>
                <input type = 'text' name = 'last_name[]'/>
                </br>
           
                <!-- <input type = "text" name = "coure_name[]"/></br> -->
            </o2>
            
       
            <label>Textbook Description/Purchase Locations</label>
            <input type = "text"  name = "textbook_data"    /></br>
            <input type="submit" value="Add" name="action" />
    </form>
    <button id ="addauthor"> Add another author </button> </br>
    
    <div>
    </div>
</body>



</html>