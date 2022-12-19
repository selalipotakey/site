<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '../database/dbcreds.php');

echo $_SERVER['DOCUMENT_ROOT'];
echo $_ENV['DB'];
echo $_ENV['DB_SERVER'];
echo $_ENV['DB_USER'];
echo $_ENV['DB_PASS'];

// $link = mysqli_connect($_ENV['DB'], $_ENV['DB_SERVER'], $_ENV['DB_USER'], $_ENV['DB_PASS']);

// if (mysqli_connect_errno()) {
//    die("Connect failed: %s\n" + mysqli_connect_error());
//    exit();
// }
?>