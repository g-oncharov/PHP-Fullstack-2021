<?php

class Router
{
    protected $routes;
    protected $params = [];

    public function __construct()
    {
        $routesPath = $_SERVER['DOCUMENT_ROOT'] . '/app/config/routes.php';
        $this->routes = include_once($routesPath);
    }
    private function getUrl()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        };
    }
    private function error404()
    {
        header("Location: /404");
    }

    public function run()
    {
        $url = $this->getUrl();
        if (array_key_exists($url,$this->routes)) {
            extract($this->routes[$url]);

            $controllerName = ucfirst($controller . 'Controller');
            $actionName = 'action' . ucfirst($action);

            $controllerFile = $_SERVER['DOCUMENT_ROOT'] . '/app/controllers/'. $controllerName.'.php';

            if (file_exists($controllerFile)) {
                include_once($controllerFile);
            }else {
                $this->error404();
            }

            $controllerObject = new $controllerName;
            $controllerObject->$actionName();
        }else {
            $this->error404();
        }
    }

}