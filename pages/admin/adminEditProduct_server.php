<?php
include '../../classes/products.php';
include '../../classes/subcategory.php';
session_start();
if(isset($_GET['selected_pID']))
{
	if(!empty($_GET['selected_pID']))
	{
		$products=new product($_GET['selected_pID']);
		$subcategory=new Subcategory($products->scID);
		$data['cID']=$subcategory->cID;
		$data['pro']=(array)$products;
		$data=json_encode($data);
		echo $data;
		exit();
	}
}


if(isset($_GET['selected_scID']))
{
	if(!empty($_GET['selected_scID']))
	{
		$products=new product();
		$data=$products->get_product($_GET['selected_scID']);
	}
}


if(isset($_POST['edit_ok']))
{
	$isValid=True;
	if(isset($_POST['insert_pName']))
	{
		if(empty($_POST['insert_pName']))
		{
			$isValid=False;
			$arrErrors[]='insert_pName';
		}
		else
		{	
			$product=new product($_POST['pID']);
			if($_POST['insert_pName'] != $product->pName)
			{
				$isExist=$product->isUniqueName($_POST['insert_pName']);
				if($isExist)
				{
					$arrErrors['isUnique']='this product name already exist';
					$isValid=False;
				}
			}
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
			
			$_POST['insert_pQuantity']=0;
		}
	}
	// if(isset($_FILES['insert_pImage']))
	// {
	// 	// print_r($_FILES['insert_pImage']);
	// 	if($_FILES['insert_pImage']['name']=='')
	// 	{

	// 		$isValid=False;
	// 		$arrErrors[]='insert_pImage';
	// 	}
	// }
	// else
	// {
	// 	$isValid=False;
	// 	$arrErrors[]='insert_pImage';
	// }
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

		$products=new product($_POST['pID']);
		if(empty($_FILES['insert_pImage']['name']))
		{
			$path=$products->pImg;
		}
		else
		{
			$name = $_FILES['insert_pImage']['name'];
			$size = $_FILES['insert_pImage']['size'];
			$type = $_FILES['insert_pImage']['type'];
			$tmp_name = $_FILES['insert_pImage']['tmp_name'];
			$type=explode("/", $type);
			$path='../../images/products/'.$_POST['cNames_menu_edit'].'/'.$_POST['scNames_menu_edit'].'/'.time().'.'.$type[1];
			unlink($products->pImg);
			move_uploaded_file($tmp_name,$path);
			chmod($path,0777);
		}

		
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
			
			// echo "<img src='images/$name'/>";
		// }

		
		$products->pName=$_POST['insert_pName'];
		echo $_POST['insert_pName']."<br/>";
		$products->scID=$_POST['scNames_menu_edit'];
		echo $_POST['scNames_menu_edit']."<br/>";
		$products->pPrice=$_POST['insert_pPrice'];
		echo $_POST['insert_pPrice']."<br/>";
		$products->pQuantity=$_POST['insert_pQuantity'];
		echo $_POST['insert_pQuantity']."<br/>";
		$products->pImg=$path;
		echo $path."<br/>";
		$products->pDesc=$_POST['insert_pDesc'];
		echo $_POST['insert_pDesc']."<br/>";
		echo $_POST['pID'];
		$id=$products->update($_POST['pID']);
	}
	else
	{
		$_SESSION['errors']=$arrErrors;
	}
	header("Location: adminEditProduct.php");
	exit();
}
	
?>