<?php
session_start();

include("include/link_include.php");
include("include/authentication.php");
include("include/levelcheck.php");
include("include/student_limit.php");
include("include/level1_limit.php");
include("include/level2_limit.php");
authenticate();

$gt = expDetail($conn, $_GET);
extract($gt);
// logs($conn,'deleted', 'Expression_by:'.$Name,'Expression',$_SESSION['id'] );
deleteExp($conn, $_GET);
 ?>
