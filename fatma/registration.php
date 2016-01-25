<?php 
	session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
	<title>SING UP</title>
		<link rel="stylesheet" href="try.css" type="text/css" media="screen" />
</head>
<body>
	<fieldset class="cell">
		<legend>SIGN UP</legend>
		<form id="mainform" action="welcome.php" method="post" accept-charset="utf-8">
		<table id="tb">
				<tr>
					<th> Name </th>
					<td><input id="uname" type="text" name="uname" value=
					<?php 
						if(isset($_SESSION['name']))
						{ 
							echo $_SESSION['name'] ;
							unset ($_SESSION['name']);
						}
					?> 
					><span>* <?php 
								if(isset($_SESSION['errname']))
								{
									echo $_SESSION['errname'] ;
									unset($_SESSION['errname']); 
								}
					?></span></td>	
				</tr>
				<tr>
					<th> Data Of Birth </th>
					<td><input id="dob" type="date" name="dob" ><span></span></td>
				</tr>
				<tr>
					<th> Password </th>
					<td><input id="pass" type="password" name="pass" value=
					<?php 
						if(isset($_SESSION['pass']))
						{ 
							echo $_SESSION['pass'] ;
						}
					?> 
					><span>*<?php 
								if(isset($_SESSION['errpass']))
								{
									echo $_SESSION['errpass'] ;
									unset($_SESSION['errpass']); 
								}
					?></span></td>
				</tr>
				<tr>
					<th> Confirm-Password </th>
					<td><input id="rpass" type="password" name="rpass" value=
					<?php 
						if(isset($_SESSION['pass']))
						{ 
							echo $_SESSION['pass']; 
							unset($_SESSION['pass']);
						} 
					?> 
					><span>*</span></td>
				</tr>
				<tr>
					<th>Job </th>
					<td><input id="job" type="text" name="job" ><span></span></td>
				</tr>

				<tr>
					<th> E-mail </th>
					<td><input id="email" type="email" name="email" value= 
						<?php 
						if(isset($_SESSION['mail']))
						{ 
							echo $_SESSION['mail']; 
							unset($_SESSION['mail']);
						} 
					?> 


					 ><span>*<?php 
								if(isset($_SESSION['errmail']))
								{
									echo $_SESSION['errmail'] ;
									unset($_SESSION['errmail']); 
								}
					?></span></td>
				</tr>
				<tr>
					<th> Address </th>
					<td><textarea id="add" type="text" name="add" ></textarea><span></span></td>
				</tr>
				<tr>
					<th> Interests </th>
					<td><textarea id="add" type="text" name="Interests" ></textarea><span></span></td>
				</tr>
				<tr>
					<th> Credit Limit </th>
					<td><input id="limit" type="number" name="limit" value=
					<?php 
						if(isset($_SESSION['limit']))
						{ 
							echo $_SESSION['limit']; 
							unset($_SESSION['limit']);
						} 
					?> ><span>*
					<?php 
								if(isset($_SESSION['errlimit']))
								{
									echo $_SESSION['errlimit'] ;
									unset($_SESSION['errlimit']); 
								}
					?></span></td>
				</tr>
				<span> * Required fields <br/>
					
				 </span>

		</table>
		
		<br/><br/>
		<input class="bt" id="res" type="reset" name="reset" value="Reset">
		<input  class="bt" id="sub" type="submit" name="submit" value="Submit">	
		</form>
	</fieldset>
</body>
</html>


