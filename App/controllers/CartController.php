<?php

namespace Controller;

use Framework\Controller\Controller;

class CartController extends Controller
{

    public function cart()
    {
        $params = ['styles' => ['cart']];
        $this->view->render('cart', $params);
    }
}
