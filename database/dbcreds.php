<?php
    
    require('../../vendor/autoload.php');

    $dotenv = Dotenv\Dotenv::createImmutable(dirname(__FILE__) . '/../../ext_includes/');
    $dotenv->safeload();

    $db = $_ENV['DB'];
    $server = $_ENV['DB_SERVER'];
    $user = $_ENV['DB_USER'];
    $pass = $_ENV['DB_PASS'];

?>