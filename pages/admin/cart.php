<?php   
	
	session_start();
	include "../../classes/products.php";
	$prod = new product;

	$id = $_GET['id'];
	
	if(!isset($_SESSION['cart'][$id]))
	{
		$_SESSION['cart'][$id]= 1;
	}
	else
	{
		$_SESSION['cart'][$id]=$_SESSION['cart'][$id] + 1;
	}
	
	$data = $_SESSION['cart'];
	print_r($data);

	
	$row = $prod -> get_details($id);
		foreach ($row as $value) 
		{
			$price = $value ['pPrice'];
			$pid =$value ['pID'];		
		}
	echo $price;
	echo "<br/>";

	if(isset($_SESSION['totalprice']))
	{
		$_SESSION['totalprice'] += $price ;	
		echo $_SESSION['totalprice'];
	}
	else
	{
		$_SESSION['totalprice']= $price;
	}

	//$_SESSION['totalprice'] += $price ;
	//echo $_SESSION['totalprice'];
	echo "<br/>";	

	

		echo "<br/>";
		
		header("location:home.php");

	 

	


 ?>
 