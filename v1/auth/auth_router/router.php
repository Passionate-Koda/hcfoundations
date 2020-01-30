<?php
$uri = explode("/",$_SERVER['REQUEST_URI']);

$token = NULL;
if(isset($_GET['token'])){
  $token = $_GET['token'];
}



switch ($uri[1]) {
  case "verify?token=$token":
  include APP_PATH."/auth/verify_registration.php";
  break;

  case "forgotPassword":
  include APP_PATH."/auth/forgot_password.php";
  break;

  case "forgotPassword2":
  include APP_PATH."/auth/forgot_password2.php";
  break;

  case "confirmRecovery":
  include APP_PATH."/auth/confirm_recovery.php";
  break;

  case "confirm?token=$token":
  include APP_PATH."/auth/confirm.php";
  break;

  case "changePassword":
  include APP_PATH."/auth/change_password.php";
  break;

}
