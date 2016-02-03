<?php 
  session_start();
  include '../../classes/products.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Baby Shop</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
<link rel="stylesheet" type="text/css" href="../../style.css" />
<link rel="stylesheet" href="../../try.css" type="text/css" media="screen" />
<script type="text/javascript" src="js/boxOver.js"></script>
<script type="text/javascript" src="regvalid.js"></script>
<link rel="stylesheet" href="../../bootstrap.css" />
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
    <!-- end of menu tab -->
    <div class="crumb_navigation"> Navigation: <span class="current">Home</span> </div>
    <div class="left_content">
      <div class="title_box">Categories</div>
      <ul class="left_menu">
<!--**********************show categories*********************************-->
      <?php  
        include "../../classes/category.php";
        $cat = new Category;
        $all_cat = $cat -> getCategories();

        foreach ($all_cat as $key => $row) {
          foreach ($row as $key => $value) {
            $name=$row["cName"];
            $id = $row["cID"];
          }
        echo" <li style='font-size:15px;' class='even'><a href='subcat.php?id=$id'>$name</a> </li> ";
      }

    ?>
      </ul>
    <!--*********************************************************************************-->
      <?php include 'specialProductsBox.php'; ?>
 <!--***********************************************************************************-->   
      
    </div>
    <!-- end of left content -->
    <div class="center_content">
   
       <!-- ***********************Registration form *************************-->
      <fieldset>
        <legend id="head">SignUp</legend>
      
    
    <form name="registration" id="mainform" action="welcome.php" method="post" accept-charset="utf-8" >
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
          ><span>*<?php 
                if(isset($_SESSION['errname']))
                {
                  echo $_SESSION['errname'] ;
                  unset($_SESSION['errname']); 
                }
          ?></span><div id="nspan" class"Espan" style="display:none"> </div>
</td> 
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


           ><span id="emailerr">*<?php 
                if(isset($_SESSION['errmail']))
                {
                  echo $_SESSION['errmail'] ;
                  unset($_SESSION['errmail']); 
                }
          ?></span><br/></td>
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
        <div id="head"> * Required Fields <br/>
          
         </div>

    </table>
    
    <br/><br/>
    <input class="bt" id="res" type="reset" name="reset" value="Reset">
    <input  class="bt" id="sub" type="submit" name="submit" value="Submit"> 
    </form>
    </fieldset>
  

     
       <!-- ***********************Registration form *************************-->
    </div>
    <!-- end of center content -->
    <div class="right_content">
      <?php include 'searchByPriceBox.php'; ?>
      <?php include 'searchByCategoryBox.php'; ?>
      <?php
      if(isset($_SESSION['user']))
        include 'shoppingCartBox.php'; 
    ?>
      <?php include 'whatIsNewBox.php'; ?>
        
      <!--**********************************************************************-->
  </div>
  <!-- end of main content -->
  <div class="footer">
     
  </div> 
</div>
<!-- end of main_container -->
</body>
</html>