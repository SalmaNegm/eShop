<?php
	if(!isset($_SESSION['user']))
        {
?>
            <div class='title_box'>Login</div>
            <form class='form-horizontal' action='login_server.php' method='post'>
	            <div class='form-group form-group-sm'>
	            	<label class='control-label col-xs-4'>Email</label>
	            	<div class='col-xs-8'>
	            		<input  class='form-control' type='text' name='email' class='form-control'/>
	            	</div>
	            </div>

	            <div class='form-group form-group-sm'>
	            	<label class='control-label col-xs-4'>Password</label>
	            	<div class='col-xs-8'>
	            		<input  class='form-control' type='password' name='passwd' class='from-control'/>
	            	</div>
	            </div>

	            <div class='form-group form-group-sm'>
	            	<div class='col-xs-offset-4 col-xs-8'>
	            		<input type='submit' name='loginbtn' class='btn btn-primary input-xs' value='login'/>
	            	</div>
	            </div>
            </form>
<?php
        }
?>