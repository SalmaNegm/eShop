<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
  session_start();
	include '../../classes/category.php';
    include '../../classes/products.php';
	$category=new Category();
	$data=$category->getCategories();
  	$_SESSION['user']=1;

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>admin category</title>

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
      <!-- ............................. ADD category ....................................... -->
      <form method="post" action="">
        <fieldset>
          <legend>ADD</legend>
          <span class='label'>Name:</span>  <input type="text" name="categoryName" class="newsletter_input"/> <span id='error' class='error'></span>
          <input type="submit" name="okAdd" value="ADD" class="adminButton"/>
        </fieldset>
      </form>
       <!-- ............................. dispaly categories ....................................... -->
      <?php
      // include 'category.php';
      $categoryObj = new Category;
      $categories = $categoryObj->getCategories();
      echo "<table class='adminTable'>";
      echo "<tr><th>category name</th><th>actions</th></tr>";
      foreach ($categories as $key => $category) 
      {
          echo "<tr>";
          echo "<td class='cName_col'>".$category['cName']."</td>";
          echo "<td>";
      ?>
          
        <a class='delete' href="" value=<?php echo $category['cID'] ?>>delete</a></td>
        <?php

          echo "</td>";
        echo "</tr>";
      }
      echo "</table>";
      ?>
       <!-- ............................. edit category ....................................... -->
      <form method="post" action="">
        <fieldset id='editField'>
          <legend>EDITE</legend>
          <input type="hidden" id='hiddenCatID'/>
          <table width="100%">
          <tr>
          <td>
          <span class='label'>Category:</span> 
          <select name="cNames_menu" width='20%'>
          	<?php
          		foreach ($data as $key => $cat) {
          			echo"<option value='".$cat['cID']."'>".$cat['cName']."</option>";
          		}
          	?>
          </select> </td>
          <td><span class='label'>New Name:</span>  <input type="text" id="categoryNewName" class="newsletter_input"/></td>
          </tr>
          </table>
          
          <span id='error' class='error'></span>
          <input type="button" name="okEdit" value="DONE" class="adminButton"/>
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
