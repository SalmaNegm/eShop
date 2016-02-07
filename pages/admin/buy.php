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
    <script  type="text/javascript" src="../../bootstrap_js/bootstrap.js"></script>
    <link rel="stylesheet" href="../../bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="../../style.css" />
  </head>
  <body>
    <div id="main_container">
      <?php include '../banner.php'; ?>
      <div id="main_content">
        <?php
          if(isset($_SESSION['user']))
          {
            if($_SESSION['user']==1)
            {
             include 'navigation.php';
            }
            else
            {
              include 'signedCustomer_nav.php';
            }
          }
          else
          {
            include 'unsignedCustomer_nav.php';
          }
        ?>

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
                  echo "<td class='Q'><input type='number' min='1' value='".$_SESSION['cart'][$pID]."' style='width:50px'/></td>";
                  echo "<td class='price'>".$product->pPrice." L.E</td>";
                  echo "<td class='subTotal'>".$product->pPrice * $_SESSION['cart'][$pID]." L.E</td>";
                  echo "</tr>";
                  $total+=($product->pPrice * $_SESSION['cart'][$pID]);
                }
                                                                                                                                      
                if(isset($_SESSION['user']))
                  echo "<tr align=left style='background-color:lightpink'><td colspan='4'>Total:<sapn id='totalPrice'> ".$total." L.E</sapn></td><td><input type='button' value='BUY' id='btnBUY' name='buybtn' class='btn btn-danger'/></td></tr>";
                else
                  echo "<tr align=left style='background-color:lightpink'><td colspan='4'>Total:<sapn id='totalPrice'> ".$total." L.E</sapn></td><td><input type='button' value='BUY' name='buybtn' class='btn btn-warning' data-toggle='modal' data-target='#myModal'/></td></tr>";
              }
            }
          ?>
        </table>

        <span class="error" id="buyError"></span>

        <div class="footer"></div> <!-- end of left content -->
      </div> <!-- end of main content -->
    </div> <!-- end of main_container -->

    <!-- ............................ Modal ............................ -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">sign in</h4>
          </div>

          <div class="modal-body">
            <h5>please signin to continue:</h5>
            <form class="form form-horizontal" method="post" action="login_server.php">
              <div class="form-group">
              <label class="control-label col-xs-2">email</label>
              <div class="col-xs-9">
                <input type="email" name='email' class="form-control"/>
              </div>
              </div>

              <div class="form-group">
                <label class="control-label col-xs-2">password</label>
                <div class="col-xs-9">
                  <input type="password" name='passwd' class="form-control"/>
                </div>
              </div>

              <div class="form-group">
                <div class="col-xs-offset-2 col-xs-9">
                  <input type="submit" name='loginbtn' value='login' class="btn btn-primary"/>
                </div>
              </div>
            </form>

            
            <h5>you have no account? <a href="registration.php"> sign up</a></h5>
          </div>
        </div>
      </div>
    </div>

    <!-- ........................... success Buy Modal .......................... -->
    <div class="modal fade" id="successBuy" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">

          <div class="modal-body">
            <h5>Congratulations.We hope to gain your satisfaction.</h5>
          </div>

        </div>
      </div>
    </div>

  </body>
</html>
<?php
  unset($_SESSION['errors']);
?>
