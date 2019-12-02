<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Insert a new Department</title>
</head>
<body>

<button onclick="window.location.href='main_page.php'"> Return to Main Page</button>

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
<?php

$stmt = $db->stmt_init();
if($stmt->prepare("select * from P_DEPARTMENT") or die(mysqli_error($db))) {
        $stmt->execute();
        $stmt->bind_result($department_id, $department_name);
        echo "<table border=1><th>Department Name</th><th>Department Id</th></th>\n";
        while($stmt->fetch()) {
                echo "<tr><td>$department_name</td><td>$department_id</td></tr>";
        }
        echo "</table>";

        $stmt->close();
}
?>
</body>




</html>