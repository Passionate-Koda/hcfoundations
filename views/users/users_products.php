<?php 
ob_start();
$page_title = "Products";
include "includes/header.php";
 $product = getProductById($conn, $_GET['hid']);
 extract($product);
 $show = fetchProductByCategory($conn, $category);
 ?>

      <section class="section-xs bg-white">
        <div class="shell">
          <h2>Product page</h2>
          <div class="range range-50 range-md-90">
            <div class="cell-md-5">
              <div class="slick-vertical">
                <!-- Slick Carousel -->
                <div class="slick-slider carousel-parent" data-arrows="false" data-loop="false" data-dots="false" data-swipe="true" data-items="1" data-child="#child-carousel" data-for="#child-carousel">
                  <div class="item"><img src=<div class="box-product-img" style="background:url(<?php echo $image_1; ?>); height:370px; width: 370px; background-size: cover; background-position: center; background-repeat: no-repeat;" class="">
                  </div>
                </div>
                <div >
                  <div class="item">
                  </div>
                </div>
              </div>
            </div>
            <div class="cell-md-7 single-product">
              <h3><?php echo $product_name; ?></h3>
              <p class="big"><?php echo $description; ?></p>
              <!-- <div class="product-rating"><span class="icon fa-star"></span><span class="icon fa-star"></span><span class="icon fa-star"></span><span class="icon fa-star"></span><span class="icon fa-star inactive"></span><a class="link" href="#">2 customer reviews</a></div> -->
             <!--  <div class="product-item"><span class="stepper-var-1 product-number group-sm">
                  <input class="form-input" type="number" data-zeros="true" value="1" min="1" max="1000"><span class="heading-6">Quantity</span></span></div>
              <div class="product-price group-lg"><span class="price heading-4">$72.47</span><span class="price-before-sale heading-4">$79.80</span></div> --><a class="button button-primary" <?php echo 'href=quote?hid='.$hash_id.'' ?>>Order<span class="icon-arrow icon-rotate-90 material-icons-keyboard_backspace"></span></a>
              <div class="product-social group-sm"><span class="heading-6 text-gray-light">Share this:</span>
                <ul class="list-inline list-inline-2">
                  <li><a class="fa fa-xsm fa-facebook icon-xxs" href="#"></a></li>
                  <li><a class="fa fa-xsm fa-twitter icon-xxs" href="#"></a></li>
                  <li><a class="fa fa-xsm fa-google-plus icon-xxs" href="#"></a></li>
                  <li><a class="fa fa-xsm fa-instagram icon-xxs" href="#"></a></li>
                  <li><a class="fa fa-xsm fa-pinterest-p icon-xxs" href="#"></a></li>
                  <li><a class="fa fa-xsm fa-feed icon-xxs" href="#"></a></li>
                  <li><a class="fa fa-xsm fa-envelope icon-xxs" href="#"></a></li>
                </ul>
              </div>
            </div>
            <div class="cell-lg-5 cell-md-4">
            </div>
            
              <div class="blog-item">
        </div>
      </section>
      <section class="section-md bg-white">
        <div class="shell shell-inset-owl">
          <h3>Related products</h3>
          <div class="owl-carousel owl-modern owl-products owl-nav-default" data-items="1" data-xs-items="2" data-sm-items="3" data-lg-items="4" data-stage-padding="0" data-loop="true" data-margin="30" data-dots="true" data-nav="true" data-autoplay="true">
            <?php 
                foreach ($show as $key => $value) {
                    extract($value);
                             ?>
            <div class="owl-item">
              <div class="box-product">
                <a <?php echo 'href=product?hid='.$hash_id.'' ?>><div class="box-product-img" style="background:url(<?php echo $image_1; ?>); height:264px; width: 270px; background-size: cover; background-position: center; background-repeat: no-repeat;" class=""></div></a>
                <p><a <?php echo 'href=product?hid='.$hash_id.'' ?>><?php echo "<b>".$product_name."</b>"; ?> - <?php  $bd = previewBody($description, 8); echo $bd; ?></a></p>
                <div class="group-sm"><span class="box-product-price">$27.60</span>
                </div><a class="button button-xs button-primary" <?php echo 'href=product?hid='.$hash_id.'' ?>>Preview<span class="icon-arrow icon-rotate-90 material-icons-keyboard_backspace"></span></a>
              </div>
            </div>
            <?php } ?>
          </div>
        </div>
      </section>
      <!-- Page Footer-->
     <?php include "includes/footer.php"; ?>