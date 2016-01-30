<?php
include '../../classes/products.php';
session_start();
if(isset($_POST['insert_ok']))
{
	$isValid=True;
	if(isset($_POST['insert_pName']))
	{
		if(empty($_POST['insert_pName']))
		{
			$isValid=False;
			$arrErrors[]='insert_pName';
		}
	}
	if(isset($_POST['cNames_menu_edit']))
	{
		echo 'cNAme:'.$_POST['cNames_menu_edit'] ."</br>";
		if(empty($_POST['cNames_menu_edit']))
		{
			
			$isValid=False;
			$arrErrors[]='cNames_menu_edit';
		}
	}
	else
	{
		$isValid=False;
		$arrErrors[]='cNames_menu_edit';
	}
		
	
	if(isset($_POST['scNames_menu_edit']))
	{
		echo 'scName:'.$_POST['scNames_menu_edit'] ."</br>";
		if(empty($_POST['scNames_menu_edit']))
		{
			
			$isValid=False;
			$arrErrors[]='scNames_menu_edit';
		}
	}
	else
	{
		$isValid=False;
		$arrErrors[]='scNames_menu_edit';
	}
	if(isset($_POST['insert_pPrice']))
	{
		if(empty($_POST['insert_pPrice']))
		{
			$isValid=False;
			$arrErrors[]='insert_pPrice';
		}
	}
	if(isset($_POST['insert_pQuantity']))
	{
		if(empty($_POST['insert_pQuantity']))
		{
			
			$isValid=False;
			$arrErrors[]='insert_pQuantity';
		}
	}
	if(isset($_FILES['insert_pImage']))
	{
		// print_r($_FILES['insert_pImage']);
		if($_FILES['insert_pImage']['name']=='')
		{

			$isValid=False;
			$arrErrors[]='insert_pImage';
		}
	}
	else
	{
		$isValid=False;
		$arrErrors[]='insert_pImage';
	}
	if(isset($_POST['insert_pDesc']))
	{
		if(empty($_POST['insert_pDesc']))
		{
			$isValid=False;
			$arrErrors[]='insert_pDesc';
		}
	}
	// print_r($arrErrors);
	// exit();
	if($isValid)
	{
		$name = $_FILES['insert_pImage']['name'];
		$size = $_FILES['insert_pImage']['size'];
		$type = $_FILES['insert_pImage']['type'];
		$tmp_name = $_FILES['insert_pImage']['tmp_name'];
		$type=explode("/", $type);
		$path='../../images/products/'.$_POST['cNames_menu_edit'].'/'.$_POST['scNames_menu_edit'].'/'.time().'.'.$type[1];

		// echo $type
		// $allowed_types = array('image/png','image/jpg','image/jpeg');
			
		// if(!in_array($type,$allowed_types)) 
		// {
		// 	echo 'plz, upload image type';
		// } 
		// else if($size > 42565433)
		// {
		// 	echo 'plz, dun exceed the max limit of size';
		// }
		//  else 
		// {
			move_uploaded_file($tmp_name,$path);
			chmod($path,0777);
			// echo "<img src='images/$name'/>";
		// }

		$products=new product();
		$products->pName=$_POST['insert_pName'];
		$products->scID=$_POST['scNames_menu_edit'];
		$products->pPrice=$_POST['insert_pPrice'];
		$products->pQuantity=$_POST['insert_pQuantity'];
		$products->pImg=$path;
		$products->pDesc=$_POST['insert_pDesc'];
		$id=$products->insert();
	}
	else
	{
		$_SESSION['errors']=$arrErrors;
	}
	header("Location: adminProducts.php");
	exit();
}
	
?>