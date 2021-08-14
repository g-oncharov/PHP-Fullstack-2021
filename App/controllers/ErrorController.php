<?php

namespace Controller;

use Framework\Controller\Controller;
use Framework\View\View;
use Model\Authentication;

class ErrorController extends Controller
{

    public function __construct()
    {
        $this->view = new View();
        $this->auth = new Authentication();

        $isAuth = $this->auth->isAuth();
        $this->view->set('isAuth', $isAuth);
    }

    public function notFound()
    {
        $params = ['styles' => ['404']];
        $this->view->render('404', $params);
    }

    public function customError($error)
    {
        $message = $error->getMessage();
        $code = $error->getCode();
        $params = ['styles' => ['404'], 'message' => $message, 'code' => $code];
        $this->view->render('customError', $params);
    }
}
