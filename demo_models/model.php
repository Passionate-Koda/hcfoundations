<?php
     define("DBNAME", 'mckodevc_demo');
     define("DBUSER", 'root');
     define("DBPASS", 'vagrant');

         try{

           $conn = new PDO('mysql:host=localhost;dbname='.DBNAME, DBUSER, DBPASS);
           // $conn = new PDO('mysql:host=67.225.141.165:3306;dbname=kimteygo_web;','kimteygo_web','kimteyg@.02');

           $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
         }
         catch(PDOException $e) {
           die($e);
                  // die("Could Not Connect");
       }

 ?>
