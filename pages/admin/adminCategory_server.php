<?php
	include '../../classes/category.php';
	// NEADTO : make sure that admin is logged in using session value++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	$responce='forbidden';
	if(isset($_GET['categoryName']))
	{
		if(!empty($_GET['categoryName']))
		{
			$category=new Category();
			$category->cName=$_GET['categoryName'];
			$responce=$category->insert();
			 if($responce==0)
			 	$responce='this category name already exist';
		}
		else
			$responce='please enter a value';
	}

	
	if(isset($_GET['cID']))
	{
		if(!empty($_GET['cID']))
		{
			$category=new Category();
			$category->delete($_GET['cID']);
			$responce='done';
		}
		else
			echo $responce='please enter a value';
	}

	if(isset($_GET['ID']) && isset($_POST['newCName']))
	{
		if(!(empty($_GET['ID'])) && !(empty($_POST['newCName'])))
		{
			$category=new Category();
			if($category->is_exist($_POST['newCName']))
			{
				$responce='this category name already exist';
			}
			else
			{
				$category->cID=$_GET['ID'];
				$category->cName=$_POST['newCName'];
				$category->update();
				$responce='done';
			}	
		}
		else
			$responce='please enter a value';
	}

	echo $responce;

?>