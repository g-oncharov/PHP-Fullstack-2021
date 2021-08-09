<?php

namespace Framework\Controller;

use Framework\View\View;

class Controller
{
    public $view;
    public function __construct()
    {
        $this->view = new View();
    }
    public function getLastPartUrl()
    {
        $result = explode('/', $_SERVER['REQUEST_URI']);
        return end($result);
    }
}
