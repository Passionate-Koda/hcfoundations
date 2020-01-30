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
    <title>Hathany Cosmos Foundations Registration</title>
    <meta name="format-detection" content="telephone=no"/>
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <script src="../cdn-cgi/apps/head/3ts2ksMwXvKRuG480KNifJ2_JNM.js"></script><link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Montserrat:400,700%7CLato:300,300italic,400,700,900%7CYesteryear">
    <link rel="stylesheet" href="css/style.css">
		<!--[if lt IE 10]>
    <div style="background: #212121; padding: 10px 0; box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3); clear: both; text-align:center; position: relative; z-index:1;"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img src="images/ie8-panel/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>
    <script src="js/html5shiv.min.js"></script>
		<![endif]-->
  </head>
  <body>
    <div class="page-loader page-loader-variant-1">
      <div><img class='img-fluid' style='margin-top: -20px;margin-left: -18px;' width='330' height='67' src='images/intense/logo-big.png' alt=''/>
        <div class="offset-top-41 text-center">
          <div class="spinner"></div>
        </div>
      </div>
    </div>
    <div class="page text-center">
      <section class="section novi-background one-page bg-shark-radio">
        <div class="one-page-header">
          <!--Navbar Brand-->
          <a href="index"> <div class="" style="width:70px; height:70px; border-radius:10%; background:url('/hcf.png'); background-size:cover;background-position: center; background-repeat: no-repeat; "></a>

          </div>
        </div>
        <!-- <div class="rd-navbar-brand"><a href="index"> <div class="" style="width:50px; height:50px; border-radius:10%; background:url('/hcf.png'); background-size:cover;background-position: center; background-repeat: no-repeat; ">

        </div> </a></div> -->
        <!-- Register-->
        <section>
          <div class="container">
            <div class="section-110 section-cover row justify-content-sm-center align-items-sm-center">

              <div class="col-sm-8 col-md-6 col-lg-4">
                <div class="card section-34 section-sm-41 inset-left-20 inset-right-20 inset-md-left-20 inset-md-right-20 inset-xl-left-30 inset-xl-right-30 bg-default shadow-drop-md">
                  <?php if(isset($msg['done'])){ ?>
                  <div class="well" style="width:100%; background-color:white; border:2px solid purple; padding:15px">
                    <?php echo $msg['done'] ?>
                  </div>
                <?php } ?>
                  <div class="text-center">
                            <!-- Icon Box Type 4--><span class="icon novi-icon icon-circle icon-bordered icon-lg icon-default mdi mdi-account-multiple-outline"></span>
                            <div>
                              <div class="offset-top-24 text-darker big font-weight-bold">Register for Hathany Cosmos Foundations Tutorial</div>
                              <p class="text-extra-small text-dark offset-top-4">All fields are required</p>
                            </div>
                  </div>
                  <!-- RD Mailform-->
                  <form class="text-left offset-top-30" action="" method="post">
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


                    <input class="btn btn-xs btn-icon btn-block btn-primary offset-top-20" type="submit" name="submit" value="Register">
                  </form>
                </div>
              </div>
            </div>
          </div>
        </section>
        <div class="container offset-top-50">
          <p class="small text-darker">KIMTEYG &copy; <span class="copyright-year"></span> Designed by <a href="https://mckodev.com.ng"><span>Mckodev</span></a> . <a href="#">Privacy Policy</a></p>
        </div>
      </section>
    </div>
    <!-- Global RD Mailform Output -->
    <div class="snackbars" id="form-output-global"></div>
    <script src="js/core.min.js"></script>
    <script src="js/script.js"></script>
  </body><!-- Google Tag Manager --><noscript><iframe src="http://www.googletagmanager.com/ns.html?id=GTM-P9FT69"height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript><script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='../../www.googletagmanager.com/gtm5445.html?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-P9FT69');</script><!-- End Google Tag Manager -->
</html>
