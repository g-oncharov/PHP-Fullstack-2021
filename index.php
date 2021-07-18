<?php
require_once('app/helpers/autoload.php');
//error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);

$router = new Router;
$router->run();