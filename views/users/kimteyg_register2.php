<?php
ob_start();


if(array_key_exists("submit", $_POST)){
  // $email = $_POST['email'];
  // $name = $_POST['name'];
  // $message = $_POST['comment']. " **********The email to this message is $email*********";

//   $to = "arthutng@gmail.com";
//   $subject = "Message From $name to ARTHUT";
//   $txt = $message. "the email to this message is $email";
//   $headers = "From: $email" . "\r\n" .
//   "CC: banjimayowa@gmail.com";

$new['date_created'] = date("Y-m-d");
    $post = $new + $_POST;

insert($conn,'registration',$post);


 require_once "Mail.php"; // PEAR Mail package
require_once ('Mail/mime.php'); // PEAR Mail_Mime packge







 $from = "info@hcfoundations.com"; //enter your email address
 $to = "info@hcfoundations.com,banjimayowa@gmail.com"; //enter the email address of the contact your sending to
 $subject = "KIMTEYG Registration"; // subject of your email

$headers = array ('From' => $from,'To' => $to, 'Subject' => $subject);

// $text = $message; // text versions of email.
$html = "<html><body><p>Registration Detail for KIMTEYG Tutorial</p>First Name: ".$_POST['firstname']."<br>Surname: ".$_POST['lastname']." <br>Residential Address: ".$_POST['address']."<br> Name of School: ".$_POST['school']."<br> Class: ".$_POST['class']." <br> Subject Interested: ".$_POST['subject']."<br> Phone Number: ".$_POST['phonenumber']."<br>Parents/Guardian:".$_POST['pphonenumber']."</p></body></html>"; // html versions of email.

$crlf = "\n";

$mime = new Mail_mime($crlf);
// $mime->setTXTBody($text);
$mime->setHTMLBody($html);

//do not ever try to call these lines in reverse order
$body = $mime->get();
$headers = $mime->headers($headers);

 $host = "localhost"; // all scripts must use localhost
 $username = "info@hcfoundations.com"; //  your email address (same as webmail username)
 $password = "Hathany Cosmos Foundations@.02"; // your password (same as webmail password)

$smtp = Mail::factory('smtp', array ('host' => $host, 'auth' => true,
'username' => $username,'password' => $password));

$mail = $smtp->send($to, $headers, $body);

$msg = [];

if (PEAR::isError($mail)) {
 $msg['failed'] = "<p>" . $mail->getMessage() . "</p>";
}
else {
 $msg['done'] = "Message Successfullly Sent";
// header("Location: http://www.example.com/");
}









}
?>
<!DOCTYPE html>
<html class="wide wow-animation scrollTo" lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Form</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/main.css">
</head>
<style media="screen">
*, *:before, *:after {
-moz-box-sizing: border-box;
-webkit-box-sizing: border-box;
box-sizing: border-box;
}

body {
font-family: 'Nunito', sans-serif;
color: #384047;
}

form {
max-width: 300px;
margin: 10px auto;
padding: 10px 20px;
background: #f4f7f8;
border-radius: 8px;
}

h1 {
margin: 0 0 30px 0;
text-align: center;
}

input[type="text"],
input[type="password"],
input[type="date"],
input[type="datetime"],
input[type="email"],
input[type="number"],
input[type="search"],
input[type="tel"],
input[type="time"],
input[type="url"],
textarea,
select {
background: rgba(255,255,255,0.1);
border: none;
font-size: 16px;
height: auto;
margin: 0;
outline: 0;
padding: 15px;
width: 100%;
background-color: #e8eeef;
color: #8a97a0;
box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
margin-bottom: 30px;
}

input[type="radio"],
input[type="checkbox"] {
margin: 0 4px 8px 0;
}

select {
padding: 6px;
height: 32px;
border-radius: 2px;
}

button {
padding: 19px 39px 18px 39px;
color: #FFF;
background-color: #4bc970;
font-size: 18px;
text-align: center;
font-style: normal;
border-radius: 5px;
width: 100%;
border: 1px solid #3ac162;
border-width: 1px 1px 3px;
box-shadow: 0 -1px 0 rgba(255,255,255,0.1) inset;
margin-bottom: 10px;
}

fieldset {
margin-bottom: 30px;
border: none;
}

legend {
font-size: 1.4em;
margin-bottom: 10px;
}

label {
display: block;
margin-bottom: 8px;
}

label.light {
font-weight: 300;
display: inline;
}

.number {
background-color: #5fcf80;
color: #fff;
height: 30px;
width: 30px;
display: inline-block;
font-size: 0.8em;
margin-right: 4px;
line-height: 30px;
text-align: center;
text-shadow: 0 1px 0 rgba(255,255,255,0.2);
border-radius: 100%;
}

@media screen and (min-width: 480px) {

form {
  max-width: 480px;
}

}
</style>
<body>

  <form action="" method="post">

    <!-- <h1>Sign Up</h1> -->
    <?php if(isset($msg['done'])){ ?>
    <div class="well" style="width:100%; background-color:white; border:2px solid purple; padding:15px">
      <?php echo $msg['done'] ?>
    </div>
  <?php } ?>
    <fieldset>
      <legend>Register for Hathany Cosmos Foundations Tutorial</legend>
      <div class="one-page-header">
        <!--Navbar Brand-->
        <a href="index"> <div class="" style="width:70px; height:70px; border-radius:10%; background:url('/hcf.png'); background-size:cover;background-position: center; background-repeat: no-repeat; "></a>

        </div>
      </div>
    </fieldset>
    <fieldset>
      <div class="form-group">
        <div class="input-group input-group-sm"><span class="input-group-prepend"><span class="input-group-text input-group-addon-inverse"><span class="novi-icon mdi mdi-account-outline"></span></span></span>
          <input class="form-control"  placeholder="First Name" type="text" name="firstname" required>
        </div>
      </div>
      <div class="form-group">
        <div class="input-group input-group-sm"><span class="input-group-prepend"><span class="input-group-text input-group-addon-inverse"><span class="novi-icon mdi mdi-account-outline"></span></span></span>
          <input class="form-control"  placeholder="Surname" type="text" name="lastname" required>
        </div>
      </div>
      <div class="form-group">
        <div class="input-group input-group-sm"><span class="input-group-prepend"><span class="input-group-text input-group-addon-inverse"><span class="novi-icon mdi mdi-account-outline"></span></span></span>
          <input class="form-control"  placeholder="Residential Address" type="text" name="address" required>
        </div>
      </div>
      <div class="form-group">
        <div class="input-group input-group-sm"><span class="input-group-prepend"><span class="input-group-text input-group-addon-inverse"><span class="novi-icon mdi mdi-account-outline"></span></span></span>
          <input class="form-control"  placeholder="Name of School" type="text" name="school" required>
        </div>
      </div>
      <div class="form-group">
        <div class="input-group input-group-sm"><span class="input-group-prepend"><span class="input-group-text input-group-addon-inverse"><span class="novi-icon mdi mdi-account-outline"></span></span></span>
          <input class="form-control"  placeholder="Class" type="text" name="class" required>
        </div>
      </div>
      <div class="form-group">
        <div class="input-group input-group-sm"><span class="input-group-prepend"><span class="input-group-text input-group-addon-inverse"><span class="novi-icon mdi mdi-account-outline"></span></span></span>
          <!-- <input class="form-control"  placeholder="Parent/Guardian Phone Number" type="text" name="pphonenumber" required> -->
          <textarea name="subject" class="form-control"  placeholder="Subjects Interested" rows="8" cols="80"></textarea>
        </div>
      </div>
      <div class="form-group">
        <div class="input-group input-group-sm"><span class="input-group-prepend"><span class="input-group-text input-group-addon-inverse"><span class="novi-icon mdi mdi-account-outline"></span></span></span>
          <input class="form-control"  placeholder="Phone Number" type="text" name="phonenumber" required>
        </div>
      </div>
      <div class="form-group">
        <div class="input-group input-group-sm"><span class="input-group-prepend"><span class="input-group-text input-group-addon-inverse"><span class="novi-icon mdi mdi-account-outline"></span></span></span>
          <input class="form-control"  placeholder="Parent/Guardian Phone Number" type="text" name="pphonenumber" required>
        </div>
      </div>
    </fieldset>



      <!-- <input type="submit" name="register" value="Sign Up"> -->
    <button name="submit" type="submit">Sign Up</button>
  </form>

</body>
</html>
