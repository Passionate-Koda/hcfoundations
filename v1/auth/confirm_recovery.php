<?php
ob_start();
session_start();
if(!isset($_SESSION['half_num']) && !isset($_SESSION['identity']) && !isset($_SESSION['name'])){
  $suc = 'Error';
  $message = preg_replace('/\s+/', '_', $suc);
  header("Location:login?err=$message");
}
if(isset($_SESSION['identity'])){
  $identity = $_SESSION['identity'];
}
if(isset($_SESSION['email'])){
  $email = $_SESSION['email'];
}
if(isset($_SESSION['half_num'])){
  $half_num = $_SESSION['half_num'];
}
if(isset($_SESSION['name'])){
  $name = $_SESSION['name'];
}
// include("include/link_include.php");


$error= [];
if(array_key_exists('submit', $_POST)){

  if(empty($_POST['number'])){
    $error['number']="Enter number";
  }

  if(empty($error)){
$given_num = $_SESSION['half_num'].$_POST['number'];
if(doesPhoneNumberExist($conn, $given_num)){

  $ret = forgotPassword($conn, $identity);






   $to = strip_tags($email);
   $subject = $site_name." Password Recovery";
   $txt = "Hello $name, You made a request for password changes, Follow this link to change our Password ".'https://'.$_SERVER['HTTP_HOST']."/confirm?token=".$ret[0];
   $headers = "From: ".$site_email . "\r\n" .
   "CC: banjimayowa@gmail.com";

   mail($to,$subject,$txt,$headers);
   $suc = 'A mail has been sent to your email address, Kindly visit the mail for further instructions';
   $message = preg_replace('/\s+/', '_', $suc);
   unset($_SESSION['name']);
   unset($_SESSION['identity']);
   unset($_SESSION['half_num']);
   unset($_SESSION['email']);
   session_destroy();
   header("Location:/login?success=$message");




}else{
  unset($_SESSION['name']);
  unset($_SESSION['identity']);
  unset($_SESSION['half_num']);
  unset($_SESSION['email']);
  session_destroy();
  $suc = 'Incorrect';
  $message = preg_replace('/\s+/', '_', $suc);
  header("Location:/login?ne=$message");
  }




    }


 //      $from = "info@mckodev.com.ng"; //enter your email address
 // $to = "banjimayowa@gmail.com"; //enter the email address of the contact your sending to
 // $subject = "BOARDSPECK New Admin User Registration"; // subject of your email

  }


 ?>

<!DOCTYPE html>
<html lang="" dir="ltr">
<head>
  <meta charset="utf-8">
  <title><?php echo $site_name ?></title>
  <meta name="theme-color" >
  <meta charset="UTF-8">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body style="background-color:grey">

  <div class="col-md-12">

    <div class="card" style="width:100%;min-height:96vh; Background-color:white;">
      <div class="card-body text-center">

          <div class="mx-auto" style="width:100px; height: 100px;background:url('<?php echo  $logo_directory ?>'); background-size:80%; background-position:center; background-repeat:no-repeat;">
          </div>

        <br>
        <br>
        <h5><?php echo $site_name ?></h5>
        <p>Password Recovery</p>
        <br>
        <section id="">
          <div class="container">
            <div class="row">

              <div class="col-sm-6 col-sm-offset-4 col-md-4 col-md-offset-4 mx-auto">
                <div class="page-login-form">
                  <div class="row"><div class="col-md-12">
              <div class=" posting">
            <div class="card mx-auto" role="alert">



              <h3>
              Verify Your Number (<?php echo $_SESSION['half_num']."***" ?>)
              </h3>
              <form role="form" class="login-form" method="POST" action="">

              <div class="form-group">

              <div class="input-icon ">
              <p>Enter the Last 3 digits of the phone number above. This Number was supplied durning Registration</p>
              <input type="text" class="form-control" name="number"  placeholder="Enter Last 3 Digits" maxlength="3" required>
              </div>
              </div>

              <input class="btn btn-common log-btn" type="submit"  name="submit">
              <!-- <button class="btn btn-common log-btn"></button> -->
              <label for="remember"><a href="/login"> Back</a></label>


              </form>




              </div>
              </div>
              </div>
              </div>
              </div>




                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>

</body>
</html>
