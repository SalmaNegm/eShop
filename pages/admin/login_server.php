<?php
session_start();
	if(isset($_POST['loginbtn']))
	{
		if(isset($_POST['email']) && isset($_POST['passwd']))
		{
			if(!empty($_POST['email']) && !empty($_POST['passwd']))
			{
				include '../../classes/user.php';
				$user = new user();
				$r=$user->login($_POST['email'],md5($_POST['passwd']));

				if($r['uID']!='')
				{
					$_SESSION['user']=$r['uID'];
					header('Location: ' . $_SERVER['HTTP_REFERER']);
					exit();
				}
				else
				{
					echo md5($_POST['passwd']);
				}
			}
		}
	}
?>