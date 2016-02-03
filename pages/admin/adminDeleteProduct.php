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
<script  type="text/javascript" src="../../js/adminDeleteProduct.js"></script>
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
    </div>
    <!-- end of left content -->
    <div class="center_content">
      <!-- ............................. Delete product ....................................... -->
      <form method="post" action="adminEditProduct_server.php" enctype='multipart/form-data' class="form-horizontal">
        <input type="hidden" value='' id='pID' id='hidden_pID'/>
        <fieldset>
          <legend>DELETE</legend>
            <span id="searchError" class='error'></span>

            <div class="form-group">
              <label class='control-label col-xs-3'>Product Name</label>
              <div class="col-xs-9">
                <input type="text" list="browsers" id='tt' name="browser" class="form-control" />
                <datalist id="browsers" autocomplete="off">
                    <?php
               
                      $products=new product();
                      $allPro=$products->products();
                      foreach ($allPro as $key => $pro)
                      {
                        echo "<option value='".$pro['pName']."' data-pid='".$pro['pID']."'>".$pro['pID']."</option>";
                      }
                    ?>
                  </datalist>
              </div>
            </div>
            
            <div class="form-group">
              <div class="col-xs-offset-3 col-xs-9">
                <input type="button" id="search_btn_delete" value="search" class="btn btn-primary" />
              </div>
            </div>

              <div id='viewer'>
              <hr/>

              <div class="form-group">
                <label class='control-label col-xs-3' style="color:<?php if(in_array('insert_pName', $_SESSION['errors'])){echo 'red';}else{echo 'black';}?>">Name</label>
                <div class="col-xs-9">
                  <span id='insert_pName'></span>
                </div>
              </div>

              <div class="form-group">
                <label class='control-label col-xs-3' style="color:<?php if(in_array('cNames_menu_edit', $_SESSION['errors'])){echo 'red';}else{echo 'black';}?>">Category</label>
                <div class="col-xs-9">
                  <span id='cNames_menu_edit'></span>
                </div>
              </div>

              <div class="form-group">
                <label class='control-label col-xs-3' style="color:<?php if(in_array('scNames_menu_edit', $_SESSION['errors'])){echo 'red';}else{echo 'black';}?>">Subcategory</label>
                <div class="col-xs-9">
                  <span id='scNames_menu_edit'></span>
                </div>
              </div>

              <div class="form-group">
                <label class='control-label col-xs-3' style="color:<?php if(in_array('insert_pPrice', $_SESSION['errors'])){echo 'red';}else{echo 'black';}?>">Price</label>
                <div class="col-xs-9">
                  <sapn id='insert_pPrice' ></sapn>
                </div>
              </div>

              <div class="form-group">
                <label class='control-label col-xs-3' style="color:<?php if(in_array('insert_pQuantity', $_SESSION['errors'])){echo 'red';}else{echo 'black';}?>">Quantity</label>
                <div class="col-xs-9">
                  <span id='insert_pQuantity' ></span>
                </div>
              </div>

              <div class="form-group">
                <label class='control-label col-xs-3' style="color:<?php if(in_array('insert_pImage', $_SESSION['errors'])){echo 'red';}else{echo 'black';}?>">Image</label>
                <div class="col-xs-9">
                  <img id='dispImg' width='200px' height="200px" />
                </div>
              </div>

              <div class="form-gorup">
                <label class='control-label col-xs-3' style="color:<?php if(in_array('insert_pDesc', $_SESSION['errors'])){echo 'red';}else{echo 'black';}?>">Description</label>
                <div class="col-xs-9">
                  <span id='insert_pDesc' ></span>
                </div>
              </div>

              <div class="from-group">
                <div class="col-xs-offset-3 col-xs-9">
                  <input type="submit" name="delete_ok" value="DELETE" class="adminButton"/>
                </div>
              </div>

          </div> <!-- end of viewer div -->
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
