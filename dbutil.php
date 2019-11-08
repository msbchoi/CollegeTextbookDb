<?php
class DbUtil{
	
	
	#the connection to the db is now a function taking in the stuff needed to connect as arguments
	public static function loginConnection($loginUser, $loginPass){ 
		$host = "cs4750.cs.virginia.edu";
		$schema = "mev8vy"; 
		$db = new mysqli($host, $loginUser, $loginPass, $schema);
		if($db->connect_errno){
			echo("Could not connect to db");
			$db->close();
			exit();
		}
		
		return $db;
	}
	
}
?>

