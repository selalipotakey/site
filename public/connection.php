<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '../database/dbcreds.php');

$link = mysqli_connect($db, $server, $user, $pass);

if (mysqli_connect_errno()) {
   die("Connect failed: %s\n" + mysqli_connect_error());
   exit();
}
?>