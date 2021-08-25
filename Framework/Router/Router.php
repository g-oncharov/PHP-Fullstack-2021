<?php

namespace Framework\Router;

use Controller;
use Exception;

class Router
{
    /** @var mixed */
    protected $routes;

    /** @var string */
    public string $controller;

    /** @var string */
    public string $action;

    public function __construct()
    {
        $routesPath = '../App/config/routes.php';
        $this->routes = include_once($routesPath);
    }

    /**
     * Get data from get request
     *
     * @return string
     */
    private function getUrl(): string
    {
        $result = "";
        if (!empty($_SERVER['REQUEST_URI'])) {
            $result = trim($_SERVER['REQUEST_URI'], '/');
        }
        return $result;
    }


    /**
     * Get data from get request
     *
     * @param string $str
     * @return mixed|string
     */
    public function urlGetRequestParser(string $str): string
    {
        if ((bool)strrpos($str, "/")) {
            $array = explode("/", $str);
            $str = end($array);
        }

        return explode("?", $str)[0];
    }

    /**
     * Redirect from get request
     *
     * @param $urlPath
     */
    public function isGetRequest($urlPath): void
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

    /** Throwing 404 error */
    private function error404(): void
    {
        $this->controller = 'Controller\\ErrorController';
        $this->action = 'notFound';
    }

    /**
     * Parse controller name
     *
     * @param $controller
     * @return string
     */
    private function parse($controller): string
    {
        return 'Controller\\' . ucfirst($controller . 'Controller');
    }

    /** Launch controller and action */
    private function load($controller, $action): void
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

    /**
     * Launch router
     *
     * @return bool
     */
    public function run(): bool
    {
        $urlPath = $this->getUrl();
        $this->isGetRequest($urlPath);
        $result = false;
        foreach ($this->routes as $route) {
            extract($route, EXTR_OVERWRITE);
            if (isset($regex) && $regex) {
                $url = "($url$)";
            }
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
