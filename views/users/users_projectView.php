<?php
ob_start();
$page_title = "Project View";
$page_name = "project";
if (isset($_GET['id'])) {
    $project = selectContent($conn,'panel_project',["hash_id"=>$_GET['id']]);
    $more = selectContent($conn,'images',["asset_hash_id"=>$_GET['id']]);
extract($project[0]);

}else{
 header("Location:/project");
}
  include "includes/header.php";
  // $recent = recentProjectPost($conn);

   // $recent = recentProjectPost($conn);
   $recent = selectContentDesc($conn,"panel_project",[],"id",3);

 ?>
 <style media="screen">
   img{
     width: 100%;
   }
 </style>
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
            <div class="col-xl-2 d-none d-md-block"><span class="icon icon-white mdi mdi-presentation"></span></div>
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
      <!-- Section Grow Your Business-->
      <section class="section novi-background section-98 section-110">
        <div class="container">
          <h1><?php echo $input_project_name ?></h1>
          <hr class="divider bg-mantis">
          <div class="row justify-content-md-center offset-top-66">
            <!-- Simple quote Slider-->
            <div class="col-md-8 col-lg-8 inset-lg-right-80">
              <div class="owl-carousel owl-carousel-classic owl-carousel-class-light shadow-drop-md" data-items="1" data-nav="false" data-dots="false" data-nav-custom=".owl-custom-navigation">


                <div><img class="img-fluid element-fullwidth" src="<?php echo $image_1 ?>" width="716" height="404" alt=""></div>
              </div>
              <div id="inside-div" class="row">
                <div class="container">
                  <h1>Related Projects</h1>
                  <hr class="divider bg-mantis">
                  <div class="row offset-top-66 justify-content-sm-center text-left">

                    <?php foreach ($recent as $key => $value): ?>
                      <?php extract($value); ?>
                    <div class="col-sm-10 col-md-6 col-lg-3 offset-top-50 offset-md-top-0"><a class="thumbnail-classic" href="projectView?id=<?php echo $value['hash_id'] ?>" target="_blank">
                              <figure><img width="370" height="278" src="<?php echo $image_1?>" alt="">
                              </figure></a>
                      <div>
                        <h6 class="offset-top-24"><a href="projectView?id=<?php echo $value['hash_id'] ?>"><?php echo $input_project_name ?></a></h6>
                      </div>
                      <p class="text-dark offset-top-4 text-extra-small"><?php echo $input_project_location ?></p>
                    </div>
                       <?php endforeach; ?>


                  </div>
                </div>
             </div>
            </div>
            <div class="col-lg-4">
        <?php echo $text_about ?>
              <div class="owl-custom-navigation owl-customer-navigation offset-top-24">

              </div>
                        <?php include 'share/blog_buttons.php'; ?>
            </div>
          </div>
        </div>
      </section>
      <!-- Portfolio Grid 3 columns-->

      <!-- section related project-->
      <section id="outsideSection" class="section novi-background section-top-98 section-bottom-124">
        <div class="container">
          <h1>Related Projects</h1>
          <hr class="divider bg-mantis">
          <div class="row offset-top-66 justify-content-sm-center text-left">

            <?php foreach ($recent as $key => $value): ?>
              <?php extract($value); ?>
            <div class="col-sm-10 col-md-6 col-lg-3 offset-top-50 offset-md-top-0"><a class="thumbnail-classic" href="projectView?id=<?php echo $value['hash_id'] ?>" target="_blank">
                      <figure><img width="370" height="278" src="<?php echo $image_1?>" alt="">
                      </figure></a>
              <div>
                <h6 class="offset-top-24"><a href="projectView?id=<?php echo $value['hash_id'] ?>"><?php echo $input_project_name ?></a></h6>
              </div>
              <p class="text-dark offset-top-4 text-extra-small"><?php echo $input_project_location ?></p>
            </div>
               <?php endforeach; ?>


          </div>
        </div>
      </section>
      <!-- Page Footer-->
      <!-- Default footer-->
<?php include 'includes/footer.php'; ?>
    </div>
    <!-- Global RD Mailform Output -->
    <div class="snackbars" id="form-output-global"></div>
    <script src="js/core.min.js"></script>
    <script src="js/script.js"></script>
    <script type="text/javascript">

      if(window.innerWidth > 992){
document.getElementById('inside-div').style.display = 'block';
document.getElementById('outsideSection').style.display = 'none';
      }else{
        document.getElementById('inside-div').style.display = 'none';
        document.getElementById('outsideSection').style.display = 'block';
      }
    </script>
  </body><!-- Google Tag Manager --><noscript><iframe src="http://www.googletagmanager.com/ns.html?id=GTM-P9FT69"height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript><script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='../../www.googletagmanager.com/gtm5445.html?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-P9FT69');</script><!-- End Google Tag Manager -->
</html>
