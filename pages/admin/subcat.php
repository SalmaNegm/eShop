<?php 
  session_start();
  $_SESSION['user']=1;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Baby Shop</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
<link rel="stylesheet" type="text/css" href="../../style.css" />
<link rel="stylesheet" href="../../try.css" type="text/css" media="screen" />
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
            $id =$row["cID"];
          }
        echo" <li style='font-size:15px;' class='even'><a href='subcat.php?id=$id'>$name</a> </li> ";
      }

    ?>
      </ul>
<!--*********************************************************************************-->
      <div class="title_box">Special Products</div>
      <div class="border_box"><?php 

              include "../../classes/products.php";
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
      <div class="center_title_bar">Search result</div>
         <?php 
          
          include "../../classes/subcategory.php";
          $subcat= new Subcategory;
          $id = $_GET['id'];
          //$name = $_GET['name'];
          //echo $id;
          //echo $name;
          $data = $subcat ->  getSubcategories($id) ;
          if(empty($data))
          {
            echo "<h2 style='margin-top:70px;margin-left:200px;'> No result to show </h2>";

          }
          //print_r($data);
          foreach ($data as $key => $row) {
            foreach ($row as $key => $value) {
              $name=$row["scName"];
              $id = $row["scID"];
            }
            echo "<table style='padding:10px;margin-left:100px;'>";
            echo "<tr>";
            echo "<th>";
            echo"<td class='title_box'> <a href='showprod.php?id=$id'> $name </a></td>";
            echo "</th>";
           // echo "<td> $id </td>";
            echo "</tr>";
            echo "</table>";
          }

?>    

       

    </div>
    <!-- end of center content -->
    <div class="right_content">
  <!--********************************search by price**************************************-->
      <div class="title_box">Search by Price</div>
      <div class="border_box">
        <!--<input type="text" name="newsletter" class="newsletter_input" value="keyword"/>-->
         </div>
        <form action="searchbyprice.php" method="post" class="price" name="search">
          From: <input type="number" name="from" class="price_input">
          To:  <input type="number" name="to" class="price_input">
          <input style="width:50px; height:20px;" type="submit" name="submit" value="Search" class="newsletter_input" > 
        </form>
             <!--************************************************************-->
  <div class="title_box">Search by Category</div>
    <form action="searchbycat.php" method="post">
       <input style="height:30px;" type="search" name="search" class="newsletter_input">
      <br/>
      
      <input style="width:50px; height:20px;" type="submit" name="submit" value="Search"  class="newsletter_input">
      
      <br/>
      <!--SearchByPrice: <input type="number" name="search">-->
    </form>

    <?php include 'shoppingCartBox.php'; ?>


<!-- *********************************what's new**************************************-->
      <div class="title_box">What’s new</div>
      <div class="border_box">
        <?php 

             // include "products.php";
              //$prod = new product;
               $data = $prod -> last_added();
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
      <!--**********************************************************************-->
     
  </div>
  <!-- end of main content -->
  <div class="footer">
    <!-- <div class="left_footer"> <img src="images/4.png" alt="" width="89" height="42"/> </div>
    <div class="center_footer"> Template name. All Rights Reserved 2016<br />
      <a href="http://csscreme.com"><img src="images/csscreme.jpg" alt="csscreme" title="csscreme" border="0" /></a><br />
      <img src="images/payment.gif" alt="" /> </div>
    <div class="right_footer"> <a href="#">home</a> <a href="#" >about</a> <a href="#">sitemap</a> <a href="#">rss</a> <a href="#">contact us</a> </div>-->
  </div>
</div>
<!-- end of main_container -->
</body>
</html>
