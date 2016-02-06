<?php 
  session_start();
  include '../../classes/products.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Baby Shop</title>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
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
           <span class="glyphicon glyphicon-home"></span>
           <span>Home</span> 
           <span class="current">subcategory</span>   
        </div>

        <div class="left_content">
          <?php
            include 'categoriesBox.php';
            include 'login.php';
            include 'specialProductsBox.php'; 
          ?>
        </div><!-- end of left content -->
      
        <div class="center_content">
          <div class="center_title_bar">Search result</div>
          <?php 
            include "../../classes/subcategory.php";
            $subcat= new Subcategory;
            $id = $_GET['id'];
            $data = $subcat ->  getSubcategories($id) ;
            if(empty($data))
            {
              echo "<h2 style='margin-top:70px;margin-left:200px;'> No result to show </h2>";

            }
            foreach ($data as $key => $row) {
              foreach ($row as $key => $value) {
                $name=$row["scName"];
                $id = $row["scID"];
              }
              echo "<div class='container' style='font-size:15px; width:500px;'>";
              echo "<table class='table table-hover'>";
              echo "<tr>";
              //echo "<th>";
              echo"<th> <a href='showprod.php?id=$id'> $name </a></th>";
              //echo "</th>";
              echo "</tr>";
              echo "</table>";
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
