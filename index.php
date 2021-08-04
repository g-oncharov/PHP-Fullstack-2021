<?php
include($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php');
//error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);

//use Monolog\Logger;
//use Monolog\Handler\StreamHandler;
//
//$log = new Logger('name');
//$log->pushHandler(new StreamHandler('log/your.log', Logger::WARNING));
//
//// add records to the log
//$log->warning('Foo');
//$log->error('Bar');



$router = new Core\Router;
$router->run();