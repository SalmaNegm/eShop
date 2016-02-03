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
<link rel="stylesheet" href="../../bootstrap.css" />
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
      <!-- ............................. ADD product ....................................... -->
      <form method="post" action="adminProduct_server.php" enctype='multipart/form-data' class="form-horizontal">
        <fieldset>
          <legend>ADD</legend>
            <div class="form-group">
              <label class='control-label col-xs-3' style="color:<?php if(in_array('insert_pName', $_SESSION['errors'])){echo 'red';}else{echo 'black';}?>">Name</label>
              <div class="col-xs-9">
                <input type="text" name='insert_pName' class="form-control"/>
              </div>
            </div>

            <div class="form-group">
              <label class='control-label col-xs-3' style="color:<?php if(in_array('cNames_menu_edit', $_SESSION['errors'])){echo 'red';}else{echo 'black';}?>">Category</label>
              <div class="col-xs-9">
                <select id='cNames_menu_edit' class="form-control" name='cNames_menu_edit'>
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
              </div>
            </div>
                
            <div class="form-group">
              <label class='control-label col-xs-3' style="color:<?php if(in_array('scNames_menu_edit', $_SESSION['errors'])){echo 'red';}else{echo 'black';}?>">Subcategory</label>
              <div class="col-xs-9">
                <select id='scNames_menu_edit' class="form-control" name='scNames_menu_edit'></select>
              </div>
            </div>

            <div class="form-group">
              <label class='control-label col-xs-3' style="color:<?php if(in_array('insert_pPrice', $_SESSION['errors'])){echo 'red';}else{echo 'black';}?>">Price</label>
              <div class="col-xs-9">
                <input type="number" name='insert_pPrice' class="form-control"/></td>
              </div>
            </div>

            <div class="form-group">
              <label class='control-label col-xs-3' style="color:<?php if(in_array('insert_pQuantity', $_SESSION['errors'])){echo 'red';}else{echo 'black';}?>">Quantity</label>
              <div class="col-xs-9">
                <input type="number" name='insert_pQuantity' class="form-control"/>
              </div>
            </div>
            
            <div class="form-group">
              <label class='control-label col-xs-3' style="color:<?php if(in_array('insert_pImage', $_SESSION['errors'])){echo 'red';}else{echo 'black';}?>">Image</label>
              <div class="col-xs-9">
                <input type="file" name='insert_pImage' id='insert_pImage' class="form-control" />
              </div>
            </div>

            <div class="form-group">
              <label class='control-label col-xs-3' style="color:<?php if(in_array('insert_pDesc', $_SESSION['errors'])){echo 'red';}else{echo 'black';}?>">Description</label>
              <div class="col-xs-9">
                <textarea name='insert_pDesc' class="form-control" rows='5' cols='50'></textarea>
              </div>
            </div>

            <div class="form-group">
              <div class="col-xs-offset-3 col-xs-9">
                <input type="submit" name="insert_ok" value="ADD" class="btn btn-primary"/>
              </div>
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
