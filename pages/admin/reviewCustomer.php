<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
  session_start();
  include '../../classes/products.php';
  include '../../classes/user.php';
?>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>control panel - products</title>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
    <link rel="stylesheet" type="text/css" href="../../style.css" />
    <script src="../../jquery-1.12.0.min.js"></script>
    <script  type="text/javascript" src="../../js/reviewCustomer.js"></script>
    <link rel="stylesheet" href="../../bootstrap.css" />
  </head>
  <body>
    <div id="main_container">
      <?php include '../banner.php'; ?>
      <div id="main_content">
        <?php include 'navigation.php'; ?>

        <div class="container"> 
          <span class="glyphicon glyphicon-home"></span>
          <span>Home -</span>
          <span>contro panel -</span>
          <span class="current">edit product</span>    
        </div>

        <div class="left_content">
          <?php 
            include 'controlPanelControls.php';
            include 'specialProductsBox.php'; 
          ?>
        </div> <!-- end of left content -->
      
        <div class="center_content">
          <!-- ............................. review customer ....................................... -->
          <form method="post" action="" class="form-horizontal">
            <input type="hidden" value='' name='pID' id='hidden_pID'/>
            <fieldset>
              <legend>EDIT</legend>
                <span id="searchError" class='error'></span>

                <div class="form-group">
                  <label class='control-label col-xs-3'>Customer Name</label>
                  <div class="col-xs-9">
                    <input type="text" list="browsers" id='tt' name="browser" class="form-control" />
                    <datalist id="browsers">
                        <?php
                          $customer=new user();
                          $allCust=$customer->users();
                          foreach ($allCust as $key => $cust)
                          {
                            echo "<option value='".$cust['uName']."' data-pid='".$cust['uID']."'>".$cust['email']."</option>";
                          }
                        ?>
                      </datalist>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-xs-offset-3 col-xs-9"> 
                    <input type="button" id="search_btn" value="search" class="btn btn-primary" />
                  </div>
                </div>

                  <div id='viewer'>
                  <hr/>

                  <div class="form-group">
                    <label class='control-label col-xs-3' style="color:<?php if(in_array('insert_pName', $_SESSION['errors'])){echo 'red';}else{echo 'black';}?>">Name</label>
                    <div class="col-xs-9">
                      <span id='name'></span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class='control-label col-xs-3' style="color:<?php if(in_array('cNames_menu_edit', $_SESSION['errors'])){echo 'red';}else{echo 'black';}?>">Category</label>
                    <div class="col-xs-9">
                      <span id='DoB'></span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class='control-label col-xs-3' style="color:<?php if(in_array('scNames_menu_edit', $_SESSION['errors'])){echo 'red';}else{echo 'black';}?>">Subcategory</label>
                    <div class="col-xs-9">
                      <span id='address'></span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class='control-label col-xs-3' style="color:<?php if(in_array('insert_pPrice', $_SESSION['errors'])){echo 'red';}else{echo 'black';}?>">Price</label>
                    <div class="col-xs-9">
                      <sapn id='job' ></sapn>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class='control-label col-xs-3' style="color:<?php if(in_array('insert_pQuantity', $_SESSION['errors'])){echo 'red';}else{echo 'black';}?>">Quantity</label>
                    <div class="col-xs-9">
                      <span id='email' ></span>
                    </div>
                  </div>

              </div> <!-- end of viewer div -->
            </fieldset>
          </form>
        </div> <!-- end of center content -->
      
        <div class="right_content">
          <?php 
            include 'searchByPriceBox.php';
            include 'searchByCategoryBox.php';
            include 'shoppingCartBox.php';
            include 'whatIsNewBox.php'; 
          ?>
        </div>  <!-- end of right content -->

        <div class="footer"></div> <!-- end of left content -->
      </div> <!-- end of main content -->
    </div> <!-- end of main_container -->
  </body>
</html>
<?php
  unset($_SESSION['errors']);
?>
