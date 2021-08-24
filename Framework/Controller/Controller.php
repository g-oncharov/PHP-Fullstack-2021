<?php

namespace Framework\Controller;

use Controller\ErrorController;
use Framework\Db\Db;
use Framework\View\View;
use Framework\Url\Url;
use Model\Authentication;

class Controller
{
    protected View $view;
    protected Db $db;
    protected Url $url;
    protected Authentication $auth;

    public function __construct()
    {
        $this->view = new View();
        $this->db = new Db();
        $this->auth = new Authentication();
        $this->url = new Url();

        $isAuth = $this->auth->isAuth();
        $isAdmin = $this->auth->isAdmin();

        $this->view->set('isAuth', $isAuth);
        $this->view->set('isAdmin', $isAdmin);

        if (is_null($this->db->pdo)) {
            $errorController = new ErrorController();
            $errorController->actionCustomError($this->db->error);
        }
    }
}
