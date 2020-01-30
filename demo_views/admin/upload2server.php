<?php

// print_r($_FILES);



$image =  compressImage21($_FILES,'upload',50,'image/');
// var_dump($_GET); // Element 'foo' is string(1) "a"
// // var_dump($_POST); // Element 'bar' is string(1) "b"
// var_dump($_REQUEST); // Does not contain elements 'foo' or 'bar'
// var_dump($_SERVER); // Does not contain elements 'foo' or 'bar'
//
// die();


// $url = "http://192.168.33.11/uploads/1548073709777870412074657_420760774787831_4993766859180329083_n.jpg";
$upload = 'http://'.$_SERVER['HTTP_HOST']."/".$image;
$return = ['url'=>$upload];
$fn = json_encode($return);
echo $fn;

 ?>
