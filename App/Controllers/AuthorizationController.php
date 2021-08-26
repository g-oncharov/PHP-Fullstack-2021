<?php

namespace Controller;

use Framework\Controller\Controller;
use Model\User;

class AuthorizationController extends Controller
{
    /** @var User */
    protected User $user;

    public function __construct()
    {
        parent::__construct();
        $this->user = new User();
    }

    public function login()
    {
        if ($this->auth->isAuth()) {
            $this->url->goToHomePage();
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            extract($_POST);
            if (isset($email) && isset($pass)) {
                if ($this->auth->auth($email, $pass)) {
                    $this->url->goToHomePage();
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
        if ($this->auth->isAuth()) {
            $this->url->goToHomePage();
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->auth->register($_POST)) {
                $this->url->goToHomePage();
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

        $this->url->goToPrevPage();
    }
}
