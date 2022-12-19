<?php
    require dirname(__FILE__) . '/../../vendor/autoload.php';

    $dotenv = Dotenv\Dotenv::createImmutable(dirname(__FILE__) . '/../../ext_includes/');
    $dotenv->safeload();
?>