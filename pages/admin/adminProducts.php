<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
  session_start();
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>control panel - products</title>

<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
<link rel="stylesheet" type="text/css" href="../../style.css" />
<!--[if IE 6]>
<link rel="stylesheet" type="text/css" href="iecss.css" />
<![endif]-->
<script src="../../jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="../../js/boxOver.js"></script>
<script  type="text/javascript" src="../../js/adminEditProduct.js"></script>
</head>
<body>
<div id="main_container">
  <?php include '../banner.php'; ?>
  <div id="main_content">
    <?php include 'navigation.php'; ?>
    <!-- end of menu tab -->
    <div class="crumb_navigation"> Navigation: <span class="current">Home</span> </div>
    <div class="left_content">
      <?php include 'controlPanelControls.php'; ?>
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
      <div class="banner_adds"> <a href="#"><img src="images/bann2.jpg" alt="" border="0" /></a> </div>-->
    </div>
    <!-- end of left content -->
    <div class="center_content">
      <!-- ............................. ADD product ....................................... -->
      <form method="post" action="adminProduct_server.php" enctype='multipart/form-data'>
        <fieldset>
          <legend>ADD</legend>
            <table>
              <tr>
                <td><span class='label' style="color:<?php if(in_array('insert_pName', $_SESSION['errors'])){echo 'red';}else{echo 'black';}?>">Name: </span></td>
                <td><input type="text" name='insert_pName' class="newsletter_input"/></td>
              </tr>
              <tr>
                <td><span class='label' style="color:<?php if(in_array('cNames_menu_edit', $_SESSION['errors'])){echo 'red';}else{echo 'black';}?>">Category: </span></td>
                <td>
                  <select id='cNames_menu_edit' name='cNames_menu_edit'>
                    <?php
                      include '../../classes/category.php';
                      $category=new Category();
                      $cData=$category->getCategories();
                      foreach ($cData as $key => $cat)
                      {
                       echo"<option value='".$cat['cID']."'>".$cat['cName']."</option>";
                      }
                    ?>
                </select>
                  </select>
                </td>
              </tr>
              <tr>
                <td><span class='label' style="color:<?php if(in_array('scNames_menu_edit', $_SESSION['errors'])){echo 'red';}else{echo 'black';}?>">Subcategory: </span></td>
                <td><select id='scNames_menu_edit' name='scNames_menu_edit'></select></td>
              </tr>
              <tr>
                <td><span class='label' style="color:<?php if(in_array('insert_pPrice', $_SESSION['errors'])){echo 'red';}else{echo 'black';}?>">Price: </span></td>
                <td><input type="number" name='insert_pPrice' class="newsletter_input"/></td>
              </tr>
              <tr>
                <td><span class='label' style="color:<?php if(in_array('insert_pQuantity', $_SESSION['errors'])){echo 'red';}else{echo 'black';}?>">Quantity: </span></td>
                <td><input type="number" name='insert_pQuantity' class="newsletter_input"/></td>
              </tr>
              <tr>
                <td><span class='label' style="color:<?php if(in_array('insert_pImage', $_SESSION['errors'])){echo 'red';}else{echo 'black';}?>">Image: </span></td>
                <td><input type="file" name='insert_pImage' id='insert_pImage'/></td>
              </tr>
              <tr>
                <td><span class='label' style="color:<?php if(in_array('insert_pDesc', $_SESSION['errors'])){echo 'red';}else{echo 'black';}?>">Description: </span></td>
                <td><textarea name='insert_pDesc' class="newsletter_input" rows='5' cols='50'></textarea></td>
              </tr>
            </table>
          <input type="submit" name="insert_ok" value="ADD" class="adminButton"/>
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
      <div class="banner_adds"> <a href="#"><img src="images/bann1.jpg" alt="" border="0" /></a> </div>
    </div>-->
    <!-- end of right content -->
  </div>
  <!-- end of main content -->
  <div class="footer">
    <!-- <div class="left_footer"> <img src="images/footer_logo.png" alt="" width="89" height="42"/> </div>
    <div class="center_footer"> AFS. All Rights Reserved 2016<br />
      <a href="http://csscreme.com"><img src="images/csscreme.jpg" alt="csscreme" title="csscreme" border="0" /></a><br />
      <img src="images/payment.gif" alt="" /> 
    </div>
    <div class="right_footer"> <a href="#">home</a> <a href="#">about</a> <a href="#">sitemap</a> <a href="#">rss</a> <a href="#">contact us</a> </div>
  </div> -->
</div>
<!-- end of main_container -->
</body>
</html>
<?php
  unset($_SESSION['errors']);
?>
