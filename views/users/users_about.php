<?php
ob_start();
$page_title = "About";
$page_name = "anything";
include "includes/header.php";

 $ab = selectContent($conn,'panel_about',[]);

 ?>
 <div class="clearfix">

 </div>
 <div class="" style="width:100%; height:15vh; background-color:#191919" data-loop="true" data-autoplay="true" data-height="100vh" data-dragable="false" data-min-height="480px">
 </div>

</header>
     <!-- Classic Breadcrumbs-->
     <section class="section novi-background breadcrumb-classic">
       <div class="container section-34 section-sm-50">
         <div class="row align-items-xl-center">
           <div class="col-xl-5 d-none d-xl-block text-xl-left">
             <h2><span class="big">About Us</span></h2>
           </div>
           <div class="col-xl-2 d-none d-md-block"><span class="icon icon-white icon-lg mdi mdi-account-multiple"></span></div>
           <div class="offset-top-0 offset-md-top-10 col-xl-5 offset-xl-top-0 small text-xl-right">
             <ul class="list-inline list-inline-dashed p">
               <li class="list-inline-item"><a href="index">Home</a></li>

               <li class="list-inline-item">About Us
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
     <!-- About Us-->
     <section class="section novi-background section-98 section-sm-110">
       <div class="container">
         <div class="row justify-content-sm-center">
              <div class="col-sm-10 col-xl-8 offset-top-50 offset-xl-top-0"><img class="img-fluid d-inline-block offset-top-10" src="/image/1.jpg" width="960" height="540" alt=""></div>
              <br>


           <div class="col-sm-10 col-xl-8 text-lg-left inset-lg-right-80 mx-auto">
<?php echo $ab['text_body'] ?>

           </div>


         </div>
       </div>
     </section>
     <!-- Why Choose Us-->

     <!-- Our Team-->
     <!-- <section class="section novi-background section-98 section-sm-110">
       <div class="container">
         <h1>Our Team</h1>
         <hr class="divider bg-mantis">
         <div class="row justify-content-sm-center text-center text-lg-left offset-top-66">
           <div class="col-md-5 col-lg-3"><img class="img-fluid d-inline-block" src="images/users/user-alex-merphy-270x270.jpg" width="270" height="270" alt="">
             <div class="text-lg-left offset-top-20">
               <div>
                 <h5 class="font-weight-bold text-primary"><a href="team-member.html">Alex Merphy</a></h5>
               </div>
             </div>
             <address class="contact-info text-lg-left">
               <ul class="list-unstyled p">
                 <li class="d-block"><span class="icon novi-icon icon-xxs mdi mdi-phone text-middle"></span> <a class="d-inline-block text-middle" href="tel:1-800-7650-986">1-800-7650-986</a>
                 </li>
                 <li class="d-block"><span class="icon novi-icon icon-xxs mdi mdi-email-open text-middle"></span> <a class="d-inline-block text-middle" href="https://livedemo00.template-help.com/cdn-cgi/l/email-protection#a5c4c9c0dde5c1c0c8cac9cccbce8bcad7c2"><span class="__cf_email__" data-cfemail="6d0c0108152d090800020104030643021f0a">[email&#160;protected]</span></a>
                 </li>
               </ul>
             </address>
           </div>
           <div class="col-md-5 col-lg-3 offset-top-50 offset-md-top-0"><img class="img-fluid d-inline-block" src="images/users/user-amanda-smith-270x270.jpg" width="270" height="270" alt="">
             <div class="text-lg-left offset-top-20">
               <div>
                 <h5 class="font-weight-bold text-primary"><a href="team-member.html">Amanda Smith</a></h5>
               </div>
             </div>
             <address class="contact-info text-lg-left">
               <ul class="list-unstyled p">
                 <li class="d-block"><span class="icon novi-icon icon-xxs mdi mdi-phone text-middle"></span> <a class="d-inline-block text-middle" href="tel:1-800-7650-986">1-800-7650-986</a>
                 </li>
                 <li class="d-block"><span class="icon novi-icon icon-xxs mdi mdi-email-open text-middle"></span> <a class="d-inline-block text-middle" href="https://livedemo00.template-help.com/cdn-cgi/l/email-protection#badbd7dbd4dedbfadedfd7d5d6d3d4d194d5c8dd"><span class="__cf_email__" data-cfemail="28494549464c49684c4d45474441464306475a4f">[email&#160;protected]</span></a>
                 </li>
               </ul>
             </address>
           </div>
           <div class="col-md-5 col-lg-3 offset-top-50 offset-lg-top-0"><img class="img-fluid d-inline-block" src="images/users/user-bernard-show-270x270.jpg" width="270" height="270" alt="">
             <div class="text-lg-left offset-top-20">
               <div>
                 <h5 class="font-weight-bold text-primary"><a href="team-member.html">Bernard Show</a></h5>
               </div>
             </div>
             <address class="contact-info text-lg-left">
               <ul class="list-unstyled p">
                 <li class="d-block"><span class="icon novi-icon icon-xxs mdi mdi-phone text-middle"></span> <a class="d-inline-block text-middle" href="tel:1-800-7650-986">1-800-7650-986</a>
                 </li>
                 <li class="d-block"><span class="icon novi-icon icon-xxs mdi mdi-email-open text-middle"></span> <a class="d-inline-block text-middle" href="https://livedemo00.template-help.com/cdn-cgi/l/email-protection#533136213d3221371337363e3c3f3a3d387d3c2134"><span class="__cf_email__" data-cfemail="147671667a756670547071797b787d7a7f3a7b6673">[email&#160;protected]</span></a>
                 </li>
               </ul>
             </address>
           </div>
           <div class="col-md-5 col-lg-3 offset-top-50 offset-lg-top-0"><img class="img-fluid d-inline-block" src="images/users/user-diana-russo-270x270.jpg" width="270" height="270" alt="">
             <div class="text-lg-left offset-top-20">
               <div>
                 <h5 class="font-weight-bold text-primary"><a href="team-member.html">Diana Russo</a></h5>
               </div>
             </div>
             <address class="contact-info text-lg-left">
               <ul class="list-unstyled p">
                 <li><span class="icon novi-icon icon-xxs mdi mdi-phone text-middle"></span> <a class="d-inline-block text-middle" href="tel:1-800-7650-986">1-800-7650-986</a>
                 </li>
                 <li><span class="icon novi-icon icon-xxs mdi mdi-email-open text-middle"></span> <a class="d-inline-block text-middle" href="https://livedemo00.template-help.com/cdn-cgi/l/email-protection#b2d6dbd3dcd3f2d6d7dfdddedbdcd99cddc0d5"><span class="__cf_email__" data-cfemail="5d39343c333c1d393830323134333673322f3a">[email&#160;protected]</span></a>
                 </li>
               </ul>
             </address>
           </div>
           <div class="col-md-5 col-lg-3 offset-top-50"><img class="img-fluid d-inline-block" src="images/users/user-eugene-newman-270x270.jpg" width="270" height="270" alt="">
             <div class="text-lg-left offset-top-20">
               <div>
                 <h5 class="font-weight-bold text-primary"><a href="team-member.html">Eugene Newman</a></h5>
               </div>
             </div>
             <address class="contact-info text-lg-left">
               <ul class="list-unstyled p">
                 <li class="d-block"><span class="icon novi-icon icon-xxs mdi mdi-phone text-middle"></span> <a class="d-inline-block text-middle" href="tel:1-800-7650-986">1-800-7650-986</a>
                 </li>
                 <li class="d-block"><span class="icon novi-icon icon-xxs mdi mdi-email-open text-middle"></span> <a class="d-inline-block text-middle" href="https://livedemo00.template-help.com/cdn-cgi/l/email-protection#01647466646f644165646c6e6d686f6a2f6e7366"><span class="__cf_email__" data-cfemail="3e5b4b595b505b7e5a5b53515257505510514c59">[email&#160;protected]</span></a>
                 </li>
               </ul>
             </address>
           </div>
           <div class="col-md-5 col-lg-3 offset-top-50"><img class="img-fluid d-inline-block" src="images/users/user-john-doe-270x270.jpg" width="270" height="270" alt="">
             <div class="text-lg-left offset-top-20">
               <div>
                 <h5 class="font-weight-bold text-primary"><a href="team-member.html">John Doe</a></h5>
               </div>
             </div>
             <address class="contact-info text-lg-left">
               <ul class="list-unstyled p">
                 <li class="d-block"><span class="icon novi-icon icon-xxs mdi mdi-phone text-middle"></span> <a class="d-inline-block text-middle" href="tel:1-800-7650-986">1-800-7650-986</a>
                 </li>
                 <li class="d-block"><span class="icon novi-icon icon-xxs mdi mdi-email-open text-middle"></span> <a class="d-inline-block text-middle" href="https://livedemo00.template-help.com/cdn-cgi/l/email-protection#5d373235331d393830323134333673322f3a"><span class="__cf_email__" data-cfemail="a1cbcec9cfe1c5c4cccecdc8cfca8fced3c6">[email&#160;protected]</span></a>
                 </li>
               </ul>
             </address>
           </div>
           <div class="col-md-5 col-lg-3 offset-top-50"><img class="img-fluid d-inline-block" src="images/users/user-sam-cole.jpg" width="270" height="270" alt="">
             <div class="text-lg-left offset-top-20">
               <div>
                 <h5 class="font-weight-bold text-primary"><a href="team-member.html">Sam Cole</a></h5>
               </div>
             </div>
             <address class="contact-info text-lg-left">
               <ul class="list-unstyled p">
                 <li class="d-block"><span class="icon novi-icon icon-xxs mdi mdi-phone text-middle"></span> <a class="d-inline-block text-middle" href="tel:1-800-7650-986">1-800-7650-986</a>
                 </li>
                 <li class="d-block"><span class="icon novi-icon icon-xxs mdi mdi-email-open text-middle"></span> <a class="d-inline-block text-middle" href="https://livedemo00.template-help.com/cdn-cgi/l/email-protection#7003111d3014151d1f1c191e1b5e1f0217"><span class="__cf_email__" data-cfemail="a3d0c2cee3c7c6cecccfcacdc88dccd1c4">[email&#160;protected]</span></a>
                 </li>
               </ul>
             </address>
           </div>
           <div class="col-md-5 col-lg-3 offset-top-50"><img class="img-fluid d-inline-block" src="images/users/user-july-mao-270x270.jpg" width="270" height="270" alt="">
             <div class="text-lg-left offset-top-20">
               <div>
                 <h5 class="font-weight-bold text-primary"><a href="team-member.html">July Mao</a></h5>
               </div>
             </div>
             <address class="contact-info text-lg-left">
               <ul class="list-unstyled p">
                 <li><span class="icon novi-icon icon-xxs mdi mdi-phone text-middle"></span> <a class="d-inline-block text-middle" href="tel:1-800-7650-986">1-800-7650-986</a>
                 </li>
                 <li><span class="icon novi-icon icon-xxs mdi mdi-email-open text-middle"></span> <a class="d-inline-block text-middle" href="https://livedemo00.template-help.com/cdn-cgi/l/email-protection#c0aab5acb980a4a5adafaca9aeabeeafb2a7"><span class="__cf_email__" data-cfemail="49233c2530092d2c24262520272267263b2e">[email&#160;protected]</span></a>
                 </li>
               </ul>
             </address>
           </div>
         </div>
       </div>
     </section> -->
     <!-- Your Career Starts Here-->

     <!-- Join Our Team-->
           <!-- <section class="section parallax-container" data-parallax-img="images/backgrounds/background-04-1920x657.jpg">
             <div class="parallax-content section-66 context-dark bg-overlay-gray-darkest context-dark">
               <div class="container">
                 <h1>Join Our Team</h1>
                 <hr class="divider bg-default">
                 <div class="row justify-content-sm-center">
                   <div class="col-sm-10 col-sm-8">
                     <div>
                       <p>Take a job opportunity of a lifetime – join the team of Intense. We cherish active tech savvies willing to work on projects of any type and complexity. If you are enthusiastic about tech innovations and ready to make impactful decisions, feel free to send us your CV. We are interested in hiring professionals for a long term and also provide an opportunity of remote work.</p>
                     </div>
                     <div class="offset-top-30"><a class="btn btn-icon btn-icon-left btn-default" href="contact-us.html"><span class="novi-icon icon mdi-email-outline mdi"></span><span>Send us a letter</span></a></div>
                   </div>
                 </div>
               </div>
             </div>
           </section> -->

     <!-- Page Footers-->
     <!-- Default footer-->
<?php include 'includes/footer.php'; ?>
   </div>
   <!-- Global RD Mailform Output -->
   <div class="snackbars" id="form-output-global"></div>
   <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="js/core.min.js"></script>
   <script src="js/script.js"></script>
 </body><!-- Google Tag Manager --><noscript><iframe src="http://www.googletagmanager.com/ns.html?id=GTM-P9FT69"height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript><script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='../../www.googletagmanager.com/gtm5445.html?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-P9FT69');</script><!-- End Google Tag Manager -->
</html>
