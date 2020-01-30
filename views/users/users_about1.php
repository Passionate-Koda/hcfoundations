<?php
ob_start();
$page_title = "About";
$page_name = "anything";
include "includes/header.php";

 $ab = fetchitem($conn,'about');

 ?>

 <!--breadcumb start here-->
 <section class="banner-inner-sec" style="background-image:url('images/ban.jpg')">
 	<div class="banner-table">
 		<div class="banner-table-cell">
 			<div class="container">
 				<div class="banner-inner-content">
 					<h2 class="banner-inner-title">About Us</h2>
 					<ul class="xs-breadcumb">
 						<li><a href="index"> Home  / </a> About</li>
 					</ul>
 				</div>
 			</div>
 		</div>
 	</div>
 </section>
 <!--breadcumb end here-->
 <!-- header about inner section -->
 <section class="about-sec section-padding">
     <div class="container">
         <div class="row">
             <div class="col-md-5 wow fadeInUp align-self-center" data-wow-duration="1.5s" data-wow-delay="300ms">
                 <div class="about-content">

                     <h2 class="column-title">About Us</h2>
                     <?php foreach($ab as $key => $value): ?>
                    <?php extract($value);

                    echo $body;

                     ?>
 <br>





                 </div>
             </div>
             <div class="col-md-7 align-self-center wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="400ms">
                 <div class="about-video-item">
                     <div class="about-video-img">
                         <img src="<?php echo $image_1 ?>" alt="">
                     </div>
                 </div>
             </div>
                <?php endforeach; ?>
         </div><!-- row end-->
     </div><!-- .container end -->
 </section><!-- End about us section -->

 <!-- header company timeline section -->


 <!-- header team section -->
 <section class="team-sec section-padding">
     <div class="container">
         <div class="row">
             <div class="col-lg-12">
                 <div class="section-title-item section-title-v2-item">


                     <h2 class="section-title">
                         <span class="xs-title">Our experts </span>
                         Meet with our Team
                     </h2>
                     <h3 class="hidden-title">experts</h3>
                 </div>
             </div>
         </div><!-- .row end -->
         <div class="row">
             <div class="col-lg-3 col-sm-6">
                 <div class="single-team">
                     <div class="team-img">
                         <img src="images/dummy.png" alt="">
                         <div class="team-social">
                             <a href="#"><i class="fa fa-facebook"></i></a>
                             <a href="#"><i class="fa fa-twitter"></i></a>
                             <a href="#"><i class="fa fa-google-plus"></i></a>
                             <a href="#"><i class="fa fa-linkedin"></i></a>
                         </div>
                     </div>
                     <h3>Name</h3>
                     <p>Position</p>
                 </div>
             </div><!-- .col end -->
             <div class="col-lg-3 col-sm-6">
                 <div class="single-team">
                     <div class="team-img">
                         <img src="images/dummy.png" alt="">
                         <div class="team-social">
                             <a href="#"><i class="fa fa-facebook"></i></a>
                             <a href="#"><i class="fa fa-twitter"></i></a>
                             <a href="#"><i class="fa fa-google-plus"></i></a>
                             <a href="#"><i class="fa fa-linkedin"></i></a>
                         </div>
                     </div>
                     <h3>Name</h3>
                     <p>Position</p>
                 </div>
             </div><!-- .col end -->

         </div><!-- .row end -->
     </div><!-- .container end -->
 </section><!-- End team section -->

 <!-- header ready to contact section -->



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

 <!-- Mirrored from html.xpeedstudio.com/bagan/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 15 Aug 2018 19:18:56 GMT -->
 </html>
 <!-- footer section end -->
