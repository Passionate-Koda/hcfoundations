<?php
define("APP_PATH", dirname(dirname(__FILE__)));
// include APP_PATH."/.env/config.php";
require APP_PATH."/demo_models/model.php";
include APP_PATH."/v1/controllers/controller.php";
$where = $_GET;
array_pop($where);
// die(var_dump($where));
deleteContent($conn,$_GET['data'],$where);

header("Location:".$_SERVER['HTTP_REFERER']);
