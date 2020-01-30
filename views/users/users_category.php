<?php
ob_start();
$page_title = "Category";
include "includes/header.php";
  $show = fetchAllProducts($conn);
  $category = fetchCategory($conn)

 ?>

      <section class="section-md bg-white">
        <div class="shell">
          <h3>Fertilizer Spreaders</h3>
          <div class="row isotope-wrap">
            <!-- Isotope Filters-->
            <div class="col-lg-12">
              <div class="isotope-filters isotope-filters-horizontal tabs-custom tabs-horizontal">
                <ul class="nav-custom nav-custom-tabs group-tabs">
                  <li class="active" data-isotope-filter="*" data-isotope-group="gallery"><a href="#">All<span class="icon-arrow icon-rotate-90 material-icons-keyboard_backspace"></span></a></li>
                  <?php

                    foreach ($category as $key => $cat) {
                        extract($cat)
                   ?>
                  <li data-isotope-filter=<?php echo "Type". $id ?> data-isotope-group="gallery"><a href="#"><?php echo $category_name; ?><span class="icon-arrow icon-rotate-90 material-icons-keyboard_backspace"></span></a></li>
                  <?php } ?>
                </ul>
              </div>
            </div>
            <!-- Isotope Content-->
            <div class="col-lg-12">
              <div class="isotope row column-offset-30" data-isotope-layout="fitRows" data-isotope-group="gallery">
                <?php foreach ($show as $key => $value) {
                        extract($value);
                 ?>
                <div class="col-md-4 col-sm-6 col-xs-12 isotope-item" data-filter=<?php  echo "Type".$category; ?>>
                  <div class="box-product">
                    <a <?php echo 'href=product?hid='.$hash_id.'' ?>><div class="box-product-img" style="background:url(<?php echo $image_1; ?>); height:370px; width: 370px; background-size: cover; background-position: center; background-repeat: no-repeat;" class=""> </div></a><a class="link" href="product-page.html"><?php echo $product_name; ?></a>
                      <p><?php  $bd = previewBody($text_description, 8); echo $bd; ?></p>

                    <div class="group-sm"><span class="box-product-price big">$29.97</span>
                    </div><a class="button button-xs button-primary" <?php echo 'href=product?hid='.$hash_id.'' ?>>Preview<span class="icon-arrow icon-rotate-90 material-icons-keyboard_backspace"></span></a>
                  </div>
                </div>
                <?php } ?>
                <!--  -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="section-md bg-white">
        <div class="shell">
          <div class="range range-30 range-center">
            <div class="cell-lg-6 cell-md-8 cell-sm-10"><a class="box-sale bg-primary" href="#">
                <div class="box-sale-content">
                  <h2>Save big <span class="heading-small">on outdoor gear!</span></h2>
                  <h3 class="arrow-long">Shop early and get up to <span class="text-bold">60%</span> off<span class="icon-arrow icon-rotate-180 material-icons-keyboard_backspace"></span></h3>
                </div></a></div>
            <div class="cell-lg-6 cell-md-8 cell-sm-10"><a class="box-sale bg-primary-dark" href="#">
                <div class="box-sale-content">
                  <h2>Gaet up to 70% off</h2>
                  <h3>Shop now for Home Outdoor Savings<span class="icon-arrow icon-rotate-180 material-icons-keyboard_backspace"></span></h3>
                </div></a></div>
          </div>
        </div>
      </section>
      <!-- Page Footer-->
<?php
include "includes/footer.php";

 ?>
