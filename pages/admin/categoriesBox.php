<div class="title_box">Categories</div>
  <ul class="list-group" id="ul">
    <?php  
      include "../../classes/category.php";
      $cat = new Category;
      $all_cat = $cat -> getCategories();

      foreach ($all_cat as $key => $row) 
      {
        foreach ($row as $key => $value) 
        {
          $name=$row["cName"];
          $id = $row["cID"];
        }
        echo" <li style='font-size:15px;' class='list-group-item'><a href='subcat.php?id=$id'>$name</a> </li> ";
      }
    ?>
  </ul>