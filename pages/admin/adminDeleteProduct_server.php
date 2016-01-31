<?php
include '../../classes/products.php';
include '../../classes/subcategory.php';
include '../../classes/category.php';
session_start();
if(isset($_GET['selected_pID']))
{
	if(!empty($_GET['selected_pID']))
	{
		$products=new product($_GET['selected_pID']);
		$subcategory=new Subcategory($products->scID);
		$cID=$subcategory->cID;
		$category=new Category($cID);
		$data['scName']=$subcategory->scName;
		$data['cName']=$category->cName;
		$data['pro']=(array)$products;
		$data=json_encode($data);
		echo $data;
		exit();
	}
}

if(isset($_GET['pID'])) //delete product -------------------------------
{
	if(!empty($_GET['pID']))
	{
		$products=new product($_GET['pID']);
		$path=$products->pImg;
		unlink($path);
		$products->delete();
		exit();
	}
}

if(isset($_GET['op']))
{
	if(!empty($_GET['op']))
	{
		if($_GET['op']=='searchList')
		{
			$products=new product();
          	$allPro=$products->products();
          	$allPro=json_encode($allPro);
          	echo $allPro;
		}
	}
}
?>