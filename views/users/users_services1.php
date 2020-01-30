<?php
ob_start();
$page_title = "Services";
$page_name = "anything";
include "includes/header.php";
$services =  getServices($conn);
$service =  getFirstServices($conn);

 ?>

 <!--breadcumb start here-->
 <section class="banner-inner-sec" style="background-image:url('images/ban.jpg')">
 	<div class="banner-table">
 		<div class="banner-table-cell">
 			<div class="container">
 				<div class="banner-inner-content">
 					<h2 class="banner-inner-title">Services</h2>
 					<ul class="xs-breadcumb">
 						<li><a href="index"> Home  / </a> Services</li>
 					</ul>
 				</div>
 			</div>
 		</div>
 	</div>
 </section>
 <!--breadcumb end here-->
 <!--  service inner section -->
 <section class="service-v2-sec service-inner-sec section-padding">
     <div class="container">
         <div class="row">
              <div class="col-lg-3 col-md-4">
                 <div class="service-sidebar">
                     <div class="widgets">
                         <!-- <h3 class="widget-title"><span>Lawn</span> services</h3>
                         <ul class="services-link-item">
                             <li class="active"><a href="#">All services</a></li>
                             <li><a href="#">Urban gardening</a></li>
                             <li><a href="#">Watering</a></li>
                             <li><a href="#">Garden care</a></li>
                             <li><a href="#">Snow removal</a></li>
                             <li><a href="#">Fall cleanup</a></li>
                             <li><a href="#">Irrigation and drainage</a></li>
                         </ul> -->
                     </div><!-- widgets -->



                     <div class="widgets">
                         <h3 class="widget-title"><span>Get</span> in touch</h3>
                         <ul class="contact-list">
                             <li><i class="icon icon-map-marker2"></i>Office Address to be provided</li>
                             <li>
                                 <i class="icon icon-envelope4"></i>
                                 <label>  Mail us</label>
                                 KIMTEYGhandle@gmail.com
                             </li>
                             <li>
                                 <i class="icon icon-phone3"></i>
                                 <label>  Call Us</label>
                                 0806666666666
                             </li>
                         </ul>
                     </div><!-- widgets -->
                 </div><!-- srvice sidebar -->
             </div><!-- col end -->
             <div class="col-lg-9 col-md-8">
                 <div class="row">
                   <?php foreach($services as $key => $value){ ?>
                     <div class="col-lg-4 col-md-6">
                         <div class="single-services-item">
                             <img src="<?php echo $value['image_1'] ?>" alt="">
                             <h3 class="xs-service-title"><a href="#"><?php echo $value['title'] ?></a></h3>
                             <p>
                                 <?php echo $value['body'] ?>
                             </p>
                         </div>
                     </div>
<?php } ?>
                 </div><!-- row end-->
             </div><!-- col end-->

         </div><!-- row end-->
     </div><!-- .container end -->
 </section><!-- End service inner section -->

 <!-- footer section start -->
 <?php include "includes/footer.php"; ?>

 <script src="asset/js/jquery-3.2.1.min.js"></script>
 <script src="asset/js/bootstrap.min.js"></script>
 <script src="asset/js/jquery-mixtub.js"></script>
 <script src="asset/js/jquery.magnific-popup.min.js"></script>
 <script src="asset/js/owl.carousel.min.js"></script>
 <script src="asset/js/navigation.js"></script>
 <script src="asset/js/jquery.appear.min.js"></script>
 <script src="asset/js/isotope.js"></script>
 <script src="asset/js/wow.min.js"></script>
 <script src="asset/js/main.js"></script>

 </body>

 <!-- Mirrored from html.xpeedstudio.com/bagan/service-v1.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 15 Aug 2018 19:18:24 GMT -->
 </html>
 <!-- footer section end -->
