<?php
// header("Content-Security-Policy: default-src 'none';");
// header("Access-Control-Allow-Origin: http://192.168.33.23/test.php");
$request_headers = getallheaders();
if($_SERVER['REQUEST_METHOD'] !=="POST"){
   http_response_code(502);
   die;
}

if( !in_array($request_headers['Host'],["192.168.33.23","Mckodev.attendout.com"]) ){
  http_response_code(502);
  die;
}


$json = file_get_contents('php://input');

// Converts it into a PHP object
$data = json_decode($json,true);

if(!isset($data['data']) || !isset($data['values'])){
    http_response_code(400);
    die();
}

$result = [];
try {
  $sql = sprintf('INSERT INTO %s (%s) VALUES(%s)',
  $data['data'],
  implode(', ',array_keys($data['values'])), ':'.implode(',:',array_keys($data['values']))
);
// //die(var_dump($sql));
$stmt =  $conn->prepare($sql);
$stmt->execute($data['values']);
  $result["success"] = true;
} catch (PDOException $e) {
  // die($e);
    http_response_code(409);
    $result["error"] = true;
    die;
}

$res = json_encode($result);
echo $res;
