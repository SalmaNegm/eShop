<?php 
	class product{

	private static $conn = Null;
	var $pId;
	var $pName;
	var $pPrice;
	var $pQuantity;
	var $pImg;
	var $pDesc;
	var $scId;
	public function __construct($pId=-1) //default select with specific id
	{
			if(is_null(self::$conn)) self::$conn = mysqli_connect('localhost','root','iti','eShop');
			/*if($pId!=-1)
			 {
				$query = "select * from products where id=$pId ";
				$result = mysqli_query(self::$conn,$query);
				$product = mysqli_fetch_assoc($result);
				$this->pId = $product['pId'];
				$this->pName = $product['pName'];
				$this->pPrice = $product['pPrice'];
				$this->pQuantity = $product['pQuantity'];
				$this->pImg = $product['pImg'];
				$this->pDesc = $product['pDesc'];
				$this->scId = $product['scId'];
			}*/

	}
	function products()   //select all products
	{
		$query = "select * from products";
		$result = mysqli_query(self::$conn,$query);
		$all_prod = [];

		while($row = mysqli_fetch_assoc($result)) {
			$all_prod[] = $row;
		}
		return $all_prod;
	}
	function last_products()   //select last products
	{
		$query = "select * from products  ORDER BY pID DESC ";  //limit 10
		$result = mysqli_query(self::$conn,$query);
		$all_prod = [];

		while($row = mysqli_fetch_assoc($result)) {
			$all_prod[] = $row;
		}
		return $all_prod;
	}
	function last_added()   //select last product added
	{
		$query = "select * from products  ORDER BY pID DESC limit 1"; 
		$result = mysqli_query(self::$conn,$query);
		$all_prod = [];

		while($row = mysqli_fetch_assoc($result)) {
			$all_prod[] = $row;
		}
		return $all_prod;
	}
	function rand_prod()   //select random product
	{
		$query = "select * from products  ORDER BY RAND() LIMIT 1"; 
		$result = mysqli_query(self::$conn,$query);
		$all_prod = [];

		while($row = mysqli_fetch_assoc($result)) {
			$all_prod[] = $row;
		}
		return $all_prod;
	}
	function insert() //insert new product
	{
		$query = "insert into products(pName,pPrice,pQuantity,pImg,pDesc,scId) values('$this->pName','$this->pPrice','$this->pQuantity','$this->pImg','$this->pDesc','$this->scId')";
		$result  = mysqli_query(self::$conn,$query);
		return mysqli_insert_id(self::$conn);
	}
	function delete ()
	{
		$query = "delete from products where pId=$this->pId";
		mysqli_query(self::$conn,$query);
	}
	function update ()
	{
		$query = "update products set pName='$this->pName', pPrice='$this->pPrice',pImg='$this->pImg' where pId=$this->pId";
		mysqli_query(self::$conn,$query);
	}
	function get_product($id)   //by subcat id
	 {
		$query = "select * from products where scId=$id ";
		$result = mysqli_query(self::$conn,$query);
		$all_prod = [];

		while($row = mysqli_fetch_assoc($result)) {
			$all_prod[] = $row;
		}
		return $all_prod;
	
	}
	function get_By_price($val1,$val2)
	{
		$query ="select * from products where pPrice between $val1 and $val2";
		$result = mysqli_query(self::$conn,$query);
		$all_prod = [];

		while($row = mysqli_fetch_assoc($result)) {
			$all_prod[] = $row;
		}
		return $all_prod;

	}
	function get_details($id)   //by prod id
	 {
		$query = "select * from products where pID=$id ";
		$result = mysqli_query(self::$conn,$query);
		$all_detail = [];

		while($row = mysqli_fetch_assoc($result)) {
			$all_detail[] = $row;
		}
		return $all_detail;
	
	}
	



	






	}


 ?>