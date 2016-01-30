<?php

	session_start();
	$conn= mysqli_connect('localhost','root','iti','eShop') or die("Database Connection Failed."); 
	if($conn)
	{
		if(isset($_POST['submit']))
		{
			if($_POST['submit']=='Submit')
			{
				if(!empty(trim($_POST['uname'],"\t\n\r\0\x0B")))
				{
					$uname = $_POST['uname'];
					$_SESSION['name']= $uname ;
					$dob = $_POST['dob'];
					//echo "haii";
					if(!empty($_POST['pass']) && !empty($_POST['rpass']) && $_POST['pass'] == $_POST['rpass'])
					{
						$pass = md5($_POST['pass']); 
						$_SESSION['pass']= $_POST['pass'];
						//echo $pass;
						$job = $_POST['job'];
						//echo $job;
						if(!empty(trim($_POST['email'],"\t\n\r\0\x0B")))
						{
							$email = $_POST['email'];
							$_SESSION['mail'] = $email;
							$add = $_POST['add'];
							if(!empty($_POST['limit']))
							{
								$limit = $_POST['limit'];
								$inter = $_POST['Interests'];
								$_SESSION['limit'] = $limit;
								echo "welcome\n".$uname ;
								echo "\n";

								// excuting query
								$query = "insert into customers (uName,DoB,password,job,email,address,cridetLimit) values ('$uname','$dob','$pass','$job','$email','$add','$limit')";
								$result = mysqli_query($conn , $query);
								$id = mysqli_insert_id($conn);
								$query2 = "INSERT INTO customerInterests (uID,interests) VALUES ('$id','$inter')";
								$result2 = mysqli_query($conn , $query2);

								

								//$result2 = mysqli_query($conn , $query2);
								echo $id;
								if($result)
								{
									echo "You added succsessfully ,to our system";

								}
								else
								{
									echo "Sorry";
								}

							}
							else
							{
								header("Location: registration.php");
					            $_SESSION['errlimit']= "Required field </span>";

							}
						}
						else
						{
							header("Location: registration.php");
					     	$_SESSION['errmail']="Required field </span>";
						}
					}
					else
					{
						header("Location: registration.php");
					  	$_SESSION['errpass']= "Unmatched Or Empty  </h3>";
		
					}
				}
				else
				{
					header("Location: registration.php");
					$_SESSION['errname'] = " Required field ";
					
				}
			}
			else
			{
				header("Location: registration.php");
				//$_SESSION['error']="Warning :Click submit button ";
			}
		}
		else
		{
			header("Location: registration.php");
			//$_SESSION['error']="Warning :Click submit button ";
		}
	}
	

  ?>
