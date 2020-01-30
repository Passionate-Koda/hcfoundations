<?php
ob_start();
session_start();
include("include/link_include.php");
include("include/authentication.php");
include("include/levelcheck.php");
include("include/level1_limit.php");
authenticate();
if(isset($_SESSION['id'])){
  $session = $_SESSION['id'];
}
$info = adminInfo($conn,$session);
extract($info);
$fname = ucwords($firstname);
$lname = ucwords($lastname);
// $edit_info = getEditInfo($conn,$_GET['id'],$_GET['t']);
$error= [];
if(array_key_exists('submit', $_POST)){
  $ext = ["image/jpg", "image/JPG", "image/jpeg", "image/JPEG", "image/png", "image/PNG"];
  if(empty($_FILES['upload']['name'])){
    $error['upload'] = "Please choose file";
  }
  if(empty($error)){


$targetDir = "uploads/";
   $allowTypes = array('jpg','png','jpeg','gif');
   $result = [];
  foreach($_FILES['upload']['name'] as $key=>$val){

    $fileName = basename($_FILES['upload']['name'][$key]);
    $rnd = rand(0000000, 9999999);
    $strip_name = str_replace(" ", "_", $fileName);
             $targetFilePath = $targetDir.$strip_name;
               $info = getimagesize($_FILES['upload']['tmp_name'][$key]);
               if ($info['mime'] == 'image/jpeg')
               $image = imagecreatefromjpeg($_FILES['upload']['tmp_name'][$key]);
               elseif ($info['mime'] == 'image/gif')
               $image = imagecreatefromgif($_FILES['upload']['tmp_name'][$key]);
               elseif ($info['mime'] == 'image/png')
               $image = imagecreatefrompng($_FILES['upload']['tmp_name'][$key]);
               imagejpeg($image,$targetFilePath, 50) or die("error");
              $result[] = $targetFilePath;

  }
  $dd = $_GET['id'];
foreach($result as $value){
try {
  $stmt = $conn->prepare("INSERT INTO images values(NULL,:dd,:im)");
  $stmt->bindParam(":dd",$dd);
  $stmt->bindParam(":im",$value);
  $stmt->execute();

  header("Location:manageProjects?success=Successfully_Uploaded");
} catch (\Exception $e) {
  die("Error");
}


}

  }
}
?>
<section id="content">
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
      <div class="col-sm-12 col-md-10 col-md-offset-1">
        <div class="page-ads box">


          <form class="form-ad" action="" method="post" enctype="multipart/form-data">
            <h2 class="title-2">Upload Multiple Image</h2>
            <div class="form-group">
              <?php $display = displayErrors($error, 'upload');
              echo $display ?> <br>
              <p>Do Not Upload More than 5 Multiple Images at once</p>
              <input class="file" id="featured-img" type="file" name="upload[]" multiple><br>
              <br>
              <input type="submit" class="btn btn-common" name="submit" value="Upload">
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <a class="back-to-top" href="#"><i class="fa fa-angle-up"></i></a>
  <!-- <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
  <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script> -->
  <script src="assets/js/jquery-min.js" type="text/javascript">
  </script>
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
