<div class="title_box">Special Products</div>
      <div class="border_box"><?php 
              $prod = new product;
               $data = $prod -> rand_prod();
              foreach ($data as $key => $row) {
                  $last_name=$row["pName"];
                  $last_price = $row["pPrice"];
                  $last_img = $row["pImg"];
          }

           echo "<div class='prod_box'>";
            echo " <div class='center_prod_box'>";
            echo "<div class='product_title'><a href='#'>$last_name</a></div>";
            echo "<div class='product_img'><a href='#'><img style='width:100px;height:100px;' src='$last_img' alt='' border='0' /></a></div>";
            echo "<div class='prod_price'><span class='reduce'>120$</span> <span class='price'>$last_price $</span></div>";
            echo " </div>";
            echo "</div>";
        
         ?>
        
      </div>
      
