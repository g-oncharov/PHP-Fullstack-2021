<?php
namespace Core;
use Controller;
class Router
{
    protected $routes;

    public function __construct()
    {
        $routesPath = $_SERVER['DOCUMENT_ROOT'] . '/app/config/routes.php';
        $this->routes = include_once($routesPath);
    }

    private function getUrl()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    public function urlGetRequestParser($str) {
        $delimeter = "/";
        if((bool)strrpos($str, $delimeter)) {
            $array = explode($delimeter, $str);
            $str = end($array);
        }

        return explode("?", $str)[0];
    }

    public function isGetRequest($urlPath) {
        $result = false;

        foreach ($this->routes as $route) {
            $uniquePage = false;
            $page = $this->urlGetRequestParser($urlPath);
            extract($route, EXTR_OVERWRITE);
            if ($uniquePage && $getKey == $page) {
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
        header("Location: /404");
    }

    private function load($controller, $action)
    {
        $controllerName = ucfirst($controller . 'Controller');
        $actionName = 'action' . ucfirst($action);

        $controllerFile = $_SERVER['DOCUMENT_ROOT'] . '/app/controllers/'. $controllerName.'.php';
        $controllerName = 'Controller\\' . $controllerName;
        if (file_exists($controllerFile)) {
            include_once($controllerFile);
        }else {
            $this->error404();
        }
        $controllerObject = new $controllerName;
        $controllerObject->$actionName();
        exit;
    }

    public function run()
    {
        $urlPath = $this->getUrl();
        $this->isGetRequest($urlPath);

        foreach ($this->routes as $route){
            $uniquePage = false;
            extract($route, EXTR_OVERWRITE);
            if ($url == $urlPath || preg_match("~$url~",$urlPath) && $uniquePage) {
                $this->load($controller, $action);
            }
        }

    }

}