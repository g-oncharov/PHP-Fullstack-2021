<?php

namespace Controller;

use Framework\Controller\Controller;
use Framework\View\View;

class ErrorController extends Controller
{

    public function __construct()
    {
        $this->view = new View();
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
