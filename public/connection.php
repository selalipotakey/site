<?php

require_once "/home/docfilmsgroup/database/connection.php";

$link = mysqli_connect($db, $server, $user, $pass);

if (mysqli_connect_errno()) {
   die("Connect failed: %s\n" + mysqli_connect_error());
   exit();
}
?>