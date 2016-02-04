<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php 
  session_start();
  include '../../classes/products.php';
?>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Tools Shop</title>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1252" /> 
    <script type="text/javascript" src="../../jquery-1.12.0.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../bootstrap.css" />
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
           <span class="glyphicon glyphicon-home"></span>
           <span>Home</span>
           <span class="current">details</span>    
        </div>

        <div class="left_content">
          <?php
            include 'categoriesBox.php';
            include 'login.php';
            include 'specialProductsBox.php'; 
          ?>
        </div><!-- end of left content -->

        <div class="center_content">
          <div class="center_title_bar">Product details</div>
          <?php         
            $id=$_GET['id'];
            $data = $prod -> get_details($id);
            foreach ($data as $key => $row) 
            {
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
        </div> <!-- end of center content -->

        <div class="right_content">
          <?php include 'searchByPriceBox.php'; ?>
          <?php include 'searchByCategoryBox.php'; ?>
          <?php include 'shoppingCartBox.php'; ?>
          <?php include 'whatIsNewBox.php'; ?>
        </div> <!-- end of right_content -->

        <div class="footer"></div> <!-- end of left_content -->
      </div> <!-- end of main content -->
    </div> <!-- end of main_container -->
  </body>
</html>
