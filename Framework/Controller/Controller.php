<?php

namespace Framework\Controller;

use Controller\ErrorController;
use Framework\Db\Db;
use Framework\View\View;
use Framework\Url\Url;
use Model\Authentication;

class Controller
{
    /** @var View */
    protected View $view;

    /** @var Url */
    protected Url $url;

    /** @var Authentication */
    protected Authentication $auth;

    public function __construct()
    {
        $this->view = new View();
        $this->auth = new Authentication();
        $this->url = new Url();

        $isAuth = $this->auth->isAuth();
        $isAdmin = $this->auth->isAdmin();

        $this->view->set('isAuth', $isAuth);
        $this->view->set('isAdmin', $isAdmin);

        $db = new Db();
        if (is_null($db->pdo)) {
            $errorController = new ErrorController();
            $errorController->customError($db->error);
        }
    }
}
