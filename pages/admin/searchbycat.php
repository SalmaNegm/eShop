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
           <span class="current">Home</span> 
           <span class="current">category</span>     
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
            if(isset($_POST['submit']))
            {
              if($_POST['submit']=='Search')
              {
                if(!empty(trim($_POST['search'],"\t\n\r\0\x0B")))
                {
                  $val = $_POST['search'];
                  $conn= mysqli_connect('localhost','root','iti','eShop') or die("Database Connection Failed."); 
                  $query = "select * from categories where cName like'$val%'";
                  $result = mysqli_query($conn,$query);
                  $search =[];

                  while($row=mysqli_fetch_assoc($result))
                  {   
                    $search[] = $row;
                    $name=$row['cName'];
                    $id=$row['cID'];    
                    echo "<table class='table table-hover'>";
                    echo "<tr>";
                    //echo "<th style='margin-left:100px;'>";
                    echo "<td class='title_box'><a href='subcat.php?id=$id'>$name</a></td>";
                    //echo "</th>";
                    echo "</tr>";
                    echo "</table>";
                  }
                  if(empty($search))
                  {
                    echo "<h2 style='margin-top:70px;margin-left:200px;'> No result to show </h2>";
                  }  
                }
              }
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
