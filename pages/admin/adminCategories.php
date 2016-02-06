<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
  session_start();
	include '../../classes/category.php';
  include '../../classes/products.php';
  $category =new Category();
  $categories=$category->getCategories();

?>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>admin category</title>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
    <script type="text/javascript" src="../../jquery-1.12.0.min.js"></script>
    <script type="text/javascript" src="../../js/adminCategory.js"></script>
    <link rel="stylesheet" href="../../css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="../../style.css" />
    
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
          <span class="current">categories</span>    
        </div>
        
        <div class="left_content">
          <?php
            include 'controlPanelControls.php';
            include 'specialProductsBox.php'; 
          ?>
        </div>

        <div class="center_content">
          <!-- ............................. ADD category ....................................... -->
          <fieldset>
              <legend>ADD</legend>
          <form method="post" action="" class="form-horizontal">
            
                <div class="form-group" id='1'>
                  <label class="col-xs-3 control-label">Name</label>
                  <div class="col-xs-9">
                    <input type="text" name="categoryName" class="form-control"/> <span id='error' class='error'></span>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-xs-offset-3 col-xs-10">
                    <input type="submit" name="okAdd" value="ADD" class="btn btn-primary"/>
                  </div>
                </div>  
          </form>
          </fieldset>
          
          <!-- ............................. dispaly categories ....................................... -->
          <feildset>
            <legend>DELETE</legend>
            <?php
              $categoryObj = new Category;
              $categories = $categoryObj->getCategories();
              echo "<table class='table table-hover table-striped' id='adminTable'>";
              echo "<tr><thead><th>category name</th><th>actions</th></thead></tr>";
              foreach ($categories as $key => $category) 
              {
                echo "<tr >";
                echo "<td class='cName_col'>".$category['cName']."</td>";
                echo "<td class='danger'>";
            ?>   
                <a class='delete' href="" value=<?php echo $category['cID'] ?>>delete</a></td>
            <?php
                echo "</td>";
                echo "</tr>";
              }
              echo "</table>";
            ?>
          </feildset>
           
           <!-- ............................. edit category ....................................... -->
          <form method="post" action="" class="form-horizontal">
            <fieldset id='editField'>
              <legend>EDITE</legend>
              <input type="hidden" id='hiddenCatID'/>

              <div class="form-group">
                <label class="col-xs-3 control-label">Category</label>
                <div class="col-xs-9">
                  <select name="cNames_menu" class="form-control">
                    <?php
                      foreach ($categories as $key => $cat) {
                        echo"<option value='".$cat['cID']."'>".$cat['cName']."</option>";
                      }
                    ?>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="col-xs-3 control-label" for="categoryNewName">New Name</label>
                <div class="col-xs-9">
                  <input type="text" id="categoryNewName" class="form-control"/>
                </div>
              </div>
              
              <span id='edit_error' class='error'></span>
              <div class="form-group">
                <div class="col-xs-offset-3 col-xs-9">
                  <input type="button" name="okEdit" value="DONE" class="btn btn-primary"/>
                </div>
              </div>
            </fieldset>
          </form>
        </div> <!-- end of center content -->

        <div class="right_content">
          <?php include 'searchByPriceBox.php'; ?>
          <?php include 'searchByCategoryBox.php'; ?>  
          <?php include 'shoppingCartBox.php'; ?>
          <?php include 'whatIsNewBox.php'; ?> 
        </div> <!-- end of right content --> 

        <div class="footer"></div> <!-- end of left content -->   
      </div> <!-- end of main content -->
    </div> <!-- end of main_container -->
  </body>
</html>