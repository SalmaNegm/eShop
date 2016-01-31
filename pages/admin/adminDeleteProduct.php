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
      <form method="post" action="adminEditProduct_server.php" enctype='multipart/form-data'>
        <input type="hidden" value='' id='pID' id='hidden_pID'/>
        <fieldset>
          <legend>DELETE</legend>
            <table>
            <tr><td colspan="2"><span id="searchError" class='error'></span></td></tr>
              <tr>
                <td><span class='label'>Product Name: </span></td>
                <td>
                  <input type="text" list="browsers" id='tt' name="browser"/>
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
                  <input type="button" id="search_btn_delete" value="search"/>
                  </td>
              </tr>
              </table>
              <div id='viewer'>
              <table>
              
              <tr><td colspan="2"><hr/></td></tr>
              <tr>
                <td><span class='label' style="color:<?php if(in_array('insert_pName', $_SESSION['errors'])){echo 'red';}else{echo 'black';}?>">Name: </span></td>
                <td><sapn id='insert_pName'></sapn></td>
              </tr>
              <tr>
                <td><span class='label' style="color:<?php if(in_array('cNames_menu_edit', $_SESSION['errors'])){echo 'red';}else{echo 'black';}?>">Category: </span></td>
                <td>
                  <span id='cNames_menu_edit'></span>
                </td>
              </tr>
              <tr>
                <td><span class='label' style="color:<?php if(in_array('scNames_menu_edit', $_SESSION['errors'])){echo 'red';}else{echo 'black';}?>">Subcategory: </span></td>
                <td><sapn id='scNames_menu_edit'></span></td>
              </tr>
              <tr>
                <td><span class='label' style="color:<?php if(in_array('insert_pPrice', $_SESSION['errors'])){echo 'red';}else{echo 'black';}?>">Price: </span></td>
                <td><sapn id='insert_pPrice' ></sapn></td>
              </tr>
              <tr>
                <td><span class='label' style="color:<?php if(in_array('insert_pQuantity', $_SESSION['errors'])){echo 'red';}else{echo 'black';}?>">Quantity: </span></td>
                <td><span id='insert_pQuantity' ></span></td>
              </tr>
              <tr>
                <td><span class='label' style="color:<?php if(in_array('insert_pImage', $_SESSION['errors'])){echo 'red';}else{echo 'black';}?>">Image: </span></td>
                <td><sapn name='insert_pImage' id='insert_pImage'></sapn><img id='dispImg' width='100px' height="100px" /></td>
              </tr>
              <tr>
                <td><span class='label' style="color:<?php if(in_array('insert_pDesc', $_SESSION['errors'])){echo 'red';}else{echo 'black';}?>">Description: </span></td>
                <td><span id='insert_pDesc' ></span></td>
              </tr>
              
            </table>

          <input type="submit" name="delete_ok" value="DELETE" class="adminButton"/>
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
