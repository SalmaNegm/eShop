<?php 
  session_start();
  include '../../classes/products.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Baby Shop</title>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
    
   <link rel="stylesheet" href="../../try.css" type="text/css" media="screen" />
    
    <script type="text/javascript" src="regvalid.js"></script>
    <script type="text/javascript" src="../../jquery-1.12.0.min.js"></script>
    <script type="text/javascript" src="../../js/add.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="../../style.css" />
  </head>
<body>
  <div id="main_container">
    <?php include '../banner.php'; ?>
    <div id="main_content">
      <?php
        if(isset($_SESSION['user']))
        {
          if($_SESSION['user']==1)
          {
           include 'navigation.php';
          }
          else
          {
            include 'signedCustomer_nav.php';
          }
        }
        else
        {
          include 'unsignedCustomer_nav.php';
        }
      ?>

      <div class="container"> 
         <span  class="glyphicon glyphicon-home icon"></span>
         <span  class="icon" class="current">Registration</span>    
      </div>

      <div class="left_content">
        <?php
          include 'categoriesBox.php';
          include 'login.php';
          include 'specialProductsBox.php'; 
        ?>
      </div><!-- end of left content -->

      <div class="center_content">
<!--**************************Registration form ********************************-->
      <div class="container" style="width:550px; font-size:12px;">
      <fieldset>
        <legend id="head">SignUp</legend>
      
    	<form class="form-horizontal" name="registration" id="mainform" action="welcome.php" method="post" accept-charset="utf-8" >
<!--****************************************************************************-->
    		<div  class="form-group " id="div1">
		        <label for="Name" class="col-md-3 control-label"> Full Name *</label>
		        <div  class="col-md-8"> 
		            <input type="text" id="uname"  name="uname" placeholder="Name" class="form-control" value=<?php 
		            if(isset($_SESSION['name']))
		            { 
		              echo $_SESSION['name'] ;
		              unset ($_SESSION['name']);
		            }
		          ?> >
		          <span> <?php 
	                if(isset($_SESSION['errname']))
	                {
	                  echo $_SESSION['errname'] ;
	                  unset($_SESSION['errname']); 
	                }
		          ?> </span>
		        </div>
		    </div>
<!--*****************************************************************************-->
			<div class="form-group ">
		        <label for="Date of Birth" class="col-md-3 control-label"> Data Of Birth </label>
		        <div class="col-md-8"> 
		            <input id="dob" type="date" name="dob" placeholder="Date of Birth" class="form-control" >
		        </div>
		    </div>
<!--********************************************************************************-->
			<div class="form-group " id="div2">
		        <label for="Password" class="col-md-3 control-label"> Password *</label>
		        <div class="col-md-8"> 
		            <input id="pass" type="password" name="pass" placeholder="Password" class="form-control" value=<?php 
		            if(isset($_SESSION['pass']))
			            { 
			              echo $_SESSION['pass'] ;
			            }	
				         
				  ?> >
		          <span> <?php 
	                if(isset($_SESSION['errpass']))
		                {
		                  echo $_SESSION['errpass'] ;
		                  unset($_SESSION['errpass']); 
		                }
		          ?> </span>
		        </div>
		    </div>
<!--*******************************************************************************-->
			<div class="form-group " id="div3">
		        <label for="Password" class="col-md-3 control-label"> Confirm-Password </label>
		        <div class="col-md-8"> 
		            <input iid="rpass" type="password" name="rpass" placeholder="Password" class="form-control" value=<?php 
		            if(isset($_SESSION['pass']))
			            { 
			              echo $_SESSION['pass']; 
			              unset($_SESSION['pass']);
			            } 		         
				  ?> > 
		        </div>
		    </div>
<!--*******************************************************************************-->
			<div class="form-group ">
		        <label for="Job" class="col-md-3 control-label"> Job </label>
		        <div class="col-md-8"> 
		            <input id="job" type="text" name="job"  placeholder="Job" class="form-control" >
		        </div>
		    </div>
<!--*******************************************************************************-->

			<div class="form-group " id="div4">
		        <label for="Email" class="col-md-3 control-label"> Email *</label>
		        <div class="col-md-8"> 
		            <input  id="email" type="email" name="email" placeholder="Email" class="form-control" value=<?php 
		            if(isset($_SESSION['mail']))
			            { 
			              echo $_SESSION['mail']; 
			              unset($_SESSION['mail']);
			            } 
		          ?> >
		          <span id="emailerr"> <?php 
		                if(isset($_SESSION['errmail']))
		                {
		                  echo $_SESSION['errmail'] ;
		                  unset($_SESSION['errmail']); 
		                }
					?></span>
		        </div>
		    </div>


<!--*******************************************************************************-->

			<div class="form-group ">
		        <label for="Address" class="col-md-3 control-label"> Address </label>
		        <div class="col-md-8"> 
		             <textarea id="add" type="text" name="add"  placeholder="Address" class="form-control" ></textarea>
		        </div>
		    </div>
<!--*******************************************************************************-->

			
			<div class="form-group ">
		        <label for="Interests" class="col-md-3 control-label"> Interests</label>
		        <div class="col-md-8"> 
		             <input id="inter" type="text" name="Interests"  placeholder="Interests" class="form-control" ></textarea>
		        </div>
		    </div>
<!--*******************************************************************************-->

		<div class="form-group ">
		        <label for="CreditLimit" class="col-md-3 control-label"> CreditLimit*</label>
		        <div class="col-md-8"> 
		            <input id="limit" type="number" name="limit" placeholder="CreditLimit" class="form-control" value=<?php 
		            if(isset($_SESSION['limit']))
			            { 
			              echo $_SESSION['limit']; 
			              unset($_SESSION['limit']);
			            } 
							         
				  ?> >
		          <span> <?php 
	                
                	if(isset($_SESSION['errlimit']))
		                {
		                  echo $_SESSION['errlimit'] ;
		                  unset($_SESSION['errlimit']); 
		                }
		          ?> </span>
		        </div>
		    </div>
<!--*******************************************************************************-->
	    	<br/>
	    	<div id="nspan"  style="display:none; font-size:15px;color:red;margin-left:200px;"> </div>
	    	<div id="head"> * Required Fields <br/><br/></div>
		    <div class="form-group">
		        <div class="col-md-4 col-md-offset-2">
		        <input type="submit" id="res" class="btn btn-primary" name="submit" value="Submit"/>
		        <input style="margin-left:10px;" id="sub" type="reset" class="btn btn-warning"name="reset" value="Reset"/>
		    </div>
		    </div>
		</form>
	   </fieldset>
    </div>
<!--*******************************************************************************-->
     </div> 

       <!-- end of center content -->
     
      <div class="right_content">
        <?php include 'searchByPriceBox.php'; ?>
        <?php include 'searchByCategoryBox.php'; ?>
        <?php include 'shoppingCartBox.php'; ?>
        <?php include 'whatIsNewBox.php'; ?>
      </div> <!-- end of right_content -->

      <div class="footer"></div> <!-- end of left_content -->
    </div> <!-- end of main_content -->
    </div> <!-- end of main_container -->
  </body>
</html>
