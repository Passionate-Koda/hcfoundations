<?php
session_start();
include("include/link_include.php");
include("include/authentication.php");
include("include/levelcheck.php");
include("include/student_limit.php");
include("include/level1_limit.php");
include("include/level2_limit.php");
authenticate();
$gt = frontageDetail($conn, $_GET);
extract($gt);

logs($conn,'deleted', 'frontage with the title:'.$header_title,'Frontage',$_SESSION['id']);
deleteFrontage($conn, $_GET);


 ?>
