<?php
class Subcategory
{
	var $scID;
	var $scName;
	var $cID;


	private static $conn = Null;

	function __construct($id=-1) 
	{
		if(self::$conn == Null)
		{
			self::$conn = mysqli_connect('localhost','root','iti','eShop');
		}

		if($id!=-1) //select by ID --------------------------------
		{
			$query = "select * from subcategories where scID=$id limit 1";
			$result = mysqli_query(self::$conn,$query);
			$subcategory = mysqli_fetch_assoc($result);
			$this->scID = $subcategory['scID'];
			$this->scName = $subcategory['scName'];
			$this->cID = $subcategory['cID'];
		}
	}

	function getSubcategory($name) 
	{
		$query = "select * from subcategories where scName='$name' limit 1";
		$result = mysqli_query(self::$conn,$query);
		$subcategory = mysqli_fetch_assoc($result);
		$this->scID = $subcategory['scID'];
		$this->scName = $subcategory['scName'];
		$this->cID = $subcategory['cID'];
	}

	function insert() 
	{
		$query = "insert into subcategories (scName,cID) values ('".$this->scName."',".$this->cID.")";
		$result  = mysqli_query(self::$conn,$query);
		return mysqli_insert_id(self::$conn);
	}

	function update() 
	{
		$query = "update subcategories set scName='".$this->scName."' , cID=".$this->cID." where scID=".$this->scID;
		mysqli_query(self::$conn,$query);
	}

	function delete($id) 
	{
		$query = "delete from subcategories where scID=$id";
		mysqli_query(self::$conn,$query);
	}

	function is_exist($name,$catID) // check existens of a subcategory in a specific category
	{
		$query = "select scID from subcategories where scName='".$name."' and cID=".$catID;
		$result = mysqli_query(self::$conn,$query);
		return (mysqli_num_rows($result)>0)?True:False ;
	}

	function getSubcategories($catID) //get subcategories of a specific category
	{
		$query = "select * from subcategories where cID=".$catID;
		$result = mysqli_query(self::$conn,$query);
		$data = [];
		while($row = mysqli_fetch_assoc($result)) 
		{
			$data[] = $row;
		}
		return $data;
	}

	function getCorrespondingCat()
	{
		$query="select c.cID,c.cName,sc.scID,sc.scName from categories as c , subcategories as sc where c.cID = sc.cID order by c.cID";
		$result=mysqli_query(self::$conn,$query);
		$data = [];
		while($row = mysqli_fetch_assoc($result)) 
		{
			$data[] = $row;
		}
		return $data;
	}

}

?>
