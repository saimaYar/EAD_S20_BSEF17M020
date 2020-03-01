<?php
if(isset($_REQUEST{"action"}) && !empty($_REQUEST{"action"}))
{
	$action=$_REQUEST{"action"};
	if($action=="signup")
	{
		$name=$_REQUEST{"name"};
		$email=$_REQUEST{"email"};
		echo jason_encode(true);
	}
	else if($action=="login")
	{
		$personInfo=array();
		$personInfo[0]=array("ID"=>1 , "name"=>"saima" , "email"="saima@gmail.com");
		$personInfo[1]=array("ID"=>2 , "name"=>"sadaf" , "email"="sadaf@gmail.com");
		$personInfo[2]=array("ID"=>3 , "name"=>"saram" , "email"="saram@gmail.com");

	}
	$output{"data"}=$personInfo;
	echo jason_encode($output);
	}

?>
