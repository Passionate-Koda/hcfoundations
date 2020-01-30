
<?php
ob_start();
$page_title = "Project";
$page_name = "anything";
  include "includes/header.php";

   $recent = recentProjectPost($conn);

  $row = showProject($conn);
 ?>


<!--breadcumb start here-->
<section class="banner-inner-sec" style="background-image:url('images/ban.jpg')">
<div class="banner-table">
 <div class="banner-table-cell">
   <div class="container">
     <div class="banner-inner-content">
       <h2 class="banner-inner-title">Projects</h2>
       <ul class="xs-breadcumb">
         <li><a href="index"> Home  / </a> Projects</li>
       </ul>
     </div>
   </div>
 </div>
</div>
</section>
<!--breadcumb end here-->
<!--  service inner section -->
<section class="service-inner-v2-sec">
 <div class="container">

<?php foreach ($row as $key => $value) {
  // code...
 ?>
      <div class="single-service-v2-item section-bg">
         <div class="row">
             <div class="col-lg-5 col-md-5 align-self-center">
                 <div class="single-service-v2-content">
                     <h4 class="xs-single-title"> <?php echo $value['project_name'] ?></h4>
                     <p><?php $bd = previewBody($value['about'], 55);
                     echo $bd ?>
                     </p>
                     <a href="projectView?id=<?php echo $value['hash_id'] ?>" class="load-more-btn">Details</a>
                 </div>
             </div>
             <div class="col-lg-6 offset-lg-1 col-md-7">
                 <div class="single-service-v2-img">
                     <img src="<?php echo $value['image_1'] ?>" alt="">
                     <i class="icon-Our_service_1"></i>
                 </div>
             </div>
         </div><!-- row end-->
     </div><!-- service-v2-item end-->
<?php } ?>


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

<!-- Mirrored from html.xpeedstudio.com/bagan/service-v2.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 15 Aug 2018 19:18:27 GMT -->
</html>
<!-- footer section end -->
