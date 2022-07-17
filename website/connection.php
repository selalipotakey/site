<?php

require_once "/home/docfilmsgroup/database/dbcredentials.php";

$link = mysqli_connect($DBhostname, $DBusername, $DBpassword, $DBname);

if (mysqli_connect_errno()) {
   die("Connect failed: %s\n" + mysqli_connect_error());
   exit();
}
?>