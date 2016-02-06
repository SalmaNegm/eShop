<?php
	session_start();
	include '../../classes/products.php';
	include '../../classes/orderItems.php';
	include '../../classes/order.php';
	include '../../classes/user.php';
	$responce='forbidden';
	if(isset($_GET['pID']))
	{
		if(!empty($_GET['pID']))
		{
			unset($_SESSION['cart'][$_GET['pID']]);
			if(!isset($_SESSION['cart'][$_GET['pID']]))
				$responce="1";
			else
				$responce= "0";
		}
	}

	if(isset($_GET['proID']) && isset($_GET['Quantity']))
	{
		if(!empty($_GET['proID']))
		{
			if(!empty($_GET['Quantity']) && $_GET['Quantity']>0 )
			{
				$_SESSION['cart'][$_GET['proID']]=$_GET['Quantity'];
			}
			else
				$_SESSION['cart'][$_GET['proID']]=1;

			$responce=json_encode($_SESSION['cart']);

			// echo json_encode($_SESSION['cart']);
		}
	}

	if(isset($_GET['total']) && isset($_SESSION['cart']) && isset($_SESSION['user']))
	{
		if(!empty($_GET['total']) && !empty($_SESSION['cart']) && !empty($_SESSION['user']))
		{
			$customer=new user($_SESSION['user']);

			if($customer->cridetLimit >= trim($_GET['total']))
			{
				$err=false;
				$conn=new mysqli('localhost','root','iti','eShop');
				mysqli_autocommit($conn,false);

				foreach ($_SESSION['cart'] as $pID => $q) 
				{
					$product=new Product($pID);
					if($product->pQuantity < $q)
					{
						echo $responce="no enough amount of ".$product->pName." we have only ".$product->pQuantity." of it. We are sorry for that.";
						exit();

					}
				}
				$order=new Order();
				$order->uID=$_SESSION['user'];
				$order->oDate=date("Y-m-d");
				$oID=$order->insert();
				if($oID==false)
					$err=true;
				
				$orderItem=new OrderItems();
				foreach ($_SESSION['cart'] as $pID => $q) 
				{

					$orderItem->oID=$oID;
					$orderItem->pID=$pID;
					$orderItem->quantity=$q;
					$orderItem->insert();
					if($orderItem==false)
						$err=true;
					$product=new product($pID);
					$product->pQuantity = $product->pQuantity - $q;
					$product->update($pID);
					if($product==false)
						$err=true;
				}

				
				$customer->cridetLimit= $customer->cridetLimit - $_GET['total'];
				$customer->update($_SESSION['user']);
				if($customer==false)
					$err=true;
				if($err)
				{
					mysqli_rollback($conn);
					$responce='error happend!!';
				}
				else
				{
					mysqli_commit($conn);
					$responce="done";
					unset($_SESSION['cart']);
				}
				
				
			}
			else
				$responce='the money in your cridet is less than the total, please recharge';
		}
		else
			$responce='empty values';
	}


	echo $responce;

?>