<?php
ob_start();
session_start();
include("include/link_include.php");
include("include/authentication.php");
include("include/levelcheck.php");
include("include/student_limit.php");
include("include/level1_limit.php");
authenticate();
if(isset($_SESSION['id'])){
  $session = $_SESSION['id'];
}
$info = adminInfo($conn,$session);
extract($info);


$error = [];
if(array_key_exists('submit', $_POST)){
  $ext = ["image/jpg", "image/JPG", "image/jpeg", "image/JPEG", "image/png", "image/PNG"];
  if(empty($_FILES['img']['name'])){
    $error['upload'] = "Please choose file";
  }
  if(empty($_POST['header_title'])){
    $error['header_title'] = "Enter Header Title";
  }
  if(empty($_POST['txt'])){
    $error['txt'] = "Enter Text";
}
  if(empty($error)){
    $ver = compressImage($_FILES,'img',50, 'uploads/' );
    $clean =  array_map('trim',$_POST );
    addFrontage($conn, $clean, $ver,$hash_id);
  }
}


?>







<section id="content">
<div class="container">
<div class="row">
  <?php
  $errmsg = [];
  if(array_key_exists('send', $_POST)){
    if(empty($_POST['tesname'])){
      $errmsg['tesname'] = "Please enter Name";
    }
    $ext = ["image/jpg", "image/JPG", "image/jpeg", "image/JPEG", "image/png", "image/PNG"];
    if(empty($_FILES['img']['name'])){
      $error['upload'] = "Please choose file";
    }
    if(empty($_POST['expression'])){
      $errmsg['expression'] = "Please enter Testimony";
    }
    if(empty($errmsg)){
      $ver = compressImage($_FILES,'img',50, 'uploads/' );
      addExpression($conn,$ver, $_POST);

    }
  }
  ?>
  <br>
  <br>
  <h3>Testimony</h3>
  <hr>
  <h5>Testimony</h5>
  <div  class="alert alert-info" role="alert">
   <strong>Note</strong>
   <p><strong>*</strong>This Testimony is displayed on theHome Page of the Hathany Cosmos Foundationspage</p>
   <p><strong>*</strong>If you press Delete, the particular Testimony will be deleted</p>
  </div>
  <div class="bs-docs-example">
    <div class="dt-responsive table-responsive">


    <table  id="simpletable" class="table table-striped table-hover" >
      <thead>


      <tr>
        <th width="100">Name</th>
        <th>Testimony</th>
        <th width="100">Image</th>
        <th width="100">Delete</th>
      </tr>
        </thead>
      <tbody>
        <?php
        $vis = "show";
        viewExp($conn) ?>
      </tbody>
      <tr>
        <th width="100">Name</th>
        <th>Testimony</th>
        <th width="100">Image</th>
        <th width="100">Delete</th>
      </tr>
    </table>
        </div>
  </div>
<hr>

  <h3>Please Enter Testimony</h3>
  <form class="login-form" action="" method="post" enctype="multipart/form-data" >
    <div class="form-group">
      <label for="tesname"> Name</label>
      <input type="text" class="form-control" name="tesname"  placeholder="Name" value="">
      <?php $display = displayErrors($errmsg, "tesname");
        echo $display
      ?>
    </div>
    <div class="form-group">
      <label for="expression"> Testimony</label>
      <textarea class="form-control" name="expression" rows="8" cls="80"></textarea>
      <?php $display = displayErrors($errmsg, "expression");
        echo $display
      ?>
    </div><br>

    <h2 class="title-2">Add Image here</h2>
    <div class="form-group">
    <label class="control-label">Add images</label>
    <?php $display = displayErrors($error, 'img');
      echo $display ?> <br>
     <input class="file" id="featured-img" type="file" name="img"><br>
    <br></div>


    <div class="form-group">
      <input type="submit" class="btn btn-common" name="send" value="Add Testimony">
    </div>
  </form>
</div>
</div>
</div>
</section>

<a class="back-to-top" href="#"><i class="fa fa-angle-up"></i></a>
<script src="assets/js/jquery-min.js" type="text/javascript">
  </script>
  <script src="/da/assets/plugins/data-tables/js/datatables.min.js"></script>
  <script src="/da/assets/js/pages/data-basic-custom.js"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript">
  </script>
<script src="assets/js/material.min.js" type="text/javascript">
  </script>
<script src="assets/js/material-kit.js" type="text/javascript">
  </script>
<script src="assets/js/jquery.parallax.js" type="text/javascript">
  </script>
<script src="assets/js/owl.carousel.min.js" type="text/javascript">
  </script>
<script src="assets/js/wow.js" type="text/javascript">
  </script>
<script src="assets/js/main.js" type="text/javascript">
  </script>
<script src="assets/js/jquery.counterup.min.js" type="text/javascript">
  </script>
<script src="assets/js/waypoints.min.js" type="text/javascript">
  </script>
<script src="assets/js/jasny-bootstrap.min.js" type="text/javascript">
  </script>
<script src="assets/js/form-validator.min.js" type="text/javascript">
  </script>
<script src="assets/js/contact-form-script.js" type="text/javascript">
  </script>
<script src="assets/js/jquery.themepunch.revolution.min.js" type="text/javascript">
  </script>
<script src="assets/js/jquery.themepunch.tools.min.js" type="text/javascript">
  </script>
<script src="assets/js/bootstrap-select.min.js">
  </script>
<script src="assets/js/fileinput.js">
  </script>
</body>

<!-- Mirrored from demo.graygrids.com/themes/classix-template/post-ads.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 16 Nov 2017 11:40:57 GMT -->
</html>
