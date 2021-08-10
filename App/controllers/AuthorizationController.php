<?php

namespace Controller;

use Framework\Controller\Controller;
use Framework\Authentication\Authentication;

class AuthorizationController extends Controller
{
    public Authentication $auth;

    public function __construct()
    {
        parent::__construct();
        $this->auth = new Authentication();
    }

    public function login()
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

    public function signin()
    {
        $params = ['styles' => ['signin']];
        $this->view->render('signin', $params);
    }
}
