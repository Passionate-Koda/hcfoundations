<?php
define("APP_PATH", dirname(dirname(__FILE__)));
// include APP_PATH."/.env/config.php";
require APP_PATH."/demo_models/model.php";
include APP_PATH."/v1/controllers/controller.php";
$value = $_GET;

array_pop($value);
array_shift($value);
$where['id'] = $_GET['id'];
// die(var_dump($where));
updateContent($conn,$_GET['data'],$value,$where);

header("Location:".$_SERVER['HTTP_REFERER']);
