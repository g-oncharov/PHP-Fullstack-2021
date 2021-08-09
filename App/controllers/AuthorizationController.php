<?php

namespace Controller;

use Framework\Controller\Controller;
use Framework\Authentication\Authentication;

class AuthorizationController extends Controller
{
    public $auth;

    public function __construct()
    {
        parent::__construct();
        $this->auth = new Authentication();
    }

    public function actionLogin()
    {
        $params = ['styles' => ['login']];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            extract($_POST);
            $this->auth->auth($name, $pass);
            if ($this->auth->isAuth()) {
                var_dump('authorized');
            }
            var_dump($_SESSION);
            exit;
        }

        $this->view->render('login', $params);
    }

    public function actionSignin()
    {
        $params = ['styles' => ['signin']];
        $this->view->render('signin', $params);
    }
}
