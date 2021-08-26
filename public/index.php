<?php

include('../vendor/autoload.php');

use Framework\Router\Router;
use Controller\ErrorController;

try {
    $router = new Router();
    $router->run();
    $controller = new $router->controller();
    $action = $router->action;
    $controller->$action();
} catch (Exception $e) {
    $controller = new ErrorController();
    $controller->customError($e);
}
