<?php

function displaySubCategory($dbconn, $id){
  $stmte->bindParam(":cid", $id);
  $stmte->execute();
  $result = "";
  while($ret = $stmte->fetch(PDO::FETCH_BOTH)){
    extract($ret);

    $result = $result .
    "<ul>
    <li><a href=\"products.html\"><i class=\"fa fa-arrow-right\" aria-hidden=\"true\"></i></li>
    </ul>";
  }
  return $result;
}

function displayCategories($dbconn){
  $stmt =$dbconn->prepare("SELECT * FROM category");
  $stmt->execute();
  $result = "";
  while($row = $stmt->fetch(PDO::FETCH_BOTH)){
    extract($row);
    $result = $result .
    "<li id=\"$category_id\" onclick=\"getSubCategory('$category_id');\"><a href=\"#\"><i class=\"fa fa-arrow-right\" aria-hidden=\"true\"></i>$category_name</a></li><ul>
    <li><a id=\"ba$category_id\"href=\"products.html\"><i class=\"fa fa-arrow-right\" aria-hidden=\"true\"></i></a></li>
    </ul>";

  }
  return $result;
}






function addSubCategory($dbconn, $post){
  $rnd = rand(0000000000,9999999999);
  $hash_id = '_cat'.$rnd;


  $stmt = $dbconn->prepare("INSERT INTO sub_category(category_id, sub_category_name,hash_id, date_created) VALUES(:cat_id,:scat,:hid,NOW())");

  $stmt->bindParam(":cat_id",$post['category']);
  $stmt->bindParam(":scat",$post['categ']);
  $stmt->bindParam(":hid",$hash_id);
  $stmt->execute();

  $success = "Sub Category Succefully Added";
  $succ = preg_replace('/\s+/', '_', $success);
  header("Location: /product_sub_category?success=$succ");
}

function addFinalCategory($dbconn, $post){
  $rnd = rand(0000000000,9999999999);
  $hash_id = 'fin'.$rnd;


  $stmt = $dbconn->prepare("INSERT INTO final_category(final_category_name,  hash_id, sub_category, cat_id, date_added) VALUES(:fn, :hid, :scat,:cat_id,NOW())");
  $data = [
        ':fn'=>$post['final_category'],
        ':hid'=>$hash_id,
        ':cat_id'=>$post['category'],
        ':scat'=>$post['sub_category'],
  ];
  $stmt->execute($data);
  $success = "Sub Category Succefully Added";
  $succ = preg_replace('/\s+/', '_', $success);
 //header("Location: /final_category?success=$succ");
}



function viewProducts($dbconn){
  $stmt = $dbconn->prepare("SELECT * FROM product");
  $stmt->execute();
  while($record = $stmt->fetch()){
    if($record['availability'] == 1){
      $record['availability'] = "Available";
    }
    if($record['availability'] == 2){
      $record['availability'] = "Not Available";
    }
    if($record['promo_status'] == 2){
      $record['promo_status'] = "No Promo";
    }
    if($record['promo_status'] == 1){
      $record['promo_status'] = "On Promo";
    }

    echo "<tr>";
    echo "<td>".$record['description']."</td>";
    echo "<td>".$record['product_id']."</td>";
    echo "<td>".$record['product_name']."</td>";
    echo "<td>".$record['maker']."</td>";
    echo "<td>".$record['category']."</td>";
    echo "<td>".$record['sub_category']."</td>";
    echo "<td>&#8358;".$record['price']."</td>";
    echo "<td>&#8358;".$record['old_price']."</td>";
    echo "<td>".$record['availability']."</td>";
    echo "<td>".$record['promo_status']."</td>";
    echo "<td><a href=\"editProductImage?product_id=".$record['hash_id']."\"><div style=\"background:url('".$record['file_path']."'); height
    :50px; width: 50px; background-size: cover; background-position: center; background-repeat: no-repeat;\"></div></a></td>";
    echo "<td>".$record['flag']."</td>";

    echo "<td><a href=\"edit_products?product_id=".$record['hash_id']."\">edit</a></td>";
    echo "<td><a href=\"deleteProducts?product_id=".$record['hash_id']."\">delete</a></td>";
    echo "</tr>";
  }
}

function viewFinalCategories($dbconn){

  $stmt = $dbconn->prepare("SELECT * FROM final_category");
  $stmt->execute();
  while($record = $stmt->fetch()){
    extract($record);
    echo "<tr>";
    echo "<td>".$id."</td>";
    echo "<td>".$final_category_name."</td>";
    echo "<td>".$sub_category."</td>";
    echo "<td>".$cat_id."</td>";
    echo "<td>".$date_added."</td>";
        $red = preg_replace('/\s+/', '_', $final_category_name);
    echo "<td><a href=\"edit_Final_Category?id=".$hash_id."\">edit</a></td>";
    echo "<td><a href=\"delete_Final_Category?id=".$hash_id."\">delete</a></td>";
    echo "</tr>";
  }
}

function viewSubCategories($dbconn){

  $stmt = $dbconn->prepare("SELECT * FROM sub_category");
  $stmt->execute();
  while($record = $stmt->fetch()){
    extract($record);
    echo "<tr>";
    echo "<td>".$sub_category_id."</td>";
    echo "<td>".$category_id."</td>";
    echo "<td>".$sub_category_name."</td>";
    echo "<td>".$date_created."</td>";
    $red = preg_replace('/\s+/', '_', $sub_category_name);
    echo "<td><a href=\"editSubCategory?id=".$hash_id."\">edit</a></td>";
    echo "<td><a href=\"deleteSubCategory?id=".$hash_id."\">delete</a></td>";
    echo "</tr>";
  }
}
function viewCategories($dbconn){



  $stmt = $dbconn->prepare("SELECT * FROM category");
  $stmt->execute();
  while($record = $stmt->fetch()){
    extract($record);
    echo "<tr>";
    echo "<td>".$category_id."</td>";
    echo "<td>".$category_name."</td>";
    echo "<td>".$date_created."</td>";
    $red = preg_replace('/\s+/', '_', $category_name);
    echo "<td><a href=\"editCategory?id=".$hash_id."\">edit</a></td>";
    echo "<td><a href=\"deleteCategory?id=".$hash_id."\">delete</a></td>";
    echo "</tr>";
  }
}


function editSubCategory($dbconn, $post, $get){

  $stmt = $dbconn->prepare("UPDATE sub_category SET sub_category_name=:name WHERE hash_id= :id");

  $stmt->bindParam(":name" , $post['sub_category']);
  $stmt -> bindParam(":id", $get['id']);
  $stmt->execute();

  header("Location: /product_sub_category");
}

function editfinalCategory($dbconn, $post, $get){

  $stmt = $dbconn->prepare("UPDATE final_category SET final_category_name=:name WHERE hash_id= :id");

  $stmt->bindParam(":name" , $post['final_category']);
  $stmt -> bindParam(":id", $get['id']);
  $stmt->execute();

  header("Location: final_category");
}
// function getIdByHashId($dbconn,$id_name,$id,$table,$hash_id){
//   $stmt = $dbconn->prepare("SELECT $id_name FROM $table WHERE hash_id = :hid ");
//   $stmt->bindParam(":hid", $hash_id);
//   $stmt->execute();
//   $row = $stmt->fetch(PDO::FETCH_BOTH);
//   return $row[$id_name];
// }


function getCategoryById($dbconn,$get){
  $id =  getIdByHashId($dbconn,'category_id','category_id','category',$get['id']);
  $stmt= $dbconn->prepare("SELECT * FROM category WHERE category_id = :cat");

  $stmt->bindParam(":cat", $id);
  $stmt->execute();

  $cal = $stmt->fetch(PDO::FETCH_BOTH);
  extract($cal);
  return $category_name;
}

function getSubCategoryById($dbconn,$get){
  $stmt= $dbconn->prepare("SELECT * FROM sub_category WHERE hash_id = :cat");

  $stmt->bindParam(":cat", $get['id']);
  $stmt->execute();

  $cal = $stmt->fetch(PDO::FETCH_BOTH);
  extract($cal);
  return $sub_category_name;
}

function getFinalCategoryById($dbconn,$get){
  $stmt= $dbconn->prepare("SELECT * FROM final_category WHERE hash_id = :cat");

  $stmt->bindParam(":cat", $get['id']);
  $stmt->execute();

  $cal = $stmt->fetch(PDO::FETCH_BOTH);
  extract($cal);
  return $final_category_name;
}


function getProductNameById($dbconn,$get){
  $id = getIdByHashId($dbconn,'product_id','product_id','product',$get['product_id']);

  $stmt= $dbconn->prepare("SELECT * FROM product WHERE product_id = :cat");

  $stmt->bindParam(":cat",$id);
  $stmt->execute();

  $cal = $stmt->fetch(PDO::FETCH_BOTH);
  extract($cal);

  return $product_name;

}



function deleteSubCategory($dbconn, $get){

  $stmt= $dbconn->prepare("DELETE FROM sub_category WHERE hash_id=:id");

  $stmt -> bindParam(":id", $get['id']);

  $stmt->execute();
  header("Location: /product_sub_category");

}



function deleteProduct($dbconn, $get){
  $id = getIdByHashId($dbconn,'product_id','product_id','product',$get['product_id']);
  $stmt= $dbconn->prepare("DELETE FROM product WHERE product_id=:id");

  $stmt -> bindParam(":id", $id);
  $stmt->execute();
  header("Location: /products");
}


function uploadFiles($input, $name, $upDIR){
  $result = [];

  $rnd = rand(0000000, 9999999);
  $strip_name = str_replace(" ", "_", $input[$name]['name']);

  $filename= $rnd.$strip_name;
  $destination = $upDIR.$filename;

  if(!move_uploaded_file($input[$name]['tmp_name'], $destination)){
    $result[] = false;
  }else{
    $result[] = true;
    $result[] = $destination;
  }
  return $result;
}



function getIdByHashId($dbconn,$id_name,$id,$table,$hash_id){
  $stmt = $dbconn->prepare("SELECT $id_name FROM $table WHERE hash_id = :hid ");
  $stmt->bindParam(":hid", $hash_id);
  $stmt->execute();
  $row = $stmt->fetch(PDO::FETCH_BOTH);
  return $row[$id_name];
}


function addProducts($dbconn,$post,$destination){

  $rnd = rand(000000000000,99999999999);
  $hash_id = 'product'.$rnd;
  $stmt = $dbconn->prepare("INSERT INTO product VALUES(NULL,:pname,:maker,:descr,:cat,:subcat,:finalcat,:av,:prost,:pr,:opr, :hid, :dest,:flg,:inv)");


  $data = [
    ':pname' => $post['product_name'],
    ':maker' => $post['maker'],
    ':descr' => $post['description'],
    ':cat' => $post['category'],
    ':subcat' => $post['sub_category'],
    ':finalcat' => $post['final_category'],
    ':av' => $post['availability'],
    ':prost' => $post['promo_status'],
    ':pr' => $post['price'],
    ':opr' => $post['old_price'],
    ':hid' => $hash_id,
    ':dest' => $destination,
    ':flg' => $post['flag'],
    ':inv' => $post['inventory'],
  ];

  $stmt->execute($data);

  $success = "Product Successfully Added";
  $succ = preg_replace('/\s+/', '_', $success);

  header("Location:/add_products?success=$succ");
}



function editProducts($dbconn,$post,$get){
  $id = getIdByHashId($dbconn,'product_id','product_id','product',$get['product_id']);

  $stmt = $dbconn->prepare("UPDATE product SET product_name=:pname, maker=:maker, description=:descr,category=:cat,sub_category=:subcat, availability=:av, promo_status=:prost, price=:pr, old_price=:opr,  flag=:flg WHERE product_id =:id");

  $data = [
    ':pname' => $post['product_name'],
    ':maker' => $post['maker'],
    ':descr' => $post['description'],
    ':cat' => $post['category'],
    ':subcat' => $post['sub_category'],
    ':av' => $post['availability'],
    ':prost' => $post['promo_status'],
    ':pr' => $post['price'],
    ':opr' => $post['old_price'],
    ':flg' => $post['flag'],
    ':id' => $id
  ];

  $stmt->execute($data);
  $success = "Done";
  header("Location: /products?success=$success");
}

function doesUserEmailExist($dbconn, $input){ #placeholders are just there
  $result = false;

  $stmt = $dbconn -> prepare("SELECT * FROM users WHERE email = :em");
  $stmt->bindParam(":em",$input);
  $stmt->execute();
  $count = $stmt->rowCount();
  if($count>0){
    $result = true;
  }
  return $result;
}
function replaceImagePath($dbconn,$dest,$fp, $get){
  $old_image = $fp;
  // die($get['product_id']);

  try{
    $stmt = $dbconn->prepare("UPDATE product SET file_path=:des WHERE hash_id =:id");
    $data = [
      ':id' => $get['product_id'],
      ':des' => $dest
    ];
    $stmt->execute($data);
  }catch(PDOException $e){
    die("Could Not Upload Image At this time");
  }
if(file_exists($old_image)){
  unlink($old_image);
}
  $success = "Done";
  header("Location:/products?success=$success");
}



function doUserRegister($dbconn, $input, $sid){
  try{
    $hash = password_hash($input['hash'], PASSWORD_BCRYPT);
    $rand = rand(0000000000,111111111);
    $emailtop = explode("@",$input['email']);
    $hash_id = $emailtop[0].$rand.$emailtop[1];

    $stmt =$dbconn->prepare("INSERT INTO users(firstname,lastname,email,phone_number,username,hash, hash_id) VALUES(:fname, :lname, :em, :pm, :uname, :h, :hid)");

    $stmt->bindParam(":fname", $input['fname']);
    $stmt->bindParam(":lname", $input['lname']);
    $stmt->bindParam(":em", $input['email']);
    $stmt->bindParam(":pm", $input['pnumber']);
    $stmt->bindParam(":uname", $input['uname']);
    $stmt->bindParam(":h", $hash);
    $stmt->bindParam(":hid", $hash_id);
    $stmt->execute();
    userLogin($dbconn,$sid,$input);
  }catch(PDOException $e){
    die("Oops");
  }

}


function userLogin($dbconn, $sid,$input){
  try{

    $stmt = $dbconn->prepare("SELECT * FROM users WHERE email = :e ");
    $stmt ->bindParam(":e", $input['email']);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_BOTH);

    if($stmt->rowCount() > 0 && password_verify($input['hash'], $row['hash'])){


      extract($row);

      $_SESSION['username'] = $username;
      $_SESSION['id'] = $hash_id;

      updateCart($dbconn, $sid, $hash_id);
      header("Location:/home");
    }else{
      $mes = "Invalid Email or Password";
      $message = preg_replace('/\s+/', '_', $mes);
      header("Location:user_login?msg=$message");
    }
    }catch(PDOException $e){
      die("no");
    }

}

function update_user($dbconn, $hid, $input){
  $stmt= $dbconn->prepare("UPDATE users SET hash_id = :hid WHERE email = :em");
  $data = [
    ':hid'=>$hid,
    ':em'=>$input['email'],
  ];
  $stmt->execute($data);
}



function trending($dbconn){
  $td = "trending";
  $stmt =$dbconn->prepare("SELECT * FROM product WHERE flag=:tr");
  $stmt->bindParam(":tr", $td);
  $stmt->execute();

  $result = "";

  while($row = $stmt->fetch(PDO::FETCH_BOTH)){
    extract($row);

    $result = $result .
    "<li class='book' >".
    "<a href='/product_preview?product_id=".$product_id."'>".
    "<div class='book-cover' style=\"background:url('".$file_path."');".
    "background-size: cover; background-position: center; background-repeat: no-repeat;\">".
    "</div>".
    "</a>".
    "<div class='book-price'><p>$" .$price. "</p></div>".
    "</li>";
  }

  return $result;


}



function recentlyViewed($dbconn){
  $rvv = "top-selling";
  $stmt =$dbconn->prepare("SELECT * FROM product WHERE flag=:rv");
  $stmt->bindParam(":rv", $rvv);
  $stmt->execute();

  $result = "";

  while($row = $stmt->fetch(PDO::FETCH_BOTH)){
    extract($row);

    $result = $result .
    "<li class='book' >".
    "<a href=/product_preview?product_id=".$product_id."'>".
    "<div class='book-cover' style=\"background:url('".$file_path."');".
    "background-size: cover; background-position: center; background-repeat: no-repeat;\">".
    "</div>".
    "</a>".
    "<div class='book-price'><p>$" .$price. "</p></div>".
    "</li>";
  }
  return $result;
}

function insertIntoReview($dbconn, $userID, $productID, $input){
  $stmt = $dbconn-> prepare("INSERT INTO review(user_id, product_id, review,date) VALUES(:us, :bk, :re, now())");
  $data = [
    ':us' => $userID,
    ':bk' => $productID,
    ':re' => $input['review']
  ];

  $stmt->execute($data);
}


function firstPreview($dbconn) {
  $stmt = $dbconn->prepare("SELECT * FROM category LIMIT 0, 1");
  $stmt->execute();

  return $stmt->fetch(PDO::FETCH_BOTH)[0];
}

function addToCart($dbconn, $userID, $productID,  $product, $productPrice,$singlePrice, $input){


  $checkCart = $dbconn->prepare("SELECT * FROM cart WHERE product_id=:pid AND user_id=:usid");
  $data = [
    ":pid"=>$productID,
    ":usid"=>$userID
  ];
  $checkCart->execute($data);
  if(($checkCart->rowCount()) > 0){


    $updateCart = $dbconn->prepare("UPDATE cart SET quantity=quantity+:qu, product_price=product_price+:np  WHERE product_id=:pid AND user_id=:usid");

    $data = [
      ":pid"=>$productID,
      ":usid"=>$userID,
      ":np"=>$productPrice,
      ":qu"=>$input['quantity']
    ];

    $updateCart->execute($data);
  }else{
    $rnd = rand(000000000000,99999999999);
    $hash_id = 'cart'.$rnd;
    $stmt = $dbconn->prepare("INSERT INTO cart(quantity, hash_id, user_id, product_name, product_price,single_price, product_id) VALUES(:qu, :crt, :ui,  :pn, :pp,:sp, :bi)");

    $data = [':qu'=> $input['quantity'],
    ':crt' => $hash_id,
    ':ui' => $userID,
    ':pn' => $product,
    ':pp' => $productPrice,
    ':sp' => $singlePrice,
    ':bi' => $productID

  ];
  $stmt->execute($data);
}
header("Location:cart");
}


function displayErrorsUser($dummy, $what) {
  $result = "";

  if(isset($dummy[$what])) {

    $result = '<p class="form-error">'. $dummy[$what]. '</p>';

  }
  return $result;
}
function updateCart($dbconn, $sid, $hid){
  try{
  $stmt = $dbconn->prepare("UPDATE cart SET user_id=:ui WHERE user_id= :sid");
  $stmt->bindParam(":ui", $hid);
  $stmt->bindParam(":sid", $sid);
  $stmt->execute();
   header("Location:cart");
  header("Location:cart");
}catch(PDOException $e){
  die("UpdateCart Failed");
}

}



#function for editing items in the cart
function editCart($dbconn, $cart,$id){
  try{

    $stmt = $dbconn->prepare("UPDATE cart SET quantity=:qy ,product_price=single_price*:qy WHERE cart_id=:ci");

    $data = [
      ':qy'=> $cart['quantity'],
      ':ci'=> $id
    ];
    $stmt->execute($data);
  }catch(PDOException $e){
    die("Error Updating Cart");
  }
  header("Location:/cart");
}

function culNav($page){

  $curPage = basename($_SERVER['SCRIPT_FILENAME']);

  if($curPage == $page) {
    echo 'class="selected"';
  }
}

function delCart($dbconn, $userID, $cart) {
  $result = "";
  $stmt = $dbconn->prepare("DELETE FROM cart WHERE user_id=:uid AND hash_id =:cid");
  $stmt->bindParam(":uid", $userID);
  $stmt->bindParam(":cid", $cart);
  $stmt->execute();
}
function delALLCart($dbconn, $userID) {
  $stmt = $dbconn->prepare("DELETE FROM cart WHERE user_id=:uid");
  $stmt->bindParam(":uid", $userID);
  $stmt->execute();
}

function selectImageFromProduct($dbconn, $product_img){
  $result = "";
  $stmt = $dbconn->prepare("SELECT file_path FROM product WHERE hash_id = :fp");
  $stmt->bindParam(':fp', $product_img);
  $stmt->execute();
  $row = $stmt->fetch(PDO::FETCH_BOTH);
  $count= $stmt->rowCount();
  extract($row);
  for ($i=0; $i < $count ; $i++) {

    $result .= "<div style='background:url(".$file_path."); height:100px; width: 100px;
            background-size: cover; background-position: center;
            background-repeat: no-repeat;'></div>";
  }

  return $result;

}

function selectFromCart($dbconn, $userID){
  $error = "";
  $stmt = $dbconn->prepare("SELECT * FROM cart WHERE user_id=:id");
  $stmt->bindParam(':id', $userID);
  $stmt->execute();
  while($row = $stmt->fetch(PDO::FETCH_BOTH)){
    extract($row);
    $single_price = $product_price / $quantity;

    $img = selectImageFromProduct($dbconn, $product_id);
    $inventory = viewpreviewProduct($dbconn, $product_id);
      if ($inventory < $quantity) {
          $error = '<div class="alert alert-danger" role="alert">
                    <strong>whoops!</strong> The quantity you entered is more that stocked
                     </div>';
      }

    echo  "$error
              <ul class='cart-header'>
            <a href='delete?cart_id=".$hash_id."'><div class='close1'></div> </a>
             <li class='ring-in' style='width: 20%'><span class='name'>".$img."</span</li>
            <li style='width: 20%'><span class='name'>".$product_name."</span></li>
              <li style='width: 20%'><form method='post' action='updateCart?cart_id=$cart_id&&stock=$inventory'>";

   echo     "<span style='width: 20%'>&#8358;".$single_price." <b>x</b></span>";

     echo          "<input  type='number' value=".$quantity." name='quantity' class='btn-xsm'size='6px'><br/>
              <input  type='submit' value='Update' name='update' class='btn btn-warning' >
           </form></li>
            <li style='width: 20%'><span class='cost'>&#8358;".$product_price."</span></li>

          <div class='clearfix'> </div>
        </ul>";
  }
}
function selectCart($dbconn, $userID){
  $result = [];
  $stmt = $dbconn->prepare("SELECT * FROM cart WHERE user_id =:id");
  $stmt->bindParam(":id", $userID);
  $stmt->execute();
  while($row = $stmt->fetch(PDO::FETCH_BOTH)){
    $result[] = $row;
  }

  return $result;
}





# function to view comment or review by a user
function ViewReview($dbconn, $productid) {

  $result = "";

  $stmt = $dbconn->prepare("SELECT * FROM review WHERE product_id=:bk");

  $stmt->bindParam(':bk', $productid);

  $stmt->execute();

  while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

    $statement = $dbconn->prepare("SELECT firstname, lastname FROM users WHERE user_id=:di");
    $statement->bindParam(":di", $row['user_id']);
    $statement->execute();
    $row1 = $statement->fetch(PDO::FETCH_ASSOC);
    $fname = $row1['firstname'];
    $lname = $row1['lastname'];
    $f = substr($fname, 0, 1);
    $l = substr($lname, 0, 1);
    $result .= '<li class="review">
    <div class="avatar-def user-image">
    <h4 class="user-init">'.$f.$l.'</h4>
    </div>
    <div class="info">
    <h4 class="username">'.$fname." ".$lname.'</h4>
    <p class="comment">'.$row['review'].'</p>
    </div>
    </li>';
  }
  return $result;
}
function viewpreviewProduct($dbconn, $hid){
  $result= "";
  $stmt = $dbconn->prepare("SELECT * FROM product WHERE hash_id = :hid");
  $stmt->bindParam(":hid", $hid);
  $stmt -> execute();
  $row = $stmt->fetch(PDO::FETCH_BOTH);
   $count= $stmt->rowCount();
  extract($row);
  for ($i=0; $i < $count ; $i++) {
    $result +=$inventory;
  }
  return $result;
}

function fetchPreviewProducts($dbconn, $hid){

  $stmt = $dbconn->prepare("SELECT * FROM product WHERE hash_id = :hid");
  $stmt->bindParam(":hid", $hid);
  $stmt -> execute();
  $row = $stmt->fetch(PDO::FETCH_BOTH);

  return $row;

}


function fetchSubCategory($dbconn,$cid){
  $stmt = $dbconn->prepare("SELECT * FROM sub_category WHERE category_id = $cid");
  $stmt->execute();
  while($row = $stmt->fetch(PDO::FETCH_BOTH)){
    extract($row);

           echo  "<div class='col1 me-one'>
                    <h4><a href='product?sub_cat_id=".$hash_id."'>".$sub_category_name."</a></h4>";
                         fetchFinalCategory($dbconn, $hash_id);
            echo        "</div>";

  }
}

function fetchFinalCategory($dbconn, $hid){
      $stmt= $dbconn->prepare("SELECT * FROM final_category WHERE sub_category = :hid");
      $stmt->bindParam(':hid', $hid);
      $stmt->execute();
      while ( $row = $stmt->fetch(PDO::FETCH_BOTH)) {
        extract($row);

    echo  "<ul>
          <li><a href='product?hid=".$hash_id."'>".$final_category_name."</a></li>
           </ul>";
  }
}

function fetchMainCategory($dbconn){
  $stmt = $dbconn->prepare("SELECT * FROM category");
  $stmt->execute();
  while($row = $stmt->fetch(PDO::FETCH_BOTH)){
    extract($row);

    echo  "<li class='grid'><a href='product?cat_id=".$category_id."'>".$category_name."</a>
              <div class='mepanel'>
                <div class='row'>";
                    fetchSubCategory($dbconn, $category_id);
           echo       "</div>
                    </div>
                  </li>";

  }

}

function fetchSideCategory($dbconn){
  $stmt = $dbconn->prepare("SELECT * FROM category");
  $stmt->execute();
  while($row = $stmt->fetch(PDO::FETCH_BOTH)){
    extract($row);
    $categCount = count($category_id);
    for($i=0; $i<$categCount;$i++){
      echo '<li><a href="#"><i class="fa fa-arrow-right" aria-hidden="true"></i>'.$category_name.'</a></li>';
      echo '<ul>';
      fetchSubCategory($dbconn,$category_id);
      echo '</ul>';
    }
  }
}
function showAllProducts($dbconn, $start, $record){
  $result = " ";
  $stmt = $dbconn->prepare("SELECT * FROM product ORDER BY product_id DESC LIMIT $start, $record");

  $stmt -> execute();
 while($row = $stmt->fetch(PDO::FETCH_BOTH)){
    extract($row);
      if ($inventory == 0) {
      $inventory= "<h4 style=color:red;>Out Of Stock!</h4>";
    }
     $result .=  "<div class='col-md-4 product-left p-left'>
                  <div class='product-main simpleCart_shelfItem'>
                  <a href='preview?hid=".$hash_id."' class='mask'><img class='img-responsive zoom-img' src=".$file_path." alt=".$product_name." /></a>
                  <div class='product-bottom'>
                  <h3>".$product_name."</h3>
                  <p><b>Stock- ".$inventory."</b></p>
                  <h4><a class='item_add' href='preview?hid=".$hash_id."'><i></i></a> <span class=' item_price'>".$price."</span></h4>
                </div>
                <div class='srch srch1'>
                  <span>-50%</span>
                </div>
              </div>
            </div>";
  }
  return $result;
}

function getPaginationForAllProduct($dbconn,  $record){
  $result = "";
  $prev = "1";
  $next = "1";
  $stmt= $dbconn->prepare("SELECT * FROM product ORDER BY product_id DESC");
  $stmt->bindParam(':hid', $hid);
  $stmt->execute();
  $total_record=$stmt->rowCount();

  $total_pages = ceil($total_record/$record);
  for ($i=1; $i <=$total_pages ; $i++) {

    $result .= "<li class='active'><a href='product?page=".$i."'>".$i."</a></li>";
  }
  return $result;
}

function getTotalRecord($dbconn,  $record){
  $stmt= $dbconn->prepare("SELECT * FROM product ORDER BY product_id DESC");
  $stmt->execute();
  $total_record=$stmt->rowCount();

  $total_pages = ceil($total_record/$record);
  return $total_pages;

}

function getTotalRecordForProductId($dbconn, $hid,  $record){
  $stmt= $dbconn->prepare("SELECT * FROM product WHERE final_category = :hid ORDER BY product_id DESC");
  $stmt->bindParam(':hid', $hid);
  $stmt->execute();
  $total_record=$stmt->rowCount();

  $total_pages = ceil($total_record/$record);
  return $total_pages;

}

function getTotalRecordForCatId($dbconn, $hid, $record){
  $stmt= $dbconn->prepare("SELECT * FROM product WHERE category = :hid ORDER BY product_id DESC");
  $stmt->bindParam(':hid', $hid);
  $stmt->execute();
  $total_record=$stmt->rowCount();

  $total_pages = ceil($total_record/$record);
  return $total_pages;

}

function getTotalRecordForSubCat($dbconn, $hid, $record){
  $stmt= $dbconn->prepare("SELECT * FROM product WHERE sub_category = :hid ORDER BY product_id DESC");
  $stmt->bindParam(':hid', $hid);
  $stmt->execute();
  $total_record=$stmt->rowCount();

  $total_pages = ceil($total_record/$record);
  return $total_pages;

}

function showProductsBySubCat($dbconn, $hid, $start, $record){
    $result = " ";
  $stmt = $dbconn->prepare("SELECT * FROM product WHERE sub_category = :hid ORDER BY product_id DESC LIMIT $start, $record");
  $stmt->bindParam(':hid', $hid);
  $stmt -> execute();
  while($row = $stmt->fetch(PDO::FETCH_BOTH)){
    extract($row);
    if ($inventory == 0) {
      $inventory= "<h4 style=color:red;>Out Of Stock!</h4>";
    }
     $result .=  "<div class='col-md-4 product-left p-left'>
                  <div class='product-main simpleCart_shelfItem'>
                  <a href='preview?hid=".$hash_id."' class='mask'><img class='img-responsive zoom-img' src=".$file_path." alt=".$product_name." /></a>
                  <div class='product-bottom'>
                  <h3>".$product_name."</h3>
                  <p><b>Stock- ".$inventory."</b></p>
                  <h4><a class='item_add' href='preview?hid=".$hash_id."'><i></i></a> <span class=' item_price'>".$price."</span></h4>
                </div>
                <div class='srch srch1'>
                  <span>-50%</span>
                </div>
              </div>
            </div>";
  }
  return $result;


}

function showProductsByCatId($dbconn, $hid, $start, $record){
  $result = " ";
  $stmt = $dbconn->prepare("SELECT * FROM product WHERE category = :hid ORDER BY product_id DESC LIMIT $start, $record");
  $stmt->bindParam(':hid', $hid);
  $stmt -> execute();
  while($row = $stmt->fetch(PDO::FETCH_BOTH)){
    extract($row);
      if ($inventory == 0) {
      $inventory= "<h4 style=color:red;>Out Of Stock!</h4>";
    }
     $result .=  "<div class='col-md-4 product-left p-left'>
                  <div class='product-main simpleCart_shelfItem'>
                  <a href='preview?hid=".$hash_id."' class='mask'><img class='img-responsive zoom-img' src=".$file_path." alt=".$product_name." /></a>
                  <div class='product-bottom'>
                  <h3>".$product_name."</h3>
                  <p><b>Stock- ".$inventory."</b></p>
                  <h4><a class='item_add' href='preview?hid=".$hash_id."'><i></i></a> <span class=' item_price'>".$price."</span></h4>
                </div>
                <div class='srch srch1'>
                  <span>-50%</span>
                </div>
              </div>
            </div>";
  }
  return $result;

}

function showProducts($dbconn, $hid, $start, $record){
  $result = " ";
  $stmt = $dbconn->prepare("SELECT * FROM product WHERE final_category = :hid ORDER BY product_id DESC LIMIT $start, $record");
  $stmt->bindParam(':hid', $hid);
  $stmt -> execute();
  while($row = $stmt->fetch(PDO::FETCH_BOTH)){
    extract($row);
      if ($inventory == 0) {
      $inventory= "<h4 style=color:red;>Out Of Stock!</h4>";
    }
     $result .=  "<div class='col-md-4 product-left p-left'>
                  <div class='product-main simpleCart_shelfItem'>
                  <a href='preview?hid=".$hash_id."' class='mask'><img class='img-responsive zoom-img' src=".$file_path." alt=".$product_name." /></a>
                  <div class='product-bottom'>
                  <h3>".$product_name."</h3>
                  <p><b>Stock- ".$inventory."</b></p>
                  <h4><a class='item_add' href='preview?hid=".$hash_id."'><i></i></a> <span class=' item_price'>".$price."</span></h4>
                </div>
                <div class='srch srch1'>
                  <span>-50%</span>
                </div>
              </div>
            </div>";


  }
  return $result;

}

function getPagination($dbconn, $hid, $record){
  $result = "";
  $prev = "1";
  $stmt= $dbconn->prepare("SELECT * FROM product WHERE final_category = :hid ORDER BY product_id DESC");
  $stmt->bindParam(':hid', $hid);
  $stmt->execute();
  $total_record=$stmt->rowCount();
  $total_pages = ceil($total_record/$record);
  for ($i=1; $i <=$total_pages ; $i++) {
    $result  .=    "<li><a href=product?pid=".$hid."&&page=".$i.">".$i."</a></li>";


  }
  return $result;

}
  function getPaginationBySubCat($dbconn, $hid, $record){

  $result = "";
  $prev = "1";
  $stmt= $dbconn->prepare("SELECT * FROM product WHERE sub_category = :hid ORDER BY product_id DESC");
  $stmt->bindParam(':hid', $hid);
  $stmt->execute();
  $total_record=$stmt->rowCount();
  $total_pages = ceil($total_record/$record);
  for ($i=1; $i <=$total_pages ; $i++) {
    $result  .=    "<li><a href=product?pid=".$hid."&&page=".$i.">".$i."</a></li>";


  }
  return $result;

  }

 function getPaginationByCatId($dbconn, $hid, $record){
    $result = "";
  $prev = "1";
  $stmt= $dbconn->prepare("SELECT * FROM product WHERE category = :hid ORDER BY product_id DESC");
  $stmt->bindParam(':hid', $hid);
  $stmt->execute();
  $total_record=$stmt->rowCount();
  $total_pages = ceil($total_record/$record);
  for ($i=1; $i <=$total_pages ; $i++) {
    $result  .=    "<li><a href=product?pid=".$hid."&&page=".$i.">".$i."</a></li>";

    }
    return $result;
 }

function getProductsFromCart($dbconn, $userID){
  $result = " ";
  $stmt = $dbconn->prepare("SELECT * FROM cart WHERE user_id = :uid");
  $stmt->bindParam(":uid", $userID);
  $stmt->execute();
  while ($row = $stmt->fetch(PDO::FETCH_BOTH)){
    extract($row);
    //$result = implode(" ", $row);
    $result .= "<p>".$product_name.", ".$file_path.", &#8358;".$product_price.", ".$product_id.", ".$quantity."</p>";
    /*$count_result = count($result);
    if($count_result < 0){
    header("Location:home");
  }*/

}
return $result;

}

 function getProductForInventory($dbconn, $productId){

  $stmt = $dbconn->prepare("SELECT * FROM product WHERE hash_id = :pid");
  $stmt->bindParam(":pid", $productId);
  $stmt->execute();
  while ($row = $stmt->fetch(PDO::FETCH_BOTH)){
    extract($row);
      $result = $inventory;
  }
  return $result;
}

function getQuantityforinventory($dbconn, $userID){

  $result = [];
  $stmt = $dbconn->prepare("SELECT * FROM cart WHERE user_id = :uid");
  $stmt->bindParam(":uid", $userID);
  $stmt->execute();
  while ($row = $stmt->fetch(PDO::FETCH_BOTH)){
    extract($row);
     $inventory = getProductForInventory($dbconn, $product_id);
     $newQuantity = $inventory - $quantity;

       update_product($dbconn, $newQuantity, $product_id);

  }
}


function update_product($dbconn, $quantity, $productId){

  $stmt= $dbconn->prepare("UPDATE product SET inventory = :inv WHERE hash_id = :pid ");
  $data= [
        ":inv" => $quantity,
        ":pid" => $productId,
  ];
  $stmt->execute($data);

}

function addCheckout($dbconn, $userID, $input){
  try {


  $rnd = rand(0000000000,9999999999);
  $hash_id = $input['name'].$rnd;
  $result = getProductsFromCart($dbconn, $userID);
  $stmt = $dbconn->prepare("INSERT INTO checkout(name, phone_number, adress, product_info, user_id, hash, date_added) VALUES(:na, :ph, :ad, :pi, :uid, :hid, NOW()) ");
  $data = [
    ':na' => $input['name'],
    ':ph' => $input['phone_number'],
    ':ad' => $input['adress'],
    ':pi' => $result,
    ':uid' =>$userID,
    ':hid'=>$hash_id,
  ];
  $stmt->execute($data);
  $user_id = $userID;
  } catch (Exception $e) {
    echo "whoops";
  }

  header("Location:confirmation?hash_id=$hash_id");
}




function displayCheckout($dbconn, $userID){
  $total_price = 0;
  $all_price = 0;
  $all_quantity = 0;
  $stmt = $dbconn->prepare("SELECT * FROM cart WHERE user_id = :uid ");
  $stmt->bindParam(":uid", $userID);
  $stmt->execute();
  while($result = $stmt->fetch(PDO::FETCH_BOTH)){

    extract($result);
    $all_price += $product_price;
    $all_quantity += $quantity;

    $total_price = $all_price;

    $product_count = count($product_price);
    for ($i=0; $i < $product_count ; $i++) {
     echo  "<ul class='cart-header'>
             <li class='ring-in' style='width: 20%'><span class='name'>".$product_name."</span></li>
            <li style='width: 20%'><span class='name'>".$quantity."</span></li>
            <li style='width: 20%'><span class='name'>&#8358;".$product_price."</span></li>
            <div class='clearfix'> </div>
            </ul>";


    }
  }
  echo "<ul class='cart-header'><li> <span class='name'><h5>Total <i>-</i>&#8358;".$total_price."</span></h5></li><div class='clearfix'> </div>
            </ul>";
}

function displayCustomerCheckout($dbconn, $userID, $hash){

  $stmt = $dbconn->prepare("SELECT * FROM checkout WHERE user_id = :uid AND hash = :hid");
  $stmt->bindParam(":uid", $userID);
  $stmt->bindParam(":hid", $hash);
  $stmt->execute();
  $result = $stmt->fetch(PDO::FETCH_BOTH);

    extract($result);


     echo "<div style='text-align: center; class='col-md-3 account-right account-left'>
          <div class='in-check' 'align='center' class='col-md-3 account-right account-left' >
            <ul class='unit'>
            <h3>Customer Information</h3>
            <p><b>Name: </b>".$name."</p>
            <p><b>Phone number: </b>".$phone_number."</p>
            <p><b>Adress: </b>".$adress."</p>
            </ul>";




}
function get_page($dbconn, $start){
  $stmt = $dbconn->prepare("SELECT * FROM product ORDER BY product_id DESC LIMIT $start");
}


function userDisplayTopSelling($dbconn){
  $top_selling = "top-selling";

  $stmt= $dbconn->prepare("SELECT * FROM product WHERE flag =:ts LIMIT 4");
  $stmt->bindParam(':ts', $top_selling);
  $stmt->execute();
  while ($row = $stmt->fetch(PDO::FETCH_BOTH)){
    $count = $stmt->rowCount();
    extract($row);
     if ($inventory == 0) {
    $inventory= "<h4 style=color:red;>Out Of Stock!</h4>";
    }
echo   "<div class='col-md-3 product-left'>
            <div class='product-main simpleCart_shelfItem'>
              <a href='preview?hid=".$hash_id."'class='mask'><img class='img-responsive zoom-img' src=".$file_path." alt=".$product_name." /></a>
              <div class='product-bottom'>
                <h3>".$product_name."</h3>
                <p>Stock- ".$inventory."</p>'
                <h4><a class='item_add' href='preview?hid=".$hash_id."'><i></i></a> <span class=' item_price'>".$price."</span></h4>
              </div>
              <div class='srch'>
                <span>-50%</span>
              </div>
            </div>
            <div class='clearfix'></div>
          </div>";

  }

}
function userDisplayPopularDemand($dbconn){
  $top_selling = "popular-demand";

  $stmt= $dbconn->prepare("SELECT * FROM product WHERE flag =:ts");
  $stmt->bindParam(':ts', $top_selling);
  $stmt->execute();
  while ($row = $stmt->fetch(PDO::FETCH_BOTH)){
    $count = $stmt->rowCount();
    extract($row);
    echo "<div class='product-one'>
          <div class='col-md-3 product-left'>
            <div class='product-main simpleCart_shelfItem'>
              <a href='preview' class='mask'><img class='img-responsive zoom-img' src=".$file_path." alt=".$product_name." /></a>
              <div class='product-bottom'>
                <h3>".$product_name."</h3>
                <p>Explore Now</p>
                <h4><a class='item_add' href='#'><i></i></a> <span class=' item_price'>$ 329</span></h4>
              </div>
              <div class='srch'>
                <span>-50%</span>
              </div>
            </div>
          </div>";


  }

}
function userDisplayNewOffers($dbconn){
  $top_selling = "new-offers";

  $stmt= $dbconn->prepare("SELECT * FROM product WHERE flag =:ts");
  $stmt->bindParam(':ts', $top_selling);
  $stmt->execute();
  while ($row = $stmt->fetch(PDO::FETCH_BOTH)){
    $count = $stmt->rowCount();
    extract($row);
    echo     "<div class='col-md-3 top_brand_left-1'>
    <div class='hover14 column'>
    <div class='agile_top_brand_left_grid'>
    <div class='agile_top_brand_left_grid_pos'>
    </div>
    <div class='agile_top_brand_left_grid1'>
    <figure>
    <div class='snipcart-item block' >
    <div class='snipcart-thumb'>
    <a href='preview?hid=".$hash_id."'><img title=' ' alt=".$product_name." src=".$file_path." /></a>
    <p>".$product_name."</p>
    <h4>".$price." <span>".$old_price."</span></h4>
    </div>
    <div class='snipcart-details top_brand_home_details'>
    <form action='#'' method='post'>
    <fieldset>
    <a href='preview?hid=".$hash_id."'><input type='submit' name='submit' value='Buy' class='button'></a>
    </fieldset>
    </form>
    </div>
    </div>
    </figure>
    </div>
    </div>
    </div>
    </div>";

  }

}

function getCart($dbconn,$user){
  $count=0;
  $stmt = $dbconn->prepare("SELECT * FROM cart WHERE user_id = :ui");
  $stmt->bindParam(':ui', $user);
  $stmt->execute();
  // $count = $stmt->rowCount();
  while($row = $stmt->fetch(PDO::FETCH_BOTH)){
    extract($row);
    $count += $quantity;
  }

  return $count;

}
function checkInventory($dbconn, $userID){
$stmt = $dbconn->prepare("SELECT * FROM cart WHERE user_id = :pi");
$stmt->bindParam(':pi', $userID);
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {
      extract($row);
    $inventory = viewpreviewProduct($dbconn, $product_id);

      if ($inventory < $quantity || $quantity < 1) {
        header('Location:cart');
      }
}

}



function fetchBlog($dbconn){
  $result = [];
$stmt= $dbconn->prepare("SELECT * FROM blog ORDER BY id ASC");
$stmt->execute();
$count = count($stmt);
while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {
  $result[] = $row;
  }
  return $result;
}









 function submitQuote($dbconn, $post, $hashID){
  $stmt= $dbconn->prepare("INSERT INTO quote(name, email, quantity, phone_number, adress, customer_order, hash_id, date_created, time_created)
    VALUES(:na, :em, :qu, :ph, :add, :ord, :hid, NOW(), NOW())");
  $data = [
        ':na'=>$post['name'],
        ':em'=>$post['email'],
        ':ph'=>$post['phone_number'],
        ':qu'=>$post['quantity'],
        ':add'=>$post['adress'],
        ':ord'=>$post['order'],
        ':hid'=>$hashID
  ];
  $stmt->execute($data);
}



  function getPaginationForAllBlog($dbconn,  $record){
  $result = "";
  $prev = "1";
  $next = "1";
  $stmt= $dbconn->prepare("SELECT * FROM blog ORDER BY id DESC");
  $stmt->bindParam(':hid', $hid);
  $stmt->execute();
  $total_record=$stmt->rowCount();

  $total_pages = ceil($total_record/$record);
  for ($i=1; $i <=$total_pages ; $i++) {

    $result .= "<li class='active'><a href='farmers?page=".$i."'>".$i."</a></li>";
  }
  return $result;
}

 function submitServiceOrder($dbconn, $post, $hashID){
  $rnd = rand(0000000000,9999999999);
  $split = explode(" ",$post['name']);
  $id = $rnd.cleans($split['0']);
  $hash_id = str_shuffle($id.'product');
  $stmt= $dbconn->prepare("INSERT INTO service_booking(name, phone_number, email, adress, service_order, hash_id, service_id, date_created, time_created)
    VALUES(:na, :ph, :em, :add, :ord, :hid, :service, NOW(), NOW())");
  $data = [
        ':na'=>$post['name'],
        ':em'=>$post['email'],
        ':ph'=>$post['phone_number'],
        ':service'=>$hashID,
        ':add'=>$post['adress'],
        ':ord'=>$post['order'],
        ':hid'=>$hash_id,
  ];
  $stmt->execute($data);
}



////////////////////////Reuseable Controllers

function getProductsByID($dbconn, $productID) {
  $stmt = $dbconn->prepare("SELECT * FROM product WHERE product_id=:id");
  $stmt->bindParam(':id', $productID);

  $stmt->execute();
  $row = $stmt->fetch(PDO::FETCH_ASSOC);

  return $row;
}
function bestSellingProduct($dbconn){
  $popular = "popular-demand";
  $stmt = $dbconn->prepare("SELECT * FROM product WHERE flag= :bs   ");
  $stmt->bindParam(":bs", $popular);
  $stmt->execute();
  $row = $stmt->fetch(PDO::FETCH_BOTH);
  return $row;
}

function getAboutUS($dbconn){
$stmt=$dbconn->prepare("SELECT * FROM about");
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_BOTH);

return $row;
}

function viewBlog($dbconn, $hashID){
  $stmt= $dbconn->prepare('SELECT * FROM blog WHERE hash_id = :hid');
  $stmt->bindParam(':hid', $hashID);
  $stmt->execute();
  $row = $stmt->fetch(PDO::FETCH_BOTH);
  return $row;
}

function fetchAllProducts($dbconn){
  $result = [];
$stmt=$dbconn->prepare("SELECT * FROM product ");
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {
  $result [] = $row;
}
return $result;
}

function fetchCategory($dbconn){
    $result = [];
$stmt=$dbconn->prepare("SELECT * FROM category");
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {
  $result [] = $row;
}
return $result;
}

function getProductById($dbconn, $hashID){
    $stmt= $dbconn->prepare('SELECT * FROM product WHERE hash_id = :hid');
  $stmt->bindParam(':hid', $hashID);
  $stmt->execute();
  $row = $stmt->fetch(PDO::FETCH_BOTH);

  return $row;
}
function fetchProductByCategory($dbconn, $cat_id){
     $result = [];
$stmt=$dbconn->prepare("SELECT * FROM product WHERE category=:cat");
$stmt->bindParam(':cat', $cat_id);
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {
  $result [] = $row;
}
return $result;
}

function getServices($dbconn){
  $result = [];
  $stmt= $dbconn->prepare("SELECT * FROM services");
  $stmt->execute();
  while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {
    $result [] = $row;

  }
  return $result;
}
function getAllServices($dbconn){
  $result = [];
  $stmt= $dbconn->prepare("SELECT * FROM services");
  $stmt->execute();
  while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {
    $result [] = $row;

  }
  return $result;
}
function getFirstServices($dbconn){
  $result = [];
  $stmt= $dbconn->prepare("SELECT * FROM services LIMIT 1");
  $stmt->execute();
  while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {
    $result [] = $row;

  }
  return $result;
}











?>
