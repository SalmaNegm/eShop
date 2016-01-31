<?php
class OrderItems
{
	var $oID;
	var $pID;
	var $quantity;

	private static $conn = Null;

	function __construct($orderID=-1,$proID=-1) 
	{
		if(self::$conn == Null)
		{
			self::$conn = mysqli_connect('localhost','root','iti','eShop');
		}

		if($orderID!=-1 && $proID!=-1) //select by ID --------------------------------
		{
			$query = "select * from orderItems where oID=$orderID and pID=$proID limit 1";
			$result = mysqli_query(self::$conn,$query);
			$orderItem = mysqli_fetch_assoc($result);
			$this->oID = $orderItem['oID'];
			$this->pID = $orderItem['pID'];
		}
	}

	// function getCategory($name) 
	// {
	// 	$query = "select * from categories where cName='$name' limit 1";
	// 	$result = mysqli_query(self::$conn,$query);
	// 	$category = mysqli_fetch_assoc($result);
	// 	$this->cID = $category['cID'];
	// 	$this->cName = $category['cName'];
	// }

	function insert() 
	{
		$query = "insert into orderItems (oID,pID,quantity) values (".$this->oID.",".$this->pID.",".$this->quantity.")";
		$result  = mysqli_query(self::$conn,$query);
		return mysqli_insert_id(self::$conn);
	}

	// function update() 
	// {
	// 	$query = "update categories set cName='".$this->cName."' where cID=".$this->cID;
	// 	mysqli_query(self::$conn,$query);
	// }

	// function delete($id) 
	// {
	// 	$query = "delete from categories where cID=$id";
	// 	mysqli_query(self::$conn,$query);
	// }

	// function is_exist($name)
	// {
	// 	$query = "select cID from categories where cName='".$name."'";
	// 	$result = mysqli_query(self::$conn,$query);
	// 	return (mysqli_num_rows($result)>0)?True:False ;
	// }

	// function getCategories()
	// {
	// 	$query = "select * from categories";
	// 	$result = mysqli_query(self::$conn,$query);
	// 	$data = [];

	// 	while($row = mysqli_fetch_assoc($result)) 
	// 	{
	// 		$data[] = $row;
	// 	}
	// 	return $data;
	// }
}
?>