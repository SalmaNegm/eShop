<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Baby Shop</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
<link rel="stylesheet" type="text/css" href="style.css" />
<link rel="stylesheet" href="try.css" type="text/css" media="screen" />
<script type="text/javascript" src="js/boxOver.js"></script>
<script type="text/javascript" src="regvalid.js"></script>
</head>
<body>
<div id="main_container">
  <div id="header">
    <div class="top_right">
      <div class="languages">
        <div class="lang_text">Languages:</div>
        <a href="#" class="lang"><img src="images/en.gif" alt="" border="0" /></a> <a href="#" class="lang"><img src="images/de.gif" alt="" border="0" /></a> </div>
     <!-- <div class="big_banner"> <a href="#"><img src="images/banner728.jpg" alt="" border="0" /></a> </div>-->
    </div>
    <div id="logo"> <a href="#"><img style="margin-top:-40px; margin-left:-15px;" src="images/banner.png" alt="" border="0" width="1000" height="200" /></a> </div>
  </div>
  <div id="main_content">
    <div id="menu_tab">
      <ul class="menu">
        <li><a href="home.php" class="nav"> Home </a></li>
        <li class="divider"></li>
        <li><a href="#" class="nav">Categories</a></li>
        <li class="divider"></li>
        <li><a href="#" class="nav">Subcategories</a></li>
        <li class="divider"></li>
        <li><a href="#" class="nav">Products</a></li>
        <li class="divider"></li>
        <li><a href="#" class="nav">My account</a></li>
        <li class="divider"></li>
        <li><a href="registration.php" class="nav">Sign Up</a></li>
        <li class="divider"></li>
        <li><a href="contact.html" class="nav">Contact Us</a></li>
        <li class="divider"></li>
        <li><a href="#" class="nav">Details</a></li>
      </ul>
    </div>
    <!-- end of menu tab -->
    <div class="crumb_navigation"> Navigation: <span class="current">Home</span> </div>
    <div class="left_content">
      <div class="title_box">Categories</div>
      <ul class="left_menu">
<!--**********************show categories*********************************-->
      <?php  
        include "classes/category.php";
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

              include "classes/products.php";
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




      <div class="shopping_cart">
        <?php 
            $num =0 ;
            if(isset($_SESSION['cart']) && isset($_SESSION['totalprice']))
            {
             // $num=count($_SESSION['cart']);
             $totalprice = $_SESSION['totalprice'];
              foreach ($_SESSION['cart'] as $key => $value) {
                $num +=$value;
                
              }
            }
            else
            {
              $num = 0;
              $totalprice = 0;
            }
      
        echo "<div class='title_box'>Shopping cart</div>";
        echo "<div class='cart_details'> $num items <br/>";
        echo "<span class='border_cart'></span> Total: <span class='price'>$totalprice $</span></div>";

        ?>


        <div class="cart_icon"><a href="#"><img src="images/shoppingcart.png" alt="" width="35" height="35" border="0" /></a></div>
      </div>


<!-- *********************************what's new**************************************-->
      <div class="title_box">What’s new</div>
      <div class="border_box">
        <?php 

             //include "products.php";
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
     <div class="left_footer"> <img src="images/4.png" alt="" width="89" height="42"/> </div>
    <div class="center_footer"> AFS. All Rights Reserved 2016<br />
      <a href="http://csscreme.com"><img src="images/csscreme.jpg" alt="csscreme" title="csscreme" border="0" /></a><br />
      <img src="images/payment.gif" alt="" /> 
    </div>
    <div class="right_footer"> <a href="#">home</a> <a href="#">about</a> <a href="#">sitemap</a> <a href="#">rss</a> <a href="#">contact us</a> </div>
  </div> 
</div>
<!-- end of main_container -->
</body>
</html>