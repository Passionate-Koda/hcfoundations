<?php
ob_start();
session_start();
include("include/link_include.php");
include("include/authentication.php");
include("include/levelcheck.php");
authenticate();
if(isset($_SESSION['id'])){
  $session = $_SESSION['id'];
}
$info = adminInfo($conn,$session);
extract($info);
$fname = ucwords($firstname);
$lname = ucwords($lastname);
$edit_info = getEditInfo($conn,$_GET['id'],$_GET['t']);
// $edit_info2 = getEditInfo2($conn,$_GET[``'id'],$_GET['t']);
 ?>


<div id="content">
<div class="container">
<div class="row">
  <?php if (isset($_GET['success'])){
  $msg = str_replace('_', ' ', $_GET['success']);

    echo '<div class="col-md-12">
  <div class="inner-box posting">
  <div class="alert alert-success alert-lg" role="alert">
  <h2 class="postin-title">✔ Successful! '.$msg.' </h2>
  <p>Thank you '.ucwords($firstname).', Hathany Cosmos Foundations is happy to have you around. </p>
  </div>
  </div>
  </div>';
  } ?>
  <?php

  if($_GET['t'] == "blog"){
  echo '<a href="manageArticles"> <button class="btn btn-common" type="submit">Back</button></a>';
}
  if($_GET['t'] == "Insight"){
  echo '<a href="manageInsights"> <button class="btn btn-common" type="submit">Back</button></a>';
}
  if($_GET['t'] == "news"){
  echo '<a href="manageNews"> <button class="btn btn-common" type="submit">Back</button></a>';
}
  if($_GET['t'] == "grants"){
  echo '<a href="manageTrainings"> <button class="btn btn-common" type="submit">Back</button></a>';
}
  if($_GET['t'] == "report"){
  echo '<a href="manageReports"> <button class="btn btn-common" type="submit">Back</button></a>';
}
  if($_GET['t'] == "training"){
  echo '<a href="managePrograms"> <button class="btn btn-common" type="submit">Back</button></a>';
}
  if($_GET['t'] == "event"){
  echo '<a href="manageEvent"> <button class="btn btn-common" type="submit">Back</button></a>';
}
  if($_GET['t'] == "about"){
  echo '<a href="manageAbout"> <button class="btn btn-common" type="submit">Back</button></a>';
}
  if($_GET['t'] == "campus_news"){
  echo '<a href="manageCampusNews"> <button class="btn btn-common" type="submit">Back</button></a>';
}
  if($_GET['t'] == "campus_article"){
  echo '<a href="manageCampusArticles"> <button class="btn btn-common" type="submit">Back</button></a>';
}
  if($_GET['t'] == "exploits"){
  echo '<a href="manageExploits"> <button class="btn btn-common" type="submit">Back</button></a>';
}

   ?>
   <br>
   <br>


  <div class="col-md-8">

  <div class="blog-post single-post">
  <div class="">
    <?php if($_GET['t'] == "news" || $_GET['t'] == "campus_news"){ ?>
  <h4 class="post-title"><a href="#"><?php echo $edit_info['headline'] ?></a></h4>
    <?php getBody($conn,$_GET['id'],$_GET['t']) ?>
<?php }elseif($_GET['t'] ==  "event"){ ?>
  <h4 class="post-title"><a href="#"><?php echo $edit_info['event_name'] ?></a></h4>
  <?php echo $edit_info['about'] ?>
<?php }elseif($_GET['t'] ==  "about"){ ?>

  <?php
$edit_info2 = getEditInfo2($conn,$_GET['id'],$_GET['t']);
   echo $edit_info2['body'] ?>
<?php }elseif($_GET['t'] ==  "project"){ ?>
<h4 class="post-title"><a href="#"><?php echo $edit_info['project_name'] ?></a></h4>
  <?php echo $edit_info['about'] ?>

<?php }elseif($_GET['t'] ==  "product"){ ?>
<h4 class="post-title"><a href="#"><?php echo $edit_info['product_name'] ?></a></h4>
  <?php echo $edit_info['description'] ?>

<?php }elseif($_GET['t'] ==  "service_booking"){ ?>
<h4 class="post-title"><a href="#"><?php echo $edit_info['name'] ?></a></h4>
  <?php echo $edit_info['service_order'] ?>

<?php }elseif($_GET['t'] ==  "quote"){ ?>
<h4 class="post-title"><a href="#"><?php echo $edit_info['name'] ?></a></h4>
  <?php echo $edit_info['customer_order'] ?>

<?php }else{ ?>
  <h4 class="post-title"><a href="#"><?php echo $edit_info['title'] ?></a></h4>
    <?php getBody($conn,$_GET['id'],$_GET['t']) ?>
<?php } ?>

  </div>
  </div>
  </div>





</div>
</div>
</div>



<script type="text/javascript" src="assets/js/jquery-min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/material.min.js"></script>
<script type="text/javascript" src="assets/js/material-kit.js"></script>
<script type="text/javascript" src="assets/js/jquery.parallax.js"></script>
<script type="text/javascript" src="assets/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="assets/js/wow.js"></script>
<script type="text/javascript" src="assets/js/main.js"></script>
<script type="text/javascript" src="assets/js/jquery.counterup.min.js"></script>
<script type="text/javascript" src="assets/js/waypoints.min.js"></script>
<script type="text/javascript" src="assets/js/jasny-bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/form-validator.min.js"></script>
<script type="text/javascript" src="assets/js/contact-form-script.js"></script>
<script type="text/javascript" src="assets/js/jquery.themepunch.revolution.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.themepunch.tools.min.js"></script>
<script src="assets/js/bootstrap-select.min.js"></script>
</body>

<!-- Mirrored from demo.graygrids.com/themes/classix-template/account-saved-search.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 16 Nov 2017 11:42:23 GMT -->
</html>
