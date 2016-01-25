<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
              include '../../classes/category.php';
              $category=new Category();
              $cData=$category->getCategories();
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>admin subcategory</title>

<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
<link rel="stylesheet" type="text/css" href="../../style.css" />
<!--[if IE 6]>
<link rel="stylesheet" type="text/css" href="iecss.css" />
<![endif]-->
<script src="../../jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="../../js/boxOver.js"></script>
<script  type="text/javascript" src="../../js/adminCategory.js"></script>
</head>
<body>
<div id="main_container">
  <div id="header">
  	<img src="../../images/banner.png" width="100%" height="100%" />
    <div class="top_right">
      
      <!-- <div class="big_banner"> <a href="#"><img src="../../images/img.jpg" alt="" border="0" /></a> </div> -->
    </div>
    <!-- <div id="logo"> <a href="#"><img src="../../images/logo.png" alt="" border="0" width="182" height="85" /></a> </div> -->
  </div>
  <div id="main_content">
    <div id="menu_tab">
      <ul class="menu">
       <li><a href="#" class="nav"> Home </a></li>
        <li class="divider"></li>
        <li><a href="#" class="nav">Products</a></li>
        <li class="divider"></li>
        <li><a href="#" class="nav">Specials</a></li>
        <li class="divider"></li>
        <li><a href="#" class="nav">My account</a></li>
        <li class="divider"></li>
        <li><a href="adminCategories.php" class="nav">Control Pannel</a></li>
        <li class="divider"></li>
        <li><a href="contact.html" class="nav">Contact Us</a></li>
        <li class="divider"></li>
        <li><a href="details.html" class="nav">Details</a></li>
      </ul>
    </div>
    <!-- end of menu tab -->
    <div class="crumb_navigation"> Navigation: <span class="current">Home</span> </div>
    <div class="left_content">
      <div class="title_box">Controls</div>
      <ul class="left_menu">
        <li class="odd"><a href="adminCategories.php">Categories</a></li>
        <li class="even"><a href="#">Subcategories</a></li>
        <li class="odd"><a href="#">Products</a></li>
        <li class="even"><a href="#">Customer's Profile</a></li>
        <li class="odd"><a href="#">Customer's Order History</a></li>
      </ul>
      <div class="title_box">Special Products</div>
      <div class="border_box">
        <div class="product_title"><a href="#">Makita 156 MX-VL</a></div>
        <div class="product_img"><a href="#"><img src="../../images/p1.jpg" alt="" border="0" /></a></div>
        <div class="prod_price"><span class="reduce">350$</span> <span class="price">270$</span></div>
      </div>
     <!-- <div class="title_box">Newsletter</div>
      <div class="border_box">
        <input type="text" name="newsletter" class="newsletter_input" value="your email"/>
        <a href="#" class="join">subscribe</a>
       </div>
      <div class="banner_adds"> <a href="#"><img src="../../images/bann2.jpg" alt="" border="0" /></a> </div>-->
    </div>
    <!-- end of left content -->
    <div class="center_content">
    <!--  <div class="oferta"> <img src="../../images/p1.png" width="165" height="113" border="0" class="oferta_img" alt="" />
        <div class="oferta_details">
          <div class="oferta_title">Power Tools BST18XN Cordless</div>
          <div class="oferta_text"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco </div>
          <a href="#" class="prod_buy">details</a> </div>
      </div> -->
  
      <!-- ............................. ADD category ....................................... -->
      <form method="post" action="">
        <fieldset>
          <legend>ADD</legend>
          <table width="100%">
            <tr>
              <td>
               <span class='label'>Category: </span></td><td>
               <select class="admin"name="category"></select>
              </td>
              <td>
                <span class='label'>Name: </span>
                <input type="text" name="subcategoryName" class="newsletter_input"/>
              </td>
            </tr>
          </table>   
          <input type="submit" name="okAdd" value="ADD" class="adminButton"/>
        </fieldset>
      </form>
       <!-- ............................. delete subcategories ....................................... -->
       <form method="post" action="">
        <fieldset>
          <legend>DELETE</legend>
            <!-- <span class='label'>Category: </span> 
            <select name='scNames_menu' width='20%'>
            <?php

              foreach ($cData as $key => $cat)
              {
                echo"<option value='".$cat['cID']."'>".$cat['cName']."</option>";
              }
            ?>
            </select> -->

            <table class='adminTable'>
              <tr>
                <th>Category</th>
                <th>Subcategory</th>
                <th>Action</th>
              </tr>
              <?php
                include '../../subcategory.php';
                $subcategory = new Subcategory();
                
                foreach ($cData as $key => $cate) 
                {
                  $scData=$subcategory->getSubcategories($cate['cID']);
                  $scCount=count($scData);
                  echo "<tr>";
                  echo "<td rowspan='".$scCount."'>".$cate['cName']."</td>"; 
                  
                  for ($i=$scCount ; $i>0 ; $i--) 
                  {
                    echo "<td value='".$scData[$scCount-$i]['scID']."'>".$scData[$scCount-$i]['scName']."</td>";
                  }
                  if($scCount==0)
                  {
                    echo "<td> --------- This Category is EMPTY --------- </td>";
                  }
                  echo "<td><a href=''>delete</a></td>";
                  echo "</tr>";   
                }
              ?>
            </table>
      </fieldset>
      </form>
       <!-- ............................. edit category ....................................... -->
      <form method="post" action="">
        <fieldset>
          <legend>EDITE</legend>
          Name:  <input type="text" name="categoryName" class="newsletter_input"/>
          <input type="button" name="okEdit" value="DONE" class="adminButton"/>
        </fieldset>
      </form>

    </div>
    <!-- end of center content -->
    <div class="right_content">
      <div class="title_box">Search by Price</div>
      <div class="border_box">
        Price <input type="text" name="minPrice" class="price_input"/> to: <input type="text" name="maxPrice" class="price_input"/> 
        <!--<input type="text" name="newsletter" class="newsletter_input" value="keyword"/>-->
        <a href="#" class="join">search</a> </div>
      <div class="shopping_cart">
        <div class="title_box">Shopping cart</div>
        <div class="cart_details"> 3 items <br />
          <span class="border_cart"></span> Total: <span class="price">350$</span> </div>
        <div class="cart_icon"><a href="#"><img src="../../images/shoppingcart.png" alt="" width="35" height="35" border="0" /></a></div>
      </div>
      <div class="title_box">What’s new</div>
      <div class="border_box">
        <div class="product_title"><a href="#">Motorola 156 MX-VL</a></div>
        <div class="product_img"><a href="#"><img src="../../images/p2.jpg" alt="" border="0" /></a></div>
        <div class="prod_price"><span class="reduce">350$</span> <span class="price">270$</span></div>
      </div>
     <!-- <div class="title_box">Manufacturers</div>
      <ul class="left_menu">
        <li class="odd"><a href="#">Bosch</a></li>
        <li class="even"><a href="#">Samsung</a></li>
        <li class="odd"><a href="#">Makita</a></li>
        <li class="even"><a href="#">LG</a></li>
        <li class="odd"><a href="#">Fujitsu Siemens</a></li>
        <li class="even"><a href="#">Motorola</a></li>
        <li class="odd"><a href="#">Phillips</a></li>
        <li class="even"><a href="#">Beko</a></li>
      </ul>
      <div class="banner_adds"> <a href="#"><img src="../../images/bann1.jpg" alt="" border="0" /></a> </div>
    </div>-->
    <!-- end of right content -->
  </div>
  <!-- end of main content -->
  <div class="footer">
    <!-- <div class="left_footer"> <img src="../../images/footer_logo.png" alt="" width="89" height="42"/> </div>
    <div class="center_footer"> AFS. All Rights Reserved 2016<br />
      <a href="http://csscreme.com"><img src="../../images/csscreme.jpg" alt="csscreme" title="csscreme" border="0" /></a><br />
      <img src="../../images/payment.gif" alt="" /> 
    </div>
    <div class="right_footer"> <a href="#">home</a> <a href="#">about</a> <a href="#">sitemap</a> <a href="#">rss</a> <a href="#">contact us</a> </div>
  </div> -->
</div>
<!-- end of main_container -->
</body>
</html>
