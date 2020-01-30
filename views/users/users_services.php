<?php

ob_start();
header("Location:index");
$page_title = "Services";
$page_name = "anything";
include "includes/header.php";
$services =  getServices($conn);
$service =  getFirstServices($conn);

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
                   <h2><span class="big">Services</span></h2>
                 </div>
                 <div class="col-xl-2 d-none d-md-block"><span class="icon icon-white mdi mdi-folder-outline"></span></div>
                 <div class="offset-top-0 offset-md-top-10 col-xl-5 offset-xl-top-0 small text-xl-right">
                   <ul class="list-inline list-inline-dashed p">
                     <li class="list-inline-item"><a href="index-2.html">Home</a></li>
                     <li class="list-inline-item"><a href="#">Pages</a></li>
                     <li class="list-inline-item">Services
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
           <!-- What we do-->
           <section class="section novi-background section-98 section-sm-110">
             <div class="container">
               <h1>What we do</h1>
               <hr class="divider bg-mantis">
               <p class="inset-left-11p inset-right-11p">We will take care of your web design project regardless of its level of complexity. We are not afraid of difficult tasks – hundreds of our satisfied clients can prove that.</p>
               <div class="row offset-top-66">
                    <?php foreach($services as $key => $value){ ?>
                 <div class="col-md-8 offset-md-2 col-lg-4 offset-lg-0">
                         <!-- Icon Box Type 4-->
                         <!-- <span class="icon novi-icon icon-circle icon-bordered icon-lg icon-default icon-filled mdi mdi-cellphone-link"></span> -->
                         <div>
                           <h4 class="font-weight-bold offset-top-20">Fully Responsive Design</h4>
                           <p>
                             Intense looks perfect on any modern device, be it a laptop, a smartphone, or a tablet.

                           </p>
                         </div>
                 </div>
                 <?php } ?>

               </div>
               <hr class="bg-lightest offset-top-66">
               <div class="row align-items-sm-center text-lg-left">
                 <div class="col-lg-6"><img class="img-fluid" src="images/moqups/moqup-home-both.jpg" width="570" height="368" alt=""></div>
                 <div class="col-lg-6">
                   <h1>Why choose us?</h1>
                   <hr class="divider bg-mantis hr-lg-left-0">
                   <p>We're dedicated to giving you the best service possible by keeping our solutions friendly, simple and effective. If you don’t trust our word for it, just ask the people who have successfully launched their websites designed by us.</p>
                   <p>Our core principle is absolute transparency in everything. Come any time to check how your project is doing – our specialists will inform you about the progress.</p><a class="btn btn-primary offset-top-14" href="about-us.html">Read More</a>
                 </div>
               </div>
             </div>
           </section>
           <section class="section novi-background shadow-drop-ambient">
             <div class="bg-overlay-white">
               <div class="container section-66">
                 <div class="row">
                   <div class="col-xl-4 text-xl-left">
                     <h3>Our Clients</h3>
                   </div>
                 </div>
                 <div class="row align-items-sm-center justify-content-sm-center offset-top-20">
                   <div class="col-xl-4 text-xl-left">
                     <p>Among our clients there are many world-renowned industry leaders. Their websites are modern looking and reliable – thanks to us.</p>
                     <!-- Custom Pagination-->
                     <div class="owl-custom-navigation owl-customer-navigation offset-top-14">
                       <div class="owl-nav">
                         <div class="owl-prev mdi mdi-chevron-left" data-owl-prev></div>
                         <div class="owl-next mdi mdi-chevron-right" data-owl-next></div>
                       </div>
                     </div>
                   </div>
                   <div class="col-xl-8 offset-top-41 offset-xl-top-0">
                           <!-- Customer Slider-->
                           <div class="owl-carousel owl-carousel-testimonials-2" data-mouse-drag="false" data-items="1" data-sm-items="2" data-md-items="3" data-lg-items="4" data-nav-custom=".owl-custom-navigation" data-dots="false" data-nav="false"><a href="clients.html"><img class="img-semi-transparent" src="images/clients/client-01-169x68.png" width="169" height="68" alt=""></a><a href="clients.html"><img class="img-semi-transparent" src="images/clients/client-02-126x68.png" width="126" height="68" alt=""></a><a href="clients.html"><img class="img-semi-transparent" src="images/clients/client-03-126x100.png" width="126" height="100" alt=""></a><a href="clients.html"><img class="img-semi-transparent" src="images/clients/client-04-95x101.png" width="95" height="101" alt=""></a><a href="clients.html"><img class="img-semi-transparent" src="images/clients/client-05-149x102.png" width="149" height="102" alt=""></a><a href="clients.html"><img class="img-semi-transparent" src="images/clients/client-06-141x88.png" width="141" height="88" alt=""></a>
                           </div>
                   </div>
                 </div>
               </div>
             </div>
           </section>
           <!-- Choose Your Plan-->
           <section class="section novi-background section-98 section-sm-110">
             <div class="container">
               <h1>Choose Your Plan</h1>
               <div class="divider bg-mantis"></div>
               <div class="row align-items-sm-end offset-top-41 justify-content-md-center">
                 <div class="col-lg-3">
                         <!-- Planning Box type 4-->
                         <div class="box-planning box-planning-type-4">
                           <div class="box-planning-header context-dark bg-mantis">
                             <div class="box-planning-label">
                               <p class="big font-weight-bold">Most Popular</p>
                             </div>
                             <h3>Free</h3>
                             <p class="h2 plan-price"><sup class="big">$</sup>59<sub class="text-white">/month</sub>
                             </p>
                           </div>
                           <div class="box-planning-body">
                             <ul class="list-separated list-unstyled">
                               <li><span class="font-weight-bold">1GB</span><span class="text-dark">Space amount</span></li>
                               <li><span class="font-weight-bold">5</span><span class="text-dark">users</span></li>
                               <li><span class="font-weight-bold">5GB</span><span class="text-dark">Bandwidth</span></li>
                               <li><span class="text-dark">No Support</span></li>
                               <li><span class="font-weight-bold">1</span><span class="text-dark">Databases</span></li>
                             </ul><a class="btn btn-block btn-default btn-rect" href="register.html">Sign up</a>
                           </div>
                         </div>
                 </div>
                 <div class="col-lg-3">
                         <!-- Planning Box type 4-->
                         <div class="box-planning box-planning-type-4">
                           <div class="box-planning-header context-dark bg-malibu">
                             <div class="box-planning-label">
                               <p class="big font-weight-bold">Most Popular</p>
                             </div>
                             <h3>Starter</h3>
                             <p class="h2 plan-price"><sup class="big">$</sup>59<sub class="text-white">/month</sub>
                             </p>
                           </div>
                           <div class="box-planning-body">
                             <ul class="list-separated list-unstyled">
                               <li><span class="font-weight-bold">5GB</span><span class="text-dark">Space amount</span></li>
                               <li><span class="font-weight-bold">20</span><span class="text-dark">users</span></li>
                               <li><span class="font-weight-bold">10GB</span><span class="text-dark">Bandwidth</span></li>
                               <li><span class="text-dark">No Support</span></li>
                               <li><span class="font-weight-bold">1</span><span class="text-dark">Databases</span></li>
                             </ul><a class="btn btn-block btn-default btn-rect" href="register.html">Sign up</a>
                           </div>
                         </div>
                 </div>
                 <div class="col-lg-3">
                         <!-- Planning Box type 4-->
                         <div class="box-planning box-planning-type-4 active">
                           <div class="box-planning-header context-dark bg-saffron">
                             <div class="box-planning-label">
                               <p class="big font-weight-bold">Most Popular</p>
                             </div>
                             <h3>Business</h3>
                             <p class="h2 plan-price"><sup class="big">$</sup>59<sub class="text-white">/month</sub>
                             </p>
                           </div>
                           <div class="box-planning-body">
                             <ul class="list-separated list-unstyled">
                               <li><span class="font-weight-bold">10GB</span><span class="text-dark">Space amount</span></li>
                               <li><span class="font-weight-bold">Unlimited</span><span class="text-dark">users</span></li>
                               <li><span class="font-weight-bold">30GB</span><span class="text-dark">Bandwidth</span></li>
                               <li><span class="text-dark">Free Support</span></li>
                               <li><span class="font-weight-bold">20</span><span class="text-dark">Databases</span></li>
                             </ul><a class="btn btn-block btn-default btn-rect" href="register.html">Sign up</a>
                           </div>
                         </div>
                 </div>
                 <div class="col-lg-3">
                         <!-- Planning Box type 4-->
                         <div class="box-planning box-planning-type-4">
                           <div class="box-planning-header context-dark bg-red">
                             <div class="box-planning-label">
                               <p class="big font-weight-bold">Most Popular</p>
                             </div>
                             <h3>Ultimate</h3>
                             <p class="h2 plan-price"><sup class="big">$</sup>59<sub class="text-white">/month</sub>
                             </p>
                           </div>
                           <div class="box-planning-body">
                             <ul class="list-separated list-unstyled">
                               <li><span class="font-weight-bold">100GB</span><span class="text-dark">Space amount</span></li>
                               <li><span class="font-weight-bold">Unlimited</span><span class="text-dark">users</span></li>
                               <li><span class="font-weight-bold">60GB</span><span class="text-dark">Bandwidth</span></li>
                               <li><span class="text-dark">Free support</span></li>
                               <li><span class="font-weight-bold">Unlimited</span><span class="text-dark">Databases</span></li>
                             </ul><a class="btn btn-block btn-default btn-rect" href="register.html">Sign up</a>
                           </div>
                         </div>
                 </div>
               </div>
             </div>
           </section>
           <!-- Buy Now-->
                 <!-- Call to action type 2-->
                 <section class="section novi-background section-66 context-dark bg-blue-gray">
                   <div class="container">
                     <div class="row justify-content-sm-center align-items-sm-center no-gutters grid-group-md">
                       <div class="col-lg-7 col-xxl-9 text-center text-lg-left">
                         <h2><span class="big">KIMTEYG - exactly what you need</span></h2>
                       </div>
                       <div class="col-lg-4 col-xl-3"><a class="btn btn-icon btn-lg btn-default btn-anis-effect btn-icon-left" href="http://www.templatemonster.com/intense-multipurpose-html-template.html?utm_source=livedemo&amp;utm_medium=themebutton&amp;utm_campaign=intense" target="_blank"><span class="icon novi-icon mdi mdi-cart-outline"></span>Buy intense now</a>
                       </div>
                     </div>
                   </div>
                 </section>
           <!-- Page Footers-->
           <!-- Default footer-->
           <footer class="section novi-background section-relative section-top-66 section-bottom-34 page-footer bg-black context-dark">
             <div class="container">
               <div class="row justify-content-sm-center text-xl-left grid-group-md">
                 <div class="col-sm-12 col-xl-3">
                   <!-- Footer brand-->
                   <div class="footer-brand"><a href="index-2.html"><img style='margin-top: -5px;margin-left: -15px;' width='138' height='31' src='/hcf.png' alt=''/></a></div>
                   <p class="text-darker offset-top-4">Feel the power of future</p>
                         <ul class="list-inline">
                           <li class="list-inline-item"><a class="icon novi-icon fa fa-facebook icon-xxs icon-circle icon-darkest-filled" href="#"></a></li>
                           <li class="list-inline-item"><a class="icon novi-icon fa fa-twitter icon-xxs icon-circle icon-darkest-filled" href="#"></a></li>
                           <li class="list-inline-item"><a class="icon novi-icon fa fa-google-plus icon-xxs icon-circle icon-darkest-filled" href="#"></a></li>
                           <li class="list-inline-item"><a class="icon novi-icon fa fa-linkedin icon-xxs icon-circle icon-darkest-filled" href="#"></a></li>
                         </ul>
                 </div>
                 <div class="col-sm-12 col-md-8 col-lg-5 col-xl-4 text-lg-left">
                   <h6 class="text-uppercase text-spacing-60">Newsletter</h6>
                   <p>Keep up with our always upcoming  product features  and technologies. Enter your e-mail and subscribe to  our newsletter.</p>
                   <div class="offset-top-30">
                           <form class="rd-mailform" data-form-output="form-subscribe-footer" data-form-type="subscribe" method="post" action="https://livedemo00.template-help.com/wt_58888_v14/bat/rd-mailform.php">
                             <div class="form-group">
                               <div class="input-group input-group-sm"><span class="input-group-prepend"><span class="input-group-text input-group-icon"><span class="novi-icon mdi mdi-email"></span></span></span>
                                 <input class="form-control" placeholder="Type your E-Mail" type="email" name="email" data-constraints="@Required @Email"><span class="input-group-append">
                                   <button class="btn btn-sm btn-primary" type="submit">Subscribe</button></span>
                               </div>
                             </div>
                             <div class="form-output" id="form-subscribe-footer"></div>
                           </form>
                   </div>
                 </div>
                 <div class="col-sm-5 col-lg-3 col-xl-2 text-sm-left">
                   <h6 class="text-uppercase text-spacing-60">Useful Links</h6>
                   <div class="d-block">
                     <div class="d-inline-block">
                       <ul class="list list-marked">
                         <li><a href="about-us.html">About Us</a></li>
                         <li><a href="contact-us.html">Contact Us</a></li>
                         <li><a href="services.html">Services</a></li>
                         <li><a href="pricing.html">Pricing</a></li>
                         <li><a href="clients.html">Clients</a></li>
                       </ul>
                     </div>
                   </div>
                 </div>
                 <div class="col-sm-7 text-sm-left col-lg-4 col-xl-3">
                   <h6 class="text-uppercase text-spacing-60">Latest news</h6>
                         <!-- Post Widget-->
                         <article class="post widget-post text-left text-picton-blue"><a class="d-block" href="blog-classic-single-post.html">
                             <div class="unit flex-row unit-spacing-xs align-items-center">
                               <div class="unit-body">
                                 <div class="post-meta"><span class="novi-icon icon-xxs mdi mdi-arrow-right"></span>
                                   <time class="text-dark" datetime="2019-01-01">05/14/2018</time>
                                 </div>
                                 <div class="post-title">
                                   <h6 class="text-regular">Let’s Change the world</h6>
                                 </div>
                               </div>
                             </div></a></article>
                         <!-- Post Widget-->
                         <article class="post widget-post text-left text-picton-blue"><a class="d-block" href="blog-classic-single-post.html">
                             <div class="unit flex-row unit-spacing-xs align-items-center">
                               <div class="unit-body">
                                 <div class="post-meta"><span class="novi-icon icon-xxs mdi mdi-arrow-right"></span>
                                   <time class="text-dark" datetime="2019-01-01">05/14/2018</time>
                                 </div>
                                 <div class="post-title">
                                   <h6 class="text-regular">The meaning of Web Design</h6>
                                 </div>
                               </div>
                             </div></a></article>
                         <!-- Post Widget-->
                         <article class="post widget-post text-left text-picton-blue"><a class="d-block" href="blog-classic-single-post.html">
                             <div class="unit flex-row unit-spacing-xs align-items-center">
                               <div class="unit-body">
                                 <div class="post-meta"><span class="novi-icon icon-xxs mdi mdi-arrow-right"></span>
                                   <time class="text-dark" datetime="2019-01-01">05/14/2018</time>
                                 </div>
                                 <div class="post-title">
                                   <h6 class="text-regular">Get Started with TemplateMonster</h6>
                                 </div>
                               </div>
                             </div></a></article>
                 </div>
               </div>
             </div>
             <div class="container offset-top-50">
               <p class="small text-darker">KIMTEYG &copy; <span class="copyright-year"></span> . <a href="privacy.html">Privacy Policy</a></p>
             </div>
           </footer>
         </div>
         <!-- Global RD Mailform Output -->
         <div class="snackbars" id="form-output-global"></div>
         <script src="js/core.min.js"></script>
         <script src="js/script.js"></script>
       </body><!-- Google Tag Manager --><noscript><iframe src="http://www.googletagmanager.com/ns.html?id=GTM-P9FT69"height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript><script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='../../www.googletagmanager.com/gtm5445.html?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-P9FT69');</script><!-- End Google Tag Manager -->
     </html>
