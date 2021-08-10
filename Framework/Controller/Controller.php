<?php

namespace Framework\Controller;

use Controller\ErrorController;
use Framework\Db\Db;
use Framework\View\View;

class Controller
{
    public $view;
    public $db;
    public function __construct()
    {
        $this->view = new View();
        $this->db = new Db();
        if (is_null($this->db->pdo)) {
            $errorController = new ErrorController();
            $errorController->actionCustomError($this->db->error);
        }
    }
}
