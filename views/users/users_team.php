<!--breadcumb start here-->
<?php
$page_name = "anything";
$page_title = "Our Team";
$new_page = true;
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
              <h2><span class="big">Our Team</span></h2>
            </div>
            <div class="col-xl-2 d-none d-md-block"><span class="icon icon-white mdi  mdi-account-multiple"></span></div>
            <div class="offset-top-0 offset-md-top-10 col-xl-5 offset-xl-top-0 small text-xl-right">
              <ul class="list-inline list-inline-dashed p">
                <li class="list-inline-item"><a href="index">Home</a></li>

                <li class="list-inline-item">Our Team
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
      <section class="team-v1-sec section-padding section-bg-v2">
          <div class="container">
              <div class="row">
                  <div class="col-lg-4 align-self-center">
                      <div class="single-team-content">
                          <h2 class="column-title column-title2">Our <br>Expert Team</h2>
                          <a href="/contact" class="xs-btn">CONTACT US</a>
                      </div>
                  </div><!-- .col end -->
                  <div class="col-lg-8">
                      <div class="row">
                        <?php $team = selectContent($conn,"panel_our_team",[]); ?>
                        <?php foreach ($team as $key => $value): ?>
                          <div class="col-md-4">
                              <div class="single-team-item">
                                  <img src="/<?php echo $value['image_1']; ?>" alt="">
                                  <div class="single-team-cont">
                                      <h3><?php echo $value['input_name']; ?></h3>
                                      <p><?php echo $value['input_position']; ?></p>
                                      <div class="team-social">
                                          <a href="mailto:<?php echo $value['input_email'] ?>"><i class="fa fa-envelope"></i></a>
                                          <a href="tel:<?php echo $value['input_phone_number']; ?>"><i class="fa fa-phone"></i></a>

                                      </div>
                                  </div>
                              </div>
                          </div>
                        <?php endforeach; ?>


                      </div>
                  </div>
              </div><!-- .row end -->
          </div><!-- .container end -->
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
    <script src="/ken/asset/js/jquery-3.2.1.min.js"></script>
    <script src="/ken/asset/js/bootstrap.min.js"></script>
    <script src="/ken/asset/js/jquery-mixtub.js"></script>
    <script src="/ken/asset/js/jquery.magnific-popup.min.js"></script>
    <script src="/ken/asset/js/owl.carousel.min.js"></script>
    <script src="/ken/asset/js/navigation.js"></script>
    <script src="/ken/asset/js/jquery.appear.min.js"></script>
    <script src="/ken/asset/js/isotope.js"></script>
    <script src="/ken/asset/js/wow.min.js"></script>
    <script src="/ken/asset/js/main.js"></script>
    </div>
    <!-- Global RD Mailform Output -->
    <div class="snackbars" id="form-output-global"></div>
    <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="js/core.min.js"></script>
    <script src="js/script.js"></script>
  </body><!-- Google Tag Manager --><noscript><iframe src="http://www.googletagmanager.com/ns.html?id=GTM-P9FT69"height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript><script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='../../www.googletagmanager.com/gtm5445.html?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-P9FT69');</script><!-- End Google Tag Manager -->
</html>
