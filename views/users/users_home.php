<?php
$blog = selectContent($conn,"panel_blog",[]);
$project = selectContent($conn,"panel_project",[]);
$frontage = selectContent($conn,'panel_frontage',[]);
$testimony = selectContent($conn,'panel_expression',[]);
// $category_id = fetchitem($conn,'frontage');
$services =  selectContent($conn,'panel_services',[]);
// $service =  getFirstServices($conn);

$page_name = "home";
$page_title = "Home";
// die(var_dump($testimony));
$ab = selectContent($conn,'panel_about',[]);

$bloga = selectContentDesc($conn,'panel_blog',[],'id',3);

// extract($project);
?>


<?php include "includes/header.php"; ?>
<!-- <style media="screen">
html {
background: url(images/bg.jpg) no-repeat center center fixed;
-webkit-background-size: cover;
-moz-background-size: cover;
-o-background-size: cover;
background-size: cover;
}
</style> -->
<!--Swiper-->
<div class="clearfix">

</div>
<div class="" style="width:100%; height:15vh; background-color:#191919" data-loop="true" data-autoplay="true" data-height="100vh" data-dragable="false" data-min-height="480px">
</div>
</header>

<!-- Skills-->
<section id="slider">
  <!-- <div class="overlay" style="width:100%; height:100%; position:absolute; background-color:black; z-index:150; opacity:0.4">  </div> -->
  <div class="tp-banner-container">

    <div class="tp-banner">

      <ul>
        <?php foreach ($frontage as $key => $value): ?>


          <li class="tp-revslider-slidesli active-revslide current-sr-slide-visible" data-slotamount="7" data-masterspeed="2000" data-thumb="<?php echo $value['image_1'] ?>" data-delay="6000" data-saveperformance="on">

            <img src="assets/img/dummy.png" alt="laptopmockup_sliderdy" data-lazyload="<?php echo $value['image_1'] ?>" data-bgposition="top" data-duration="6000" data-ease="Power0.easeInOut" data-bgfit="100%" data-bgfitend="100%" data-bgpositionend="center">

            <div class="tp-caption largeHeadingWhite customin customout tp-resizeme rs-parallaxlevel-0 start" data-x="center" data-y="center" data-voffset="-80" data-customin="x:0;y:0;z:0;rotationX:90;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;" data-customout="x:0;y:0;z:0;rotationX:90;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;" data-speed="1200" data-start="1550" data-easing="Back.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="400" data-endeasing="Back.easeIn" style="z-index: 360;" >
              <h1 style="text-align: center; min-height: 0px; min-width: 0px; line-height: 94px; border-width: 0px;  padding: 0px; letter-spacing: 2px; font-size: 50px; text-transform: uppercase;text-shadow: 2px 2px 5px black; font-weight: 700;white-space:normal; z-index: 360;color: #fff;"><?php echo $value['input_header_title'] ?></h1>
            </div>

            <div class="tp-caption detailText p lft tp-resizeme rs-parallaxlevel-0 start" data-x="center" data-y="center" data-voffset="0" data-speed="1200" data-start="2100" data-easing="easeInOutExpo" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300" style="z-index: 360;">
              <h5 style="min-height: 0px; min-width: 0px; line-height: 30px; border-width: 0px; margin: 0px 0px 20px; padding: 0px; letter-spacing: 0px; font-size:4.5vw; color: #fff; z-index: 360; text-shadow: 2px 2px 5px black; white-space:normal; text-align: center;"><?php echo $value['text_body'] ?></h5>
            </div>

            <!-- <div class="tp-caption lfb tp-resizeme rs-parallaxlevel-0 start" data-x="center" data-y="center" data-voffset="60" data-speed="1200" data-start="2700" data-easing="easeInOutExpo" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300" style="z-index: 11;">
            <a href="#" class="btn btn-common btn-lg">Get Started</a>
          </div> -->
        </li>
      <?php endforeach; ?>



    </ul>
  </div>
</div>
</section>

<section class="section novi-background section-66 section-xl-110">
  <div class="container-fluid">
    <div>
      <h2><span class="big"> Core Values</span></h2>
    </div>
    <div class="offset-top-24 d-none d-lg-block">
      <hr class="divider bg-mantis">
    </div>





    <div class="offset-top-30 offset-xxl-top-66">
      <div class="row justify-content-sm-center grid-group-md">
        <div class="col-sm-6 col-md-3 col-lg-2 col-xxl-1">
          <div class="blurb-mini wow fadeInLeft" data-wow-delay="0.6s">
            <div class="img-wrap bg-lighter"><img width="50" height="50" src="/integrity-icon-png-4.png" alt=""></div>
            <div class="caption">Integrity</div>
          </div>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-2 col-xxl-1">
          <div class="blurb-mini wow fadeInRight" data-wow-delay="0.4s">
            <div class="img-wrap bg-lighter"><img width="50" height="50" src="/11-512.png" alt=""></div>
            <div class="caption">Assertiveness</div>
          </div>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-2 col-xxl-1">
          <div class="blurb-mini wow fadeInLeft" data-wow-delay="0.2s">
            <div class="img-wrap bg-lighter"><img width="50" height="50" src="/4P-icon-purpose-red.png" alt=""></div>
            <div class="caption">Passion</div>
          </div>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-2 col-xxl-1">
          <div class="blurb-mini wow fadeInRight">
            <div class="img-wrap bg-lighter"><img width="50" height="50" src="/credibility-icon.png" alt=""></div>
            <div class="caption">Credibility</div>
          </div>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-2 col-xxl-1">
          <div class="blurb-mini wow fadeInLeft">
            <div class="img-wrap bg-lighter"><img width="50" height="50" src="/ERE-Icon_Commercial-Excellence.png" alt=""></div>
            <div class="caption">Excellence</div>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>

<!-- Modal -->




<section class="section novi-background section-66 section-lg-98 section-xl-124 bg-lighter">
  <div class="container">
    <div>
      <!-- <h2><span class="big">About</span></h2> -->
    </div>
    <br>
    <?php foreach($ab as $key => $value): ?>

      <div class="offset-lg-top-30 offset-xxl-top-66 text-lg-left">
        <div class="row justify-content-lg-center justify-content-xxl-between grid-group-md">
          <div class="col-lg-6 col-xl-5">
            <div class="unit flex-lg-row align-items-lg-center">

            </div>
            <p class="offset-top-20"> <?php extract($value);
            // $someAbout = previewRealBody($body, 95);
            // echo $someAbout[0];

            ?><p>Juvenile delinquency has become a thing of concern among the youths particularly the young girls. This, we know is a threat to Humanity because of the fact that our population grows rapidly on daily basis without our national economy being on the same page of growth with it. This has lead many into lack, frustration and depression. Our youths, in order not to fall victim, have mostly diverted into all sorts of acts which are not all healthy to our society and our nation at large. Those who felt being FAILURES/ABANDONED are taken their lives through suicide. Young girls have become more vulnerable and unattended to.</p>

<p>KIMTEYG is that platform created by a woman with passion for teenagers, especially the young girls (both single &amp; married), to mentor, teach and empower them in all aspect of life.</p>

<p>This we do with aim of training the underserved girls to become; <li>Self- developed</li>
  <li>Self- improved </li>
  <li>Self- Nurtured </li>
  <li>Highly productive.</li>
</p></p>

          </div>
          <div class="col-lg-6">
            <div class="">
              <img style="width:100%; height:auto" src="/image/2.jpg" alt="">
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</section>



<section class="section novi-background section-66 section-xl-110">
  <div class="container-fluid">

  <div class="offset-top-30 offset-xxl-top-66">
      <div class="row justify-content-sm-center grid-group-md">
        <div class="col-sm-6 col-md-4 col-lg-2 col-xxl-1">

          <div class="blurb-mini wow fadeInLeft" data-wow-delay="0.6s" data-toggle="modal" data-target="#myModal">
            <div class="img-wrap bg-lighter"><img width="50" height="50" src="/image/10.png" alt=""></div>
            <div class="caption">Vison</div>
          </div>

        </div>
        <div class="col-sm-6 col-md-4 col-lg-2 col-xxl-1">
          <div class="blurb-mini wow fadeInRight" data-wow-delay="0.4s" data-toggle="modal" data-target="#myModal1">
            <div class="img-wrap bg-lighter"><img width="50" height="50" src="/image/11.png" alt=""></div>
            <div class="caption">Mission</div>
          </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-2 col-xxl-1">
          <div class="blurb-mini wow fadeInLeft" data-wow-delay="0.2s" data-toggle="modal" data-target="#myModal2">
            <div class="img-wrap bg-lighter"><img width="50" height="50" src="/image/12.png" alt=""></div>
            <div class="caption">Drive</div>
          </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-2 col-xxl-1">
          <div class="blurb-mini wow fadeInRight" data-wow-delay="0.3s" data-toggle="modal" data-target="#myModal3">
            <div class="img-wrap bg-lighter"><img width="50" height="50" src="/image/13.png" alt=""></div>
            <div class="caption">Pledge</div>
          </div>
        </div>


      </div>
    </div>
  </div>
</section>


<!-- Modal -->
<div class="container">
  <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">

        </div>
        <div class="modal-body">
          <h4>Vision</h4>
          <p>To empower today's girls to become virteously productive through godly moral and value</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>
  <div id="myModal1" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">

        </div>
        <div class="modal-body">
          <h4>Mission</h4>
          <p>Building women of nobility that will become agents of positive change through; Mentoring, Teaching/Training, Counselling and thorough Empowerment.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>
  <div id="myModal2" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">

        </div>
        <div class="modal-body">
          <h4>Drive</h4>
          <p>To nurture young girls to be ASSERTIVE, BOLD, SELF-DEVELOPED, SELF-CONFIDENT and INTELLECTUAL.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>
  <div id="myModal3" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">

        </div>
        <div class="modal-body">
          <h4>Pledge</h4>
          <p>Citadel of Glory Unleashed potential Gift of enrichment Endowed with great value I AM D KEILA.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>
</div>
<!-- Our Works -->



<section class="section novi-background section-66 section-lg-98 section-xl-124 bg-lighter">
  <div class="container">
    <h2>Testimonials</h2>
    <hr class="divider divider-md bg-mantis">
    <div class="offset-top-50">
      <!-- Testimonials Slider v.4-->
      <div class="owl-carousel owl-carousel-classic owl-carousel-class-light owl-carousel-testimonials-3 veil-owl-nav" data-items="1" data-md-items="2" data-xl-items="3" data-nav="false" data-dots="true" data-margin="50px" data-lg-margin="50px" data-xl-margin="50px">
        <?php foreach ($testimony as $key => $value) {
          // code...
          ?>
          <div>
            <blockquote class="quote quote-slider-4 unit uni-spacing-sm flex-md-row">
              <div class="unit-left"><img class="quote-img rounded-circle" width="80" height="80" src="<?php echo $value['image_1'] ?>"/></div>
              <div class="unit-body text-left">
                <div>
                  <p>
                    <q><?php echo $value['text_testimony'] ?></q>
                  </p>
                </div>
                <p class="font-weight-bold quote-author offset-top-10 offset-md-top-4">
                  <cite class="text-normal"><?php echo $value['input_name'] ?></cite>
                </p>
              </div>
            </blockquote>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
</section>
<section class="section novi-background section-66" id="section-childs">
  <div class="container-fluid">
    <div>
      <h2>  <span class="xs-title">Latest Blogs</span>
      </h2>
    </div>
    <div class="offset-top-24 d-none d-lg-block">
      <hr class="divider bg-mantis">
    </div>

    <div class="offset-top-30 offset-xxl-top-66">
      <div class="row grid-group-md">


        <?php foreach ($bloga as $blog => $value): ?>
          <?php $some =  previewBody($value['text_body'], 33); ?>
          <div class="col-lg-6 col-xl-4 offset-top-66 offset-md-top-30 offset-lg-top-0">
            <!-- Post Boxed--><a class="d-block" href="viewBlog?id=<?php echo $value['hash_id'] ?>">
            <div class="post post-boxed">
              <!-- Post media-->
              <header class="post-media"><img class="img-fluid" width="570" height="321" src="<?php echo $value['image_1']; ?>" alt=""></header>
              <!-- Post content-->
              <section class="post-content text-left">

                <div class="post-body">
                  <!-- Post Title-->
                  <div class="post-title">
                    <h6 title="<?php echo $value['input_title'] ?>"><?php echo $value['input_title'] ?></h6>
                  </div>
                  <div class="post-meta small">
                    <ul class="list-inline list-inline-sm p">
                      <li class="list-inline-item font-italic text-middle">by&nbsp;<span class="text-picton-blue"><?php echo $value['input_author'] ?></span></li>
                      <li class="list-inline-item"><span class="text-middle novi-icon icon-xxs mdi mdi-clock"></span>
                        <time class="font-italic text-middle text-picton-blue" datetime="2019-01-01"><?php echo $value['date_created'] ?></time>
                      </li>
                    </ul>
                  </div>
                </div>
              </section>
            </div></a>
          </div>
        <?php endforeach; ?>

      </div>
    </div>
  </div>
</section>

<!-- Core features-->

<!-- Buy Now-->
<!-- Call to action type 2-->

<!-- Core features-->

<!-- Features-->

<!-- Revolution-->

<!-- Extremely Responsive and Retina-->

<!-- PSD Included-->

<!-- Home Intro footer-->
<?php include 'includes/footer.php'; ?>
</div>
<!-- Global RD Mailform Output -->
<div class="snackbars" id="form-output-global"></div>
<script src="js/core.min.js"></script>
<script src="js/script.js"></script>

<script type="text/javascript" src="/slider/assets/js/jquery-min.js"></script>
<script type="text/javascript" src="/slider/assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/slider/assets/js/material.min.js"></script>
<script type="text/javascript" src="/slider/assets/js/material-kit.js"></script>
<script type="text/javascript" src="/slider/assets/js/jquery.parallax.js"></script>
<script type="text/javascript" src="/slider/assets/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="/slider/assets/js/wow.js"></script>
<script type="text/javascript" src="/slider/assets/js/main.js"></script>
<script type="text/javascript" src="/slider/assets/js/jquery.counterup.min.js"></script>
<script type="text/javascript" src="/slider/assets/js/waypoints.min.js"></script>
<script type="text/javascript" src="/slider/assets/js/jasny-bootstrap.min.js"></script>
<script type="text/javascript" src="/slider/assets/js/form-validator.min.js"></script>
<script type="text/javascript" src="/slider/assets/js/contact-form-script.js"></script>
<script type="text/javascript" src="/slider/assets/js/jquery.themepunch.revolution.min.js"></script>
<script type="text/javascript" src="/slider/assets/js/jquery.themepunch.tools.min.js"></script>
<script src="slider/assets/js/bootstrap-select.min.js"></script>
<!--LIVEDEMO_00 -->




</body>
</html>
