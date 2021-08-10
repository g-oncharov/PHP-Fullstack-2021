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
        $routesPath = '../App/config/routes.php';
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
        if ((bool)strrpos($str, "/")) {
            $array = explode("/", $str);
            $str = end($array);
        }

        return explode("?", $str)[0];
    }

    public function isGetRequest($urlPath)
    {
        $result = false;

        foreach ($this->routes as $route) {
            $page = $this->urlGetRequestParser($urlPath);
            extract($route, EXTR_OVERWRITE);
            if (!empty($getKey) && $getKey == $page) {
                $result = true;
                break;
            }
        }
        if ($result) {
            $link = "/$action/{$_GET[$getKey]}";
            header("Location: $link");
        }
    }

    private function error404()
    {
        $this->controller = 'Controller\\ErrorController';
        $this->action = 'notFound';
    }

    private function parse($controller): string
    {
        return 'Controller\\' . ucfirst($controller . 'Controller');
    }

    private function load($controller, $action)
    {
        $this->controller = $this->parse($controller);
        $this->action = $action;

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
        $result = false;
        foreach ($this->routes as $route) {
            extract($route, EXTR_OVERWRITE);
            $url = "~$url~";
            if (preg_match($url, $urlPath)) {
                $this->load($controller, $action);
                $result = true;
                break;
            }
        }
        return $result;
    }
}
