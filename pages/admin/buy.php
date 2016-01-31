 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
        session_start();
        // $_SESSION['cart']=array(2=>3,3=>1,4=>2,5=>3);
        $_SESSION['userID']=1;
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
<script  type="text/javascript" src="../../js/buy.js"></script>
</head>
<body>
<div id="main_container">
  <?php include '../banner.php'; ?>
  <div id="main_content">
    <?php include '../admin/navigation.php'; ?>
    <!-- end of menu tab -->
    <div class="crumb_navigation"> Navigation: <span class="current">Home</span> </div>
    
    <div class="center_content" >

      <table width="140%" id="cartItems" style="padding:10px; margin-left:50px">
       <tr style="background-color:lightblue;">
        <th width="40%" colspan="2" >ITEM</th><th>QUANTITY</th><th>UNIT PRICE</th><th>SUBTOTAL</th>
      </tr>
      <?php
        include '../../classes/products.php';
        $total=0;
        if(isset($_SESSION['cart']))
        {
          if(!empty($_SESSION['cart']))
          {
            foreach ($_SESSION['cart'] as $pID => $pQuantity) 
            {
              $product=new Product($pID);
              echo "<tr value='".$pID."'>";
              echo "<td><img width='100xpx' height='100px' src='".$product->pImg."'/></td>";
              echo "<td align=left><span>".$product->pName."</sapn><br/><a class='cartRemove'href='' value='".$pID."'>remove</a></td>";
              echo "<td class='Q'><input type='number' value='".$_SESSION['cart'][$pID]."' style='width:50px'/></td>";
              echo "<td class='price'>".$product->pPrice." L.E</td>";
              echo "<td class='subTotal'>".$product->pPrice * $_SESSION['cart'][$pID]." L.E</td>";
              echo "</tr>";
              echo "<tr><td colspan='5'><hr/></td></tr>";
              $total+=($product->pPrice * $_SESSION['cart'][$pID]);
            }
            echo "<tr align=left style='background-color:lightgreen'><td colspan='4'>Total:<sapn id='totalPrice'> ".$total." L.E</sapn></td><td><input type='submit' value='BUY' id='btnBUY' class='adminButton'/></td></tr>";
          }
        }
      ?>
      
    </table>
     <span class="error" id="buyError"></span>
  </div>
    <!-- end of center content -->
    
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
