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

        $isAuth = $this->auth->isAuth();
        $status = $this->auth->getStatus();
        $this->view->set('isAuth', $isAuth);
        $this->view->set('status', $status);

        if (is_null($this->db->pdo)) {
            $errorController = new ErrorController();
            $errorController->actionCustomError($this->db->error);
        }
    }
}
