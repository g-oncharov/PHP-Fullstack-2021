<?php

namespace Framework\Controller;

use Controller\ErrorController;
use Framework\Db\Db;
use Framework\View\View;
use Model\Authentication;

class Controller
{
    public View $view;
    public Db $db;
    public Authentication $auth;

    public function __construct()
    {
        $this->view = new View();
        $this->db = new Db();
        $this->auth = new Authentication();

        if (is_null($this->db->pdo)) {
            $errorController = new ErrorController();
            $errorController->actionCustomError($this->db->error);
        }

        $isAuth = $this->auth->isAuth();
        $this->view->set('isAuth', $isAuth);
    }
}
