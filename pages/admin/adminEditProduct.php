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
          <!-- ............................. Edit product ....................................... -->
          <form method="post" action="adminEditProduct_server.php" enctype='multipart/form-data' class="form-horizontal">
            <input type="hidden" value='' name='pID' id='hidden_pID'/>
            <fieldset>
              <legend>EDIT</legend>
                <span id="searchError" class='error'></span>

                <div class="form-group">
                  <label class='control-label col-xs-3'>Product Name</label>
                  <div class="col-xs-9">
                    <input type="text" list="browsers" id='tt' name="browser" class="form-control" />
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
                      <input type="text" name='insert_pName' class="form-control"/>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class='control-label col-xs-3' style="color:<?php if(in_array('cNames_menu_edit', $_SESSION['errors'])){echo 'red';}else{echo 'black';}?>">Category</label>
                    <div class="col-xs-9">
                      <select id='cNames_menu_edit' name='cNames_menu_edit' class="form-control">
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
                    <label span class='control-label col-xs-3' style="color:<?php if(in_array('scNames_menu_edit', $_SESSION['errors'])){echo 'red';}else{echo 'black';}?>">Subcategory</label>
                    <div class="col-xs-9">
                      <select id='scNames_menu_edit' name='scNames_menu_edit' class="form-control"></select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class='control-label col-xs-3' style="color:<?php if(in_array('insert_pPrice', $_SESSION['errors'])){echo 'red';}else{echo 'black';}?>">Price</label>
                    <div class="col-xs-9">
                      <input type="number" name='insert_pPrice' class="form-control"/>
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
                      <input type="file" name='insert_pImage' id='insert_pImage' class="form-control" /><img id='dispImg' class="img-responsive img-rounded" width='200px' height="200px" />
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
                      <input type="submit" name="edit_ok" value="EDIT" class="btn btn-primary"/>
                    </div>
                  </div>
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
