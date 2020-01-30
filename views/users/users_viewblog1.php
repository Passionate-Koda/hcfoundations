<?php
ob_start();
$page_name = "blog_view";
$page_title = "bb";
if (isset($_GET['id'])) {
    $blog = viewBlog($conn, $_GET['id']);
extract($blog);

}else{
 header("Location:blog");
}
  include "includes/header.php";

  $recent = recentBlogPost($conn);
 ?>
 <!--breadcumb start here-->
 <section class="banner-inner-sec" style="background-image:url('images/ban.jpg')">
 	<div class="banner-table">
 		<div class="banner-table-cell">
 			<div class="container">
 				<div class="banner-inner-content">
 					<h2 class="banner-inner-title">Blogs</h2>
 					<ul class="xs-breadcumb">
 						<li><a href="index"> Home  / </a>Blog</li>
 					</ul>
 				</div>
 			</div>
 		</div>
 	</div>
 </section>
 <!--breadcumb end here-->

 <!-- start blog section -->
 <section class="xs-blog-single-sec section-padding">
     <div class="container">
         <div class="row">
             <div class="col-lg-8">
                 <div class="blog-content-item single-blog-details">
                     <div class="single-blog-item">
                         <div class="blog-post-img">
                                 <img  src="<?php echo $image_1 ?>" alt="">
                             <!-- <div class="blog-date-info">
                                 <label>12</label>
                                 <span>Feb</span>
                             </div> -->
                         </div><!-- blog-post-img end -->
                         <div class="blog-meta">
                             <ul>
                                 <li class="author">
                                     <a href="#">
                                         <!-- <img src="asset/images/blog/author.png" alt=""> -->
                                         by <span><?php echo $author ?></span>
                                     </a>
                                 </li>
                                 <li>
                                     <a href="#">
                                        <i class="icon icon-calendar-full"></i>
                                        <?php echo $date_created ?>
                                     </a>
                                 </li>
                                 <li>
                                     <!-- <a href="#">
                                        <i class="icon icon-tags"></i>
                                        Triming/Blog
                                     </a> -->
                                 </li>
                                 <li>
                                        <!-- <i class="icon icon-comment"></i> -->
                                        <!-- <a href="#">
                                        23
                                     </a> -->
                                 </li>
                             </ul>
                         </div><!-- blog-meta end -->
                         <h3 class="xs-blog-title">
                                <?php echo $title ?>
                         </h3>
                         <?php echo $body ?>
                     </div><!-- single-blog-item end -->
                     <div class="post-tag-item clearfix">
                         <!-- <div class="post-tag float-left">
                             <h4 class="tag-title">Post tag</h4>
                             <a href="#">#grass trimming</a>
                             <a href="#">#planning  </a>
                             <a href="#">#garden ,</a>
                         </div> -->
                         <div style="margin-top:5px;" class="">
                           <p style="margin-bottom:2px">Share this with friends</p>
                         <?php  $uro = $_SERVER['REQUEST_URI'];
                          ?>
                             <a href="#" id="blake" class="fblinka" ><i class="fa fa-facebook"></i></a>
                             <?php $ur = urlencode("https://hcfoundations.com/viewBlog?id=$hash_id"); ?>
                             <a target="_blank" href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo $ur  ?>"  class="inlinka" ><i class="fa fa-linkedin"></i></a>

                             <a target="_blank" href="https://twitter.com/share?url=https://hcfoundations.com/viewBlog?id=<?php echo $hash_id ?>&text=<?php echo "Hathany Cosmos Foundations - ".strtoupper($title)." by ".ucwords($author)?>&hashtags=KIMTEYGhandle" id="blake" class="twlinka twitter-share" ><i class="fa fa-twitter"></i></a>
                             <a href="whatsapp://send?text=<?php echo "Hathany Cosmos Foundations - ".strtoupper($title)." by ".ucwords($author) ?> https://hcfoundations.com/viewBlog?id=<?php echo $hash_id ?> " data-action="share/whatsapp/share"  class="whlinka" ><i class="fa fa-whatsapp"></i></a>
                         </div>
                                     <div class="fb-comments" data-mobile="true" data-href="https://hcfoundations.com/viewBlog?id=<?php echo $_GET['id'] ?>" data-width="700px" data-numposts="10"></div>
                     </div><!-- post-tag-item end -->
                     <!-- <div class="author-info">
                         <img src="asset/images/post-author.jpg" alt="">
                         <h4>Denial Miller</h4>
                         <p>Land she'd. Female own life hath i firmament which one itself divide blessed created
                              them creepeth saw more. Gathering creeping isn't lights.</p>
                              <div class="author-social">
                                 <a href="#"><i class="fa fa-twitter"></i></a>
                                 <a href="#"><i class="fa fa-facebook"></i></a>
                                 <a href="#"><i class="fa fa-google-plus"></i></a>
                                 <a href="#"><i class="fa fa-instagram"></i></a>
                              </div>
                     </div> -->

                     <!-- <div class="post-navigation">
                         <div class="row">
                             <div class="col-md-6">
                                 <a href="#" class="post-navigation-title">
                                     <img src="asset/images/prev-post.jpg" alt="">
                                     <h5>Created them creepeth saw more</h5>
                                     <span><i class="icon icon-chevron-left"></i> Prev Post</span>
                                 </a>
                             </div>
                             <div class="col-md-6">
                                 <a href="#" class="post-navigation-title">
                                     <img src="asset/images/next-post.jpg" alt="">
                                     <h5>Blessed created them creepeth</h5>
                                     <span>Next Post<i class="icon icon-chevron-right"></i></span>
                                 </a>
                             </div>
                         </div>
                     </div>-->

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
                                       <a href="#"><?php echo $title ?></a>
                                   </h5>
                               </div>
                           </div><!-- .widget-post END -->
                         <?php endforeach; ?>


                       </div><!-- .widget-posts END -->
                   </div><!-- .widget end -->

                     <!-- <div class="widget widget-categories">
                        <h4 class="widget-title"><span class="light-text">Youtube</span> Video</h4>

                     </div> -->
                     <!-- .widget end -->

                     <div class="widget widget-tag">
                        <h4 class="widget-title"><span class="light-text">Tweet</span> Feeds</h4>
                         <div class="tag-lists">
<a class="twitter-timeline" data-tweet-limit="3" href="https://twitter.com/KIMTEYGhandle?ref_src=twsrc%5Etfw">Tweets by TwitterDev</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                         </div>
                     </div><!-- .widget end -->
                 </div><!-- .sidebar-widgets end -->
             </div><!-- .col end -->


         </div><!-- .row end -->
     </div><!-- .container end -->
 </section><!-- End blog section -->
 <script type="application/ld+json">





 {
   "@context": "http://schema.org",
   "@type": "Article",
   "headline": "<?php echo $title ?>",
   "image": {
     "@type": "ImageObject",
     "url": "https://hcfoundations.com/<?php echo $image_1 ?>",
     "width":<?php echo $dd[0] ?> ,
     "height":<?php echo $dd[1] ?>
   },
   "description": "<?php echo $rf ?>",
   "datePublished": "<?php echo $date_created ?>",
   "author": {
     "@type": "Person",
     "name": "<?php echo $author ?>"
   },
   "publisher": {
     "@type": "Organization",
     "name": "Hathany Cosmos Foundations",
     "logo": {
       "@type": "ImageObject",
       "url": "https://hcfoundations.com/fav.png",
       "width":20 ,
       "height":20
     }
   }
 }
 </script>
 <script type="text/javascript">
 document.getElementById('blake').onclick = function(e){
   FB.ui({
     method: 'share',
 display: 'popup',
     href: 'https://hcfoundations.com/viewBlog?id=<?php echo $hash_id ?>',
   }, function(response){});
   e.preventDefault();
 }
 </script>
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

 <!-- Mirrored from html.xpeedstudio.com/bagan/blog-single.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 15 Aug 2018 19:18:51 GMT -->
 </html>
 <!-- footer section end -->
