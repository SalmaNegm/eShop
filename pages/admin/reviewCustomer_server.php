<?php
	include '../../classes/user.php';
	if(isset($_GET['selected_emial']))
	{
		if(!empty($_GET['selected_emial']))
		{
			$customers=new user();
          	$Cust=$customers->getByEmail($_GET['selected_emial']);
          	$Cust=json_encode($Cust);
          	echo $Cust;
          	exit();	
		}
		else
			echo "please, choose a customer";
	}
	else
		echo "forbidden";
?>