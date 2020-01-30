<?php
$uri = explode("/",$_SERVER['REQUEST_URI']);



switch ($uri[1]) {

  case "add":
  include APP_PATH."/ajax/add.php";
  break;
  case "read":
  include APP_PATH."/ajax/read.php";
  break;
  case "put":
  include APP_PATH."/ajax/put.php";
  break;
  case "delete":
  include APP_PATH."/ajax/delete.php";
  break;

}
