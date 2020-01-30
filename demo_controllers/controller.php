<?php
// define("DB_PATH", dirname(dirname(__FILE__)));
// include DB_PATH."/demo_models/model.php";
function getInsight($dbconn){
  $cat = "Topic";
  $stmt = $dbconn->prepare("SELECT * FROM package WHERE package_name = :id");
  $stmt->bindParam(":id", $cat);
  $stmt->execute();
  while($row = $stmt->fetch(PDO::FETCH_BOTH)){
    extract($row);
    echo '<option value="'.$package_list.'">'.$package_list.'</option>';
  }
}
function compressImage21($files, $name, $quality, $upDIR ) {
// die(var_dump($files[$name]['type']));
  $rnd = rand(0000000, 9999999);
  $strip_name = str_replace(" ", "_", $files[$name]['name']);
  $filename = time()."mail".$strip_name;
  $destination_url = $upDIR.$filename;
  $info = getimagesize($files[$name]['tmp_name']);
  if ($info['mime'] == 'image/jpeg')
  $image = imagecreatefromjpeg($files[$name]['tmp_name']);
  elseif ($info['mime'] == 'image/gif')
  $image = imagecreatefromgif($files[$name]['tmp_name']);
  elseif ($info['mime'] == 'image/png')
  $image = imagecreatefrompng($files[$name]['tmp_name']);

$range1 = 100000;

$range2 = 500000;

$range3 = 1000000;

  if($files[$name]['size'] >= 0  && $files[$name]['size'] <= $range1 ){
    $quality = 100;
  }elseif($files[$name]['size'] >= $range1  && $files[$name]['size'] <= $range2 ){
      $quality = 90;
  }elseif ($files[$name]['size'] >= $range2  && $files[$name]['size'] <= $range3) {
  $quality =  70;
  }else{
  $quality =  20;
  }
  imagejpeg($image, $destination_url, $quality);
  return $destination_url;
}
function getEntityCategoryAdmin($dbconn,$tb,$nm,$gid){
  $stmt = $dbconn->prepare("SELECT $nm FROM $tb WHERE id=:gid");
  $stmt->bindParam(":gid", $gid);
  $stmt->execute();
  $nm = $stmt->fetch(PDO::FETCH_BOTH);
  return $nm;
}
function addTestimony($dbconn, $input){
  $stmt = $dbconn->prepare("INSERT INTO Testimonies VALUES(NULL, :nm,:ptf, NOW())");

    $stmt->bindParam(":nm", $input['tesname']);
    $stmt->bindParam(":ptf", $input['testimony']);
    $stmt->execute();
    $success = "Done ";
      // logs($dbconn, 'added', $input['tesname'],'Testimony',$sess);
    header("Location:manageTestimony?success=$success");
}
function TesDetail($dbconn,$get){
  $stmt= $dbconn->prepare("SELECT * FROM Testimonies WHERE testimony_id=:id");
  $stmt -> bindParam(":id", $get['id']);
  $stmt->execute();
  while($record = $stmt->fetch(PDO::FETCH_BOTH)){
    return $record;
  }
}

// function insert($dbconn, $table, $parameters){
//
// array_pop($parameters);
//   // var_dump($parameters);
//   $sql = sprintf('INSERT INTO %s (%s) VALUES(%s)',
//       $table,
//       implode(', ',array_keys($parameters)), ':'.implode(',:',array_keys($parameters))
//   );
//   // die(var_dump($sql));
// $stmt =  $dbconn->prepare($sql);
// $stmt->execute($parameters);
// }
function viewTes($dbconn){

  $stmt= $dbconn->prepare("SELECT * FROM Testimonies");

  $stmt->execute();


  while($record = $stmt->fetch()){
    echo "<tr>";
    echo "<td>".$record['Name']."</td>";
    echo "<td>".$record['Testimony']."</td>";
    echo "<td>".$record['Date']."</td>";
    echo "<td><a href=\"delete_tes?id=".$record['testimony_id']."\"><span class=\"label label-danger\">Delete</span></a></td>";
    echo "</tr>";
  }
}
function deleteTes($dbconn, $get){

  $stmt= $dbconn->prepare("DELETE FROM Testimonies WHERE testimony_id=:id");

  $stmt -> bindParam(":id", $get['id']);

  $stmt->execute();
  $success = "Done";
header("Location:manageTestimony?success=$success");

}
function viewExp($dbconn){

  $stmt= $dbconn->prepare("SELECT * FROM expression");

  $stmt->execute();


  while($record = $stmt->fetch()){
    echo "<tr>";
    echo "<td>".$record['Name']."</td>";
    echo "<td>".$record['expression']."</td>";
echo "<td><div style='width:150px; height:100px; background:url(".$record['image']."); background-size: cover; background-position: center; background-repeat: no-repeat;'></div></td>";
    echo "<td><a href=\"delete_exp?id=".$record['expression_id']."\"><span class=\"label label-danger\">Delete</span></a></td>";
    echo "</tr>";
  }
}
function deleteExp($dbconn, $get){

  $stmt= $dbconn->prepare("DELETE FROM expression WHERE expression_id=:id");

  $stmt -> bindParam(":id", $get['id']);

  $stmt->execute();
  $success = "Done";
header("Location:manageTestimony?success=$success");

}

function addExpression($dbconn,$ver, $input){
  $stmt = $dbconn->prepare("INSERT INTO expression VALUES(NULL, :nm,:ptf,:img, NOW())");

    $stmt->bindParam(":nm", $input['tesname']);
    $stmt->bindParam(":ptf", $input['expression']);
    $stmt->bindParam(":img", $ver);
    $stmt->execute();
    $success = "Done ";
      // logs($dbconn, 'added', $input['tesname'],'students expression',$sess);
    header("Location:manageTestimony?success=$success");
}


function expDetail($dbconn,$get){
  $stmt= $dbconn->prepare("SELECT * FROM expression WHERE expression_id=:id");
  $stmt -> bindParam(":id", $get['id']);
  $stmt->execute();
  while($record = $stmt->fetch(PDO::FETCH_BOTH)){
    return $record;
  }
}

function getNewsCateg($dbconn){
  $stmt = $dbconn->prepare("SELECT * FROM news_category");
  $stmt->execute();
  while($row = $stmt->fetch(PDO::FETCH_BOTH)){
    extract($row);
    echo '<option value="'.$hash_id.'">'.$news_category.'</option>';
  }
}

function fetchItemLimit($dbconn,$tb,$limit){
  $result = [];
$stmt= $dbconn->prepare("SELECT * FROM $tb ORDER BY id $limit");
$stmt->execute();
$count = count($stmt);
while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {
  $result[] = $row;
  }
  return $result;
}

function previewRealBody($string, $count){
  $return = [];
  $original_string = $string;
  $words = explode(' ', $original_string);
  if(count($words) > $count){
    $words = array_slice($words, 0, $count);
    $string = implode(' ', $words)."...";
    $return[] = $string;
    $return[] = true;
  }else{
    $return[]= $string;
    $return[] = false;
  }
  return $return;
}




function fetchItem($dbconn,$tb){
  $result = [];
$stmt= $dbconn->prepare("SELECT * FROM $tb");
$stmt->execute();

while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {
  $result[] = $row;
  }
  return $result;
}
function fetchMore($dbconn,$hid){
  $result = [];
$stmt= $dbconn->prepare("SELECT * FROM images WHERE hash_id=:hid");
$stmt->bindParam(":hid", $hid);
$stmt->execute();

while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {
  $result[] = $row;
  }
  return $result;
}

function fetchItemById($dbconn,$tb,$id){
$stmt= $dbconn->prepare("SELECT * FROM $tb WHERE id=$id");
$stmt->execute();

$row = $stmt->fetch(PDO::FETCH_BOTH);
  return $row;
}


// function to check Email;
function doesEmailExist($dbconn, $input){ #placeholders are just there
  $result = false;
  $stmt = $dbconn -> prepare("SELECT * FROM admin WHERE email = :em");
  $stmt->bindParam(":em",$input);
  $stmt->execute();
  $count = $stmt->rowCount();
  if($count>0){
    $result = true;
  }
  return $result;
}

function viewCategory($dbconn){
  $stmt = $dbconn->prepare("SELECT * FROM category");
  $stmt->execute();
  while($record = $stmt->fetch()){
    extract($record);
    echo "<option value=\" $id\">$category_name</option>";
  }
}


function displayErrors($error, $field)
{
  $result= "";
  if (isset($error[$field]))
  {
    $result = '<span style="color:red">'.$error[$field].'</span>';
  }
  return $result;
}
function decodeHashId($dbconn,$table,$hash_id){
  $stmt = $dbconn->prepare("SELECT id FROM $table WHERE hash_id = :hid ");
  $stmt->bindParam(":hid", $hash_id);
  $stmt->execute();
  $row = $stmt->fetch(PDO::FETCH_BOTH);
  return $row['id'];
}
function doAdminRegister($dbconn, $input){
  try{
  $rnd = rand(0000000000,9999999999);
    $split = $input['firstname'];
    $id = $rnd.cleans($split);
  $hash_id = str_shuffle($id);

  $hash = password_hash($input['pword'], PASSWORD_BCRYPT);
  #insert data
  $stmt = $dbconn->prepare("INSERT INTO admin(firstname,lastname,phone_number,email,hash,hash_id,time_created,date_created) VALUES(:fn, :ln,:pn, :e, :h,:hid,NOW(),NOW())");
  #bind params...
  $data = [ ':fn' => $input['firstname'],
  ':ln' => $input['lastname'],
  ':e' => $input['email'],
  ':pn' => $input['phonenumber'],
  ':h' => $hash,
  ':hid' => $hash_id
];
$stmt->execute($data);

}
catch(PDOException $e){
  die("Something Went Wrong");

}
$suc = 'Registration Successful';
$message = preg_replace('/\s+/', '_', $suc);
header("Location:adminRegistration?success=$message");
}
function adminLogin($dbconn, $input){
  $stmt = $dbconn->prepare("SELECT * FROM admin WHERE email = :e ");
  $stmt ->bindParam(":e", $input['email']);
  $stmt->execute();
  $row = $stmt->fetch(PDO::FETCH_BOTH);
  if($stmt->rowCount() !=1 || !password_verify($input['pword'], $row['hash'])){
    $suc = 'Invalid Email or Password';
    $message = preg_replace('/\s+/', '_', $suc);
    header("Location:adminLogin?err=$message");
  }else{
    $verification = 1;
    $statement = $dbconn->prepare("SELECT * FROM admin WHERE email = :e AND verification=:ver ");
    $statement ->bindParam(":e", $input['email']);
    $statement ->bindParam(":ver", $verification);
    $statement->execute();
    if($statement->rowCount() !=1){
      $state = $dbconn->prepare("SELECT * FROM admin WHERE email = :e ");
      $state ->bindParam(":e", $input['email']);
      $state->execute();
      $row = $state->fetch(PDO::FETCH_BOTH);
      extract($row);
      $suc = 'Dear '.ucwords($firstname).', You Have Not been Verified as Proasis Admin';
      $message = preg_replace('/\s+/', '_', $suc);
      header("Location:adminLogin?wn=$message");
    }else{
      extract($row);
      $_SESSION['id'] = $hash_id;
      setLogin($dbconn,$hash_id);
      header("Location:admin");
    }
  }
}



function compressImage($files, $name, $quality, $upDIR ) {
  $rnd = rand(0000000, 9999999);
  $strip_name = str_replace(" ", "_", $_FILES[$name]['name']);
  $filename = $rnd.$strip_name;
  $destination_url = $upDIR.$filename;
  $info = getimagesize($files[$name]['tmp_name']);
  if ($info['mime'] == 'image/jpeg')
  $image = imagecreatefromjpeg($files[$name]['tmp_name']);
  elseif ($info['mime'] == 'image/gif')
  $image = imagecreatefromgif($files[$name]['tmp_name']);
  elseif ($info['mime'] == 'image/png')
  $image = imagecreatefrompng($files[$name]['tmp_name']);
  imagejpeg($image, $destination_url, $quality) or die("error");
  return $destination_url;
}
function compressImagea($files, $quality, $upDIR ) {
  $rnd = rand(0000000, 9999999);
  $strip_name = str_replace(" ", "_", $files['name']);
  $filename = $rnd.$strip_name;
  $destination_url = $upDIR.$filename;
  $info = getimagesize($files['tmp_name']);
  if ($info['mime'] == 'image/jpeg')
  $image = imagecreatefromjpeg($files['tmp_name']);
  elseif ($info['mime'] == 'image/gif')
  $image = imagecreatefromgif($files['tmp_name']);
  elseif ($info['mime'] == 'image/png')
  $image = imagecreatefrompng($files['tmp_name']);
  imagejpeg($image, $destination_url, $quality) or die("error");
  return $destination_url;
}
function addFrontage($dbconn,$post,$destination,$sess){
  try{
  $stmt = $dbconn->prepare("INSERT INTO frontage VALUES(NULL, :ht,:txt,:img,NOW(),NOW(),:sess)");
  $data = [
    ':ht' => $post['header_title'],
    ':txt' => $post['txt'],
    ':img' => $destination,
    ':sess' => $sess
  ];
  $stmt->execute($data);
}
catch(PDOException $e){
  die($e);

}
  $success = "Frontage Info Added";
  $succ = preg_replace('/\s+/', '_', $success);
  header("Location:/manageViews?success=$succ");
}



function addProduct($dbconn,$post,$destination,$sess){
  try{

  $rnd = rand(0000000000,9999999999);
  $split = explode(" ",$post['product']);
  $id = $rnd.cleans($split['0']);
  $hash_id = str_shuffle($id.'product');
  $stmt = $dbconn->prepare("INSERT INTO product VALUES(NULL, :ht,:txt, :cat, :av, :price, :hid, :img, :sess, NOW(),NOW())");
  $data = [
    ':ht' => $post['product'],
    ':txt' => $post['description'],
    ':cat' => $post['category'],
    ':av' => $post['avalability'],
    ':price' => $post['price'],
    ':hid' => $hash_id,
    ':img' => $destination['a'],
    ':sess' => $sess
  ];
  $stmt->execute($data);
}
catch(PDOException $e){
  die("Something Went Wrong");

}
  logs($dbconn, 'added', $post['product'],'product',$sess);
  $success = "Product Info Added";
  $succ = preg_replace('/\s+/', '_', $success);
  header("Location:/ViewProducts?success=$succ");
}

function cleans($string){
  $string = str_replace(array('[\', \']'), '', $string);
  $string = preg_replace('/\[.*\]/U', '', $string);
  $string = preg_replace('/&(amp;)?#?[a-z0-9]+;/i', '-', $string);
  $string = htmlentities($string, ENT_COMPAT, 'utf-8');
  $string = preg_replace('/&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);/i', '\\1', $string );
  $string = preg_replace(array('/[^a-z0-9]/i', '/[-]+/') , '-', $string);
  return strtolower(trim($string, '-'));
}
function addArticle($dbconn,$post,$destn, $sess){

  try{
  $rnd = rand(0000000000,9999999999);
  $split = explode(" ",$post['title']);
  $id = $rnd.cleans($split['0']);
  $hash_id = str_shuffle($id.'article');
  $stmt = $dbconn->prepare("INSERT INTO blog VALUES(NULL, :tt,:au,:vis,:bd,:img1,:sess,NOW(),NOW(),:hsh)");
  $data = [
    ':tt' => $post['title'],
    ':au' => $post['author'],
    ':vis' => $post['visibility'],
    ':bd' => $post['body'],
    ':img1' => $destn['a'],
    ':sess' => $sess,
    ':hsh' => $hash_id
  ];
  $stmt->execute($data);
}
catch(PDOException $e){
  die("Something Went Wrong");

}
  logs($dbconn, 'added', $post['title'],'article',$sess);
  $success = "Article Post Uploaded";
  header("Location:/manageArticles?success=$succ");

}

  function addServices($dbconn,$post,$destn, $sess){
  try{
  $rnd = rand(0000000000,9999999999);
  $split = explode(" ",$post['title']);
  $id = $rnd.cleans($split['0']);
  $hash_id = str_shuffle($id.'services');
  $stmt = $dbconn->prepare("INSERT INTO services VALUES(NULL, :tt,:au,:vis,:bd,:img1,:sess,NOW(),NOW(),:hsh)");
  $data = [
    ':tt' => $post['title'],
    ':au' => $post['author'],
    ':vis' => $post['visibility'],
    ':bd' => $post['body'],
    ':img1' => $destn['a'],
    ':sess' => $sess,
    ':hsh' => $hash_id
  ];
  $stmt->execute($data);
}
catch(PDOException $e){
  die("Something Went Wrong");

}
  logs($dbconn, 'added', $post['title'],'services',$sess);
  $success = "Campus Article Post Uploaded";
  $succ = preg_replace('/\s+/', '_', $success);
  header("Location:/manageServices?success=$succ");

}




function addExploit($dbconn,$post,$destn, $sess){
  try{
  $rnd = rand(0000000000,9999999999);
  $split = explode(" ",$post['title']);
  $id = $rnd.cleans($split['0']);
  $hash_id = str_shuffle($id.'article');
  $stmt = $dbconn->prepare("INSERT INTO exploits VALUES(NULL, :tt,:au,:cm,:vis,:bd,:img1,:sess,NOW(),NOW(),:hsh)");
  $data = [
    ':tt' => $post['title'],
    ':au' => $post['author'],
    ':cm' => $post['campus'],
    ':vis' => $post['visibility'],
    ':bd' => $post['body'],
    ':img1' => $destn['a'],
    ':sess' => $sess,
    ':hsh' => $hash_id
  ];
  $stmt->execute($data);
}
catch(PDOException $e){
  die("Something Went Wrong");

}
  logs($dbconn, 'added', $post['title'],'article',$sess);
  $success = "Exploit Post Uploaded";
  $succ = preg_replace('/\s+/', '_', $success);
  workRate($dbconn,$sess);
  header("Location:/manageExploits?success=$succ");
}
function addInsight($dbconn,$post,$destn, $sess){
  try{
  $rnd = rand(0000000000,9999999999);
  $split = explode(" ",$post['title']);
  $id = $rnd.cleans($split['0']);
  $hash_id = str_shuffle($id.'insight');
  $stmt = $dbconn->prepare("INSERT INTO insight VALUES(NULL,:tt,:at,:au,:vis,:bd,:img1,:sess,NOW(),NOW(),:hsh)");
  $data = [
    ':tt' => $post['title'],
    ':at' => $post['author'],
    ':au' => $post['category'],
    ':vis' => $post['visibility'],
    ':bd' => $post['body'],
    ':img1' => $destn['a'],
    ':sess' => $sess,
    ':hsh' => $hash_id
  ];
  $stmt->execute($data);
}
catch(PDOException $e){
  die("Something Went Wrong");

}
  logs($dbconn, 'added', $post['title'],'insight',$sess);
  $success = "Insight Post Uploaded";
  $succ = preg_replace('/\s+/', '_', $success);

  header("Location:/manageInsights?success=$succ");
}
function addNews($dbconn,$post,$destn, $sess){
try{
  $rnd = rand(0000000000,9999999999);
  $split = explode(" ",$post['title']);
  $id = $rnd.cleans($split['0']);
  $hash_id = str_shuffle($id.'news');
  $stmt = $dbconn->prepare("INSERT INTO news VALUES(NULL, :tt,:lnk,:vis,:cat,:bd,:img1,:sess,NOW(),NOW(),:hsh)");

  $data = [
    ':tt' => $post['title'],
    ':lnk' => $post['link'],
    ':vis' => $post['visibility'],
    ':cat' => $post['category'],
    ':bd' => $post['body'],
    ':img1' => $destn['a'],
    ':sess' => $sess,
    ':hsh' => $hash_id
  ];
  $stmt->execute($data);

}
catch(PDOException $e){
  die("Something Went Wrong");

}

  logs($dbconn, 'added', $post['title'],'news',$sess);
  $success = "News Post Uploaded";
  $succ = preg_replace('/\s+/', '_', $success);
  workRate($dbconn,$sess);
  header("Location:/manageNews?success=$succ");
}
function addCampusNews($dbconn,$post,$destn, $sess){
  try{
  $rnd = rand(0000000000,9999999999);
  $split = explode(" ",$post['title']);
  $id = $rnd.cleans($split['0']);
  $hash_id = str_shuffle($id.'news');
  $stmt = $dbconn->prepare("INSERT INTO campus_news VALUES(NULL, :tt,:lnk,:vis,:cat,:bd,:img1,:sess,NOW(),NOW(),:hsh)");
  $data = [
    ':tt' => $post['title'],
    ':lnk' => $post['link'],
    ':vis' => $post['visibility'],
    ':cat' => $post['category'],
    ':bd' => $post['body'],
    ':img1' => $destn['a'],
    ':sess' => $sess,
    ':hsh' => $hash_id
  ];
  $stmt->execute($data);
}
catch(PDOException $e){
  die("Something Went Wrong");

}
  logs($dbconn, 'added', $post['title'],'news',$sess);
  $success = "Campus News Post Uploaded";
  $succ = preg_replace('/\s+/', '_', $success);
workRate($dbconn,$sess);
  header("Location:/manageCampusNews?success=$succ");
}
function addReport($dbconn,$post,$sess){
  $rnd = rand(0000000000,9999999999);
  $split = explode(" ",$post['title']);
  $id = $rnd.cleans($split['0']);
  $hash_id = str_shuffle($id.'report');
  $stmt = $dbconn->prepare("INSERT INTO report VALUES(NULL, :tt,:lnk,:vis,:bd,:sess,NOW(),NOW(),:hsh)");
  $data = [
    ':tt' => $post['title'],
    ':lnk' => $post['link'],
    ':vis' => $post['visibility'],
    ':bd' => $post['body'],
    ':sess' => $sess,
    ':hsh' => $hash_id
  ];
  $stmt->execute($data);
  logs($dbconn, 'added', $post['title'],'report',$sess);
  $success = "Report Post Uploaded";
  $succ = preg_replace('/\s+/', '_', $success);
  workRate($dbconn,$sess);
  header("Location:/manageReports?success=$succ");
}
function addAbout($dbconn,$post,$sess){
  $stmt = $dbconn->prepare("INSERT INTO about VALUES(NULL,:ab,:sess,NULL,NOW(),NOW())");
  $data = [
    ':ab' => $post['about'],
    ':sess' => $sess,
  ];
  $stmt->execute($data);
  $success = "About Uploaded";
  $succ = preg_replace('/\s+/', '_', $success);
  workRate($dbconn,$sess);
  header("Location:/manageAbout?success=$succ");
}
// function addEvent($dbconn,$post,$img,$sess){
//   try{
//   $rnd = rand(0000000000,9999999999);
//   $split = explode(" ",$post['name']);
//   $id = $rnd.cleans($split['0']);
//   $hash_id = str_shuffle($id.'team');
//   $stmt = $dbconn->prepare("INSERT INTO team VALUES(NULL,:nm,:vn, :ab, :img, :sess,NOW(),NOW(),:hsh)");
//   $data = [
//     ':nm' => $post['name'],
//     ':vm' => $post['position'],
//     'img' => $img['a'],
//     ':ab' => $post['about'],
//     ':sess' => $sess,
//     ':hsh' => $hash_id
//   ];
//   var_dump($data);
//   $stmt->execute($data);
// }
// catch(PDOException $e){
//   die("Something Went Wrong");
//
// }
//   logs($dbconn, 'added', $post['name'],'team',$sess);
//   $success = "Event Post Uploaded";
//   $succ = preg_replace('/\s+/', '_', $success);
//   header("Location:/manageEvent?success=$succ");
// }
function addGrant($dbconn,$post,$destn,$sess){
  try{
  $rnd = rand(0000000000,9999999999);
  $id = $rnd."about";
  $hash_id = $id;
  $stmt = $dbconn->prepare("INSERT INTO about VALUES(NULL,:bd,:img1,:sess,NOW(),NOW(),:hsh)");
  $data = [
    ':bd' => $post['body'],
    ':img1' => $destn['a'],
    ':sess' => $sess,
    ':hsh' => $hash_id
  ];
  $stmt->execute($data);
}
catch(PDOException $e){
  die("Something Went Wrong");

}
  logs($dbconn, 'added', $post['body'],'about',$sess);
  $success = "Grant Post Uploaded";
  $succ = preg_replace('/\s+/', '_', $success);
  header("Location:/manageTrainings?success=$succ");
}
function addTraining($dbconn,$post,$sess){
  try{
  $rnd = rand(0000000000,9999999999);
  $split = explode(" ",$post['title']);
  $id = $rnd.cleans($split['0']);
  $hash_id = str_shuffle($id.'training');
  $stmt = $dbconn->prepare("INSERT INTO training VALUES(NULL, :tt,:lnk,:vis,:bd,:sess,NOW(),NOW(),:hsh)");
  $data = [
    ':tt' => $post['title'],
    ':lnk' => $post['link'],
    ':vis' => $post['visibility'],
    ':bd' => $post['body'],
    ':sess' => $sess,
    ':hsh' => $hash_id
  ];
  $stmt->execute($data);
}
catch(PDOException $e){
  die("Something Went Wrong");

}
  logs($dbconn, 'added', $post['title'],'training',$sess);
  $success = "Training Post Uploaded";
  $succ = preg_replace('/\s+/', '_', $success);

  header("Location:/managePrograms?success=$succ");
}
function addProject($dbconn,$post,$destn, $sess){
  $rnd = rand(0000000000,9999999999);
  $id = $rnd.cleans($sess).rnd;
  $hash_id = $id;
  $stmt = $dbconn->prepare("INSERT INTO project VALUES(NULL, :hid, :nm,:lk,:ab,:img,NOW(),NOW(),:sess)");
  $data = [
    ':nm' => $post['name'],
    ':lk' => $post['location'],
    ':ab' => $post['about'],
    ':img' => $destn['a'],
    ':sess' => $sess,
    ':hid' => $hash_id,
  ];
  $stmt->execute($data);
  logs($dbconn, 'added', $post['name'],'project',$sess);
  $success = "Project Uploaded";
  $succ = preg_replace('/\s+/', '_', $success);
  header("Location:/manageProjects?success=$succ");
}
function addEvent($dbconn,$post,$destn, $sess){
  $rnd = rand(0000000000,9999999999);
  $id = $rnd.cleans($sess).rnd;
  $hash_id = $id;
  $stmt = $dbconn->prepare("INSERT INTO event VALUES(NULL, :hid, :nm,:lk,:ab,:img,NOW(),NOW(),:sess)");
  $data = [
    ':nm' => $post['name'],
    ':lk' => $post['location'],
    ':ab' => $post['about'],
    ':img' => $destn['a'],
    ':sess' => $sess,
    ':hid' => $hash_id,
  ];
  $stmt->execute($data);
  logs($dbconn, 'added', $post['name'],'project',$sess);
  $success = "Project Uploaded";
  $succ = preg_replace('/\s+/', '_', $success);
  header("Location:/manageEvents?success=$succ");
}
function addCategory($dbconn,$post, $sess){
   $rnd = rand(0000000000,9999999999);
  $id = $rnd.cleans($post['category']);
  $hash_id = $id;
  $stmt = $dbconn->prepare("INSERT INTO category VALUES(NULL, :hid, :qs,:sess, NOW())");
  $data = [
    ':qs' => $post['category'],
    ':hid' =>$hash_id,
    ':sess' => $sess,
  ];
  $stmt->execute($data);
  logs($dbconn, 'added', $post['category'],'category',$sess);
  $success = "Project Uploaded";
  $succ = preg_replace('/\s+/', '_', $success);
  header("Location:/manageCategory?success=$succ");
}

function useFullInfo($dbconn,$sess){
  $stmt = $dbconn->prepare("SELECT * FROM admin WHERE hash_id = :sid");
  $data = [
    ':sid' => $sess
  ];
  $stmt->execute($data);
  $row = $stmt->fetch(PDO::FETCH_BOTH);
  return $row;
}

function addPackageName($dbconn,$post, $sess){
  try{
  $rnd = rand(0000000000,9999999999);
  $split = $_POST['package_name'];
  $id = $rnd.cleans($split);
  $hash_id = str_shuffle($id);
  $stmt = $dbconn->prepare("INSERT INTO package_name VALUES(NULL,:pn,:hid,NOW(),NOW(),:sess)");
  $data = [
    ':pn' => $post['package_name'],
    ':hid' => $hash_id,
    ':sess' => $sess,
  ];
  $stmt->execute($data);
}
catch(PDOException $e){
  die("Something Went Wrong");

}
  logs($dbconn, 'added', $post['package_name'],'package',$sess);
  $package_name = $post['package_name'];
  $success = "Insight Name $packag  e_name Added";
  $succ = preg_replace('/\s+/', '_', $success);
  header("Location:/insightCategory?success=$succ");
}
function addNewsCategory($dbconn,$post, $sess){
  try{
  $rnd = rand(0000000000,9999999999);
  $split = $_POST['package_name'];
  $id = $rnd.cleans($split);
  $hash_id = str_shuffle($id);
  $stmt = $dbconn->prepare("INSERT INTO news_category VALUES(NULL,:pn,:hid,NOW(),NOW(),:sess)");
  $data = [
    ':pn' => $post['package_name'],
    ':hid' => $hash_id,
    ':sess' => $sess,
  ];
  $stmt->execute($data);
}
catch(PDOException $e){
  die("Something Went Wrong");

}
  logs($dbconn, 'added', $post['package_name'],'news category',$sess);
  $package_name = $post['package_name'];
  $success = "News Category $package_name Added";
  $succ = preg_replace('/\s+/', '_', $success);
  header("Location:/newsCategory?success=$succ");
}
function addCampus($dbconn,$post, $sess){
  $rnd = rand(0000000000,9999999999);
  $split = strtoupper($_POST['package_name']);
  $id = $rnd.$split;
  $hash_id = str_shuffle($id);
  $stmt = $dbconn->prepare("INSERT INTO campus VALUES(NULL,:pn,:hid,NULL,NULL,NULL,NOW(),NOW(),:sess)");
  $data = [
    ':pn' => $post['package_name'],
    ':hid' => $hash_id,
    ':sess' => $sess,
  ];
  $stmt->execute($data);
  logs($dbconn, 'added', $post['package_name'],'campus',$sess);
  $package_name = $post['package_name'];
  $success = "Campus $package_name Added";
  $succ = preg_replace('/\s+/', '_', $success);
  header("Location:/campus?success=$succ");
}
function addPackageList($dbconn,$post, $sess){
  $stmt = $dbconn->prepare("INSERT INTO package_list VALUES(NULL,:pn,NOW(),NOW(),:sess)");
  $data = [
    ':pn' => $post['package_list'],
    ':sess' => $sess,
  ];
  $stmt->execute($data);
  logs($dbconn, 'added', $post['package_list'],'package list',$sess);
  $package_name = $post['package_list'];
  $success = "Package Name $package_name Added";
  $succ = preg_replace('/\s+/', '_', $success);
  header("Location:/insightCategory?success=$succ");
}
function addPackage($dbconn,$post, $sess){
  $stmt = $dbconn->prepare("INSERT INTO package VALUES(NULL,:pn,:pl,NOW(),NOW(),:sess)");
  $data = [
    ':pl' => $post['package_l'],
    ':pn' => $post['package_n'],
    ':sess' => $sess,
  ];
  $stmt->execute($data);
  logs($dbconn, 'added', $post['package_l'],'package',$sess);
  $package_name = $post['package_n'];
  $success = "Insight $package_n Updated";
  $succ = preg_replace('/\s+/', '_', $success);
  header("Location:/insightCategory?success=$succ");
}
// function addNewsSubCategory($dbconn,$post, $sess){
//
//   $stmt = $dbconn->prepare("INSERT INTO news_sub_category VALUES(NULL,:pn,:pl,NOW(),NOW(),:sess)");
//   $data = [
//     ':pl' => $post['package_l'],
//     ':pn' => $post['package_n'],
//     ':sess' => $sess,
//   ];
//   $stmt->execute($data);
//
//   $package_name = $post['package_n'];
//   $success = "News Sub Category $package_n Updated";
//   $succ = preg_replace('/\s+/', '_', $success);
//
//   header("Location:/newsCategory?success=$succ");
// }
function addProfile($dbconn,$post,$destn,$sess){
  $profile_status = 1;
  $stmt = $dbconn->prepare("UPDATE admin SET firstname=:fn,lastname=:ln,portfolio=:pt,bio=:bi,phone_number=:pn,facebook_link=:fbl,twitter_link=:tlk,linkedin_link=:llk,instagram_link=:iglk,location=:lct,image_1=:img1,image_2=:img2,image_3=:img3,profile_status=:ps WHERE hash_id=:sess");
  $stmt->bindParam(":fn",$post['fname']);
  $stmt->bindParam(":ln",$post['lname']);
  $stmt->bindParam(":pt",$post['portfolio']);
  $stmt->bindParam(":bi",$post['bio']);
  $stmt->bindParam(":pn",$post['phonenumber']);
  $stmt->bindParam(":fbl",$post['fblink']);
  $stmt->bindParam(":tlk",$post['twlink']);
  $stmt->bindParam(":llk",$post['lklink']);
  $stmt->bindParam(":iglk",$post['iglink']);
  $stmt->bindParam(":lct",$post['location']);
  $stmt->bindParam(":img1",$destn['a']);
  $stmt->bindParam(":img2",$destn['b']);
  $stmt->bindParam(":img3",$destn['c']);
  $stmt->bindParam(":ps",$profile_status);
  $stmt->bindParam(":sess",$sess);
  $stmt->execute();
  $success = "Profile Successfully Uploaded";
  $succ = preg_replace('/\s+/', '_', $success);
  header("Location:/addProfile?success=$succ");
}
function adminInfo($dbconn,$sess){
  $stmt = $dbconn->prepare("SELECT hash_id,firstname,lastname,profile_status,email FROM admin WHERE hash_id = :sid");
  $data = [
    ':sid' => $sess
  ];
  $stmt->execute($data);
  $row = $stmt->fetch(PDO::FETCH_BOTH);
  return $row;
}
function clientInfo($dbconn,$sess){
  $stmt = $dbconn->prepare("SELECT hash_id,firstname,lastname,profile_status,email FROM user WHERE hash_id = :sid");
  $data = [
    ':sid' => $sess
  ];
  $stmt->execute($data);
  $row = $stmt->fetch(PDO::FETCH_BOTH);
  return $row;
}
function adminFullInfo($dbconn,$sess){
  $stmt = $dbconn->prepare("SELECT * FROM admin WHERE hash_id = :sid");
  $data = [
    ':sid' => $sess
  ];
  $stmt->execute($data);
  $row = $stmt->fetch(PDO::FETCH_BOTH);
  return $row;
}
function adminLevel($dbconn,$sess){
  $stmt = $dbconn->prepare("SELECT level FROM admin WHERE hash_id = :sid");
  $data = [
    ':sid' => $sess
  ];
  $stmt->execute($data);
  $row = $stmt->fetch(PDO::FETCH_BOTH);
  extract($row);
  return $level;
}
function getPackageName($dbconn){
  $stmt = $dbconn->prepare("SELECT * FROM package_name");
  $stmt->execute();
  while($row = $stmt->fetch(PDO::FETCH_BOTH)){
    extract($row);
    echo '<option value="'.$hash_id.'">
    '.$package_name.'
    </option>';
  }
}
function getBody($dbconn,$gid,$tb){
  $stmt = $dbconn->prepare("SELECT body FROM $tb WHERE hash_id=:hid");
  $stmt->bindParam(":hid", $gid);
  $stmt->execute();
  while($row = $stmt->fetch(PDO::FETCH_BOTH))
  extract($row);
  echo $body;
}
function getEventBody($dbconn,$gid,$tb){
  $stmt = $dbconn->prepare("SELECT about,start_date,end_date,venue FROM $tb WHERE hash_id=:hid");
  $stmt->bindParam(":hid", $gid);
  $stmt->execute();
  while($row = $stmt->fetch(PDO::FETCH_BOTH))
  extract($row);
  echo $about;
  echo "<br>";
  echo "<p>Start Date : $start_date</p>";
  echo "<p>End Date : $start_date</p>";
  echo "<p>Venue : $venue</p>";
}
function editArticle($dbconn,$post,$gid){
  $stmt = $dbconn->prepare("UPDATE blog SET title=:tt, author=:au, body=:bd WHERE hash_id=:hid");
  $stmt->bindParam(":tt", $post['title']);
  $stmt->bindParam(":au", $post['author']);
  $stmt->bindParam(":bd", $post['body']);
  $stmt->bindParam(":hid", $gid);
  $stmt->execute();
  if(isset($_SESSION['id'])){
    $sess = $_SESSION['id'];
  }
  logs($dbconn, 'edited', $post['title'],'article',$sess);
  $success = "edited Successfully";
  $succ = preg_replace('/\s+/', '_', $success);
  header("Location:/manageArticles?success=$succ");
}
function editServices($dbconn,$post,$gid){
  $stmt = $dbconn->prepare("UPDATE services SET title=:tt, author=:au, body=:bd WHERE hash_id=:hid");
  $stmt->bindParam(":tt", $post['title']);
  $stmt->bindParam(":au", $post['author']);
  $stmt->bindParam(":bd", $post['body']);
  $stmt->bindParam(":hid", $gid);
  $stmt->execute();
  if(isset($_SESSION['id'])){
    $sess = $_SESSION['id'];
  }
  logs($dbconn, 'edited', $post['title'],'services',$sess);
  $success = "edited Successfully";
  $succ = preg_replace('/\s+/', '_', $success);
  header("Location:/manageServices?success=$succ");
}
function editCategory($dbconn,$post,$gid){
    $rnd = rand(0000000000,9999999999);
  $id = $rnd.cleans($post['category']);
  $hash_id = $id;
  $stmt = $dbconn->prepare("UPDATE category SET category_name=:tt, hash_id=:h   WHERE hash_id=:hid");
  $stmt->bindParam(":tt", $post['category']);
  $stmt->bindParam(":h", $hash_id);
  $stmt->bindParam(":hid", $gid);
  $stmt->execute();
  if(isset($_SESSION['id'])){
    $sess = $_SESSION['id'];
  }
  logs($dbconn, 'edited', $post['category'],'category',$sess);
  $success = "edited Successfully";
  $succ = preg_replace('/\s+/', '_', $success);
  header("Location:/manageCategory?success=$succ");
}
// function editEvent($dbconn,$post,$gid){
//   $stmt = $dbconn->prepare("UPDATE event SET name=:tt, venue=:au, about=:bd, start_date=:sd, end_date=:ed WHERE hash_id=:hid");
//   $stmt->bindParam(":tt", $post['name']);
//   $stmt->bindParam(":au", $post['venue']);
//   $stmt->bindParam(":bd", $post['about']);
//   $stmt->bindParam(":sd", $post['start_date']);
//   $stmt->bindParam(":ed", $post['end_date']);
//   $stmt->bindParam(":hid", $gid);
//   $stmt->execute();
//   if(isset($_SESSION['id'])){
//     $sess = $_SESSION['id'];
//   }
//   logs($dbconn, 'edited', $post['name'],'event',$sess);
//   $success = "edited Successfully";
//   $succ = preg_replace('/\s+/', '_', $success);
//   header("Location:/manageEvent?success=$succ");
// }
function editAbout($dbconn,$post,$hid,$gid){
  $stmt = $dbconn->prepare("UPDATE about SET body=:bd, created_by=:eb WHERE id=:hid");
  $stmt->bindParam(":bd", $post['about']);
  $stmt->bindParam(":eb", $hid);
  $stmt->bindParam(":hid", $gid);
  $stmt->execute();
  if(isset($_SESSION['id'])){
    $sess = $_SESSION['id'];
  }
  logs($dbconn, 'edited', $post['about'],'about',$sess);
  $success = "edited Successfully";
  $succ = preg_replace('/\s+/', '_', $success);
  header("Location:/manageAbout?success=$succ");
}
function editInsight($dbconn,$post,$gid){
  try{
  $stmt = $dbconn->prepare("UPDATE insight SET title=:tt,author=:at, category=:au, body=:bd WHERE hash_id=:hid");
  $stmt->bindParam(":tt", $post['title']);
  $stmt->bindParam(":at", $post['author']);
  $stmt->bindParam(":au", $post['category']);
  $stmt->bindParam(":bd", $post['body']);
  $stmt->bindParam(":hid", $gid);
  $stmt->execute();
}
catch(PDOException $e){
  die("Something Went Wrong");

}
  if(isset($_SESSION['id'])){
    $sess = $_SESSION['id'];
  }
  logs($dbconn, 'edited', $post['title'],'insight',$sess);
  $success = "edited Successfully";
  $succ = preg_replace('/\s+/', '_', $success);
  header("Location:/manageInsights?success=$succ");
}
function setLevel($dbconn,$post,$gid){
  $stmt = $dbconn->prepare("UPDATE admin SET level=:bd WHERE hash_id=:hid");
  $stmt->bindParam(":bd", $post);
  $stmt->bindParam(":hid", $gid);
  $stmt->execute();
  if(isset($_SESSION['id'])){
    $sess = $_SESSION['id'];
  }
  logs($dbconn, 'edited', $post,'admin level'.' for '.$gid,$sess);
  $success = "Level Successfully";
  $succ = preg_replace('/\s+/', '_', $success);
  header("Location:/viewUsers?success=$succ");
}
function editContent($dbconn,$post,$gid,$tb){
  try{
  $stmt = $dbconn->prepare("UPDATE $tb SET   body=:bd WHERE hash_id=:hid");

  $stmt->bindParam(":bd", $post['body']);
  $stmt->bindParam(":hid", $gid);
  $stmt->execute();
}
catch(PDOException $e){
  die("Something Went Wrong");

}
  if(isset($_SESSION['id'])){
    $sess = $_SESSION['id'];
  }
  logs($dbconn, 'edited', $post['body'],$tb,$sess);
  $success = "edited Successfully";
  $succ = preg_replace('/\s+/', '_', $success);
    header("location:manageAbout?success=$succ");


}
function editNews($dbconn,$post,$gid){
  try{
  $stmt = $dbconn->prepare("UPDATE news SET headline=:tt,category=:ct, link=:au, body=:bd WHERE hash_id=:hid");
  $stmt->bindParam(":tt", $post['title']);
  $stmt->bindParam(":au", $post['link']);
  $stmt->bindParam(":bd", $post['body']);
  $stmt->bindParam(":ct", $post['category']);
  $stmt->bindParam(":hid", $gid);
  $stmt->execute();
  if(isset($_SESSION['id'])){
    $sess = $_SESSION['id'];
  }
}
catch(PDOException $e){
  die("Something Went Wrong");

}
  logs($dbconn, 'edited', $post['title'],'news',$sess);
  $success = "edited Successfully";
  $succ = preg_replace('/\s+/', '_', $success);
  header("Location:/manageNews?success=$succ");
}
function editCampusNews($dbconn,$post,$gid){
  $stmt = $dbconn->prepare("UPDATE campus_news SET headline=:tt, link=:au, body=:bd WHERE hash_id=:hid");
  $stmt->bindParam(":tt", $post['title']);
  $stmt->bindParam(":au", $post['link']);
  $stmt->bindParam(":bd", $post['body']);
  $stmt->bindParam(":hid", $gid);
  $stmt->execute();
  if(isset($_SESSION['id'])){
    $sess = $_SESSION['id'];
  }
  logs($dbconn, 'edited', $post['title'],'news',$sess);
  $success = "edited Successfully";
  $succ = preg_replace('/\s+/', '_', $success);
  header("Location:/manageCampusNews?success=$succ");
}
function getEditInfo($dbconn,$get,$tb){
  $result = [];
  $stmt = $dbconn->prepare("SELECT * FROM $tb WHERE hash_id=:gt");
  $stmt->bindParam(":gt", $get);
  $stmt->execute();
  while($row = $stmt->fetch(PDO::FETCH_BOTH)){
    $result = $row;
  }
  return $result;
}
function frontageDetail($dbconn,$get){
  $stmt= $dbconn->prepare("SELECT * FROM frontage WHERE id=:id");
  $stmt -> bindParam(":id", $get['id']);
  $stmt->execute();
  while($record = $stmt->fetch(PDO::FETCH_BOTH)){
    return $record;
  }
}
function viewFrontage($dbconn){

  $stmt= $dbconn->prepare("SELECT * FROM frontage");

  $stmt->execute();


  while($record = $stmt->fetch()){
    echo "<tr>";
    echo "<td>".$record['header_title']."</td>";
    echo "<td>".$record['text']."</td>";
    echo "<td><div style='width:150px; height:100px; background:url(".$record['image']."); background-size: cover; background-position: center; background-repeat: no-repeat;'></div></td>";
    echo "<td><a href=\"delete_frontage?id=".$record['id']."\"><span class=\"label label-danger\">Delete</span></a></td>";
    echo "</tr>";
  }
}
function deleteFrontage($dbconn, $get){
  $gt = frontageDetail($dbconn, $get);
  extract($gt);
  $img = $image;


  $stmt= $dbconn->prepare("DELETE FROM frontage WHERE id=:id");

  $stmt -> bindParam(":id", $get['id']);

  $stmt->execute();
  if(file_exists($img)){
    unlink($img);
  }
  $success = "Done";


header("Location:manageViews?success=$success");

}



function getEditInfo1($dbconn,$get,$tb){
  $result = [];
  $stmt = $dbconn->prepare("SELECT * FROM $tb WHERE id=:gt");
  $stmt->bindParam(":gt", $get);
  $stmt->execute();
  while($row = $stmt->fetch(PDO::FETCH_BOTH)){
    $result = $row;
  }
  return $result;
}
function getEditInfo2($dbconn,$get,$tb){
  $result = [];
  $stmt = $dbconn->prepare("SELECT * FROM $tb WHERE id=:gt");
  $stmt->bindParam(":gt", $get);
  $stmt->execute();
  while($row = $stmt->fetch(PDO::FETCH_BOTH)){
    $result = $row;
  }
  return $result;
}
function editImage($dbconn,$destn,$del,$get,$tb){
  $myFile1 = $del;
  $stmt = $dbconn->prepare("UPDATE $tb SET image_1=:img WHERE hash_id=:hid");
  $data = [
    ':img' => $destn,
    ':hid' => $get,
  ];
  $stmt->execute($data);
  if(isset($_SESSION['id'])){
    $sess = $_SESSION['id'];
  }
  logs($dbconn, 'edited', $destn,'image',$sess);

  if(file_exists($myFile1)){
    unlink($myFile1) or die("Couldn't delete file");
  }


  $success = "Image Changed";
  $succ = preg_replace('/\s+/', '_', $success);
  if($tb == "blog"){
    header("location:manageArticles");
  }
  if($tb == "campus_article"){
    header("location:manageCampusArticles");
  }
  if($tb == "news"){
    header("location:manageNews");
  }
  if($tb == "campus_news"){
    header("location:manageCampusNews");
  }
  if($tb == "insight"){
    header("location:manageInsights");
  }
  if($tb == "grants"){
    header("location:manageTrainings");
  }
  if($tb == "exploits"){
    header("location:manageExploits");
  }
  if($tb == "project"){
    header("location:manageProjects");
  }
  if($tb == "product"){
    header("location:viewProducts");
  }
  if($tb == "about"){
    header("location:manageAbout");
  }
}
function previewBody($string, $count){
  $original_string = $string;
  $words = explode(' ', $original_string);
  if(count($words) > $count){
    $words = array_slice($words, 0, $count);
    $string = implode(' ', $words)."...";
  }
  return strip_tags($string);
}
function getServicesView($dbconn,$get){
  $stmt = $dbconn->prepare("SELECT * FROM services ORDER BY id DESC");
  $stmt->execute();
  while($row = $stmt->fetch(PDO::FETCH_BOTH)){
    extract($row);
    $bd = previewBody($body, 20);
    $level =  adminLevel($dbconn,$get);
    if($level == 3 || $level == "MASTER"){
      echo '<tr><td class="ads-details-td">
      <h4><a href="">'.$title.'</a></h4>
      <p> <strong> Author </strong>:
      '.$author.'</p>
      </td>
      <td class="ads-details-td">
      <a href="viewBody?id='.$hash_id.'&t=services"><p>'.$bd.'</p></a>
      </td>
      <td class="add-img-td">
      <a href="editImage?id='.$hash_id.'&t=services">
      <img class="img-responsive" src="'.$image_1.'">
      </a>
      </td>
      <td class="add-img-td">
      '.$created_by.'
      </td>
      <td class="add-img-td">
      '.$date_created.'
      </td>

      <td class="ads-details-td">
      <a href="editServices?id='.$hash_id.'"><button class="btn btn-common btn-sm" type="submit">Edit</button></a>
      </td>
      <td class="price-td">
      <a href="deleteServices?id='.$hash_id.'">
      <button class="btn btn-danger btn-sm" type="submit">Delete</button>
      </a>
      </td>
</tr>';
    }
    if($level == 2 || $level == 4 || $level == 5 || $level == 6){
      echo '<tr><td class="ads-details-td">
      <h4><a href="">'.$title.'</a></h4>
      <p> <strong> Author </strong>:
      '.$author.'</p>
      </td>
      <td class="ads-details-td">
      <a href="viewBody?id='.$hash_id.'&t=services"><p>'.$bd.'</p></a>
      </td>
      <td class="add-img-td">
      <a href="editImage?id='.$hash_id.'&t=services">
      <img class="img-responsive" src="'.$image_1.'">
      </a>
      </td>
      <td class="add-img-td">
      '.$created_by.'
      </td>
      <td class="add-img-td">
      '.$date_created.'
      </td>

      <td class="ads-details-td">
      <a href="editServices?id='.$hash_id.'"><button class="btn btn-common btn-sm" type="submit">Edit</button></a>
      </td>
</tr>';
    }
    if($level == 1){
      echo '<tr><td class="ads-details-td">
      <h4><a href="">'.$title.'</a></h4>
      <p> <strong> Author </strong>:
      '.$author.'</p>
      </td>
      <td class="ads-details-td">
      <a href="viewBody?id='.$hash_id.'&t=services"><p>'.$bd.'</p></a>
      </td>
      <td class="add-img-td">
      <a href="#">
      <img class="img-responsive" src="'.$image_1.'">
      </a>
      </td>
      <td class="add-img-td">
      '.$created_by.'
      </td>
      <td class="add-img-td">
      '.$date_created.'
      </td>

</tr>';
    }
  }
}
function getCategoryView($dbconn,$get){
  $stmt = $dbconn->prepare("SELECT * FROM category ORDER BY id DESC");
  $stmt->execute();
  while($row = $stmt->fetch(PDO::FETCH_BOTH)){
    extract($row);

    $level =  adminLevel($dbconn,$get);
    if($level == 3 || $level == "MASTER"){
      echo '<tr><td class="ads-details-td">
      <h4><a href="">'.$category_name.'</a></h4>
      <td class="add-img-td">
      '.$created_by.'
      </td>
       <td class="add-img-td">
      '.$hash_id.'
      </td>
      <td class="add-img-td">
      '.$date_created.'
      </td>
      <td class="ads-details-td">
      <a href="editCategory?id='.$hash_id.'"><button class="btn btn-common btn-sm" type="submit">Edit</button></a>
      </td>
      <td class="price-td">
      <a href="deleteCategory?id='.$hash_id.'">
      <button class="btn btn-danger btn-sm" type="submit">Delete</button>
      </a>
      </td>
   </tr>';
    }
    if($level == 2 || $level == 4 || $level == 5 || $level == 6){
      echo '<tr><td class="add-img-td">'.$category_name.' </td>
      <td class="add-img-td">
      '.$created_by.'
      </td>
       <td class="add-img-td">
      '.$hash_id.'
      </td>
      <td class="add-img-td">
      '.$date_created.'
      </td>
      <td class="ads-details-td">
      <a href="editCategory?id='.$hash_id.'"><button class="btn btn-common btn-sm" type="submit">Edit</button></a>
      </td>
      <td class="price-td">
      <p>You cannnot perform this action</p>
      </td>
      <td class="price-td">
      <p>You cannnot perform this action</p>
      </td></tr>';
    }
    if($level == 1){
      echo '<tr><td class="add-img-td">'.$category_name.' </td>
      <td class="add-img-td">
      '.$created_by.'
      </td>
      <td class="add-img-td">
      '.$hash_id.'
      </td>
      <td class="add-img-td">
      '.$date_created.'
      </td>
      <td class="ads-details-td">
      <p>You cannnot perform this action</p>
      </td>
      <td class="price-td">
      <p>You cannnot perform this action</p>
      </td>
      <td class="price-td">
      <p>You cannnot perform this action</p>
      </td></tr>';
    }
  }
}
function PgetServicesView($dbconn,$get){
  $stmt = $dbconn->prepare("SELECT * FROM campus_article WHERE created_by=:cb ORDER BY id DESC");
  $stmt->bindParam(":cb",$get);
  $stmt->execute();
  while($row = $stmt->fetch(PDO::FETCH_BOTH)){
    extract($row);
    $bd = previewBody($body, 20);
    $level =  adminLevel($dbconn,$get);
    if($level == 3 || $level == "MASTER"){
      echo '<tr><td class="ads-details-td">
      <h4><a href="">'.$title.'</a></h4>
      <p> <strong> Author </strong>:
      '.$author.'</p>
      </td>
      <td class="ads-details-td">
      <a href="viewBody?id='.$hash_id.'&t=campus_article"><p>'.$bd.'</p></a>
      </td>
      <td class="add-img-td">
      <a href="editImage?id='.$hash_id.'&t=campus_article">
      <img class="img-responsive" src="'.$image_1.'">
      </a>
      </td>
      <td class="add-img-td">
      '.$created_by.'
      </td>
      <td class="add-img-td">
      '.$date_created.'
      </td>

      <td class="ads-details-td">
      <a href="editServices?id='.$hash_id.'"><button class="btn btn-common btn-sm" type="submit">Edit</button></a>
      </td>
      <td class="price-td">
      <a href="deleteServices?id='.$hash_id.'">
      <button class="btn btn-danger btn-sm" type="submit">Delete</button>
      </a>
      </td>
</tr>';
    }
    if($level == 2 || $level == 4 || $level == 5 || $level == 6){
      echo '<tr><td class="ads-details-td">
      <h4><a href="">'.$title.'</a></h4>
      <p> <strong> Author </strong>:
      '.$author.'</p>
      </td>
      <td class="ads-details-td">
      <a href="viewBody?id='.$hash_id.'&t=campus_article"><p>'.$bd.'</p></a>
      </td>
      <td class="add-img-td">
      <a href="editImage?id='.$hash_id.'&t=campus_article">
      <img class="img-responsive" src="'.$image_1.'">
      </a>
      </td>
      <td class="add-img-td">
      '.$created_by.'
      </td>
      <td class="add-img-td">
      '.$date_created.'
      </td>

      <td class="ads-details-td">
      <a href="editServices?id='.$hash_id.'"><button class="btn btn-common btn-sm" type="submit">Edit</button></a>
      </td>
</tr>';
    }
    if($level == 1){
      echo '<tr><td class="ads-details-td">
      <h4><a href="">'.$title.'</a></h4>
      <p> <strong> Author </strong>:
      '.$author.'</p>
      </td>
      <td class="ads-details-td">
      <a href="viewBody?id='.$hash_id.'&t=campus_article"><p>'.$bd.'</p></a>
      </td>
      <td class="add-img-td">
      <a href="#">
      <img class="img-responsive" src="'.$image_1.'">
      </a>
      </td>
      <td class="add-img-td">
      '.$created_by.'
      </td>
      <td class="add-img-td">
      '.$date_created.'
      </td>

</tr>';
    }
  }
}
function PgetCategoryView($dbconn,$get){

  $stmt = $dbconn->prepare("SELECT * FROM exploits WHERE created_by=:cb ORDER BY id DESC");
  $stmt->bindParam(":cb",$get);
  $stmt->execute();
  while($row = $stmt->fetch(PDO::FETCH_BOTH)){
    extract($row);
    $bd = previewBody($body, 20);
    $level =  adminLevel($dbconn,$get);
    if($level == 3 || $level == "MASTER"){

      echo '<tr><td class="add-img-td">'.$category.' </td>
      <td class="add-img-td">
      '.$created_by.'
      </td>
      <td class="add-img-td">
      '.$date_created.'
      </td>
      <td class="ads-details-td">
      <a href="editCategory?id='.$hash_id.'"><button class="btn btn-common btn-sm" type="submit">Edit</button></a>
      </td>
      <td class="price-td">
      <a href="deleteCategoryt?id='.$hash_id.'">
      <button class="btn btn-danger btn-sm" type="submit">Delete</button>
      </a>
      </td></tr>';
    }
    if($level == 2 || $level == 4 || $level == 5 || $level == 6 || $level == 8){
      echo '<tr><td class="add-img-td">'.$category.' </td>
      <td class="add-img-td">
      '.$created_by.'
      </td>
      <td class="add-img-td">
      '.$date_created.'
      </td>
      <td class="ads-details-td">
      <a href="editCategory?id='.$hash_id.'"><button class="btn btn-common btn-sm" type="submit">Edit</button></a>
      </td>
      <td class="price-td">
      <p>You cannnot perform this action</p>
      </td>
      <td class="price-td">
      <p>You cannnot perform this action</p>
      </td></tr>';
    }
    if($level == 1){
      echo '<tr><td class="add-img-td">'.$category.' </td>
      <td class="add-img-td">
      '.$created_by.'
      </td>
      <td class="add-img-td">
      '.$date_created.'
      </td>
      <td class="ads-details-td">
      <p>You cannnot perform this action</p>
      </td>
      <td class="price-td">
      <p>You cannnot perform this action</p>
      </td>
      <td class="price-td">
      <p>You cannnot perform this action</p>
      </td></tr>';
    }
  }
}
function getEvent($dbconn,$get){
  $stmt = $dbconn->prepare("SELECT * FROM event ORDER BY id DESC");
  $stmt->execute();
  while($row = $stmt->fetch(PDO::FETCH_BOTH)){
    extract($row);
    $bd = previewBody($about, 20);
    $level =  adminLevel($dbconn,$get);
    if($level == 3 || $level == "MASTER"){
      echo '<tr><td width="150px" class="ads-details-td>
      <h4><a href="#">'.$event_name.'</a></h4></td>
      <td class="add-img-td">
      '.$event_location.'
      </td>
      <td class="ads-details-td">
      <a href="viewBody?id='.$hash_id.'&t=event"><p>'.$bd.'</p></a>
      </td>
      <td class="add-img-td">
      <a href="editImage?id='.$hash_id.'&t=event">
      <img class="img-responsive" src="'.$image_1.'">
      </a>
      </td>

      <td class="add-img-td">
      '.$created_by.'
      </td>
      <td class="add-img-td">
      '.$date_created.'
      </td>
      <td class="ads-details-td">
      <a href="editEvent?id='.$hash_id.'"><button class="btn btn-common btn-sm" type="submit">Edit</button></a>
      </td>
      <td class="price-td">
      <a href="deleteEvent?id='.$hash_id.'&t=event">
      <button class="btn btn-danger btn-sm" type="submit">Delete</button>
      </a>
      </td>
</tr>';
    }
    if($level == 2 || $level == 4 || $level == 5 || $level == 6){
         echo '<tr><td width="150px" class="ads-details-td>
      <h4><a href="#">'.$event_name.'</a></h4></td>
      <td class="add-img-td">
      '.$event_location.'
      </td>
      <td class="ads-details-td">
      <a href="viewBody?id='.$hash_id.'&t=event"><p>'.$bd.'</p></a>
      </td>
      <td class="add-img-td">
      <a href="editImage?id='.$hash_id.'&t=event">
      <img class="img-responsive" src="'.$image_1.'">
      </a>
      </td>
      <td class="add-img-td">
      '.$created_by.'
      </td>
      <td class="add-img-td">
      '.$date_created.'
      </td>
      <td class="ads-details-td">
      <a href="editEvent?id='.$hash_id.'"><button class="btn btn-common btn-sm" type="submit">Edit</button></a>
      </td>
      <td class="price-td">
      <a href="deleteEvent?id='.$hash_id.'">
      <button class="btn btn-danger btn-sm" type="submit">Delete</button>
      </a>
      </td>

      </tr>';
    }
    if($level == 1){
      echo '<tr><td class="ads-details-td>
      <h4><a href="'.$link.'">'.$event_name.'</a></h4>
      <p> <strong> Author </strong>:
      '.$event_location.'</p></td>
          <td class="add-img-td">
      '.$event_location.'
      </td>
      <td class="ads-details-td">
      <a href="viewBody?id='.$hash_id.'&t=event"><p>'.$bd.'</p></a>
      </td>
      <td class="add-img-td">
      <a href="#">
      <img class="img-responsive" src="'.$image_1.'">
      </a>
      </td>
      <td class="add-img-td">
      '.$created_by.'
      </td>
      <td class="add-img-td">
      '.$date_created.'
      </td>

      </tr>';
    }
  }
}
function getProject($dbconn,$get){
  $stmt = $dbconn->prepare("SELECT * FROM project ORDER BY id DESC");
  $stmt->execute();
  while($row = $stmt->fetch(PDO::FETCH_BOTH)){
    extract($row);
    $bd = previewBody($about, 20);
    $level =  adminLevel($dbconn,$get);
    if($level == 3 || $level == "MASTER"){
      echo '<tr><td width="150px" class="ads-details-td>
      <h4><a href="#">'.$project_name.'</a></h4></td>
      <td class="add-img-td">
      '.$project_location.'
      </td>
      <td class="ads-details-td">
      <a href="viewBody?id='.$hash_id.'&t=project"><p>'.$bd.'</p></a>
      </td>
      <td class="add-img-td">
      <a href="editImage?id='.$hash_id.'&t=project">
      <img class="img-responsive" src="'.$image_1.'">
      </a>
      </td>

      <td class="add-img-td">
      '.$created_by.'
      </td>
      <td class="add-img-td">
      '.$date_created.'
      </td>
      <td class="ads-details-td">
      <a href="editProject?id='.$hash_id.'"><button class="btn btn-common btn-sm" type="submit">Edit</button></a>
      </td>
      <td class="price-td">
      <a href="deleteProject?id='.$hash_id.'&t=project">
      <button class="btn btn-danger btn-sm" type="submit">Delete</button>
      </a>
      </td>
</tr>';
    }
    if($level == 2 || $level == 4 || $level == 5 || $level == 6){
         echo '<tr><td width="150px" class="ads-details-td>
      <h4><a href="#">'.$project_name.'</a></h4></td>
      <td class="add-img-td">
      '.$project_location.'
      </td>
      <td class="ads-details-td">
      <a href="viewBody?id='.$hash_id.'&t=project"><p>'.$bd.'</p></a>
      </td>
      <td class="add-img-td">
      <a href="editImage?id='.$hash_id.'&t=project">
      <img class="img-responsive" src="'.$image_1.'">
      </a>
      </td>
      <td class="add-img-td">
      '.$created_by.'
      </td>
      <td class="add-img-td">
      '.$date_created.'
      </td>
      <td class="ads-details-td">
      <a href="editProject?id='.$hash_id.'"><button class="btn btn-common btn-sm" type="submit">Edit</button></a>
      </td>
      <td class="price-td">
      <a href="deleteProject?id='.$hash_id.'">
      <button class="btn btn-danger btn-sm" type="submit">Delete</button>
      </a>
      </td>

      </tr>';
    }
    if($level == 1){
      echo '<tr><td class="ads-details-td>
      <h4><a href="'.$link.'">'.$project_name.'</a></h4>
      <p> <strong> Author </strong>:
      '.$project_location.'</p></td>
          <td class="add-img-td">
      '.$project_location.'
      </td>
      <td class="ads-details-td">
      <a href="viewBody?id='.$hash_id.'&t=project"><p>'.$bd.'</p></a>
      </td>
      <td class="add-img-td">
      <a href="#">
      <img class="img-responsive" src="'.$image_1.'">
      </a>
      </td>
      <td class="add-img-td">
      '.$created_by.'
      </td>
      <td class="add-img-td">
      '.$date_created.'
      </td>

      </tr>';
    }
  }
}
function PgetProject($dbconn, $get){
  $stmt = $dbconn->prepare("SELECT * FROM project ORDER BY id DESC");
  $stmt->bindParam(":cb",$get);
  $stmt->execute();
  while($row = $stmt->fetch(PDO::FETCH_BOTH)){
    extract($row);
    $bd = previewBody($body, 20);
    $level =  adminLevel($dbconn,$get);
    if($level == 3 || $level == "MASTER"){
     echo '<tr><td width="150px" class="ads-details-td>
      <h4><a href="#">'.$project_name.'</a></h4></td>
      <td class="add-img-td">
      '.$project_location.'
      </td>
      <td class="ads-details-td">
      <a href="viewBody?id='.$hash_id.'&t=project"><p>'.$bd.'</p></a>
      </td>
      <td class="add-img-td">
      <a href="editImage?id='.$hash_id.'&t=project">
      <img class="img-responsive" src="'.$image_1.'">
      </a>
      </td>
      <td class="add-img-td">
      '.$created_by.'
      </td>
      <td class="add-img-td">
      '.$date_created.'
      </td>
      <td class="ads-details-td">
      <a href="editProject?id='.$hash_id.'"><button class="btn btn-common btn-sm" type="submit">Edit</button></a>
      </td>
      <td class="price-td">
      <a href="deleteProject?id='.$hash_id.'">
      <button class="btn btn-danger btn-sm" type="submit">Delete</button>
      </a>
      </td>
</tr>';
    }
    if($level == 2 || $level == 4 || $level == 5 || $level == 6){
         echo '<tr><td width="150px" class="ads-details-td>
      <h4><a href="#">'.$project_name.'</a></h4></td>
      <td class="add-img-td">
      '.$project_location.'
      </td>
      <td class="ads-details-td">
      <a href="viewBody?id='.$hash_id.'&t=project"><p>'.$bd.'</p></a>
      </td>
      <td class="add-img-td">
      <a href="editImage?id='.$hash_id.'&t=project">
      <img class="img-responsive" src="'.$image_1.'">
      </a>
      </td>
      <td class="add-img-td">
      '.$created_by.'
      </td>
      <td class="add-img-td">
      '.$date_created.'
      </td>
      <td class="ads-details-td">
      <a href="editProject?id='.$hash_id.'"><button class="btn btn-common btn-sm" type="submit">Edit</button></a>
      </td>
      <td class="price-td">
      <a href="deleteProject?id='.$hash_id.'">
      <button class="btn btn-danger btn-sm" type="submit">Delete</button>
      </a>
      </td>

      </tr>';
    }
    if($level == 1){
      echo '<tr><td class="ads-details-td>
      <h4><a href="'.$link.'">'.$project_name.'</a></h4>
      <p> <strong> Author </strong>:
      '.$project_location.'</p></td>
          <td class="add-img-td">
      '.$project_location.'
      </td>
      <td class="ads-details-td">
      <a href="viewBody?id='.$hash_id.'&t=project"><p>'.$bd.'</p></a>
      </td>
      <td class="add-img-td">
      <a href="#">
      <img class="img-responsive" src="'.$image_1.'">
      </a>
      </td>
      <td class="add-img-td">
      '.$created_by.'
      </td>
      <td class="add-img-td">
      '.$date_created.'
      </td>

      </tr>';
    }
  }
}
function PgetEvent($dbconn, $get){
  $stmt = $dbconn->prepare("SELECT * FROM event ORDER BY id DESC");
  $stmt->bindParam(":cb",$get);
  $stmt->execute();
  while($row = $stmt->fetch(PDO::FETCH_BOTH)){
    extract($row);
    $bd = previewBody($body, 20);
    $level =  adminLevel($dbconn,$get);
    if($level == 3 || $level == "MASTER"){
     echo '<tr><td width="150px" class="ads-details-td>
      <h4><a href="#">'.$event_name.'</a></h4></td>
      <td class="add-img-td">
      '.$event_location.'
      </td>
      <td class="ads-details-td">
      <a href="viewBody?id='.$hash_id.'&t=event"><p>'.$bd.'</p></a>
      </td>
      <td class="add-img-td">
      <a href="editImage?id='.$hash_id.'&t=event">
      <img class="img-responsive" src="'.$image_1.'">
      </a>
      </td>
      <td class="add-img-td">
      '.$created_by.'
      </td>
      <td class="add-img-td">
      '.$date_created.'
      </td>
      <td class="ads-details-td">
      <a href="editEvent?id='.$hash_id.'"><button class="btn btn-common btn-sm" type="submit">Edit</button></a>
      </td>
      <td class="price-td">
      <a href="deleteEvent?id='.$hash_id.'">
      <button class="btn btn-danger btn-sm" type="submit">Delete</button>
      </a>
      </td>
</tr>';
    }
    if($level == 2 || $level == 4 || $level == 5 || $level == 6){
         echo '<tr><td width="150px" class="ads-details-td>
      <h4><a href="#">'.$event_name.'</a></h4></td>
      <td class="add-img-td">
      '.$event_location.'
      </td>
      <td class="ads-details-td">
      <a href="viewBody?id='.$hash_id.'&t=event"><p>'.$bd.'</p></a>
      </td>
      <td class="add-img-td">
      <a href="editImage?id='.$hash_id.'&t=event">
      <img class="img-responsive" src="'.$image_1.'">
      </a>
      </td>
      <td class="add-img-td">
      '.$created_by.'
      </td>
      <td class="add-img-td">
      '.$date_created.'
      </td>
      <td class="ads-details-td">
      <a href="editEvent?id='.$hash_id.'"><button class="btn btn-common btn-sm" type="submit">Edit</button></a>
      </td>
      <td class="price-td">
      <a href="deleteEvent?id='.$hash_id.'">
      <button class="btn btn-danger btn-sm" type="submit">Delete</button>
      </a>
      </td>

      </tr>';
    }
    if($level == 1){
      echo '<tr><td class="ads-details-td>
      <h4><a href="'.$link.'">'.$event_name.'</a></h4>
      <p> <strong> Author </strong>:
      '.$event_location.'</p></td>
          <td class="add-img-td">
      '.$event_location.'
      </td>
      <td class="ads-details-td">
      <a href="viewBody?id='.$hash_id.'&t=event"><p>'.$bd.'</p></a>
      </td>
      <td class="add-img-td">
      <a href="#">
      <img class="img-responsive" src="'.$image_1.'">
      </a>
      </td>
      <td class="add-img-td">
      '.$created_by.'
      </td>
      <td class="add-img-td">
      '.$date_created.'
      </td>

      </tr>';
    }
  }
}
function getCampusNewsView($dbconn,$get){
  $stmt = $dbconn->prepare("SELECT * FROM campus_news ORDER BY id DESC");
  $stmt->execute();
  while($row = $stmt->fetch(PDO::FETCH_BOTH)){
    extract($row);
    $bd = previewBody($about, 20);
    $level =  adminLevel($dbconn,$get);
    if($level == 3 || $level == "MASTER"){
      echo '<tr><td width="150px" class="ads-details-td>
      <h4><a href="'.$link.'">'.$headline.'</a></h4>
      <p> <strong> Author </strong>:
      '.$link.'</p>
      <p> <strong> Campus </strong>:
      '.$campus.'</p>
      </td>
      <td class="ads-details-td">
      <a href="viewBody?id='.$hash_id.'&t=campus_news"><p>'.$bd.'</p></a>
      </td>
      <td class="add-img-td">
      <a href="editImage?id='.$hash_id.'&t=campus_news">
      <img class="img-responsive" src="'.$image_1.'">
      </a>
      </td>
      <td class="add-img-td">
      '.$created_by.'
      </td>
      <td class="add-img-td">
      '.$date_created.'
      </td>
      <td class="add-img-td">
      '.$visibility.'
      </td>
      <td class="ads-details-td">
      <a href="editCampusNews?id='.$hash_id.'"><button class="btn btn-common btn-sm" type="submit">Edit</button></a>
      </td>
      <td class="price-td">
      <a href="deleteCampusNews?id='.$hash_id.'">
      <button class="btn btn-danger btn-sm" type="submit">Delete</button>
      </a>
      </td>
      <td class="price-td">
      <a href="show?id='.$hash_id.'&t=campus_news">
      <button class="btn btn-success btn-sm" type="submit">Show</button>
      </a>
      <a href="hide?id='.$hash_id.'&t=campus_news">
      <button class="btn btn-basic btn-sm" type="submit">Hide</button>
      </a>
      </td></tr>';
    }
    if($level == 2 || $level == 4 || $level == 5 || $level == 6){
      echo '<tr><td class="ads-details-td>
      <h4><a href="'.$link.'">'.$headline.'</a></h4>
      <p> <strong> Author </strong>:
      '.$link.'</p>
      <p> <strong> Campus </strong>:
      '.$campus.'</p>
      </td>
      <td class="ads-details-td">
      <a href="viewBody?id='.$hash_id.'&t=campus_news"><p>'.$bd.'</p></a>
      </td>
      <td class="add-img-td">
      <a href="editImage?id='.$hash_id.'&t=campus_news">
      <img class="img-responsive" src="'.$image_1.'">
      </a>
      </td>
      <td class="add-img-td">
      '.$created_by.'
      </td>
      <td class="add-img-td">
      '.$date_created.'
      </td>
      <td class="add-img-td">
      '.$visibility.'
      </td>
      <td class="ads-details-td">
      <a href="editCampusNews?id='.$hash_id.'"><button class="btn btn-common btn-sm" type="submit">Edit</button></a>
      </td>
      <td class="price-td">
      <p>You cannot Perform this Action</p>
      </td>
      <td class="price-td">
      <p>You cannot Perform this Action</p>
      </td>
      </tr>';
    }
    if($level == 1){
      echo '<tr><td class="ads-details-td>
      <h4><a href="'.$link.'">'.$headline.'</a></h4>
      <p> <strong> Author </strong>:
      '.$link.'</p>
      <p> <strong> Campus </strong>:
      '.$campus.'</p>
      </td>
      <td class="ads-details-td">
      <a href="viewBody?id='.$hash_id.'&t=news"><p>'.$bd.'</p></a>
      </td>
      <td class="add-img-td">
      <a href="#">
      <img class="img-responsive" src="'.$image_1.'">
      </a>
      </td>
      <td class="add-img-td">
      '.$created_by.'
      </td>
      <td class="add-img-td">
      '.$date_created.'
      </td>
      <td class="add-img-td">
      '.$visibility.'
      </td>
      <td class="ads-details-td">
      You cannot perform this action
      </td>
      <td class="price-td">
      <p>You cannot Perform this Action</p>
      </td>
      <td class="price-td">
      <p>You cannot Perform this Action</p>
      </td>
      </tr>';
    }
  }
}
function PgetCampusNewsView($dbconn,$get){
  $stmt = $dbconn->prepare("SELECT * FROM campus_news WHERE created_by=:cb ORDER BY id DESC");
  $stmt->bindParam(":cb",$get);
  $stmt->execute();
  while($row = $stmt->fetch(PDO::FETCH_BOTH)){
    extract($row);
    $bd = previewBody($body, 20);
    $level =  adminLevel($dbconn,$get);
    if($level == 3 || $level == "MASTER"){
      echo '<tr><td width="150px" class="ads-details-td>
      <h4><a href="'.$link.'">'.$headline.'</a></h4>
      <p> <strong> Author </strong>:
      '.$link.'</p>
      <p> <strong> Campus </strong>:
      '.$campus.'</p>
      </td>
      <td class="ads-details-td">
      <a href="viewBody?id='.$hash_id.'&t=campus_news"><p>'.$bd.'</p></a>
      </td>
      <td class="add-img-td">
      <a href="editImage?id='.$hash_id.'&t=campus_news">
      <img class="img-responsive" src="'.$image_1.'">
      </a>
      </td>
      <td class="add-img-td">
      '.$created_by.'
      </td>
      <td class="add-img-td">
      '.$date_created.'
      </td>
      <td class="add-img-td">
      '.$visibility.'
      </td>
      <td class="ads-details-td">
      <a href="editCampusNews?id='.$hash_id.'"><button class="btn btn-common btn-sm" type="submit">Edit</button></a>
      </td>
      <td class="price-td">
      <a href="deleteCampusNews?id='.$hash_id.'">
      <button class="btn btn-danger btn-sm" type="submit">Delete</button>
      </a>
      </td>
      <td class="price-td">
      <a href="show?id='.$hash_id.'&t=campus_news">
      <button class="btn btn-success btn-sm" type="submit">Show</button>
      </a>
      <a href="hide?id='.$hash_id.'&t=campus_news">
      <button class="btn btn-basic btn-sm" type="submit">Hide</button>
      </a>
      </td></tr>';
    }
    if($level == 2 || $level == 4 || $level == 5 || $level == 6){
      echo '<tr><td class="ads-details-td>
      <h4><a href="'.$link.'">'.$headline.'</a></h4>
      <p> <strong> Author </strong>:
      '.$link.'</p>
      <p> <strong> Campus </strong>:
      '.$campus.'</p>
      </td>
      <td class="ads-details-td">
      <a href="viewBody?id='.$hash_id.'&t=campus_news"><p>'.$bd.'</p></a>
      </td>
      <td class="add-img-td">
      <a href="editImage?id='.$hash_id.'&t=campus_news">
      <img class="img-responsive" src="'.$image_1.'">
      </a>
      </td>
      <td class="add-img-td">
      '.$created_by.'
      </td>
      <td class="add-img-td">
      '.$date_created.'
      </td>
      <td class="add-img-td">
      '.$visibility.'
      </td>
      <td class="ads-details-td">
      <a href="editCampusNews?id='.$hash_id.'"><button class="btn btn-common btn-sm" type="submit">Edit</button></a>
      </td>
      <td class="price-td">
      <p>You cannot Perform this Action</p>
      </td>
      <td class="price-td">
      <p>You cannot Perform this Action</p>
      </td>
      </tr>';
    }
    if($level == 1){
      echo '<tr><td class="ads-details-td>
      <h4><a href="'.$link.'">'.$headline.'</a></h4>
      <p> <strong> Author </strong>:
      '.$link.'</p>
      <p> <strong> Campus </strong>:
      '.$campus.'</p>
      </td>
      <td class="ads-details-td">
      <a href="viewBody?id='.$hash_id.'&t=news"><p>'.$bd.'</p></a>
      </td>
      <td class="add-img-td">
      <a href="#">
      <img class="img-responsive" src="'.$image_1.'">
      </a>
      </td>
      <td class="add-img-td">
      '.$created_by.'
      </td>
      <td class="add-img-td">
      '.$date_created.'
      </td>
      <td class="add-img-td">
      '.$visibility.'
      </td>
      <td class="ads-details-td">
      You cannot perform this action
      </td>
      <td class="price-td">
      <p>You cannot Perform this Action</p>
      </td>
      <td class="price-td">
      <p>You cannot Perform this Action</p>
      </td>
      </tr>';
    }
  }
}
function getAdmin($dbconn){
  $ms = "MASTER";
  //   $nl = "NULL";
  $stmt = $dbconn->prepare("SELECT * FROM admin WHERE level is :nl OR NOT level=:ms");
  //   $stmt->bindParam(":ms", $ms);
  //   $stmt->bindValue(":nl", NULL);
  $data = [':nl'=>NULL,':ms'=>$ms];
  $stmt->execute($data);
  while($row = $stmt->fetch(PDO::FETCH_BOTH)){
    extract($row);
    if($verification == 1){
      $verification = "Verified";
    }else{
      $verification = "Not Verified";
    }
    if($user_status == 1){
      $user_status = "Active";
    }
    if($user_status == 2){
      $user_status = "Suspended";
    }
    echo '
    <tr>
    <td class="ads-details-td">
    <h3><a href="ads-details.html">'.ucwords($firstname).' '.ucwords($lastname).'</a></h3>
    <p> <strong> Last Login </strong>:
    '.$last_login.'</p>
    <p> <strong> Last Logout </strong>:
    '.$last_logout.'</p>
    <p> <strong>Login Status </strong>: '.$login_status.'&nbsp&nbsp<strong>Email</strong> <a target="_blank" href="mailto:'.$email.'">'.$email.'</a></p>
    </td>
    <td class="ads-details-td">
    <p> <strong> Level </strong>:
    '.$level.'</p>
    <p> <strong> Account Status</strong>:
    '.$user_status.'</p>
    <p> <strong>Verification Status </strong>: '.$verification.'</p>
    </td>
    <td class="ads-details-td">
    <a href="setLevel?id='.$hash_id.'"><button class="btn btn-common btn-sm" type="submit">Set Level</button></a>
    </td>
    <td class="price-td">
    <a href="deleteUser?id='.$hash_id.'">
    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
    </a>
    </td>
    <td class="price-td">
    <a href="suspend?id='.$hash_id.'">
    <button class="btn btn-basic btn-sm" type="submit">Suspend</button>
    <!-- <button class="btn btn-success btn-sm" type="submit">Verify</button> -->
    </a>
    <a href="verify?id='.$hash_id.'">
    <button class="btn btn-success btn-sm" type="submit">Verify</button>
    </a>
    </td>
    </tr>';
  }
}
function getUsers($dbconn){
  $ms = "MASTER";
  $stmt = $dbconn->prepare("SELECT * FROM user WHERE NOT level=:ms ");
  $stmt->bindParam(":ms", $ms);
  $stmt->execute();
  while($row = $stmt->fetch(PDO::FETCH_BOTH)){
    extract($row);
    if($verification == 1){
      $verification = "Verified";
    }else{
      $verification = "Not Verified";
    }
    if($user_status == 1){
      $user_status = "Active";
    }
    if($user_status == 2){
      $user_status = "Suspended";
    }
    echo '
    <tr>
    <td class="ads-details-td">
    <h3><a href="ads-details.html">'.ucwords($firstname).' '.ucwords($lastname).'</a></h3>
    <p> <strong> Last Login </strong>:
    '.$last_login.'</p>
    <p> <strong> Last Logout </strong>:
    '.$last_logout.'</p>
    <p> <strong>Login Status </strong>: '.$login_status.'&nbsp&nbsp<strong>Email</strong> <a target=_blank href="mailto:'.$email.'">'.$email.'</a></p>

    </td>
    <td class="ads-details-td">
    <p> <strong> Level </strong>:
    '.$level.'</p>
    <p> <strong> Account Status</strong>:
    '.$user_status.'</p>
    <p> <strong>Verification Status </strong>: '.$verification.'</p>
    </td>
    <td class="ads-details-td">
    <a href="setLevel?id='.$hash_id.'"><button class="btn btn-common btn-sm" type="submit">Set Level</button></a>
    </td>
    <td class="price-td">
    <a href="deleteUser?id='.$hash_id.'">
    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
    </a>
    </td>
    <td class="price-td">
    <a href="suspend?id='.$hash_id.'">
    <button class="btn btn-basic btn-sm" type="submit">Suspend</button>
    <!-- <button class="btn btn-success btn-sm" type="submit">Verify</button> -->
    </a>
    <a href="verify?id='.$hash_id.'">
    <button class="btn btn-success btn-sm" type="submit">Verify</button>
    </a>
    </td>
    </tr>';
  }
}
function getClients($dbconn){

  $stmt = $dbconn->prepare("SELECT * FROM user");

  $stmt->execute();
  while($row = $stmt->fetch(PDO::FETCH_BOTH)){
    extract($row);
    if($verification == 1){
      $verification = "Verified";
    }else{
      $verification = "Not Verified";
    }
    if($user_status == 1){
      $user_status = "Active";
    }
    if($user_status == 2){
      $user_status = "Suspended";
    }
    echo '
    <tr>
    <td class="ads-details-td">
    <h3><a href="ads-details.html">'.ucwords($firstname).' '.ucwords($lastname).'</a></h3>
    <p> <strong> Last Login </strong>:
    '.$last_login.'</p>
    <p> <strong> Last Logout </strong>:
    '.$last_logout.'</p>
    <p> <strong>Login Status </strong>: '.$login_status.'&nbsp&nbsp<strong>Email</strong> <a href="mailto:'.$email.'">'.$email.'</a></p>
        <p> <strong>Points</strong>: '.$points.'</p>
    </td>
    <td class="ads-details-td">
    <p> <strong> Level </strong>:
    '.$level.'</p>
    <p> <strong> Account Status</strong>:
    '.$user_status.'</p>
    <p> <strong>Verification Status </strong>: '.$verification.'</p>
    </td>
    <td class="ads-details-td">
    <a href="setLevel?id='.$hash_id.'"><button class="btn btn-common btn-sm" type="submit">Set Level</button></a>
    </td>
    <td class="price-td">
    <a href="deleteClient?id='.$hash_id.'">
    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
    </a>
    </td>
    <td class="price-td">
    <a href="suspendClient?id='.$hash_id.'">
    <button class="btn btn-basic btn-sm" type="submit">Suspend</button>
    <!-- <button class="btn btn-success btn-sm" type="submit">Verify</button> -->
    </a>
    <a href="verifyClient?id='.$hash_id.'">
    <button class="btn btn-success btn-sm" type="submit">Verify</button>
    </a>
    </td>
    </tr>';
  }
}
function getArticleView($dbconn,$get){
  $stmt = $dbconn->prepare("SELECT * FROM blog ORDER BY id DESC");
  $stmt->execute();
  while($row = $stmt->fetch(PDO::FETCH_BOTH)){
    extract($row);
    $bd = previewBody($body, 20);
    $level =  adminLevel($dbconn, $get);
    if($level == 3 || $level == "MASTER"){
      echo '<tr><td class="ads-details-td">
      <h4><a href="">'.$title.'</a></h4>
      <p> <strong> Author </strong>:
      '.$author.'</p>
      </td>
      <td class="ads-details-td">
      <a href="viewBody?id='.$hash_id.'&t=blog"><p>'.$bd.'</p></a>
      </td>
      <td class="add-img-td">
      <a href="editImage?id='.$hash_id.'&t=blog">
      <img class="img-responsive" src="'.$image_1.'">
      </a>
      </td>
      <td class="add-img-td">
      '.$created_by.'
      </td>
      <td class="add-img-td">
      '.$date_created.'
      </td>

      <td class="ads-details-td">
      <a href="editArticle?id='.$hash_id.'"><button class="btn btn-common btn-sm" type="submit">Edit</button></a>
      </td>
      <td class="price-td">
      <a href="deleteArticle?id='.$hash_id.'">
      <button class="btn btn-danger btn-sm" type="submit">Delete</button>
      </a>
      </td>

      </tr>';
    }
    if($level == 2 || $level == 4 || $level == 5 || $level == 6){
      echo '<tr><td class="ads-details-td">
      <h4><a href="">'.$title.'</a></h4>
      <p> <strong> Author </strong>:
      '.$author.'</p>
      </td>
      <td class="ads-details-td">
      <a href="viewBody?id='.$hash_id.'&t=blog"><p>'.$bd.'</p></a>
      </td>
      <td class="add-img-td">
      <a href="editImage?id='.$hash_id.'&t=blog">
      <img class="img-responsive" src="'.$image_1.'">
      </a>
      </td>
      <td class="add-img-td">
      '.$created_by.'
      </td>
      <td class="add-img-td">
      '.$date_created.'
      </td>
      <td class="ads-details-td">
      <a href="editArticle?id='.$hash_id.'"><button class="btn btn-common btn-sm" type="submit">Edit</button></a>
      </td>
    </tr>';
    }
    if($level == 1){
      echo '<tr><td class="ads-details-td">
      <h4><a href="">'.$title.'</a></h4>
      <p> <strong> Author </strong>:
      '.$author.'</p>
      </td>
      <td class="ads-details-td">
      <a href="viewBody?id='.$hash_id.'&t=blog"><p>'.$bd.'</p></a>
      </td>
      <td class="add-img-td">
      <a href="#">
      <img class="img-responsive" src="'.$image_1.'">
      </a>
      </td>
      <td class="add-img-td">
      '.$created_by.'
      </td>
      <td class="add-img-td">
      '.$date_created.'
      </td>
      <td class="add-img-td">
      '.$visibility.'
      </td>
</tr>';
    }
  }
}
function PgetArticleView($dbconn,$get){
  $stmt = $dbconn->prepare("SELECT * FROM blog WHERE created_by=:cb ORDER BY id DESC");
  $stmt->bindParam(":cb",$get);
  $stmt->execute();
  while($row = $stmt->fetch(PDO::FETCH_BOTH)){
    extract($row);
    $bd = previewBody($body, 20);
    $level =  adminLevel($dbconn,$get);
    if($level == 3 || $level == "MASTER"){
      echo '<tr><td class="ads-details-td">
      <h4><a href="">'.$title.'</a></h4>
      <p> <strong> Author </strong>:
      '.$author.'</p>
      </td>
      <td class="ads-details-td">
      <a href="viewBody?id='.$hash_id.'&t=blog"><p>'.$bd.'</p></a>
      </td>
      <td class="add-img-td">
      <a href="editImage?id='.$hash_id.'&t=blog">
      <img class="img-responsive" src="'.$image_1.'">
      </a>
      </td>
      <td class="add-img-td">
      '.$created_by.'
      </td>
      <td class="add-img-td">
      '.$date_created.'
      </td>

      <td class="ads-details-td">
      <a href="editArticle?id='.$hash_id.'"><button class="btn btn-common btn-sm" type="submit">Edit</button></a>
      </td>
      <td class="price-td">
      <a href="deleteArticle?id='.$hash_id.'">
      <button class="btn btn-danger btn-sm" type="submit">Delete</button>
      </a>
      </td>
</tr>';
    }
    if($level == 2 || $level == 4 || $level == 5 || $level == 6){
      echo '<tr><td class="ads-details-td">
      <h4><a href="">'.$title.'</a></h4>
      <p> <strong> Author </strong>:
      '.$author.'</p>
      </td>
      <td class="ads-details-td">
      <a href="viewBody?id='.$hash_id.'&t=blog"><p>'.$bd.'</p></a>
      </td>
      <td class="add-img-td">
      <a href="editImage?id='.$hash_id.'&t=blog">
      <img class="img-responsive" src="'.$image_1.'">
      </a>
      </td>
      <td class="add-img-td">
      '.$created_by.'
      </td>
      <td class="add-img-td">
      '.$date_created.'
      </td>

      <td class="ads-details-td">
      <a href="editArticle?id='.$hash_id.'"><button class="btn btn-common btn-sm" type="submit">Edit</button></a>
      </td>
</tr>';
    }
    if($level == 1){
      echo '<tr><td class="ads-details-td">
      <h4><a href="">'.$title.'</a></h4>
      <p> <strong> Author </strong>:
      '.$author.'</p>
      </td>
      <td class="ads-details-td">
      <a href="viewBody?id='.$hash_id.'&t=blog"><p>'.$bd.'</p></a>
      </td>
      <td class="add-img-td">
      <a href="#">
      <img class="img-responsive" src="'.$image_1.'">
      </a>
      </td>
      <td class="add-img-td">
      '.$created_by.'
      </td>
      <td class="add-img-td">
      '.$date_created.'
      </td>

      <td class="ads-details-td">
      <p>You cannnot perform this action</p>
      </td>
</tr>';
    }
  }
}
function getInsightView($dbconn,$get){
  $stmt = $dbconn->prepare("SELECT * FROM insight ORDER BY id DESC");
  $stmt->execute();
  while($row = $stmt->fetch(PDO::FETCH_BOTH)){
    extract($row);
    $bd = previewBody($body, 20);
    $level =  adminLevel($dbconn,$get);
    if($level == 3 || $level == "MASTER"){
      echo '<tr><td class="ads-details-td">
      <h4><a href="">'.$title.'</a></h4>
      <p> <strong> Author </strong>:
      '.$author.'</p>
      <p> <strong> Category </strong>:
      '.$category.'</p>
      </td>
      <td class="ads-details-td">
      <a href="viewBody?id='.$hash_id.'&t=insight"><p>'.$bd.'</p></a>
      </td>
      <td class="add-img-td">
      <a href="editImage?id='.$hash_id.'&t=insight">
      <img class="img-responsive" src="'.$image_1.'">
      </a>
      </td>
      <td class="add-img-td">
      '.$created_by.'
      </td>
      <td class="add-img-td">
      '.$date_created.'
      </td>
      <td class="add-img-td">
      '.$visibility.'
      </td>
      <td class="ads-details-td">
      <a href="editInsight?id='.$hash_id.'"><button class="btn btn-common btn-sm" type="submit">Edit</button></a>
      </td>
      <td class="price-td">
      <a href="deleteInsight?id='.$hash_id.'">
      <button class="btn btn-danger btn-sm" type="submit">Delete</button>
      </a>
      </td>
      <td class="price-td">
      <a href="show?id='.$hash_id.'&t=insight">
      <button class="btn btn-success btn-sm" type="submit">Show</button>
      </a>
      <a href="hide?id='.$hash_id.'&t=insight">
      <button class="btn btn-basic btn-sm" type="submit">Hide</button>
      </a>
      </td></tr>';
    }
    if($level == 2 || $level == 4 || $level == 5 || $level == 6){
      echo '<tr><td class="ads-details-td">
      <h4><a href="">'.$title.'</a></h4>
      <p> <strong> Author </strong>:
      '.$author.'</p>
      <p> <strong> Category </strong>:
      '.$category.'</p>
      </td>
      <td class="ads-details-td">
      <a href="viewBody?id='.$hash_id.'&t=blog"><p>'.$bd.'</p></a>
      </td>
      <td class="add-img-td">
      <a href="editImage?id='.$hash_id.'&t=blog">
      <img class="img-responsive" src="'.$image_1.'">
      </a>
      </td>
      <td class="add-img-td">
      '.$created_by.'
      </td>
      <td class="add-img-td">
      '.$date_created.'
      </td>
      <td class="add-img-td">
      '.$visibility.'
      </td>
      <td class="ads-details-td">
      <a href="editArticle?id='.$hash_id.'"><button class="btn btn-common btn-sm" type="submit">Edit</button></a>
      </td>
      <td class="price-td">
      <p>You cannnot perform this action</p>
      </td>
      <td class="price-td">
      <p>You cannnot perform this action</p>
      </td></tr>';
    }
    if($level == 1){
      echo '<tr><td class="ads-details-td">
      <h4><a href="">'.$title.'</a></h4>
      <p> <strong> Author </strong>:
      '.$author.'</p>
      <p> <strong> Category </strong>:
      '.$category.'</p>
      </td>
      <td class="ads-details-td">
      <a href="viewBody?id='.$hash_id.'&t=blog"><p>'.$bd.'</p></a>
      </td>
      <td class="add-img-td">
      <a href="#">
      <img class="img-responsive" src="'.$image_1.'">
      </a>
      </td>
      <td class="add-img-td">
      '.$created_by.'
      </td>
      <td class="add-img-td">
      '.$date_created.'
      </td>
      <td class="add-img-td">
      '.$visibility.'
      </td>
      <td class="ads-details-td">
      <p>You cannnot perform this action</p>
      </td>
      <td class="price-td">
      <p>You cannnot perform this action</p>
      </td>
      <td class="price-td">
      <p>You cannnot perform this action</p>
      </td></tr>';
    }
  }
}
function PgetInsightView($dbconn,$get){
  $stmt = $dbconn->prepare("SELECT * FROM insight WHERE created_by=:cb ORDER BY id DESC");
  $stmt->bindParam(":cb",$get);
  $stmt->execute();
  while($row = $stmt->fetch(PDO::FETCH_BOTH)){
    extract($row);
    $bd = previewBody($body, 20);
    $level =  adminLevel($dbconn,$get);
    if($level == 3 || $level == "MASTER"){
      echo '<tr><td class="ads-details-td">
      <h4><a href="">'.$title.'</a></h4>
      <p> <strong> Author </strong>:
      '.$author.'</p>
      <p> <strong> Category </strong>:
      '.$category.'</p>
      </td>
      <td class="ads-details-td">
      <a href="viewBody?id='.$hash_id.'&t=insight"><p>'.$bd.'</p></a>
      </td>
      <td class="add-img-td">
      <a href="editImage?id='.$hash_id.'&t=insight">
      <img class="img-responsive" src="'.$image_1.'">
      </a>
      </td>
      <td class="add-img-td">
      '.$created_by.'
      </td>
      <td class="add-img-td">
      '.$date_created.'
      </td>
      <td class="add-img-td">
      '.$visibility.'
      </td>
      <td class="ads-details-td">
      <a href="editInsight?id='.$hash_id.'"><button class="btn btn-common btn-sm" type="submit">Edit</button></a>
      </td>
      <td class="price-td">
      <a href="deleteInsight?id='.$hash_id.'">
      <button class="btn btn-danger btn-sm" type="submit">Delete</button>
      </a>
      </td>
      <td class="price-td">
      <a href="show?id='.$hash_id.'&t=insight">
      <button class="btn btn-success btn-sm" type="submit">Show</button>
      </a>
      <a href="hide?id='.$hash_id.'&t=insight">
      <button class="btn btn-basic btn-sm" type="submit">Hide</button>
      </a>
      </td></tr>';
    }
    if($level == 2 || $level == 4 || $level == 5 || $level == 6){
      echo '<tr><td class="ads-details-td">
      <h4><a href="">'.$title.'</a></h4>
      <p> <strong> Author </strong>:
      '.$author.'</p>
      <p> <strong> Category </strong>:
      '.$category.'</p>
      </td>
      <td class="ads-details-td">
      <a href="viewBody?id='.$hash_id.'&t=blog"><p>'.$bd.'</p></a>
      </td>
      <td class="add-img-td">
      <a href="editImage?id='.$hash_id.'&t=blog">
      <img class="img-responsive" src="'.$image_1.'">
      </a>
      </td>
      <td class="add-img-td">
      '.$created_by.'
      </td>
      <td class="add-img-td">
      '.$date_created.'
      </td>
      <td class="add-img-td">
      '.$visibility.'
      </td>
      <td class="ads-details-td">
      <a href="editArticle?id='.$hash_id.'"><button class="btn btn-common btn-sm" type="submit">Edit</button></a>
      </td>
      <td class="price-td">
      <p>You cannnot perform this action</p>
      </td>
      <td class="price-td">
      <p>You cannnot perform this action</p>
      </td></tr>';
    }
    if($level == 1){
      echo '<tr><td class="ads-details-td">
      <h4><a href="">'.$title.'</a></h4>
      <p> <strong> Author </strong>:
      '.$author.'</p>
      <p> <strong> Category </strong>:
      '.$category.'</p>
      </td>
      <td class="ads-details-td">
      <a href="viewBody?id='.$hash_id.'&t=blog"><p>'.$bd.'</p></a>
      </td>
      <td class="add-img-td">
      <a href="#">
      <img class="img-responsive" src="'.$image_1.'">
      </a>
      </td>
      <td class="add-img-td">
      '.$created_by.'
      </td>
      <td class="add-img-td">
      '.$date_created.'
      </td>
      <td class="add-img-td">
      '.$visibility.'
      </td>
      <td class="ads-details-td">
      <p>You cannnot perform this action</p>
      </td>
      <td class="price-td">
      <p>You cannnot perform this action</p>
      </td>
      <td class="price-td">
      <p>You cannnot perform this action</p>
      </td></tr>';
    }
  }
}
function setLogin($dbconn,$id){
  $lg = "Logged In";
  $stmt = $dbconn->prepare("UPDATE admin SET last_login=NOW(),login_status=:lg WHERE hash_id=:id");
  $stmt->bindParam(":id",$id);
  $stmt->bindParam(":lg",$lg);
  $stmt->execute();
}
function setLogout($dbconn,$id){
  $lg = "Logged Out";
  $stmt = $dbconn->prepare("UPDATE admin SET last_logout=NOW(),login_status=:lg WHERE hash_id=:id");
  $stmt->bindParam(":id",$id);
  $stmt->bindParam(":lg",$lg);
  $stmt->execute();
}
// function getEvent($dbconn,$get){
//   $stmt = $dbconn->prepare("SELECT * FROM event ORDER BY id DESC");
//   $stmt->execute();
//   while($row = $stmt->fetch(PDO::FETCH_BOTH)){
//     extract($row);
//     $bd = previewBody($about, 20);
//     $level =  adminLevel($dbconn,$get);
//     if($level == 3 || $level == "MASTER"){
//       echo '<tr><td class="ads-img-td">
//       <h4><a href="#">'.$name.'</a></h4>
//       <p> <strong> Venue </strong>:
//       '.$venue.'</p>
//       <p> <strong> Start Date </strong>:
//       '.$start_date.'</p>
//       <p> <strong> End Date </strong>:
//       '.$end_date.'</p>
//       </td>
//       <td class="ads-details-td">
//       <a href="viewBody?id='.$hash_id.'&t=event"><p>'.$bd.'</p></a>
//       </td>
//       <td class="add-img-td">
//       '.$created_by.'
//       </td>
//       <td class="add-img-td">
//       '.$date_created.'
//       </td>
//       <td class="ads-details-td">
//       <a href="editEvent?id='.$hash_id.'"><button class="btn btn-common btn-sm" type="submit">Edit</button></a>
//       </td>
//       <td class="price-td">
//       <a href="deleteEvent?id='.$hash_id.'">
//       <button class="btn btn-danger btn-sm" type="submit">Delete</button>
//       </a>
//       </td>
//       </tr>';
//     }
//     if($level == 2 || $level == 4 || $level == 5 || $level == 6){
//       echo '<tr><td class="ads-img-td>
//       <h4><a href="#">'.$name.'</a></h4>
//       <p> <strong> Venue </strong>:
//       '.$venue.'</p>
//       <p> <strong> Start Date </strong>:
//       '.$start_date.'</p>
//       <p> <strong> End Date </strong>:
//       '.$end_date.'</p>
//       </td>
//       <td class="ads-details-td">
//       <a href="viewBody?id='.$hash_id.'&t=event"><p>'.$bd.'</p></a>
//       </td>
//       <td class="add-img-td">
//       '.$created_by.'
//       </td>
//       <td class="add-img-td">
//       '.$date_created.'
//       </td>
//       <td class="ads-details-td">
//       <a href="editContent?id='.$hash_id.'"><button class="btn btn-common btn-sm" type="submit">Edit</button></a>
//       </td>
//       <td class="price-td">
//       <p>You cannot Perform This Action</p>
//       </td>
//       </tr>';
//     }
//     if($level == 1){
//       echo '<tr><td class="ads-img-td>
//       <h4><a href="#">'.$name.'</a></h4>
//       <p> <strong> Venue </strong>:
//       '.$venue.'</p>
//       <p> <strong> Start Date </strong>:
//       '.$start_date.'</p>
//       <p> <strong> End Date </strong>:
//       '.$end_date.'</p>
//       </td>
//       <td class="ads-details-td">
//       <a href="viewBody?id='.$hash_id.'&t=event"><p>'.$bd.'</p></a>
//       </td>
//       <td class="add-img-td">
//       '.$created_by.'
//       </td>
//       <td class="add-img-td">
//       '.$date_created.'
//       </td>
//       <td class="ads-details-td">
//       <p>You cannot Perform This Action</p>
//       </td>
//       <td class="price-td">
//       <p>You cannot Perform This Action</p>
//       </td>
//       </tr>';
//     }
//   }
// }
// function PgetEvent($dbconn,$get){
//   $stmt = $dbconn->prepare("SELECT * FROM event ORDER BY id DESC");
//   $stmt->execute();
//   while($row = $stmt->fetch(PDO::FETCH_BOTH)){
//     extract($row);
//     $bd = previewBody($about, 20);
//     $level =  adminLevel($dbconn,$get);
//     if($level == 3 || $level == "MASTER"){
//       echo '<tr><td class="ads-img-td">
//       <h4><a href="#">'.$name.'</a></h4>
//       <p> <strong> Venue </strong>:
//       '.$venue.'</p>
//       <p> <strong> Start Date </strong>:
//       '.$start_date.'</p>
//       <p> <strong> End Date </strong>:
//       '.$end_date.'</p>
//       </td>
//       <td class="ads-details-td">
//       <a href="viewBody?id='.$hash_id.'&t=event"><p>'.$bd.'</p></a>
//       </td>
//       <td class="add-img-td">
//       '.$created_by.'
//       </td>
//       <td class="add-img-td">
//       '.$date_created.'
//       </td>
//       <td class="ads-details-td">
//       <a href="editEvent?id='.$hash_id.'"><button class="btn btn-common btn-sm" type="submit">Edit</button></a>
//       </td>
//       <td class="price-td">
//       <a href="deleteEvent?id='.$hash_id.'">
//       <button class="btn btn-danger btn-sm" type="submit">Delete</button>
//       </a>
//       </td>
//       </tr>';
//     }
//     if($level == 2 || $level == 4 || $level == 5 || $level == 6){
//       echo '<tr><td class="ads-img-td>
//       <h4><a href="#">'.$name.'</a></h4>
//       <p> <strong> Venue </strong>:
//       '.$venue.'</p>
//       <p> <strong> Start Date </strong>:
//       '.$start_date.'</p>
//       <p> <strong> End Date </strong>:
//       '.$end_date.'</p>
//       </td>
//       <td class="ads-details-td">
//       <a href="viewBody?id='.$hash_id.'&t=event"><p>'.$bd.'</p></a>
//       </td>
//       <td class="add-img-td">
//       '.$created_by.'
//       </td>
//       <td class="add-img-td">
//       '.$date_created.'
//       </td>
//       <td class="ads-details-td">
//       <a href="editContent?id='.$hash_id.'"><button class="btn btn-common btn-sm" type="submit">Edit</button></a>
//       </td>
//       <td class="price-td">
//       <p>You cannot Perform This Action</p>
//       </td>
//       </tr>';
//     }
//     if($level == 1){
//       echo '<tr><td class="ads-img-td>
//       <h4><a href="#">'.$name.'</a></h4>
//       <p> <strong> Venue </strong>:
//       '.$venue.'</p>
//       <p> <strong> Start Date </strong>:
//       '.$start_date.'</p>
//       <p> <strong> End Date </strong>:
//       '.$end_date.'</p>
//       </td>
//       <td class="ads-details-td">
//       <a href="viewBody?id='.$hash_id.'&t=event"><p>'.$bd.'</p></a>
//       </td>
//       <td class="add-img-td">
//       '.$created_by.'
//       </td>
//       <td class="add-img-td">
//       '.$date_created.'
//       </td>
//       <td class="ads-details-td">
//       <p>You cannot Perform This Action</p>
//       </td>
//       <td class="price-td">
//       <p>You cannot Perform This Action</p>
//       </td>
//       </tr>';
//     }
//   }
// }
function getAbout($dbconn, $get){
  $stmt = $dbconn->prepare("SELECT * FROM about");
  $stmt->execute();
  while($row = $stmt->fetch(PDO::FETCH_BOTH)){
    extract($row);
    $bd = previewBody($body, 20);
    $level =  adminLevel($dbconn, $get);
    if($level == 3 || $level == "MASTER"){
      echo '<td class="ads-img-td">
      <a href="viewBody?id='.$id.'&t=about"><p>'.$bd.'</p></a>
      </td>
        <td class="add-img-td">
        <a href="editImage?id='.$hash_id.'&t=about">
        <img class="img-responsive" src="'.$image_1.'">
        </a>
      </td>

      <td class="add-img-td">
      '.$created_by.'
      </td>
      <td class="add-img-td">
      '.$date_created.'
      </td>
      <td class="ads-details-td">
      <a href="editAbout?id='.$id.'"><button class="btn btn-common btn-sm" type="submit">Edit</button></a>
      </td>
      </tr>';
    }
    if($level == 2 || $level == 4 || $level == 5 || $level == 6){
      echo '<td class="ads-img-td">
      <a href="viewBody?id='.$id.'&t=about"><p>'.$bd.'</p></a>
      </td>
      <td class="add-img-td">
      '.$added_by.'
      </td>
      <td class="add-img-td">
      '.$last_edited_by.'
      </td>
      <td class="add-img-td">
      '.$date_created.'
      </td>
      <td class="ads-details-td">
      <a href="editAbout?id='.$id.'"><button class="btn btn-common btn-sm" type="submit">Edit</button></a>
      </td>
      </tr>';
    }
    if($level == 1){
      echo '<td class="ads-img-td">
      <a href="viewBody?id='.$id.'&t=about"><p>'.$bd.'</p></a>
      </td>
      <td class="add-img-td">
      '.$added_by.'
      </td>
      <td class="add-img-td">
      '.$last_edited_by.'
      </td>
      <td class="add-img-td">
      '.$date_created.'
      </td>
      <td class="ads-details-td">
      <p>You cannot Perform This Action</p>
      </td>
      </tr>';
    }
  }
}

function updateProduct($dbconn,$post,$sess,$get){


  $stmt = $dbconn->prepare("UPDATE product SET product_name=:tt, price = :pri, description=:dec, created_by=:sess,  date_created=NOW(), time_created=NOW() WHERE hash_id=:get");
  $stmt->bindParam(":tt", $post['product']);
   $stmt->bindParam(":pri", $post['price']);
    $stmt->bindParam(":dec", $post['description']);
  $stmt->bindParam(":get", $get);
  $stmt->bindParam(":sess", $sess);
  $stmt->execute();
  if(isset($_SESSION['id'])){
    $sess = $_SESSION['id'];
  }
  logs($dbconn, 'edited', $post['category'],'category',$sess);
  $success = "edited Successfully";
  $succ = preg_replace('/\s+/', '_', $success);
  header("Location:/ViewProducts?success=$succ");
}
function updateProject($dbconn,$post,$sess,$get){


  $stmt = $dbconn->prepare("UPDATE project SET project_name=:tt, project_location = :pri, about=:dec, created_by=:sess,  date_created=NOW(), time_created=NOW() WHERE hash_id=:get");
  $stmt->bindParam(":tt", $post['project_name']);
   $stmt->bindParam(":pri", $post['project_location']);
    $stmt->bindParam(":dec", $post['about']);
  $stmt->bindParam(":get", $get);
  $stmt->bindParam(":sess", $sess);
  $stmt->execute();
  if(isset($_SESSION['id'])){
    $sess = $_SESSION['id'];
  }

  $success = "edited Successfully";
  $succ = preg_replace('/\s+/', '_', $success);
  header("Location:/manageProjects?success=$succ");
}
function updateEvent($dbconn,$post,$sess,$get){


  $stmt = $dbconn->prepare("UPDATE event SET event_name=:tt, event_location = :pri, about=:dec, created_by=:sess,  date_created=NOW(), time_created=NOW() WHERE hash_id=:get");
  $stmt->bindParam(":tt", $post['event_name']);
   $stmt->bindParam(":pri", $post['event_location']);
    $stmt->bindParam(":dec", $post['about']);
  $stmt->bindParam(":get", $get);
  $stmt->bindParam(":sess", $sess);
  $stmt->execute();
  if(isset($_SESSION['id'])){
    $sess = $_SESSION['id'];
  }

  $success = "edited Successfully";
  $succ = preg_replace('/\s+/', '_', $success);
  header("Location:/manageEvents?success=$succ");
}
function getProducts($dbconn,$tb,$get){
  $stmt = $dbconn->prepare("SELECT * FROM $tb ORDER BY product_id DESC");
  $stmt->execute();
  while($row = $stmt->fetch(PDO::FETCH_BOTH)){
    extract($row);
    $bd = previewBody($description, 20);
    $level =  adminLevel($dbconn,$get);
    if($level == 3 || $level == "MASTER"){
      echo '<tr><td class="add-img-td">
      '.$product_name.'
      </td>
      <td class="ads-details-td">
      <a href="viewBody?id='.$hash_id.'&t='.$tb.'"><p>'.$bd.'</p></a>
      </td>
     <td class="add-img-td">
      '.$price.'
      </td>
      <td class="add-img-td">
      <a href="editImage?id='.$hash_id.'&t='.$tb.'">
      <img class="img-responsive" src="'.$image_1.'">
      </a>
      </td>
       <td class="add-img-td">
      '.$category.'
      </td>
       <td class="add-img-td">
      '.$visibility.'
      </td>
      <td class="add-img-td">
      '.$created_by.'
      </td>
      <td class="add-img-td">
      '.$date_created.'
      </td>
      <td class="ads-details-td">
      <a href="editProduct?id='.$hash_id.'&t='.$tb.'"><button class="btn btn-common btn-sm" type="submit">Edit</button></a>
      </td>
      <td class="price-td">
      <a href="deleteProduct?id='.$hash_id.'&t='.$tb.'">
      <button class="btn btn-danger btn-sm" type="submit">Delete</button>
      </a>
      </td> <td class="price-td">
      <a href="show?id='.$hash_id.'&t=product">
      <button class="btn btn-success btn-sm" type="submit">Show</button>
      </a>
      <a href="hide?id='.$hash_id.'&t=product">
      <button class="btn btn-basic btn-sm" type="submit">Hide</button>
      </a>
      </td></tr>';
    }
    if($level == 2 || $level == 4 || $level == 5 || $level == 6){
      echo '<tr><td class="add-img-td">
      '.$product_name.'
      </td>
      <td class="ads-details-td">
      <a href="viewBody?id='.$hash_id.'&t='.$tb.'"><p>'.$bd.'</p></a>
      </td>
     <td class="add-img-td">
      '.$price.'
      </td>
      <td class="add-img-td">
      <a href="editImage?id='.$hash_id.'&t='.$tb.'">
      <img class="img-responsive" src="'.$image_1.'">
      </a>
      </td>
       <td class="add-img-td">
      '.$category.'
      </td>
       <td class="add-img-td">
      '.$visibility.'
      </td>
      <td class="add-img-td">
      '.$created_by.'
      </td>
      <td class="add-img-td">
      '.$date_created.'
      </td>
      <td class="ads-details-td">
      <a href="editProduct?id='.$hash_id.'&t='.$tb.'"><button class="btn btn-common btn-sm" type="submit">Edit</button></a>
      </td>
      <td class="price-td">
      <a href="deleteProduct?id='.$hash_id.'&t='.$tb.'">
      <button class="btn btn-danger btn-sm" type="submit">Delete</button>
      </a>
      </td>
      <td class="price-td">
      <p>You cannot perform this action</p>
      </td>
      <td class="price-td">
      <p>You cannot perform this action</p>
      </td></tr>';
    }
    if($level == 1){
      echo '<tr><td class="ads-img-td>
      <td class="ads-details-td">
      <a href="viewBody?id='.$hash_id.'&t='.$tb.'"><p>'.$bd.'</p></a>
      </td>
      <td class="add-img-td">
      <a href="#">
      <img class="img-responsive" src="'.$image_1.'">
      </a>
      </td>
      <td class="add-img-td">
      '.$created_by.'
      </td>
      <td class="add-img-td">
      '.$date_created.'
      </td>
      <td class="ads-details-td">
      <p>You cannot perform this action</p>
      </td>
      <td class="price-td">
      <p>You cannot perform this action</p>
      </td>
      <td class="price-td">
      <p>You cannot perform this action</p>
      </td></tr>';
    }
  }
}
function PgetProduct($dbconn,$tb,$get){
  $stmt = $dbconn->prepare("SELECT * FROM $tb WHERE created_by=:cb ORDER BY id DESC");
  $stmt->bindParam(":cb",$get);
  $stmt->execute();
  while($row = $stmt->fetch(PDO::FETCH_BOTH)){
    extract($row);
    $bd = previewBody($body, 20);
    $level =  adminLevel($dbconn,$get);
    if($level == 3 || $level == "MASTER"){
      echo '<tr><td class="add-img-td">
      '.$product_name.'
      </td>
      <td class="ads-details-td">
      <a href="viewBody?id='.$hash_id.'&t='.$tb.'"><p>'.$bd.'</p></a>
      </td>
     <td class="add-img-td">
      '.$price.'
      </td>
      <td class="add-img-td">
      <a href="editImage?id='.$hash_id.'&t='.$tb.'">
      <img class="img-responsive" src="'.$image_1.'">
      </a>
      </td>
       <td class="add-img-td">
      '.$category.'
      </td>
       <td class="add-img-td">
      '.$visibility.'
      </td>
      <td class="add-img-td">
      '.$created_by.'
      </td>
      <td class="add-img-td">
      '.$date_created.'
      </td>
      <td class="ads-details-td">
      <a href="editProduct?id='.$hash_id.'&t='.$tb.'"><button class="btn btn-common btn-sm" type="submit">Edit</button></a>
      </td>
      <td class="price-td">
      <a href="deleteProduct?id='.$hash_id.'&t='.$tb.'">
      <button class="btn btn-danger btn-sm" type="submit">Delete</button>
      </a>
      </td></tr>';
    }
    if($level == 2 || $level == 4 || $level == 5 || $level == 6){
      echo'<tr><td class="add-img-td">
      '.$product_name.'
      </td>
      <td class="ads-details-td">
      <a href="viewBody?id='.$hash_id.'&t='.$tb.'"><p>'.$bd.'</p></a>
      </td>
     <td class="add-img-td">
      '.$price.'
      </td>
      <td class="add-img-td">
      <a href="editImage?id='.$hash_id.'&t='.$tb.'">
      <img class="img-responsive" src="'.$image_1.'">
      </a>
      </td>
       <td class="add-img-td">
      '.$category.'
      </td>
       <td class="add-img-td">
      '.$visibility.'
      </td>
      <td class="add-img-td">
      '.$created_by.'
      </td>
      <td class="add-img-td">
      '.$date_created.'
      </td>
      <td class="ads-details-td">
      <a href="editProduct?id='.$hash_id.'&t='.$tb.'"><button class="btn btn-common btn-sm" type="submit">Edit</button></a>
      </td>
      <td class="price-td">
      <a href="deleteProduct?id='.$hash_id.'&t='.$tb.'">
      <button class="btn btn-danger btn-sm" type="submit">Delete</button>
      </a>
      </td>
      <td class="price-td">
      <p>You cannot perform this action</p>
      </td>
      <td class="price-td">
      <p>You cannot perform this action</p>
      </td></tr>';
    }
    if($level == 1){
      echo '<tr>
      <td class="ads-details-td">
      <a href="viewBody?id='.$hash_id.'&t='.$tb.'"><p>'.$bd.'</p></a>
      </td>
      <td class="add-img-td">
      <a href="#">
      <img class="img-responsive" src="'.$image_1.'">
      </a>
      </td>
      <td class="add-img-td">
      '.$created_by.'
      </td>
      <td class="add-img-td">
      '.$date_created.'
      </td>
      <td class="ads-details-td">
      <p>You cannot perform this action</p>
      </td>
      <td class="price-td">
      <p>You cannot perform this action</p>
      </td>
      <td class="price-td">
      <p>You cannot perform this action</p>
      </td></tr>';
    }
  }
}
function getNewsCat($dbconn){
  $stmt = $dbconn->prepare("SELECT news_category FROM news_category");
  $stmt->execute();
  while($row = $stmt->fetch(PDO::FETCH_BOTH)){
    extract($row);
    echo '<option value="'.$news_category.'">
    '.$news_category.'
    </option>';
  }
}
function getPackageList($dbconn){
  $stmt = $dbconn->prepare("SELECT package_list FROM package_list");
  $stmt->execute();
  while($row = $stmt->fetch(PDO::FETCH_BOTH)){
    extract($row);
    echo '<option value="'.$package_list.'">
    '.$package_list.'
    </option>';
  }
}
function getLog($dbconn){
  $stmt = $dbconn->prepare("SELECT * FROM logs ORDER BY id DESC");
  $stmt->execute();
  while($row = $stmt->fetch(PDO::FETCH_BOTH)){
    extract($row);
    $adminInfo =   adminInfo($dbconn,$action_by);
    echo "<tr><td>A content with title \"$content\" was <strong>$type</strong> in category of $category by <strong>".$adminInfo['firstname'].' '.$adminInfo['lastname']."</strong></td><td>$time_created</td><td>$date_created</td></tr>";
  }
}
function deleteArticle($dbconn,$img,$hid){
  $myFile = $img;
  $stmt = $dbconn->prepare("DELETE FROM blog WHERE hash_id=:hid");
  $stmt->bindParam(":hid", $hid);
  $stmt->execute();

  if(file_exists($myFile)){
    unlink($myFile) or die("Couldn't delete file");
  }

  $success = "Deleted";
  $succ = preg_replace('/\s+/', '_', $success);
  header("Location:/manageArticles?success=$succ");
}
function deleteAdmin($dbconn,$hid){
  $stmt = $dbconn->prepare("DELETE FROM admin WHERE hash_id=:hid");
  $stmt->bindParam(":hid", $hid);
  $stmt->execute();
  $success = "Deleted";
  $succ = preg_replace('/\s+/', '_', $success);
  header("Location:/viewUsers?success=$succ");
}
function deleteClient($dbconn,$hid){
  $stmt = $dbconn->prepare("DELETE FROM user WHERE hash_id=:hid");
  $stmt->bindParam(":hid", $hid);
  $stmt->execute();
  $success = "Deleted";
  $succ = preg_replace('/\s+/', '_', $success);
  header("Location:/clients?success=$succ");
}
function deleteServices($dbconn,$img,$hid){
  $myFile = $img;
  $stmt = $dbconn->prepare("DELETE FROM services WHERE hash_id=:hid");
  $stmt->bindParam(":hid", $hid);
  $stmt->execute();
  if(file_exists($myFile)){
    unlink($myFile) or die("Couldn't delete file");
  }

  $success = "Deleted";
  $succ = preg_replace('/\s+/', '_', $success);
  header("Location:/manageServices?success=$succ");
}
function deleteCategory($dbconn,$img,$hid){
  $myFile = $img;
  $stmt = $dbconn->prepare("DELETE FROM category WHERE hash_id=:hid");
  $stmt->bindParam(":hid", $hid);
  $stmt->execute();
  $success = "Deleted";
  $succ = preg_replace('/\s+/', '_', $success);
  header("Location:/manageCategory?success=$succ");
}
function deleteInsight($dbconn,$img,$hid){

  $stmt = $dbconn->prepare("DELETE FROM quote WHERE hash_id=:hid");
  $stmt->bindParam(":hid", $hid);
  $stmt->execute();

  $success = "Deleted";
  $succ = preg_replace('/\s+/', '_', $success);
  header("Location:/quote?success=$succ");
}

function deleteServiceOrder($dbconn,$hid){
  $stmt = $dbconn->prepare("DELETE FROM service_booking WHERE hash_id=:hid");
  $stmt->bindParam(":hid", $hid);
  $stmt->execute();
  $success = "Deleted";
  $succ = preg_replace('/\s+/', '_', $success);
  header("Location:/ServicesOrders?success=$succ");
}

function deleteEvent($dbconn,$hid){
  $stmt = $dbconn->prepare("DELETE FROM event WHERE hash_id=:hid");
  $stmt->bindParam(":hid", $hid);
  $stmt->execute();
  $success = "Deleted";
  $succ = preg_replace('/\s+/', '_', $success);
  header("Location:/manageEvent?success=$succ");
}
function deleteContents($dbconn,$hid,$tb){
  $stmt = $dbconn->prepare("DELETE FROM $tb WHERE hash_id=:hid");
  $stmt->bindParam(":hid", $hid);
  $stmt->execute();
  $success = "Deleted";
  $succ = preg_replace('/\s+/', '_', $success);
  if($tb == "grants"){
    header("location:manageTrainings?success=$succ");
  }
  if($tb == "report"){
    header("location:manageReports?success=$succ");
  }
  if($tb == "training"){
    header("location:managePrograms?success=$succ");
  }
  if($tb == "event"){
    header("location:manageEvents?success=$succ");
  }
  if($tb == "event"){
    header("location:manageProjects?success=$succ");
  }
}
function deleteNews($dbconn,$img,$hid){
  $myFile = $img;
  $stmt = $dbconn->prepare("DELETE FROM news WHERE hash_id=:hid");
  $stmt->bindParam(":hid", $hid);
  $stmt->execute();
  if(file_exists($myFile)){
    unlink($myFile) or die("Couldn't delete file");
  }
  $success = "Deleted";
  $succ = preg_replace('/\s+/', '_', $success);
  header("Location:/manageNews?success=$succ");
}
function deleteCampusNews($dbconn,$img,$hid){
  $myFile = $img;
  $stmt = $dbconn->prepare("DELETE FROM campus_news WHERE hash_id=:hid");
  $stmt->bindParam(":hid", $hid);
  $stmt->execute();
  if(file_exists($myFile)){
    unlink($myFile) or die("Couldn't delete file");
  }
  $success = "Deleted";
  $succ = preg_replace('/\s+/', '_', $success);
  header("Location:/manageCampusNews?success=$succ");
}
function logs($dbconn, $type, $content,$category,$who){
  $rnd = rand(0000000000,9999999999);
  $split = explode(" ",$content);
  $id = $rnd.cleans($split['0']);
  $hash_id = 'log'.str_shuffle($id);
  $stmt = $dbconn->prepare("INSERT INTO logs VALUES(NULL,:tp,:cnt,:categ,:wh,NOW(),NOW(),:hid)");
  $stmt->bindParam(":tp",$type);
  $stmt->bindParam(":cnt",$content);
  $stmt->bindParam(":categ",$category);
  $stmt->bindParam(":wh",$who);
  $stmt->bindParam(":hid",$hash_id);
  $stmt->execute();
}

function showProject($dbconn){
  $result = [];
  $stmt=$dbconn->prepare("SELECT * FROM project");
  $stmt->execute();
  while ($row=$stmt->fetch(PDO::FETCH_BOTH)) {
    $result [] = $row;
  }
  return $result;
}
function showEvent($dbconn){
  $result = [];
  $stmt=$dbconn->prepare("SELECT * FROM event");
  $stmt->execute();
  while ($row=$stmt->fetch(PDO::FETCH_BOTH)) {
    $result [] = $row;
  }
  return $result;
}

function viewProject($dbconn, $id){
  $stmt=$dbconn->prepare("SELECT * FROM project WHERE hash_id = :id");
  $stmt->bindParam(':id', $id);
  $stmt->execute();
  $row=$stmt->fetch(PDO::FETCH_BOTH);
  return $row;
}
function viewEvent($dbconn, $id){
  $stmt=$dbconn->prepare("SELECT * FROM event WHERE hash_id = :id");
  $stmt->bindParam(':id', $id);
  $stmt->execute();
  $row=$stmt->fetch(PDO::FETCH_BOTH);
  return $row;
}

function viewLatestProject($dbconn){
  $result = [];
  $stmt=$dbconn->prepare("SELECT * FROM project ORDER BY id DESC Limit 4");
  $stmt->execute();
  while ($row=$stmt->fetch(PDO::FETCH_BOTH)) {
    $result[] = $row;
  }
    return $result;
  }



function recentBlogPost($dbconn){
  $result = [];
  $stmt=$dbconn->prepare("SELECT * FROM blog ORDER BY id DESC Limit 4");
  $stmt->execute();
  while ($row=$stmt->fetch(PDO::FETCH_BOTH)) {
    $result [] = $row;
  };
  return $result;
}

function recentProjectPost($dbconn){
  $result = [];
  $stmt=$dbconn->prepare("SELECT * FROM project ORDER BY id DESC Limit 3");
  $stmt->execute();
  while ($row=$stmt->fetch(PDO::FETCH_BOTH)) {
    $result [] = $row;
  };
  return $result;
}
function recentEventPost($dbconn){
  $result = [];
  $stmt=$dbconn->prepare("SELECT * FROM event ORDER BY id DESC Limit 3");
  $stmt->execute();
  while ($row=$stmt->fetch(PDO::FETCH_BOTH)) {
    $result [] = $row;
  };
  return $result;
}


function getServiceOrder($dbconn, $get){
  $stmt = $dbconn->prepare("SELECT * FROM service_booking ORDER BY id DESC");
  $stmt->execute();
  while($row = $stmt->fetch(PDO::FETCH_BOTH)){
    extract($row);
    $bd = previewBody($service_order, 20);
    $level =  adminLevel($dbconn,$get);
    if($level == 3 || $level == "MASTER"){
      echo '<tr><td class="ads-details-td">
      <h4><a href="">'.$name.'</a></h4></td>
      <td><p> '.$phone_number.'</p> </td>
      <td><p>'.$email.'</p>
      </td>
       <td class="add-img-td">
      '.$adress.'
      </td>
      <td class="ads-details-td">
      <a href="viewBody?id='.$hash_id.'&t=service_booking"><p>'.$bd.'</p></a>
      </td>
      <td class="add-img-td">
      '.$service_id.'
      </td>
      <td class="add-img-td">
      '.$date_created.'
      </td>
      <td class="add-img-td">
      '.$time_created.'
      </td>
      <td class="price-td">
      <a href="deleteServiceOrder?id='.$hash_id.'">
      <button class="btn btn-danger btn-sm" type="submit">Delete</button>
      </a>
      </td></tr>';
    }
    if($level == 2 || $level == 4 || $level == 5 || $level == 6){
      echo '<tr><td class="ads-details-td">
      <h4><a href="">'.$title.'</a></h4>
      <p> <strong> Author </strong>:
      '.$author.'</p>
      <p> <strong> Category </strong>:
      '.$category.'</p>
      </td>
      <td class="ads-details-td">
      <a href="viewBody?id='.$hash_id.'&t=blog"><p>'.$bd.'</p></a>
      </td>
      <td class="add-img-td">
      <a href="editImage?id='.$hash_id.'&t=blog">
      <img class="img-responsive" src="'.$image_1.'">
      </a>
      </td>
      <td class="add-img-td">
      '.$created_by.'
      </td>
      <td class="add-img-td">
      '.$date_created.'
      </td>
      <td class="add-img-td">
      '.$visibility.'
      </td>
      <td class="ads-details-td">
      <a href="editArticle?id='.$hash_id.'"><button class="btn btn-common btn-sm" type="submit">Edit</button></a>
      </td>
      <td class="price-td">
      <p>You cannnot perform this action</p>
      </td>
      <td class="price-td">
      <p>You cannnot perform this action</p>
      </td></tr>';
    }
    if($level == 1){
      echo '<tr><td class="ads-details-td">
      <h4><a href="">'.$title.'</a></h4>
      <p> <strong> Author </strong>:
      '.$author.'</p>
      <p> <strong> Category </strong>:
      '.$category.'</p>
      </td>
      <td class="ads-details-td">
      <a href="viewBody?id='.$hash_id.'&t=blog"><p>'.$bd.'</p></a>
      </td>
      <td class="add-img-td">
      <a href="#">
      <img class="img-responsive" src="'.$image_1.'">
      </a>
      </td>
      <td class="add-img-td">
      '.$created_by.'
      </td>
      <td class="add-img-td">
      '.$date_created.'
      </td>
      <td class="add-img-td">
      '.$visibility.'
      </td>
      <td class="ads-details-td">
      <p>You cannnot perform this action</p>
      </td>
      <td class="price-td">
      <p>You cannnot perform this action</p>
      </td>
      <td class="price-td">
      <p>You cannnot perform this action</p>
      </td></tr>';
    }
  }
}
function Pget($dbconn,$get){
  $stmt = $dbconn->prepare("SELECT * FROM insight WHERE created_by=:cb ORDER BY id DESC");
  $stmt->bindParam(":cb",$get);
  $stmt->execute();
  while($row = $stmt->fetch(PDO::FETCH_BOTH)){
    extract($row);
    $bd = previewBody($body, 20);
    $level =  adminLevel($dbconn,$get);
    if($level == 3 || $level == "MASTER"){
      echo '<tr><td class="ads-details-td">
      <h4><a href="">'.$title.'</a></h4>
      <p> <strong> Author </strong>:
      '.$author.'</p>
      <p> <strong> Category </strong>:
      '.$category.'</p>
      </td>
      <td class="ads-details-td">
      <a href="viewBody?id='.$hash_id.'&t=insight"><p>'.$bd.'</p></a>
      </td>
      <td class="add-img-td">
      <a href="editImage?id='.$hash_id.'&t=insight">
      <img class="img-responsive" src="'.$image_1.'">
      </a>
      </td>
      <td class="add-img-td">
      '.$created_by.'
      </td>
      <td class="add-img-td">
      '.$date_created.'
      </td>
      <td class="add-img-td">
      '.$visibility.'
      </td>
      <td class="ads-details-td">
      <a href="editInsight?id='.$hash_id.'"><button class="btn btn-common btn-sm" type="submit">Edit</button></a>
      </td>
      <td class="price-td">
      <a href="deleteInsight?id='.$hash_id.'">
      <button class="btn btn-danger btn-sm" type="submit">Delete</button>
      </a>
      </td>
      <td class="price-td">
      <a href="show?id='.$hash_id.'&t=insight">
      <button class="btn btn-success btn-sm" type="submit">Show</button>
      </a>
      <a href="hide?id='.$hash_id.'&t=insight">
      <button class="btn btn-basic btn-sm" type="submit">Hide</button>
      </a>
      </td></tr>';
    }
    if($level == 2 || $level == 4 || $level == 5 || $level == 6){
      echo '<tr><td class="ads-details-td">
      <h4><a href="">'.$title.'</a></h4>
      <p> <strong> Author </strong>:
      '.$author.'</p>
      <p> <strong> Category </strong>:
      '.$category.'</p>
      </td>
      <td class="ads-details-td">
      <a href="viewBody?id='.$hash_id.'&t=blog"><p>'.$bd.'</p></a>
      </td>
      <td class="add-img-td">
      <a href="editImage?id='.$hash_id.'&t=blog">
      <img class="img-responsive" src="'.$image_1.'">
      </a>
      </td>
      <td class="add-img-td">
      '.$created_by.'
      </td>
      <td class="add-img-td">
      '.$date_created.'
      </td>
      <td class="add-img-td">
      '.$visibility.'
      </td>
      <td class="ads-details-td">
      <a href="editArticle?id='.$hash_id.'"><button class="btn btn-common btn-sm" type="submit">Edit</button></a>
      </td>
      <td class="price-td">
      <p>You cannnot perform this action</p>
      </td>
      <td class="price-td">
      <p>You cannnot perform this action</p>
      </td></tr>';
    }
    if($level == 1){
      echo '<tr><td class="ads-details-td">
      <h4><a href="">'.$title.'</a></h4>
      <p> <strong> Author </strong>:
      '.$author.'</p>
      <p> <strong> Category </strong>:
      '.$category.'</p>
      </td>
      <td class="ads-details-td">
      <a href="viewBody?id='.$hash_id.'&t=blog"><p>'.$bd.'</p></a>
      </td>
      <td class="add-img-td">
      <a href="#">
      <img class="img-responsive" src="'.$image_1.'">
      </a>
      </td>
      <td class="add-img-td">
      '.$created_by.'
      </td>
      <td class="add-img-td">
      '.$date_created.'
      </td>
      <td class="add-img-td">
      '.$visibility.'
      </td>
      <td class="ads-details-td">
      <p>You cannnot perform this action</p>
      </td>
      <td class="price-td">
      <p>You cannnot perform this action</p>
      </td>
      <td class="price-td">
      <p>You cannnot perform this action</p>
      </td></tr>';
    }
  }
}


function getQuote($dbconn, $get){
  $stmt = $dbconn->prepare("SELECT * FROM quote ORDER BY id DESC");
  $stmt->execute();
  while($row = $stmt->fetch(PDO::FETCH_BOTH)){
    extract($row);
    $bd = previewBody($customer_order, 20);
    $level =  adminLevel($dbconn,$get);
    if($level == 3 || $level == "MASTER"){
      echo '<tr><td class="ads-details-td">
      <h4><a href="">'.$name.'</a></h4></td>
      <td><p> '.$phone_number.'</p> </td>
      <td><p>'.$email.'</p>
      </td>
       <td class="add-img-td">
      '.$adress.'
      </td>
      <td class="ads-details-td">
      <a href="viewBody?id='.$hash_id.'&t=quote"><p>'.$bd.'</p></a>
      </td>
      <td class="add-img-td">
      '.$quantity.'
      </td>
      <td class="add-img-td">
      '.$date_created.'
      </td>
      <td class="add-img-td">
      '.$time_created.'
      </td>
      <td class="price-td">
      <a href="deleteInsight?id='.$hash_id.'">
      <button class="btn btn-danger btn-sm" type="submit">Delete</button>
      </a>
      </td></tr>';
    }


  }
}
function PgetQuote($dbconn,$get){
  $stmt = $dbconn->prepare("SELECT * FROM quote  WHERE ORDER BY id DESC");
  $stmt->execute();
  while($row = $stmt->fetch(PDO::FETCH_BOTH)){
    extract($row);
    $bd = previewBody($body, 20);
    $level =  adminLevel($dbconn,$get);
    if($level == 3 || $level == "MASTER"){
      echo '<tr><td class="ads-details-td">
      <h4><a href="">'.$title.'</a></h4>
      <p> <strong> Author </strong>:
      '.$author.'</p>
      <p> <strong> Category </strong>:
      '.$category.'</p>
      </td>
      <td class="ads-details-td">
      <a href="viewBody?id='.$hash_id.'&t=insight"><p>'.$bd.'</p></a>
      </td>
      <td class="add-img-td">
      <a href="editImage?id='.$hash_id.'&t=insight">
      <img class="img-responsive" src="'.$image_1.'">
      </a>
      </td>
      <td class="add-img-td">
      '.$created_by.'
      </td>
      <td class="add-img-td">
      '.$date_created.'
      </td>
      <td class="add-img-td">
      '.$visibility.'
      </td>
      <td class="ads-details-td">
      <a href="editInsight?id='.$hash_id.'"><button class="btn btn-common btn-sm" type="submit">Edit</button></a>
      </td>
      <td class="price-td">
      <a href="deleteInsight?id='.$hash_id.'">
      <button class="btn btn-danger btn-sm" type="submit">Delete</button>
      </a>
      </td>
      <td class="price-td">
      <a href="show?id='.$hash_id.'&t=insight">
      <button class="btn btn-success btn-sm" type="submit">Show</button>
      </a>
      <a href="hide?id='.$hash_id.'&t=insight">
      <button class="btn btn-basic btn-sm" type="submit">Hide</button>
      </a>
      </td></tr>';
    }
    if($level == 2 || $level == 4 || $level == 5 || $level == 6){
      echo '<tr><td class="ads-details-td">
      <h4><a href="">'.$title.'</a></h4>
      <p> <strong> Author </strong>:
      '.$author.'</p>
      <p> <strong> Category </strong>:
      '.$category.'</p>
      </td>
      <td class="ads-details-td">
      <a href="viewBody?id='.$hash_id.'&t=blog"><p>'.$bd.'</p></a>
      </td>
      <td class="add-img-td">
      <a href="editImage?id='.$hash_id.'&t=blog">
      <img class="img-responsive" src="'.$image_1.'">
      </a>
      </td>
      <td class="add-img-td">
      '.$created_by.'
      </td>
      <td class="add-img-td">
      '.$date_created.'
      </td>
      <td class="add-img-td">
      '.$visibility.'
      </td>
      <td class="ads-details-td">
      <a href="editArticle?id='.$hash_id.'"><button class="btn btn-common btn-sm" type="submit">Edit</button></a>
      </td>
      <td class="price-td">
      <p>You cannnot perform this action</p>
      </td>
      <td class="price-td">
      <p>You cannnot perform this action</p>
      </td></tr>';
    }
    if($level == 1){
      echo '<tr><td class="ads-details-td">
      <h4><a href="">'.$title.'</a></h4>
      <p> <strong> Author </strong>:
      '.$author.'</p>
      <p> <strong> Category </strong>:
      '.$category.'</p>
      </td>
      <td class="ads-details-td">
      <a href="viewBody?id='.$hash_id.'&t=blog"><p>'.$bd.'</p></a>
      </td>
      <td class="add-img-td">
      <a href="#">
      <img class="img-responsive" src="'.$image_1.'">
      </a>
      </td>
      <td class="add-img-td">
      '.$created_by.'
      </td>
      <td class="add-img-td">
      '.$date_created.'
      </td>
      <td class="add-img-td">
      '.$visibility.'
      </td>
      <td class="ads-details-td">
      <p>You cannnot perform this action</p>
      </td>
      <td class="price-td">
      <p>You cannnot perform this action</p>
      </td>
      <td class="price-td">
      <p>You cannnot perform this action</p>
      </td></tr>';
    }
  }
}



?>
