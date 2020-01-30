<?php

function ForumInfo($dbconn,$sess){
  $stmt = $dbconn->prepare("SELECT * FROM users WHERE hash_id = :sid");
  $data = [
    ':sid' => $sess
  ];
  $stmt->execute($data);
  $row = $stmt->fetch(PDO::FETCH_BOTH);
  return $row;
}
function insert($conn, $table, $parameters){

  array_pop($parameters);
  // var_dump($parameters);
  $sql = sprintf('INSERT INTO %s (%s) VALUES(%s)',
  $table,
  implode(', ',array_keys($parameters)), ':'.implode(',:',array_keys($parameters))
);
// //die(var_dump($sql));
$stmt =  $conn->prepare($sql);
$stmt->execute($parameters);
}
// function displayErrors($error, $field)
// {
//   $result= "";
//   if (isset($error[$field]))
//   {
//     $result = '<span style="color:red">'.$error[$field].'</span>';
//   }
//   return $result;
// }

function columnSummation($conn,$column,$table){
  $stmt = $conn->prepare("SELECT $column FROM $table");
  $stmt->execute();
  $plus = 0;
  // die(var_dump($row = $stmt->fetch(PDO::FETCH_BOTH)));
  while($row = $stmt->fetch(PDO::FETCH_BOTH)){
    $plus += $row[$column];
  }
  // die(var_dump($plus));
  return $plus;
}
function columnPrySummation($conn,$column,$table){
  $pry = "primary";
  $stmt = $conn->prepare("SELECT $column FROM $table WHERE category=:pry");

  $stmt->bindParam(":pry",$pry);
  $stmt->execute();
  $plus = 0;
  // die(var_dump($row = $stmt->fetch(PDO::FETCH_BOTH)));
  while($row = $stmt->fetch(PDO::FETCH_BOTH)){
    $plus += $row[$column];
  }
  // die(var_dump($plus));
  return $plus;
}

function totalCount($conn,$table){
  $stmt = $conn->prepare("SELECT * FROM $table");
  $stmt->execute();
  return $stmt->rowCount();
}
function totalPryCount($conn,$table){
  $pry = "primary";
  $stmt = $conn->prepare("SELECT * FROM $table WHERE category=:pry");
  $stmt->bindParam(":pry",$pry);
  $stmt->execute();
  return $stmt->rowCount();
}

function totalCategoryCount($conn,$table,$column,$value){
  $stmt = $conn->prepare("SELECT * FROM $table WHERE $column=:value");
  $stmt->bindParam(':value',$value);
  $stmt->execute();
  return $stmt->rowCount();
}

// function cleans($string){
//   $string = str_replace(array('[\', \']'), '', $string);
//   $string = preg_replace('/\[.*\]/U', '', $string);
//   $string = preg_replace('/&(amp;)?#?[a-z0-9]+;/i', '-', $string);
//   $string = htmlentities($string, ENT_COMPAT, 'utf-8');
//   $string = preg_replace('/&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);/i', '\\1', $string );
//   $string = preg_replace(array('/[^a-z0-9]/i', '/[-]+/') , '-', $string);
//   return strtolower(trim($string, '-'));
// }









function cleanTime($time){
  $timestamp = strtotime($time) + 60*60;

  $time = date('H:i:s', $timestamp);
  return $time;

}
function getForumCategory($dbconn){
  $stmt = $dbconn->prepare("SELECT * FROM category");
  $stmt->execute();
  while($row = $stmt->fetch(PDO::FETCH_BOTH)){
    extract($row);

    echo '<li><a href="/category/'.$hash_id.'">'.$category_name.' &nbsp;<span class="badge pull-right">'.categoryCount($dbconn,$row['hash_id']).'</span></a></li>';
  }
}
function getMyForum($dbconn,$id){
  $stmt = $dbconn->prepare("SELECT * FROM topic WHERE user_id=:hid");
  $stmt->bindParam(":hid",$id);
  $stmt->execute();
  while($row = $stmt->fetch(PDO::FETCH_BOTH)){
    extract($row);
    $post = cleans($title);
    echo '<div class="divline"></div>
    <div class="blocktxt">
    <a href="/topic/'.$post.'-'.$row['hash_id'].'">'.strtoupper(strtolower($row['title'])).'</a>
    </div>';
  }
}

// function previewBody($string, $count){
//   $original_string = $string;
//   $words = explode(' ', $original_string);
//   if(count($words) > $count){
//     $words = array_slice($words, 0, $count);
//     $string = implode(' ', $words)."...";
//   }
//   return strip_tags($string);
// }


function insertSafe($conn, $table, $parameters){
  try {
    // array_pop($parameters);
    // var_dump($parameters);
    $sql = sprintf('INSERT INTO %s (%s) VALUES(%s)',
    $table,
    implode(', ',array_keys($parameters)), ':'.implode(',:',array_keys($parameters))
  );
  // //die(var_dump($sql));
  $stmt =  $conn->prepare($sql);
  $stmt->execute($parameters);
} catch (PDOException $e) {
  // die($e);
  die("Error: Try again After Some Times");
}
}
function insertContent($conn, $table, $parameters){
  try {

    // var_dump($parameters);
    $sql = sprintf('INSERT INTO %s (%s) VALUES(%s)',
    $table,
    implode(', ',array_keys($parameters)), ':'.implode(',:',array_keys($parameters))
  );
  // //die(var_dump($sql));
  $stmt =  $conn->prepare($sql);
  $stmt->execute($parameters);
} catch (PDOException $e) {
  // die($e);
  die("Error: Try again After Some Times");
}
}

// function update($dbconn, $table, $parameters,$column,$value,$locat){
//
//
// try {
//   function getVal($param){
//   $result = [];
//   foreach($param as $col => $val){
//       $result[] = "$col = :$col";
//     }
//     $new = implode(', ', $result);
//     return $new;
// }
//   function getVal2($param){
//   $result = [];
//   foreach($param as $col => $val){
//       $result[] = "$col = :$col";
//     }
//     $new = implode(' AND ', $result);
//     return $new;
// }
//
//
// array_pop($parameters);
// $what = getVal($parameters);
// $vall = getVal2($value);
//
//   // var_dump($parameters);
//   $sql = sprintf('UPDATE %s SET %s',
//       $table, $what
//   );
//   $sql .= " WHERE ".$vall;
//   // //die(var_dump($sql));
// $stmt =  $dbconn->prepare($sql);
// $newt = $parameters + $value;
// // die(var_dump($newt));
// $stmt->execute($newt);
// } catch (PDOException $e) {
//   die("Error Occured");
// }
//
// if($table == "admin"){
//   $success = "Profile Successfully Edited";
//   $succ = preg_replace('/\s+/', '_', $success);
//   header("Location:/$locat");
// }else {
//   $success = "Edited";
//   $succ = preg_replace('/\s+/', '_', $success);
//   header("Location:/$locat?success=$succ");
// }
//
//
//
// }


// function compressImage($files, $name, $quality, $upDIR ) {
//   // die(var_dump($files[$name]['type']));
//   $rnd = rand(0000000, 9999999);
//   $strip_name = preg_replace("/[^.a-zA-Z0-9]/", "_",$_FILES[$name]['name'] );
//   $filename = time()."mail".$strip_name;
//   $destination_url = $upDIR.$filename;
//   $info = getimagesize($files[$name]['tmp_name']);
//   if ($info['mime'] == 'image/jpeg')
//   $image = imagecreatefromjpeg($files[$name]['tmp_name']);
//   elseif ($info['mime'] == 'image/gif')
//   $image = imagecreatefromgif($files[$name]['tmp_name']);
//   elseif ($info['mime'] == 'image/png')
//   $image = imagecreatefrompng($files[$name]['tmp_name']);
//   imagejpeg($image, $destination_url, $quality);
//   $img['upload'] = $destination_url;
//   return $img;
// }
function compressImage2($files, $name, $quality, $upDIR ) {
  // die(var_dump($files[$name]['type']));

  $rnd = rand(0000000, 9999999);
  $strip_name = preg_replace("/[^.a-zA-Z0-9]/", "_",$_FILES[$name]['name'] );
  $filename = time()."mail".$strip_name;
  $destination_url = $upDIR.$filename;
  $thumb_url = 'thumbs/'.$filename;
  $info = getimagesize($files[$name]['tmp_name']);
  if ($info['mime'] == 'image/jpeg')
  $image = imagecreatefromjpeg($files[$name]['tmp_name']);
  elseif ($info['mime'] == 'image/gif')
  $image = imagecreatefromgif($files[$name]['tmp_name']);
  elseif ($info['mime'] == 'image/png')
  $image = imagecreatefrompng($files[$name]['tmp_name']);


  imagejpeg($image, $destination_url, 90);
  imagejpeg($image, $thumb_url,30);
  $img['upload'] = $destination_url;
  $img['thumb'] = $thumb_url;
  return $img;
}

function selectTableContent2($dbconn,$table,$column,$columnWhere){
  $vall = formatWhere($columnWhere);
  $column = implode(',',$column);
  try{

    // $what = getVal($parameters);

    // var_dump($parameters);
    $sql = sprintf('SELECT %s FROM %s',
    $column,$table
  );

  if(count($columnWhere) > 0){
    $sql .= " WHERE ".$vall;
  }

  // die(var_dump($sql));
  $stmt =  $dbconn->prepare($sql);
  $newt = $columnWhere;
  // die(var_dump($newt));
  if(count($columnWhere) > 0){
    $stmt->execute($newt);
  }else{
    $stmt->execute();
  }

  // $result = [];
  $row = $stmt->fetchAll(PDO::FETCH_COLUMN, 0);




  return $row;
} catch (PDOException $e) {
  die("Error Occured");
}
}

function deleteContent($dbconn,$table,$columnWhere){

  // die($columnWhere);
  try {

    // $what = getVal($parameters);
    $vall = formatWhere($columnWhere);

    // var_dump($parameters);
    $sql = sprintf('DELETE FROM %s',
    $table
  );
  $sql .= " WHERE ".$vall;


  //die(var_dump($sql));
  $stmt =  $dbconn->prepare($sql);
  $newt = $columnWhere;
  // die(var_dump($newt));

  $stmt->execute($newt);

} catch (PDOException $e) {
  die("Error Occured");
}

}

function selectContent($dbconn,$table,$columnWhere){
  $vall = formatWhere($columnWhere);
  try{

    // $what = getVal($parameters);

    // var_dump($parameters);
    $sql = sprintf('SELECT * FROM %s',
    $table
  );

  if(count($columnWhere) > 0){
    $sql .= " WHERE ".$vall;
  }

  //die(var_dump($sql));
  $stmt =  $dbconn->prepare($sql);
  $newt = $columnWhere;
  // die(var_dump($newt));
  if(count($columnWhere) > 0){
    $stmt->execute($newt);
  }else{
    $stmt->execute();
  }

  $result = [];
  while($row = $stmt->fetch(PDO::FETCH_BOTH)){
    $result[] = $row;
  }

  return $result;
} catch (PDOException $e) {
  die("Error Occured");
}
}
function selectContentDesc($dbconn,$table,$columnWhere,$order,$limit){
  $vall = formatWhere($columnWhere);
  try{

    // $what = getVal($parameters);

    // var_dump($parameters);
    $sql = sprintf('SELECT * FROM %s',
    $table
  );

  if(count($columnWhere) > 0){
    $sql .= " WHERE ".$vall;
  }
  $sql.= " ORDER BY ".$order." DESC LIMIT ".$limit;

  //die(var_dump($sql));
  $stmt =  $dbconn->prepare($sql);
  $newt = $columnWhere;
  // die(var_dump($newt));
  if(count($columnWhere) > 0){
    $stmt->execute($newt);
  }else{
    $stmt->execute();
  }

  $result = [];
  while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    $result[] = $row;
  }

  return $result;
} catch (PDOException $e) {
  die($e);
  die("Error Occured");
}
}
function selectContentAsc($dbconn,$table,$columnWhere,$order,$limit){
  $vall = formatWhere($columnWhere);
  try{

    // $what = getVal($parameters);

    // var_dump($parameters);
    $sql = sprintf('SELECT * FROM %s',
    $table
  );

  if(count($columnWhere) > 0){
    $sql .= " WHERE ".$vall;
  }
  $sql.= " ORDER BY ".$order." ASC LIMIT ".$limit;

  //die(var_dump($sql));
  $stmt =  $dbconn->prepare($sql);
  $newt = $columnWhere;
  // die(var_dump($newt));
  if(count($columnWhere) > 0){
    $stmt->execute($newt);
  }else{
    $stmt->execute();
  }

  $result = [];
  while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    $result[] = $row;
  }

  return $result;
} catch (PDOException $e) {
  // die($e);
  die("Error Occured");
}
}
function selectTableContent($dbconn,$table,$column,$columnWhere){
  $vall = formatWhere($columnWhere);
  $column = implode(',',$column);
  try{

    // $what = getVal($parameters);

    // var_dump($parameters);
    $sql = sprintf('SELECT %s FROM %s',
    $column,$table
  );

  if(count($columnWhere) > 0){
    $sql .= " WHERE ".$vall;
  }

  // die(var_dump($sql));
  $stmt =  $dbconn->prepare($sql);
  $newt = $columnWhere;
  // die(var_dump($newt));
  if(count($columnWhere) > 0){
    $stmt->execute($newt);
  }else{
    $stmt->execute();
  }

  $result = [];
  while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    $result[] = $row;
  }

  return $result;
} catch (PDOException $e) {
  die("Error Occured");
}
}


function formatParam($param){
  $result = [];
  foreach($param as $col => $val){
    $result[] = "$col = :$col";
  }
  $new = implode(', ', $result);
  return $new;
}
function formatWhereParam($param){
  $result = [];
  foreach($param as $col => $val){
    $cola = $col."a";
    $result[$cola] = $val;
  }
  // $new = implode(', ', $result);
  return $result;
}
function formatWhere($param){
  $result = [];
  foreach($param as $col => $val){
    $result[] = "$col = :$col";
  }
  $new = implode(' AND ', $result);
  return $new;
}
function formatPutWhere($param){
  $result = [];
  foreach($param as $col => $val){
    $result[] = "$col = :$col"."a";
  }
  $new = implode(' AND ', $result);
  return $new;
}

function updateContent($dbconn, $table, $parameters,$columnWhere){
  try {



    // array_pop($parameters);
    $what = formatParam($parameters);
    $vall = formatWhere($columnWhere);

    // var_dump($parameters);
    $sql = sprintf('UPDATE %s SET %s',
    $table, $what
  );
  $sql .= " WHERE ".$vall;
  // //die(var_dump($sql));
  $stmt =  $dbconn->prepare($sql);
  $newt = $parameters + $columnWhere;
  // die(var_dump($newt));
  $stmt->execute($newt);
} catch (PDOException $e) {
  die($e);
}
}




function say($value){
  echo "<p style='color:red'>*".$value."</p>";
}
function commentCount($dbconn,$hid){
  $stmt = $dbconn->prepare("SELECT * FROM reply WHERE topic_id=:ti");
  $stmt->bindParam(":ti",$hid);
  $stmt->execute();
  return $stmt->rowCount();
}
function categoryCount($dbconn,$hid){
  $stmt = $dbconn->prepare("SELECT * FROM topic WHERE category=:ti");
  $stmt->bindParam(":ti",$hid);
  $stmt->execute();
  return $stmt->rowCount();
}



function base64url_encode($s) {
  return str_replace(array('+', '/'), array('-', '_'), base64_encode($s));
}

function base64url_decode($s) {
  return base64_decode(str_replace(array('-', '_'), array('+', '/'), $s));
}



?>
