<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
  session_start();
  include '../../classes/category.php';
  include '../../classes/products.php';
  $category=new Category();
  $cData=$category->getCategories();
?>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>admin subcategory</title>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
    <script src="../../jquery-1.12.0.min.js"></script>
    <script  type="text/javascript" src="../../js/adminSubcategory.js"></script>
    <link rel="stylesheet" href="../../bootstrap.css" />
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
          <span class="current">subcategories</span>    
        </div>
      
        <div class="left_content">
          <?php 
            include 'controlPanelControls.php';
            include 'specialProductsBox.php';
          ?>
        </div> <!-- end of left content -->

        <div class="center_content">
    
          <!-- ............................. ADD category ....................................... -->
          <form method="post" action="" class="form-horizontal">
            <fieldset>
              <legend>ADD</legend>

              <div class="form-group">
                <label class='control-label col-xs-2'>Category</label>
                <div class="col-xs-10">
                  <select id="cNames_menu" class="form-control">
                    <?php
                      foreach ($cData as $key => $cat)
                      {
                        echo"<option value='".$cat['cID']."'>".$cat['cName']."</option>";
                      }
                    ?>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class='control-label col-xs-2'>Subcategory</label>
                <div class="col-xs-10">
                  <input type="text" id="subcategoryName" class="form-control"/>
                </div>
              </div>

              <span id='insert_error' class='error'></span>  
              <div class="form-group">
                <div class="col-xs-offset-2 col-xs-10">
                  <input type="submit" id="okAddSC" value="ADD" class="btn btn-primary"/>
                </div>
              </div>
            </fieldset>
          </form>
          <!-- ............................. delete subcategories ....................................... -->
          <form method="post" action="">
            <fieldset>
              <legend>DELETE</legend>
              <table class='table table-hover'>
                <tr>
                  <thead>
                    <th>Category</th>
                    <th>Subcategory</th>
                    <th>Action</th>
                  </thead>
                </tr>
                <?php
                  include '../../classes/subcategory.php';
                  $subcategory = new Subcategory();
                  
                  foreach ($cData as $key => $cate) 
                  {
                    $scData=$subcategory->getSubcategories($cate['cID']);
                    $scCount=count($scData);
                    echo "<tr>";
                    echo "<td class='cNameCol' value='".$cate['cID']."' rowspan='".$scCount."'>".$cate['cName']."</td>"; 
                    if($scCount==0)
                    {
                      echo "<td colspan='2'> --------- This Category is EMPTY --------- </td>";
                      echo "</tr>";
                    }
                    else
                    {
                      echo "<td class='scNameCol'>".$scData[0]['scName']."</td>";
                      echo "<td class='actCol danger'><a href='' class='deleteSC' value='".$scData[0]['scID']."'>delete</a></td>";
                      echo "</tr>";
                      // echo "</section>";
                      // echo "</tbody>";
                    }
                    for ($i=$scCount-1 ; $i>0 ; $i--) 
                    {
                      echo "<tr>";
                      echo "<td class='scNameCol'>".$scData[$scCount-$i]['scName']."</td>";
                      echo "<td class='actCol danger'><a href='' class='deleteSC' value='".$scData[$scCount-$i]['scID']."'>delete</a></td>";
                      echo "</tr>";
                    }   
                  }
                ?>
              </table>
            </fieldset>
          </form>
          <!-- ............................. edit category ....................................... -->
          <form method="post" action="" class="form-horizontal">
            <fieldset>
              <legend>EDITE</legend>
              <div class="form-group">
                <label class='control-label col-xs-3'>Category</label>
                <div class="col-xs-9">
                  <select id="cNames_menu_edit" class="form-control">
                    <?php
                      foreach ($cData as $key => $cat)
                       {
                        echo"<option value='".$cat['cID']."'>".$cat['cName']."</option>";
                       }
                    ?>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class='control-label col-xs-3'>Subcategory</label>
                <div class="col-xs-9">
                  <select id="scNames_menu_edit" class="form-control"></select>
                </div>
              </div>

              <div class="form-group">
                <label class='control-label col-xs-3'>New Subcategory</label>
                <div class="col-xs-9">
                  <input type="text" id="newSubcategory" class="form-control"/>
                </div>
              </div>

              <span id='edit_error' class='error'></span> 
              <div class="form-group"> 
                <div class="col-xs-offset-3 col-xs-9">
                  <input type="submit" id="okEditSC" value="ADD" class="btn btn-primary"/>
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
        </div> <!-- end of right content -->

        <div class="footer"></div> <!-- end of left content -->
      </div> <!-- end of main_content -->
    </div> <!-- end of main_container -->
  </body>
</html>
