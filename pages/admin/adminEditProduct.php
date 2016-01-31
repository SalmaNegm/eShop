<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
  session_start();
  include '../../classes/products.php';
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
      <?php include 'specialProductsBox.php'; ?>
     <!-- <div class="title_box">Newsletter</div>
      <div class="border_box">
        <input type="text" name="newsletter" class="newsletter_input" value="your email"/>
        <a href="#" class="join">subscribe</a>
       </div>
      <div class="banner_adds"> <a href="#"><img src="images/bann2.jpg" alt="" border="0" /></a> </div>-->
    </div>
    <!-- end of left content -->
    <div class="center_content">
      <!-- ............................. Edit product ....................................... -->
      <form method="post" action="adminEditProduct_server.php" enctype='multipart/form-data'>
        <input type="hidden" value='' name='pID' id='hidden_pID'/>
        <fieldset>
          <legend>EDIT</legend>
            <table>
              <tr>
              <td colspan="2"><span id="searchError" class='error'></span></td>
              </tr>
              <tr>
                <td><span class='label'>Product Name: </span></td>
                <td>
                  <input type="text" list="browsers" id='tt' name="browser"/>
                  <datalist id="browsers">
                    <?php
         
                      $products=new product();
                      $allPro=$products->products();
                      foreach ($allPro as $key => $pro)
                      {
                        echo "<option value='".$pro['pName']."' data-pid='".$pro['pID']."'>".$pro['pID']."</option>";
                      }
                    ?>

                  </datalist>
                  <input type="button" id="search_btn" value="search"/>
                  </td>
               
              </tr>
              </table>
              <div id='viewer'>
              <table>
              <tr><td colspan="2"><hr/></td></tr>
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
                <td><input type="file" name='insert_pImage' id='insert_pImage'/><img id='dispImg' width='100px' height="100px" /></td>
              </tr>
              <tr>
                <td><span class='label' style="color:<?php if(in_array('insert_pDesc', $_SESSION['errors'])){echo 'red';}else{echo 'black';}?>">Description: </span></td>
                <td><textarea name='insert_pDesc' class="newsletter_input" rows='5' cols='50'></textarea></td>
              </tr>
            </table>
          <input type="submit" name="edit_ok" value="EDIT" class="adminButton"/>
          </div>
        </fieldset>
      </form>
    </div>
    <!-- end of center content -->
    <div class="right_content">
     <?php include 'searchByPriceBox.php'; ?>
      <?php include 'searchByCategoryBox.php'; ?>
      <?php include 'shoppingCartBox.php'; ?>
      <?php include 'whatIsNewBox.php'; ?>
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
