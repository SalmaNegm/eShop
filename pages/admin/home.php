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
           <span class="glyphicon glyphicon-home icon"></span>
           <span class="current icon" >Home</span>    
        </div>

        <div class="left_content">
          <?php
            include 'categoriesBox.php';
            include 'login.php';
            include 'specialProductsBox.php'; 
          ?>
        </div><!-- end of left content -->
      
      
      <div class="center_content">
      <div class="center_title_bar">Latest Products</div>

      <!-- *********************************** slider************************-->
      <div id="myCarousel" class="carousel slide" data-ride="carousel" >
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">

      <div class="item active">

        <img src="../../images/9.png" alt="Chania" >
        <div class="carousel-caption">
          <h3>Travel</h3>
         
        </div>
      </div>

      <div class="item">
        <img src="../../images/10.jpg" alt="Chania" >
        <div class="carousel-caption">
          <h3>SleepinG</h3>
          
        </div>
      </div>
    
      <div class="item">
        <img src="../../images/11.jpg" alt="Flower" >
        <div class="carousel-caption">
          <h3>Safety</h3>
          
        </div>
      </div>
  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
<!--******************************************************************************-->
    <br/><br/>
      <?php 
      $data = $prod -> last_products() ;
      foreach ($data as $key => $row) 
      {
        foreach ($row as $key => $value) 
        {
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

    </div> <!-- end of center content -->
   
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
