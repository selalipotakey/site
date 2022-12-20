<?php
   require_once $_SERVER['DOCUMENT_ROOT'] . '/../database/dbcreds.php';

   $conn = mysqli_connect($_ENV['DB_SERVER'], $_ENV['DB_USER'], $_ENV['DB_PASS'], $_ENV['DB']);

   if (mysqli_connect_errno()) {
      die("Connect failed: %s\n" + mysqli_connect_error());
      exit();
   }
?>