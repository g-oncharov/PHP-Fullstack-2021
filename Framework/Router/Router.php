<?php

namespace Framework\Router;

use Controller;
use Exception;

class Router
{
    protected $routes;
    public string $controller;
    public string $action;

    public function __construct()
    {
        $routesPath = 'App/config/routes.php';
        $this->routes = include_once($routesPath);
    }

    private function getUrl()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    public function urlGetRequestParser($str)
    {
        $delimeter = "/";
        if ((bool)strrpos($str, $delimeter)) {
            $array = explode($delimeter, $str);
            $str = end($array);
        }

        return explode("?", $str)[0];
    }

    public function isGetRequest($urlPath)
    {
        $result = false;

        foreach ($this->routes as $route) {
            $uniquePage = false;
            $page = $this->urlGetRequestParser($urlPath);
            extract($route, EXTR_OVERWRITE);
            if ($uniquePage && !empty($getKey) && $getKey == $page) {
                $result = true;
                break;
            }
        }
        if ($result) {
            header("Location: /$action/{$_GET[$getKey]}");
        }
    }

    private function error404()
    {
        $this->controller = 'Controller\\ErrorController';
        $this->action = 'action404';
    }

    private function parse($controller, $action)
    {
        $controllerName = 'Controller\\' . ucfirst($controller . 'Controller');
        $actionName = 'action' . ucfirst($action);

        $this->controller = $controllerName;
        $this->action = $actionName;

        if (
            !class_exists($this->controller)
            || !method_exists($this->controller, $this->action)
        ) {
            $this->error404();
        }
    }

    public function run(): bool
    {
        $urlPath = $this->getUrl();
        $this->isGetRequest($urlPath);

        foreach ($this->routes as $route) {
            $uniquePage = false;
            extract($route, EXTR_OVERWRITE);
            if ($url == $urlPath || preg_match("~$url~", $urlPath) && $uniquePage) {
                $this->parse($controller, $action);
                return true;
            }
        }
        return false;
    }
}
