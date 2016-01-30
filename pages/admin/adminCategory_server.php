<?php
	include '../../classes/category.php';
	include '../../classes/subcategory.php';
	// NEADTO : make sure that admin is logged in using session value++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	$responce='forbidden';
	function rm_fd($dir) 
	{
		if (is_dir($dir)) 
		{
			$objects = scandir($dir);
			foreach ($objects as $object)
			{
				if ($object != "." && $object != "..") 
				{
					if (filetype($dir."/".$object) == "dir") rm_fd($dir."/".$object); else unlink($dir."/".$object);
				}
			}
			reset($objects);
			rmdir($dir);
		}
		else
			unlink($dir);
	}
	//------------------------------------------------------ insert new category ----------------------------------------------
	if(isset($_GET['categoryName'])) 
	{
		if(!empty($_GET['categoryName']))
		{
			$category=new Category();
			$category->cName=$_GET['categoryName'];
			$responce=$category->insert();
			 if($responce==0)
			 	$responce='this category name already exist';
			 else
			 {
			 	mkdir('../../images/products/'.$responce , 0777);
			 	chmod('../../images/products/'.$responce, 0777);
			 }
		}
		else
			$responce='please enter a value';
	}

	//------------------------------------------------------ delete category ----------------------------------------------
	if(isset($_GET['cID']))
	{
		if(!empty($_GET['cID']))
		{
			$category=new Category();
			$category->delete($_GET['cID']);
			rm_fd('../../images/products/'.$_GET['cID']);
			$responce='done';
		}
		else
			echo $responce='please enter a value';
	}

	//------------------------------------------------------ update category ----------------------------------------------
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
	//------------------------------------------------------------- insert subcategory ------------------------------------
	if(isset($_GET['subcategoryName']) && isset($_GET['catId']))
	{
		if((!empty($_GET['subcategoryName'])) && (!empty($_GET['catId'])))
		{
			$subcategory=new Subcategory();
			$subcategory->scName=$_GET['subcategoryName'];
			$subcategory->cID=$_GET['catId'];
			$responce=$subcategory->insert();
			if($responce==0)
				$responce='this subcategory name already exist in this category';
			else
			{
				mkdir('../../images/products/'.$_GET['catId'].'/'.$responce , 0777);
				chmod('../../images/products/'.$_GET['catId'].'/'.$responce, 0777);
			}
		}
		else
			$responce='please enter a value';

	}

	//------------------------------------------------------ delete subcategory ----------------------------------------------
	if(isset($_GET['scID']))
	{
		if(!empty($_GET['scID']))
		{
			$subcategory=new Subcategory($_GET['scID']);
			rm_fd('../../images/products/'.$subcategory->cID.'/'.$_GET['scID']);
			$subcategory->delete($_GET['scID']);
			$count=count($subcategory->getSubcategories($subcategory->cID));
			$catID=$subcategory->cID;
			$responce=array(0=>$count , 1=>$catID);
			$responce=json_encode($responce);
		}

	}

	//--------------------------------------- update subcategory ----------------------------------------------
	if(isset($_GET['catID']) && isset($_GET['scatID']) && isset($_GET['newName']))
	{
		if(!(empty($_GET['catID'])) && !(empty($_GET['scatID'])) && !(empty($_GET['newName'])))
		{
			$subcategory=new Subcategory();
			$subcategory->cID=$_GET['catID'];
			$subcategory->scID=$_GET['scatID'];
			$subcategory->scName=$_GET['newName'];
			$subcategory->update();
			$responce='done';
		}
		else
			$responce='all data are required';
	}


	//-------------------------------- get subcategories of a specific category --------------------------------
	if(isset($_GET['selected_cID']))
	{
		if(!empty($_GET['selected_cID']))
		{
			$subcategory = new Subcategory();
			$responce = $subcategory->getSubcategories($_GET['selected_cID']);
			$responce=json_encode($responce);
		}
	}

	//-------------------------------------------- draw table ----------------------------------------------
	if(isset($_GET['op']))
	{
		if(!empty($_GET['op']))
		{
			if($_GET['op']=='drawTable')
			{
             	$subcategory = new Subcategory();
             	$data=$subcategory->getCorrespondingCat();
                $responce=json_encode($data);
			}
		}
	}
	echo $responce;

?>