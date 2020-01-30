
<?php
ob_start();
$page_title = "Project";
$page_name = "anything";
  include "includes/header.php";

   $recent = selectContentDesc($conn,'panel_project',[],"id",3);

  $row = selectContent($conn,'panel_project',[]);
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
           <h2><span class="big">Project</span></h2>
         </div>
         <div class="col-xl-2 d-none d-md-block"><span class="icon icon-white mdi mdi-arrange-send-to-back"></span></div>
         <div class="offset-top-0 offset-md-top-10 col-xl-5 offset-xl-top-0 small text-xl-right">
           <ul class="list-inline list-inline-dashed p">
             <li class="list-inline-item"><a href="index">Home</a></li>

             <li class="list-inline-item">Projects
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
   <!-- Section Blog Grid 3 Columns-->
   <section class="section novi-background section-98 section-sm-124">
     <div class="container-fluid">
       <div class="row justify-content-md-center">
         <div class="col-md-10 col-lg-12">
           <div class="row">
             <?php foreach ($row as $key => $value) {
               // code...
              ?>
             <div class="col-lg-6 col-xl-4" style="margin-top:5px;">
                     <!-- Post Boxed--><a class="d-block" href="projectView?id=<?php echo $value['hash_id'] ?>">
                       <div class="post post-boxed">
                         <!-- Post media-->
                         <header class="post-media"><img class="img-fluid" width="570" height="321" src="<?php echo $value['image_1'] ?>" alt=""></header>
                         <!-- Post content-->
                         <section class="post-content text-left">

                           <div class="post-body">
                             <!-- Post Title-->
                             <div class="post-title">
                               <h3 title="<?php echo $value['input_project_name'] ?>"><?php echo $value['input_project_name'] ?></h3>
                             </div>
                             <div class="post-meta small">
                               <ul class="list-inline list-inline-sm p">
                                 <li class="list-inline-item font-italic text-middle"><span class="text-picton-blue"><?php echo $value['input_project_location'] ?></span></li>
                                 <li class="list-inline-item">
                                   <time class="font-italic text-middle text-picton-blue" datetime="2019-01-01"><?php echo $value['date_created'] ?></time>
                                 </li>
                               </ul>
                             </div>
                           </div>
                         </section>
                       </div></a>
             </div>
<?php } ?>




           </div>
         </div>
       </div>
       <div class="offset-top-66">
               <!-- Bootstrap Pagination-->
               <nav>
                 <ul class="pagination justify-content-center">
                   <li class="page-item disabled"><a class="page-link" href="#" aria-label="Previous"><span class="novi-icon mdi mdi-chevron-double-left" aria-hidden="true"></span></a></li>
                   <!-- <li class="page-item active"><a class="page-link" href="#">1</a></li>
                   <li class="page-item"><a class="page-link" href="#">2</a></li>
                   <li class="page-item"><a class="page-link" href="#">3</a></li>
                   <li class="page-item"><a class="page-link" href="#">4</a></li> -->
                   <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span class="novi-icon mdi mdi-chevron-double-right" aria-hidden="true"></span></a></li>
                 </ul>
               </nav>
       </div>
     </div>
   </section>
   <!-- Page Footers-->
   <!-- Default footer-->
<?php include 'includes/footer.php'; ?>
 </div>
 <!-- Global RD Mailform Output -->
 <div class="snackbars" id="form-output-global"></div>
 <script src="js/core.min.js"></script>
 <script src="js/script.js"></script>
</body><!-- Google Tag Manager --><noscript><iframe src="http://www.googletagmanager.com/ns.html?id=GTM-P9FT69"height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript><script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='../../www.googletagmanager.com/gtm5445.html?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-P9FT69');</script><!-- End Google Tag Manager -->
</html>
