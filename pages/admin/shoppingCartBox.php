<div class="shopping_cart">
      <?php 
          $num =0 ;
          if(isset($_SESSION['cart']) && isset($_SESSION['totalprice']))
          {
           // $num=count($_SESSION['cart']);
           $totalprice = $_SESSION['totalprice'];
            foreach ($_SESSION['cart'] as $key => $value)
            {
              $num +=$value; 
            }
          }
          else
          {
            $num = 0;
            $totalprice = 0;
          }
    
        echo "<div class='title_box'>Shopping cart</div>";
        echo "<div class='cart_details'> $num items <br/>";
        echo "<span class='border_cart'></span> Total: <span class='price'>$totalprice$</span></div>";
      ?>
      <div class="cart_icon">
        <a href="buy.php">
          <img src="../../images/shoppingcart.png" alt="" width="35" height="35" border="0" />
        </a>
      </div>
    </div>
