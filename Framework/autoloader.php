<?php

function __autoload($class_name) {
    $parts = explode('\\', $class_name);
    $file = end($parts) . '.php';
    require_once $file;
}



if (isset($_GET['debug']) || isset($_GET['dev'])) {
    echo "Development mode<br/>";
    $_dev = TRUE;
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    ini_set("soap.wsdl_cache_enabled", 0);
    error_reporting(E_ALL);
}else{
    $_dev=FALSE;
}
