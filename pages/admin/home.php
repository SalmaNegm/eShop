<?php 
  session_start();
  // $_SESSION['user']=5;
  include '../../classes/products.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Baby Shop</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
<link rel="stylesheet" type="text/css" href="../../style.css" />
<link rel="stylesheet" href="../..try.css" type="text/css" media="screen" />
<script type="text/javascript" src="js/boxOver.js"></script>
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
      <?php include 'shoppingCartBox.php'; ?>
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

  echo "<div class='prod_box'>";
  echo " <div class='center_prod_box'>";
  echo "<div class='product_title'><a href='#'>$last_name</a></div>";
  echo "<div class='product_img'><a href='#'><img style='width:100px;height:100px;' src='$last_img' alt='' border='0' /></a></div>";
  echo "<div class='prod_price'><span class='reduce'>120$</span> <span class='price'>$last_price $</span></div>";
  echo " </div>";
  echo "</div>";

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
