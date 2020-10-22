<?php
error_reporting(0);
if($_SERVER["REQUEST_METHOD"]==="POST")
{
	
    $data = json_decode(file_get_contents("php://input"));	
	$name = $data->name;
	$email = $data->email;
	
	if($name!="" && $email!="")
	{

		include_once("DBConnections/Connections.php");

		$datetime = date("Y-m-d H:i:s");

		$query = $dbConnection->prepare("INSERT INTO detailsform (Name,Email,CreatedTime) VALUES (?,?,?)");
		$query->execute(array($name,$email,$datetime));

      
		$result = "Success";
		echo $result;
	}
	else
	{
		$result = "Unable to process your request. Please try again later.";
		echo $result;
	}
}
else
{
	echo "<script language=\'javascript\'>window.location=\'index.php\';alert(\'Please fill the form,First.\');</script>";
}
?>