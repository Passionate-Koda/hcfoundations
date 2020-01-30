<?php
  
        $stmt = $conn->prepare("SELECT * FROM product WHERE category = :cat_id");
        $stmt->bindParam(":cat_id", $_POST['cat']);
         $stmt->execute();
          echo  '<option value="">-Select Product-</option>';
        while($row = $stmt->fetch(PDO::FETCH_BOTH)){
          var_dump($row);
          extract($row);

          echo "<option value=".$product_id.">".$product_name."</option>";

        }




 ?>
