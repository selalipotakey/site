<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '../database/dbcreds.php');

$link = mysqli_connect($_ENV['DB'], $_ENV['DB_SERVER'], $_ENV['DB_USER'], $_ENV['DB_PASS']);

if (mysqli_connect_errno()) {
   die("Connect failed: %s\n" + mysqli_connect_error());
   exit();
}
?>