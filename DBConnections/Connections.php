<?php
	date_default_timezone_set('Asia/Calcutta');
		
	$host ="localhost";
	$db_name = "eek3km8wxb";
	$db_username = "eek3km8wxb";
	$db_password = "iO2fLzUyo7";

	
	$dbConnection = new PDO("mysql:dbname=$db_name;host=$host;charset=utf8", "$db_username", "$db_password");	
	$dbConnection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);	
	$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	
	function GetDateTime()
	{
		$time = date('Y-m-d H:i:s');
		return $time;
	}
?>
