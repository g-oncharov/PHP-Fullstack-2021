<?php

namespace Controller;

use Framework\Controller\Controller;
use Model\User;

class AuthorizationController extends Controller
{
    protected User $user;

    public function __construct()
    {
        parent::__construct();
        $this->user = new User();
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            extract($_POST);
            if (isset($email) && isset($pass)) {
                if ($this->auth->auth($email, $pass)) {
                    header('Location: /');
                }
            }
        }

        $error = $this->auth->getError();
        $params = [
            'styles' => ['login'],
            'error' => $error
        ];
        $this->view->render('login', $params);
    }

    public function signin()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->auth->register($_POST)) {
                header('Location: /');
            }
        }
        $error = $this->auth->getError();
        $params = [
            'styles' => ['signin'],
            'error' => $error
        ];
        $this->view->render('signin', $params);
    }

    public function logout()
    {
        if ($this->auth->isAuth()) {
            $this->auth->logOut();
        }

        header("Location: /");
    }
}
