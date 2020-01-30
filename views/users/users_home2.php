<?php
  $blog = fetchBlog($conn);
 $project = viewLatestProject($conn);
 $frontage = fetchitem($conn,'frontage');
 // $category_id = fetchitem($conn,'frontage');
 $services =  getAllServices($conn);
 // $service =  getFirstServices($conn);

$page_name = "home";
$page_title = "Home";
 // die(var_dump($testimony));
 $ab = fetchitem($conn,'about');

 $blog = fetchitemLimit($conn,'blog','ASC LIMIT 2');
    extract($project);
 ?>

<?php include "includes/header.php"; ?>
 <!-- start banner section -->
 <section class="xs-banner-sec owl-carousel banner-slider">
   <?php foreach ($frontage as $key => $value): ?>
     <?php extract($value); ?>
     <div class="banner-slider-item banner-item1" style="background-image: url(<?php echo $image ?>);">
         <div class="slider-table">
             <div class="slider-table-cell">
                 <div class="container">
                     <div class="row align-items-center">
                         <div class="col-lg-10 offset-lg-1">
                             <div class="banner-content text-center">
                                 <h2><?php echo $header_title; ?></h2>
                                 <p> <?php echo $text; ?>
                                 </p>
                                 <!-- <div class="xs-btn-wraper">
                                     <a href="#" class="xs-btn">
                                         Our Services
                                     </a>
                                     <a href="#" class="xs-btn fill">
                                         Get Quote
                                     </a>
                                 </div> -->
                                 <!-- .xs-btn-wraper END -->
                             </div><!-- .xs-welcome-wraper END -->
                         </div><!-- .column END -->
                     </div><!-- .row end -->
                 </div><!-- .container end -->
             </div><!-- .slider table cell end -->
         </div><!-- .slider table end -->
     </div><!-- .xs-welcome-content END -->
        <?php endforeach; ?>
 </section><!-- End banner section -->


 <!-- start banner section -->



 <!-- start about us section -->
 <section class="about-sec section-padding">
     <div class="container">
         <div class="row">
             <div class="col-md-5 wow fadeInUp align-self-center" data-wow-duration="1.5s" data-wow-delay="300ms">
                 <div class="about-content">

                     <h2 class="column-title">About Us</h2>
                     <?php foreach($ab as $key => $value): ?>
                    <?php extract($value);
                          $someAbout = previewRealBody($body, 95);
                    echo $someAbout[0];

                     ?>
<br>


<?php if($someAbout[1] == true){

  echo '<a href="about" class="xs-btn sm-btn">Read More</a>';
} ?>


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

 <!-- start service section -->
 <section class="service-sec section-padding">
     <div class="container">
         <div class="row">
             <div class="col-lg-12">
                 <div class="section-title-item">

                     <h2 class="section-title">
                          <span class="xs-title">Service we provide</span>
                         Our Services
                     </h2>
                 </div>
             </div>
         </div><!-- row end-->
         <div class="row">
           <?php foreach ($services as $key => $value): ?>

             <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="300ms">
                 <div class="single-service">
                     <div class="service-img">
                         <img src="<?php echo $value['image_1'] ?>" alt="">
                         <i class="icon-Our_service_1"></i>
                     </div>
                     <h3 class="xs-service-title"><a href="#"><?php echo $value['title'] ?></a> </h3>
                     <p>
                        <?php echo $value['body'] ?>
                     </p>
                     <a href="#" class="readMore">Read more <i class="icon icon-arrow-right"></i> </a>
                 </div>
             </div>

                 <?php endforeach; ?>
         </div><!-- row end-->
     </div><!-- .container end -->
 </section><!-- End service section -->

 <!-- start service section -->
 <section class="recent-work-sec section-padding">
     <div class="container">
         <div class="row">
             <div class="col-lg-12">
                 <div class="section-title-item">

                     <h2 class="section-title">
                         <span class="xs-title">Our projects</span>
                         Recent Works
                      </h2>
                 </div>
                 <!-- <div class="recent-folio-menu">
                     <ul>
                         <li  class="active filter" data-filter="all">All</li>
                         <li  class="filter" data-filter=".cat1">Gardening</li>
                         <li  class="filter" data-filter=".cat2">Fall cleanup</li>
                         <li  class="filter" data-filter=".cat3">Watering</li>
                         <li  class="filter" data-filter=".cat4">Video</li>
                     </ul>
                 </div> -->
             </div>
         </div><!-- row end-->
         <div class="row" id="mixcontent">


<?php foreach ($project as $key => $value): ?>

             <div class="col-lg-4 mix cat3 col-sm-6">
                 <a href="#<?php echo $value['hash_id'] ?>" class="xs-image-popup" data-effect="mfp-zoom-in">
                     <div class="single-recent-work">
                         <img src="<?php echo $value['image_1'] ?>" alt="">
                         <div class="recet-work-footer">
                             <!-- <i class="icon-Our_service_3"></i> -->
                             <h3> <?php echo $value['project_name'] ?></h3>
                         </div>
                     </div>
                 </a>
                 <div id="<?php echo $value['hash_id']?>" class="container xs-gallery-popup-item mfp-hide">
                     <div class="row">
                         <div class="col-lg-5 xs-padding-0">
                             <div class="xs-popup-img">
                                  <img src="<?php echo $value['image_1'] ?>" alt="">
                             </div>
                         </div>
                         <div class="col-lg-7">
                             <div class="xs-popup-content">
                                 <h2 class="hidden-title">Project info</h2>
                                 <h3><?php echo $value['project_name'] ?></h3>
                                 <div class="row">
                                     <div class="col-lg-5">
                                         <ul class="xs-popup-left-content">
                                             <li>
                                                 <i class="icon icon-calendar-full"></i>
                                                 <label>Project date</label>
                                                 <span><?php echo $value['date_created'] ?></span>
                                             </li>
                                             <!-- <li>
                                                 <i class="icon icon-tags"></i>
                                                 <label>Category</label>
                                                 <span>Garden care, Garden</span>
                                             </li> -->
                                             <!-- <li>
                                                 <i class="icon icon-user2"></i>
                                                 <label>Client</label>
                                                 <span>Mr. Jordan, Newyork</span>
                                             </li> -->
                                             <!-- <li>
                                                 <i class="icon icon-invest"></i>
                                                 <label>Project value</label>
                                                 <span>$ 500</span>
                                             </li> -->
                                             <li>
                                                 <i class="icon icon-map-marker2"></i>
                                                 <label>Location</label>
                                                 <span><?php echo $value['project_location'] ?>
                                                 </span>
                                             </li>
                                         </ul>
                                     </div>
                                     <div class="col-lg-7">
                                         <div class="xs-popup-right-content">


                                           <?php

                                           $tt = previewRealBody($value['about'], 50);

                                           echo $tt[0]."<br>" ?>

                                             <a href="projectView?hid=<?php echo $value['hash_id'] ?>" class="xs-btn">PROJECT LINK</a>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>

<?php endforeach; ?>


         </div><!-- row end-->


     </div><!-- .container end -->
 </section><!-- End service section -->


 <!-- start testmonila section -->
 <!-- <section class="testmonial-sec">
     <div class="container">
         <div class="row align-items-center">
             <div class="col-md-6 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="300ms">
                 <div class="call-back-content">
                     <p class="call-contact-text">We will contact</p>
                     <h3>Get a <span>call back</span></h3>
                     <form class="call-back-form">
                         <div class="form-group">
                             <input type="text" name="name" value="" placeholder="Your Name" class="call-back-inp">
                         </div>
                         <div class="form-group">
                             <input type="email" name="email" value="" placeholder="Email " class="call-back-inp">
                         </div>
                         <div class="form-group">
                             <input type="number" name="phone" value="" placeholder="Phone no" class="call-back-inp">
                         </div>
                         <div class="form-group">
                             <select>
                                 <option>Service</option>
                                 <option>Service One</option>
                                 <option>Service two</option>
                                 <option>Service three</option>
                             </select>
                         </div>
                         <div class="form-group xs-mb-40">
                             <textarea name="message" placeholder="Message" class="call-back-inp call-back-msg"></textarea>
                         </div>
                         <div class="form-group ">
                             <button type="submit" name="submit" class="xs-btn">Submit</button>
                             <label class="call-us-number">Or Call US - <span>098 2639 6257</span></label>
                         </div>
                     </form>
                 </div>
             </div>
             <div class="col-md-6 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="400ms">
                 <div class="owl-carousel" id="testmonial-slider">
                     <div class="testmonial-content ">
                         <i class="testmonial_icon icon-client_review"></i>
                         <h3 class="testmonial-title">Client review</h3>
                         <p>Lights living night blessed meat whales brought sixth there after saw seasons one heaven from
                             fowl behold yielding day face them replenish given fifth seasons creeping one heaven let god
                             that creature image.
                         </p>
                         <div class="testmonial-author">
                             <img src="asset/images/author.jpg" alt="">
                             <h4>Mr. Jakob Pande</h4 >
                             <div class="author-rating">
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star"></i>
                             </div>
                         </div>
                     </div>
                     <div class="testmonial-content ">
                         <i class="testmonial_icon icon-client_review"></i>
                         <h3 class="testmonial-title">Client review</h3>
                         <p>Lights living night blessed meat whales brought sixth there after saw seasons one heaven from
                             fowl behold yielding day face them replenish given fifth seasons creeping one heaven let god
                             that creature image.
                         </p>
                         <div class="testmonial-author">
                             <img src="asset/images/author.jpg" alt="">
                             <h4>Mr. Jakob Pande</h4>
                             <div class="author-rating">
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star"></i>
                             </div>
                         </div>
                     </div>
                     <div class="testmonial-content ">
                         <i class="testmonial_icon icon-client_review"></i>
                         <h3 class="testmonial-title">Client review</h3>
                         <p>Lights living night blessed meat whales brought sixth there after saw seasons one heaven from
                             fowl behold yielding day face them replenish given fifth seasons creeping one heaven let god
                             that creature image.
                         </p>
                         <div class="testmonial-author">
                             <img src="asset/images/author.jpg" alt="">
                             <h4>Mr. Jakob Pande</h4>
                             <div class="author-rating">
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star"></i>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section> -->

 <!-- start latest news section -->
 <section class="latest-news-sec section-padding">
     <div class="container">
         <div class="row">

             <div class="col-lg-4 align-self-center wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="300ms">
                 <div class="latest-news-content">

                     <h2 class="column-title"> <span class="xs-title">From our blog</span>Latest News & Updates</h2>
                     <p>
                         We bring you latest informations.
                     </p>
                     <a href="blog" class="xs-btn">View All</a>
                 </div>
             </div>
             <div class="col-lg-8">
                 <div class="row">



<?php foreach($blog as $blog=> $value){ ?>
<?php $some =  previewBody($value['body'], 33); ?>
                     <div class="col-md-6 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="400ms">
                         <div class="single-latest-news">
                             <div class="latest-news-img">
                                 <a href="#">
                                     <img src="<?php echo $value['image_1']; ?>" alt="">
                                 </a>
                             </div>
                             <div class="single-news-content">
                                 <span class="date-info"><?php echo $value['date_created'] ?></span>
                                 <h3 class="xs-post-title"><a href="viewBlog?id=<?php echo $value['hash_id'] ?>"><?php echo $value['title'] ?></a></h3>
                                 <p>
                                     <?php echo $some ?>
                                 </p>
                                 <div class="blog-author">
                                     <!-- <img src="asset/images/blog-author.jpg" alt=""> -->
                                     <label> <?php echo $value['author'] ?> </label>
                                 </div>
                             </div>
                         </div>
                     </div>

<?php } ?>
                 </div>
             </div>
         </div><!-- .row end -->
     </div><!-- .container end -->
 </section>

 <!-- <section class="call-to-action-sec">
     <div class="container-fluid">
         <div class="row">
             <div class="col-lg-6 offset-lg-6 xs-padding-0 call-action-item">
                 <div class="call-to-action-content">
                     <h2 class="column-title white"><span>Get start</span> your <br/>Service</h2>
                     <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                     </p>
                     <div class="call-to-btn">
                         <a href="#" class="xs-btn fill">Our Services</a>
                         <a href="#" class="xs-btn">Contact Us</a>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section> -->

 <!-- start map section -->
 <div class="xs-map-sec">
     <div class="xs-maps-wraper">
         <div class="map">
             <iframe src="https://maps.google.com/maps?width=100&amp;height=600&amp;hl=en&amp;q=New%20York%2C%20USA+(My%20Business%20Name)&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=B&amp;output=embed"></iframe>
         </div>
     </div>
 </div><!-- End map section -->

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

 <!-- Mirrored from html.xpeedstudio.com/bagan/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 15 Aug 2018 19:17:56 GMT -->
 </html>
 <!-- footer section end -->
