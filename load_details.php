<?php
   error_reporting(E_ALL);

	include_once("DBConnections/Connections.php");
				
	$data = json_decode(file_get_contents("php://input"));

	$deletestatus = 0;
	$data1 = array();  
		
	$query = $dbConnection->prepare("SELECT * FROM detailsform WHERE DeleteStatus=? ORDER BY PkId DESC");
	$query->execute(array($deletestatus));
	$num = $query->rowCount();
	if($num>0)
	{	
	    $a=1;
		while($rows = $query->fetch())
		{
			$PkId = $rows['PkId'];
			$name = $rows['Name'];
	        $email = $rows['Email'];
			

			$data1[] = array(
			 "PkId"=>$PkId,
			 "Name"=>$name,
			 "Email"=>$email
			);
			$a++;
		}
		echo (json_encode($data1));
	}	
	else
	{
		$result = "NoRecords";
		echo $result;
	}

?>