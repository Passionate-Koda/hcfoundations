
<!DOCTYPE html>
<html class="wide wow-animation scrollTo" lang="en">
  <head>
   <?php

   ######### $VARIABLES DEPENDENSIES #######
$site_name = "Hathany Cosmos Foundations";
$description = "Ngo";
$metakeys = "Hathany Cosmos Foundations, Teen, Teen Girls, Ngo, rescue, humanitarian";
$logo_directory = "hcf.png";
$fbid = "1997778733624506";
if(isset($page_name)){
if($page_name == "home"){
  include 'seo/home_meta.php';
}elseif ($page_name == "event") {
  include 'seo/event_meta.php';
}elseif ($page_name == "training") {
  include 'seo/training_meta.php';
}elseif ($page_name == "contact") {
  include 'seo/contact_meta.php';
}elseif ($page_name == "project") {
    include 'seo/project_meta.php';
}elseif ($page_name == "blog") {
  include 'seo/blog_meta.php';
}else{
  include 'seo/others_meta.php';
}
}else{
  include 'seo/others_meta.php';
}
include 'seo/fb_head.php';

   ?>

    <script src="../cdn-cgi/apps/head/3ts2ksMwXvKRuG480KNifJ2_JNM.js"></script><link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Montserrat:400,700%7CLato:300,300italic,400,700,900%7CYesteryear">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="slider/assets/extras/animate.css" type="text/css">
 <link rel="stylesheet" href="slider/assets/extras/owl.carousel.css" type="text/css">
 <link rel="stylesheet" href="slider/assets/extras/owl.theme.css" type="text/css">
 <link rel="stylesheet" href="slider/assets/extras/settings.css" type="text/css">
<?php if (isset($new_page)): ?>
  <link rel="stylesheet" href="/ken/asset/css/style.css">
  <!-- <link rel="stylesheet" href="/ken/asset/css/fontawesome-min.css"> -->
  <!-- <link rel="stylesheet" href="/ken/asset/css/bootstrap.min.css"> -->
  <!-- <link rel="stylesheet" href="/ken/asset/css/xsIcon.css"> -->
  <!-- <link rel="stylesheet" href="/ken/asset/css/iconmoon.css"> -->
  <!-- <link rel="stylesheet" href="/ken/asset/css/isotope.css"> -->
  <link rel="stylesheet" href="/ken/asset/css/magnific-popup.css">
  <link rel="stylesheet" href="/ken/asset/css/owl.carousel.min.css">
  <link rel="stylesheet" href="/ken/asset/css/owl.theme.default.min.css">
  <link rel="stylesheet" href="/ken/asset/css/navigation.css">
  <link rel="stylesheet" href="/ken/asset/css/animate.css">

<?php endif; ?>
 <link rel="stylesheet" href="slider/assets/css/responsive.css" type="text/css">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
		<!--[if lt IE 10]>
    <div style="background: #212121; padding: 10px 0; box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3); clear: both; text-align:center; position: relative; z-index:1;"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img src="images/ie8-panel/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>
    <script src="js/html5shiv.min.js"></script>
		<![endif]-->

    <style media="screen">
      body { padding-right: 0 !important }
      .modal-open {
    padding-right: 0px !important;
}
.modal-backdrop {
   z-index: 100000 !important;
 }

 .modal {
   z-index: 100001 !important;
 }
    </style>
  </head>
  <body style="overflow: visible;">
    <div class="page-loader page-loader-variant-1">
      <div><img class='img-fluid' style='margin-top: -20px;margin-left: -18px;' width='330' height='67' src='images/intense/logo-big.png' alt=''/>
        <div class="offset-top-41 text-center">
          <div class="spinner"></div>
        </div>
      </div>
    </div>
    <div class="page text-center">
      <!-- Page Head-->
      <header style="padding:0px;" class="section page-head slider-menu-position">
        <!-- RD Navbar Transparent-->
        <div class="rd-navbar-wrap">
<nav class="rd-navbar rd-navbar-default rd-navbar-transparent" data-md-device-layout="rd-navbar-fixed" data-lg-device-layout="rd-navbar-static" data-lg-auto-height="true" data-md-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-stick-up="true">
            <div class="rd-navbar-inner">
              <!-- RD Navbar Panel-->
              <div class="rd-navbar-panel">
                <!-- RD Navbar Toggle-->
                <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar, .rd-navbar-nav-wrap"><span></span></button>
                <!--Navbar Brand-->
                <div class="rd-navbar-brand"><a href="index"> <div class="" style="width:50px; height:50px; border-radius:10%; background:url('/hcf.png'); background-size:cover;background-position: center; background-repeat: no-repeat; ">

                </div> </a></div>
              </div>
              <div class="rd-navbar-menu-wrap">
                <div class="rd-navbar-nav-wrap">
                  <div class="rd-navbar-mobile-scroll">
                    <!--Navbar Brand Mobile-->
                    <div class="rd-navbar-mobile-brand"><a href="index"><div class="" style="width:50px; height:50px; border-radius:10%; background:url('/hcf.png'); background-size:cover;background-position: center; background-repeat: no-repeat; ">

                </div></a></div>

                    <!-- RD Navbar Nav-->
                    <ul class="rd-navbar-nav">
                      <li><a href="home">Home</a>

                      </li>
                      <!-- <li>
                          <a href="services">Our Services</a>

                      </li> -->
                      <li><a href="/project">Projects</a></li>
                      <li><a href="/event">Events</a></li>
                      <li><a href="/blog">Blog</a>

                      </li>
                      <li><a href="/about">About us</a></li>
                      <li><a href="/team">Our Team</a></li>
                      <li>
                          <a href="/contact">Contact</a>

                      </li>
                      <li>
                          <a href="/members">Join Us</a>
                      </li>
                      <li>
                          <a href="https://rave.flutterwave.com/donate/tyhiatnsbdkt">Donate</a>

                      </li>
                      <li>
                        <ul class="list-inline">
                          <li class="list-inline-item"><a class="icon novi-icon fa fa-facebook icon-xxs icon-circle " href="https://www.facebook.com/groups/242943766202165"></a></li>
                          <li class="list-inline-item"><a class="icon novi-icon fa fa-twitter icon-xxs icon-circle " href="https://twitter.com/kimteyg"></a></li>
                          <li class="list-inline-item"><a class="icon novi-icon fa fa-instagram icon-xxs icon-circle " href="https://instagram.com/kimteyg"></a></li>
                          <!-- <li class="list-inline-item"><a class="icon novi-icon fa fa-linkedin icon-xxs icon-circle icon-darkest-filled" href="#"></a></li> -->
                        </ul>
                      </li>

                    </ul>

                  </div>
                </div>
                <!--RD Navbar Search-->
                <!-- <div class="rd-navbar-search"><a class="rd-navbar-search-toggle mdi" data-rd-navbar-toggle=".rd-navbar-inner,.rd-navbar-search" href="#"><span></span></a>
                  <form class="rd-navbar-search-form search-form-icon-right rd-search" action="https://livedemo00.template-help.com/wt_58888_v14/search-results.html" method="GET">
                    <div class="form-group">
                      <label class="form-label" for="rd-navbar-search-form-control">Type and hit enter...</label>
                      <input class="rd-navbar-search-form-control form-control form-control-gray-lightest" id="rd-navbar-search-form-control" type="text" name="s" autocomplete="off"/>
                    </div>
                  </form>
                </div> -->
                <!--RD Navbar shop-->


              </div>
            </div>
          </nav>
        </div>
