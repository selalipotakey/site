<?php
    require('../../vendor/autoload.php');

    $dotenv = Dotenv\Dotenv::createImmutable(dirname(__FILE__) . '/../../ext_includes/');
    $dotenv->safeload();
?>