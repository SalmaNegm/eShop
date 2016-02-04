<?php 
	
	//var_dump($_POST);
	//var_dump($_GET);
	
	include "../../classes/user.php";
	$userObj = new user;
	$email = $userObj-> getuserByEmail($_GET['email']);
	if(($email)==0)    //false
	{
		$replay = array('data' => 'Avilable');
		//echo "Avilable";
	}
	else
	{
		//cho "Duplicated";
		$replay = array('data' => 'Duplicated');
	}
	echo json_encode($replay);
 ?>

 