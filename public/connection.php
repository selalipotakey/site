<?php
   require_once $_SERVER['DOCUMENT_ROOT'] . '/../database/dbcreds.php';

   $mysqli = new mysqli($_ENV['DB_SERVER'], $_ENV['DB_USER'], $_ENV['DB_PASS'], $_ENV['DB']);

   if($mysqli->connect_error) {
      exit('Error connecting to database.'); //Should be a message a typical user could understand in production
   }
?>