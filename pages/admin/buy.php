 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
    session_start();
?>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>control panel - products</title>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
    <script type="text/javascript" src="../../jquery-1.12.0.min.js"></script>
    <script  type="text/javascript" src="../../js/buy.js"></script>
    <link rel="stylesheet" href="../../bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="../../style.css" />
  </head>
  <body>
    <div id="main_container">
      <?php include '../banner.php'; ?>
      <div id="main_content">
        <?php include '../admin/navigation.php'; ?>

        <table width="140%" id="cartItems" class='table'>
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
                  $total+=($product->pPrice * $_SESSION['cart'][$pID]);
                }
                echo "<tr align=left style='background-color:lightpink'><td colspan='4'>Total:<sapn id='totalPrice'> ".$total." L.E</sapn></td><td><input type='button' value='BUY' id='btnBUY' name='buybtn' class='adminButton'/></td></tr>";
              }
            }
          ?>
        </table>

        <span class="error" id="buyError"></span>

        <div class="footer"></div> <!-- end of left content -->
      </div> <!-- end of main content -->
    </div> <!-- end of main_container -->
  </body>
</html>
<?php
  unset($_SESSION['errors']);
?>
