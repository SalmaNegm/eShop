<?php
class user{
	private static $conn = Null;
	var $firstname;
	var $lastname;
	var $id;
	var $reg_date;
	var $email;
	public function __construct($id=-1) {
		if(is_null(self::$conn)) self::$conn = mysqli_connect('localhost','root','iti','eShop');
		if($id!=-1) {
			$query = "select * from users where id=$id limit 1";
			$result = mysqli_query(self::$conn,$query);
			$user = mysqli_fetch_assoc($result);
			$this->id = $user['id'];
			$this->firstname = $user['firstname'];
			$this->lastname = $user['lastname'];
			$this->reg_date = $user['reg_date'];
			$this->email = $user['email'];
		}

	}

	function insert() {
		$query = "insert into users(firstname,lastname,email) values('$this->firstname','$this->lastname','$this->email')";
		$result  = mysqli_query(self::$conn,$query);
		return mysqli_insert_id(self::$conn);
	}

	function update() {
		$query = "update users set firstname='$this->firstname',lastname='$this->lastname', email='$this->email' where id=$this->id";
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
	function checkBeforeLogin($email,$pass) {
		$query = "select id from customers where email='$email' and password='$pass'";
		$result = mysqli_query(self::$conn,$query);
		return (mysqli_num_rows($result)>0)?True:False ;
	}
}
?>