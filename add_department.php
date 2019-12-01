<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Insert a new Department</title>
</head>
<body>
<?php
    require "dbutil.php";
	$db = DbUtil::loginConnection('mev8vy_a', 'ahG1zee5');
	$stmt = $db->stmt_init();
	?>
    <form action ="department_inserter.php" method= "post">
        <label>Department_Name: </label>
        <input type = "text" name = "department_name" size = 40/></br>
        <input type="submit" value="Add" name="action" />
    </form>

</body>


</html>