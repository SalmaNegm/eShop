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
<link rel="stylesheet" href="../../bootstrap.css" />
<!-- <script type="text/javascript" src="js/boxOver.js"></script> -->
</head>
<body>
<div id="main_container">
  <?php include '../banner.php'; ?>
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
  <div id="main_content">
    
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
  <?php
    if(!isset($_SESSION['user']))
    {
      echo "<div class='title_box'>Login</div>";
      echo "<form action='login_server.php' method='post' class='form-horizontal'>";
      echo "<div class='form-group'><label class='control-label col-xs-4'>Email</label><div class='col-xs-8'><input type='text' name='email' class='form-control'/></div></div>";
      echo "<div class='form-group'><label class='control-label col-xs-4'>Password</label><div class='col-xs-8'><input type='password' name='passwd' class='form-control'/></div>";
      echo "<div class='form-group'><div class='col-xs-offset-4 col-xs-8'><div class='checkbox'><label><input type='checkbox' name='remember' style='width:10px;height:10px'/>Remember me</label></div></div></div>";
      echo "<div class='col-xs-offset-4 col-xs-8'><input type='submit' name='loginbtn' class='form-control' value='login'/></div></div>";
      echo "</form>";

    }
    // unset($_SESSION['user']);
  ?>
<!--*********************************************************************************-->
      <?php include 'specialProductsBox.php' ?>
 <!--***********************************************************************************-->     

   
    </div>
    <!-- end of left content -->
    <div class="center_content">
    <div class="center_title_bar">Latest Products</div>
        <?php 
      
         // include "products.php";
         // $prod= new product;
          $data = $prod -> last_products() ;
          //print_r($data);
          foreach ($data as $key => $row) {
            foreach ($row as $key => $value) {
              $name=$row["pName"];
              $price = $row["pPrice"];
              $img = $row["pImg"];
              $id= $row["pID"];
            }
            echo "<div class='prod_box'>";
            echo " <div class='center_prod_box'>";
            echo "<div class='product_title'><a href='#'>$name</a></div>";
            echo "<div class='product_img'><a href='#'><img style='width:100px;height:100px;' src='$img' alt='' border='0' /></a></div>";
            echo "<div class='prod_price'><span class='reduce'>1000$</span> <span class='price'>$price$</span></div>";
            echo " </div>";
            echo "<div class='prod_details_tab'> <a href='cart.php?id=$id' class='prod_buy'>Add to Cart</a> <a href='details.php?id=$id' class='prod_details'>Details</a> </div>";
            echo "</div>";
          }
          ?>

    </div>
    <!-- end of center content -->
    <div class="right_content">
      <?php include 'searchByPriceBox.php'; ?>
      <?php include 'searchByCategoryBox.php'; ?>
      <?php 
      if(isset($_SESSION['user']))
      {
        include 'shoppingCartBox.php'; 
      }
      ?>
      <?php include 'whatIsNewBox.php'; ?>
<div class="border_box">
  <?php 

    // include "products.php";
    //$prod = new product;
    $data = $prod -> last_added();
    foreach ($data as $key => $row)
    {
      $last_name=$row["pName"];
      $last_price = $row["pPrice"];
      $last_img = $row["pImg"];
    }

  ?>

</div>

</div>
  <!-- end of main content -->
  <div class="footer">
    
  </div>
</div>
<!-- end of main_container -->
</body>
</html>
