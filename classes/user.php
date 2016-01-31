<?php
class user{
	private static $conn = Null;
	var $address;
	var $cridetLimit;
	var $DoB;
	var $email;
	var $job;
	var $password;
	var $uID;
	var $uName;
	public function __construct($id=-1) {
		if(is_null(self::$conn)) self::$conn = mysqli_connect('localhost','root','iti','eShop');
		if($id!=-1) {
			$query = "select * from customers where uID=$id limit 1";
			$result = mysqli_query(self::$conn,$query);
			$user = mysqli_fetch_assoc($result);
			$this->uID = $user['uID'];
			$this->address = $user['address'];
			$this->cridetLimit = $user['cridetLimit'];
			$this->DoB = $user['DoB'];
			$this->email = $user['email'];
			$this->job = $user['job'];
			$this->password = $user['password'];
			$this->uName = $user['uName'];
		}

	}

	function insert() {
		$query = "insert into users(firstname,lastname,email) values('$this->firstname','$this->lastname','$this->email')";
		$result  = mysqli_query(self::$conn,$query);
		return mysqli_insert_id(self::$conn);
	}

	function update($uid) { 
		$query = "update customers set address='".$this->address."',cridetLimit=".$this->cridetLimit.",	email='".$this->email."' , DoB='".$this->DoB."' ,job='".$this->job."' ,password='".$this->password."' , uName='".$this->uName."' where uID=".$uid;	
		mysqli_query(self::$conn,$query);
	}

	function delete() {
		$query = "delete from users where id=$this->id";
		return mysqli_query(self::$conn,$query);
	}

	function users() {
		$query = "select * from users";
		$result = mysqli_query(self::$conn,$query);
		$data = [];

		while($row = mysqli_fetch_assoc($result)) {
			$data[] = $row;
		}
		return $data;
	}

	function getuserByEmail($email) {
		$query = "select email from customers where email='$email'";
		$result = mysqli_query(self::$conn,$query);
		//$user = mysqli_fetch_assoc($result);	
		return (mysqli_num_rows($result)>0)?True:False ;
	}
}
?>
