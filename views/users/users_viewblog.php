<?php
ob_start();
$page_name = "blog";
$page_title = "bb";
if (isset($_GET['id'])) {
    $blog = selectContent($conn,"panel_blog",["hash_id"=>$_GET['id']]);
extract($blog[0]);
}else{
 header("Location:blog");
}
  include "includes/header.php";
  $recent = selectContentDesc($conn,"panel_blog",[],"id",3);
 ?>
       </header>
       <!-- Header Transparent-->
             <section class="section parallax-container" data-parallax-img="<?php echo $image_1 ?>">
               <div class="parallax-content section-254 context-dark bg-overlay-gray-darkest">
                 <div class="container">
                   <div>
                     <ul class="list-inline list-inline-dashed p">
                       <li class="list-inline-item"><a href="index">Home</a></li>
                       <li class="list-inline-item"> Blog</li>
                     </ul>
                   </div>
                   <h2 class="offset-top-10"><span class="big"> <?php echo $input_title ?></span></h2>
                   <div class="post-meta">
                     <ul class="list-inline p">
                       <li class="list-inline-item"><span class="text-middle icon-xxs novi-icon mdi mdi-clock"></span>
                         <time class="text-middle small" datetime="2019-01-01"><?php echo $date_created ?></time>
                       </li>



                     </ul>
                   </div>
                 </div>
               </div>
             </section>
       <!-- Author Aside-->
       <section class="section novi-background section-66 offset-top-24">
         <div class="container">
           <div class="row">

             <div class="col-lg-12 text-left">
            <?php echo $text_body ?>
          <?php include 'share/blog_buttons.php'; ?>
             </div>
           </div>
         </div>
       </section>

       <!-- Conclusion-->

       <!-- Page Footer-->
       <!-- Default footer-->
    <?php include 'includes/footer.php'; ?>
     </div>
     <!-- Global RD Mailform Output -->
     <div class="snackbars" id="form-output-global"></div>
     <script src="js/core.min.js"></script>
     <script src="js/script.js"></script>
   </body><!-- Google Tag Manager --><noscript><iframe src="http://www.googletagmanager.com/ns.html?id=GTM-P9FT69"height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript><script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='../../www.googletagmanager.com/gtm5445.html?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-P9FT69');</script><!-- End Google Tag Manager -->
 </html>
