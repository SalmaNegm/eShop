<?php
class Order
{
	var $oID;
	var $uID;
	var $oDate;


	private static $conn = Null;

	function __construct($id=-1) 
	{
		if(self::$conn == Null)
		{
			self::$conn = mysqli_connect('localhost','root','iti','eShop');
		}

		if($id!=-1) //select by ID --------------------------------
		{
			$query = "select * from orders where oID=$id limit 1";
			$result = mysqli_query(self::$conn,$query);
			$category = mysqli_fetch_assoc($result);
			$this->oID = $category['oID'];
			$this->uID = $category['uID'];
			$this->oDate = $category['oDate'];
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
		$query = "insert into orders (uID,oDate) values ($this->uID,'$this->oDate.')";
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