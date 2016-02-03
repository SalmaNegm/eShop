<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php 
  session_start();
  include '../../classes/products.php';
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Tools Shop</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
<link rel="stylesheet" type="text/css" href="../../style.css" />
<link rel="stylesheet" href="../../try.css" type="text/css" media="screen" />

<!--[if IE 6]>
<link rel="stylesheet" type="text/css" href="iecss.css" />
<![endif]-->
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
      <div class="title_box">Special Products</div>
      <div class="border_box"><?php 


              $prod = new product;
               $data = $prod -> rand_prod();
              foreach ($data as $key => $row) {
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
 <!--***********************************************************************************-->   
    </div>
    <!-- end of left content -->
    <div class="center_content">
    <div class="center_title_bar">Product details</div>
        <?php 
          
        
            $id=$_GET['id'];
           // echo $id;
         // include "products.php";
          //$prod = new product;
          $data = $prod -> get_details($id);
          //print_r($data);
          foreach ($data as $key => $row) {
              $name=$row["pName"];
              $price = $row["pPrice"];
              $img = $row["pImg"];
              $desc = $row["pDesc"];
              $pid =$row["pID"];


            echo "<div class='prod_box'>";
            echo " <div class='center_prod_box'>";
            echo "<div class='product_title'><a href='#'>$name</a></div>";
            echo "<div class='product_img'><a href='#'><img style='width:200px;height:200px;' src='$img' alt='' border='0' /></a></div>";
            echo "<div class='prod_price'><span class='reduce'>$price$</span> <span class='price'>270$</span></div>";
            echo " </div>";
            echo "<div class='prod_details_tab'> <a href='cart.php?id=$pid' class='prod_buy'>Add to Cart</a> </div>";
            echo "<div style='font-size:15px; color:green;'> $desc </div>";
            echo "<hr/>";
            echo  "<a href='home.php'> Back to home </a>";
            echo "</div>";

          }
          ?>
   

    </div>
    <!-- end of center content -->

<!-- ***************************************** search ********************************-->
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
