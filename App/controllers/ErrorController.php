<?php

namespace Controller;

use Framework\Controller\Controller;

class ErrorController extends Controller
{

    public function action404()
    {
        $params = ['styles' => ['404']];
        $this->view->render('404', $params);
    }

    public function actionCustomError($error)
    {
        $message = $error->getMessage();
        $code = $error->getCode();
        $params = ['styles' => ['404'], 'message' => $message, 'code' => $code];
        $this->view->render('customError', $params);
    }
}
