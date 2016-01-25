<?php

	session_start();
	$conn= mysqli_connect('localhost','root','iti','project') or die("Database Connection Failed."); 
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

								$query = "INSERT INTO customers (uName,DoB,password,job,email,address,creditLimit) VALUES('$uname','$dob','$pass','$job','$email','$add','$limit')";
								$query2 = "INSERT INTO customerInterests (interests) VALUES ('$inter')";
								$result = mysqli_query($conn , $query);
								$result2 = mysqli_query($conn , $query2);
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
					            $_SESSION['errlimit']= "Credit Required field </span>";

							}
						}
						else
						{
							header("Location: registration.php");
					     	$_SESSION['errmail']=" E-mail Required field </span>";
						}
					}
					else
					{
						header("Location: registration.php");
					  	$_SESSION['errpass']= "Unmatched passwords Or Empty fields </h3>";
		
					}
				}
				else
				{
					header("Location: registration.php");
					$_SESSION['errname'] = "Warning :Name Required field ";
					
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