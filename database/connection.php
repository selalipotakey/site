<?php
    require_once('/home/docfilmsgroup/vendor/autoload.php');

    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->safeLoad();

    $server = $_ENV['SERVER'];
    $db = $_ENV['DATABASE'];
    $user = $_ENV['USER'];
    $pass = $_ENV['PASS'];
?>