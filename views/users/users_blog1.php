
<?php
ob_start();
$page_title = "Blog";
$page_name = "anything";
  include "includes/header.php";
    $record_per_page = 20;
  $page = "";
  if(isset($_GET['page'])){
  $page = $_GET['page'];
  }else{
  $page = 1;
  }

  $start_from = ($page-1)*$record_per_page;

  $recent = recentBlogPost($conn);

  $row = fetchBlog($conn);


 ?>
 <!--breadcumb start here-->
 <section class="banner-inner-sec" style="background-image:url('images/ban.jpg')">
 	<div class="banner-table">
 		<div class="banner-table-cell">
 			<div class="container">
 				<div class="banner-inner-content">
 					<h2 class="banner-inner-title">Blogs</h2>
 					<ul class="xs-breadcumb">
 						<li><a href="index"> Home  / </a> blog</li>
 					</ul>
 				</div>
 			</div>
 		</div>
 	</div>
 </section>
 <!--breadcumb end here-->

 <!-- start blog section -->
 <section class="xs-blog-sec section-padding">
     <div class="container">
         <div class="row">
             <div class="col-lg-8">
                 <div class="blog-content-item">

                   <?php foreach ($row as $key => $value) {
                     // code...
                    ?>
                     <div class="single-blog-item">
                         <div class="blog-post-img">
                             <a href="#">
                                 <img  src="<?php echo $value['image_1'] ?>" alt="">
                             </a>
                             <div class="blog-date-info">
                                 <!-- <label>12</label>
                                 <span>Feb</span> -->
                             </div>
                         </div><!-- blog-post-img end -->
                         <div class="blog-meta">
                             <ul>
                                 <li class="author">
                                     <a href="#">
                                         <!-- <img src="asset/images/blog/author.png" alt=""> -->
                                         by <span><?php echo $value['input_author'] ?></span>
                                     </a>
                                 </li>
                                 <li>
                                     <a href="#">
                                        <i class="icon icon-calendar-full"></i>
                                         <?php echo $value['date_created'] ?>
                                     </a>
                                 </li>
                                 <li>
                                     <!-- <a href="#">
                                        <i class="icon icon-tags"></i>
                                        Triming/Blog
                                     </a> -->
                                 </li>
                                 <li>
                                     <!-- <a href="#">
                                        <i class="icon icon-comment"></i>
                                        23
                                     </a> -->
                                 </li>
                             </ul>
                         </div><!-- blog-meta end -->
                         <h3 class="xs-blog-title">

                             <a href="viewBlog?id=<?php echo $value['hash_id'] ?>">
                                  <?php echo $value['input_title'] ?>
                             </a>
                         </h3>
                         <p>
                           <?php $blogShort =  previewBody($value['text_body'], 55) ?>
                             <?php echo $blogShort; ?>
                         </p>
                         <div class="read-more-btn">
                             <a href="viewBlog?id=<?php echo $value['hash_id'] ?>" class="xs-btn sm-btn">Read More</a>
                         </div>
                     </div><!-- single-blog-item end -->

<?php } ?>
                     <!-- <ul class="pagination justify-content-center">
                         <li class="page-item">
                             <a  href="#"><i class="fa fa-angle-left"></i></a>
                         </li>
                         <li class="page-item active"><a href="#">1</a></li>
                         <li class="page-item">
                             <a href="#">2</a>
                         </li>
                         <li class="page-item"><a href="#">3</a></li>
                         <li class="page-item disabled"><a href="#">4</a></li>
                         <li class="page-item">
                             <a href="#"><i class="fa fa-angle-right"></i></a>
                         </li>
                     </ul> -->
                 </div>
             </div><!-- .col end -->
             <div class="col-lg-4">
                 <div class="sidebar-widgets">

                     <div class="widget">
                         <h4 class="widget-title">
                              <span class="light-text">Recent</span> posts
                         </h4>
                         <div class="widget-posts">
                           <?php foreach ($recent as $key => $value): ?>
                             <?php extract($value); ?>
                             <div class="widget-post media">
                                 <img width="100" height="100" src=" <?php echo $image_1?>" class="d-flex" alt="popular post image" draggable="false">
                                 <div class="media-body">
                                     <span class="post-meta-date">
                                         <a href="#"> Post by <?php echo $author ?></a>
                                     </span>
                                     <h5 class="entry-title">
                                         <a href="blog_view?id=<?php echo $hash_id ?>"><?php echo $title ?></a>
                                     </h5>
                                 </div>
                             </div><!-- .widget-post END -->
                           <?php endforeach; ?>


                         </div><!-- .widget-posts END -->
                     </div><!-- .widget end -->
                     <!-- <div class="widget widget-categories">
                        <h4 class="widget-title"><span class="light-text">Youtube</span> Video</h4>
                        <script src="http://www.gmodules.com/ig/ifr?url=http://www.google.com/ig/modules/youtube.xml&up_channel=Admin&synd=open&w=320&h=390&title=&border=%23ffffff%7C3px%2C1px+solid+%23999999&output=js"></script>
                     </div> -->

                     <div class="widget widget-tag">
                        <h4 class="widget-title"><span class="light-text">Twitter Feeds</span></h4>
                         <div class="tag-lists">
<a class="twitter-timeline" data-tweet-limit="3" href="https://twitter.com/KIMTEYGhandle?ref_src=twsrc%5Etfw">Tweets by TwitterDev</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                         </div>
                     </div><!-- .widget end -->
                 </div><!-- .sidebar-widgets end -->
             </div><!-- .col end -->


         </div><!-- .row end -->
     </div><!-- .container end -->
 </section><!-- End blog section -->

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

 <!-- Mirrored from html.xpeedstudio.com/bagan/blog.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 15 Aug 2018 19:18:48 GMT -->
 </html>
 <!-- footer section end -->
