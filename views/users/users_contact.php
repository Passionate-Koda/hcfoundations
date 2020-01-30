<!--breadcumb start here-->
<?php
$page_name = "anything";
$page_title = "Contact Us";
 include "includes/header.php";
 if(array_key_exists("submit", $_POST)){
   $email = $_POST['email'];
   $name = $_POST['name'];
   $message = $_POST['comment'];

   $to = "KIMTEYGhandle@gmail.com";
   $subject = "Message From $name to Hathany Cosmos Foundations";
   $txt = $message. "<hr>the email to this message is $email";
   $headers = "From: $email" . "\r\n" .
   "CC: banjimayowa@gmail.com";
mail($to,$subject,$txt,$headers);
   if(mail($to,$subject,$txt,$headers)){
$message = [];
$message['success'] = "Message Sent Succesfully";
}else{
$message = [];
$message['success'] = "Message cannot be sent at this moment";
}
 }
 ?>
 <div class="clearfix">

 </div>
         <div class="" style="width:100%; height:20vh; background-color:#191919" data-loop="true" data-autoplay="true" data-height="100vh" data-dragable="false" data-min-height="480px">
         </div>

</header>
      <!-- Classic Breadcrumbs-->
      <section class="section novi-background breadcrumb-classic">
        <div class="container section-34 section-sm-50">
          <div class="row align-items-xl-center">
            <div class="col-xl-5 d-none d-xl-block text-xl-left">
              <h2><span class="big">Contact Us</span></h2>
            </div>
            <div class="col-xl-2 d-none d-md-block"><span class="icon icon-white mdi mdi-map-marker-circle"></span></div>
            <div class="offset-top-0 offset-md-top-10 col-xl-5 offset-xl-top-0 small text-xl-right">
              <ul class="list-inline list-inline-dashed p">
                <li class="list-inline-item"><a href="index">Home</a></li>

                <li class="list-inline-item">Contact Us
                </li>
              </ul>
            </div>
          </div>
        </div>
        <svg class="svg-triangle-bottom" xmlns="http://www.w3.org/2000/svg" version="1.1">
          <defs>
            <lineargradient id="grad1" x1="0%" y1="0%" x2="100%" y2="0%">
              <stop offset="0%" style="stop-color:rgb(110,192,161);stop-opacity:1"></stop>
              <stop offset="100%" style="stop-color:rgb(111,193,156);stop-opacity:1"></stop>
            </lineargradient>
          </defs>
          <polyline points="0,0 60,0 29,29" fill="url(#grad1)"></polyline>
        </svg>
      </section>
      <!--Section Contact Info-->
      <section class="section novi-background bg-lighter section-66">
        <div class="container-fluid">
          <div class="row justify-content-sm-center text-md-left">
            <div class="col-sm-10 col-md-8 col-lg-12">
              <div class="row justify-content-sm-center">
                <div class="col-sm-6 col-lg-3 col-xxl-2">
                  <div class="unit unit-spacing-xs unit-sm flex-md-row">
                    <div class="unit-left"><span class="novi-icon icon icon-xs mdi mdi-phone text-primary" style="font-size: 26px"></span></div>
                    <div class="unit-body">
                      <h6>Phone</h6>
                      <div class="p"><a class="d-block" href="tel:+2348075354045">Hotline: +2348075354045</a></div>
                      <div class="p"><a class="d-block" href="tel:+2348163080680">Whatsapp Only: +2348163080680</a></div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-lg-3 col-xxl-2 offset-top-50 offset-sm-top-0">
                  <div class="unit unit-spacing-xs unit-sm flex-md-row">
                    <div class="unit-left"><span class="novi-icon icon icon-xs mdi mdi-email-open text-primary" style="font-size: 26px"></span></div>
                    <div class="unit-body">
                      <h6>E-mail</h6>
                      <div class="p"><a class="d-block" href="info@hcfoundations.com"><span class="__cf_email__" data-cfemail="365f5850597652535b595a5f585d18594451">kimteyg@gmail.com</span></a></div>
                      <div class="p"><a class="d-block" href="mailto:mail@hcfoundations.com"><span class="__cf_email__" data-cfemail="365f5850597652535b595a5f585d18594451">info@hcfoundations.com</span></a></div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-lg-3 col-xxl-2 offset-top-50 offset-lg-top-0">
                  <div class="unit unit-spacing-xs unit-sm flex-md-row">
                    <div class="unit-left"><span class="novi-icon icon icon-xs mdi mdi-map text-primary" style="font-size: 26px"></span></div>
                    <div class="unit-body">
                      <h6>Address</h6>
                      <address class="contact-info">11/13 simbi street, Sogunle, oshodi</address>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-lg-3 col-xxl-2 offset-top-50 offset-lg-top-0">
                  <div class="unit unit-spacing-xs unit-sm flex-md-row">
                    <div class="unit-left"><span class="novi-icon icon icon-xs mdi mdi-timelapse text-primary" style="font-size: 26px"></span></div>
                    <div class="unit-body">
                      <h6>Open Hours</h6>
                      <div>
                        <p>8:00AM – 5:00PM Mon – Fri</p>
                      </div>
                      <p class="offset-top-0">9:00AM – 4:00PM Sat</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!--Section Get In Touch-->
      <section class="section novi-background section-98 section-sm-110">
        <div class="container">
          <h2 class="font-weight-bold">Get In Touch</h2>
          <hr class="divider bg-mantis">
          <div class="offset-md-top-66">
            <div class="row justify-content-sm-center">
              <div class="col-sm-10 col-lg-8">
                <!-- RD Mailform-->
                <form class="rd-mailform text-left" data-form-output="form-output-global" data-form-type="contact" method="post" action="">
                  <div class="row justify-content-sm-center">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-label" for="git-3-mailform-first-name">First name</label>
                        <input class="form-control bg-default" id="git-3-mailform-first-name" type="text" name="firstname" data-constraints="@Required">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-label" for="git-3-mailform-last-name">Last name</label>
                        <input class="form-control bg-default" id="git-3-mailform-last-name" type="text" name="lastname" data-constraints="@Required">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group offset-md-top-30">
                        <label class="form-label" for="git-3-mailform-phone">Phone</label>
                        <input class="form-control bg-default" id="git-3-mailform-phone" type="text" name="phone" data-constraints="@Required">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group offset-md-top-30">
                        <label class="form-label" for="git-3-mailform-email">E-mail</label>
                        <input class="form-control bg-default" id="git-3-mailform-email" type="text" name="email" data-constraints="@Required @Email">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group offset-md-top-30">
                        <label class="form-label" for="git-3-mailform-message">Message</label>
                        <textarea class="form-control bg-default" id="git-3-mailform-message" name="message" data-constraints="@Required"></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="offset-top-24 text-center">
                    <button class="btn btn-primary" type="submit">send message</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Page Footer-->
      <!-- Default footer-->
    <?php include 'includes/footer.php'; ?>
    </div>
    <!-- Global RD Mailform Output -->
    <div class="snackbars" id="form-output-global"></div>
    <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="js/core.min.js"></script>
    <script src="js/script.js"></script>
  </body><!-- Google Tag Manager --><noscript><iframe src="http://www.googletagmanager.com/ns.html?id=GTM-P9FT69"height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript><script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='../../www.googletagmanager.com/gtm5445.html?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-P9FT69');</script><!-- End Google Tag Manager -->
</html>
