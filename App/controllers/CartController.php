<?php

namespace Controller;

use Framework\Controller\Controller;
use Framework\Session\Session;
use Model\Orders;

class CartController extends Controller
{
    public Session $session;
    public Orders $orders;

    public function __construct()
    {
        parent::__construct();
        $this->session = new Session();
        $this->orders = new Orders();
    }

    public function cart()
    {
        if (!$this->auth->isAuth()) {
            $this->url->goToPage('login');
        }
        $params = ['styles' => ['cart']];
        $this->view->render('cart', $params);
    }

    public function buy()
    {
        if ($this->auth->isAuth()) {
            $id = $_POST['id'];
            $this->session->set('cart', $id, '', true);
        }
    }

    public function delete()
    {
        $this->session->start();
        $index = $_POST['id'];
        if (isset($index)) {
            while (in_array($index, $this->session->get('cart'))) {
                $lastIndex = array_search($index, $this->session->get('cart'));
                $this->session->delete($lastIndex, 'cart');
            }
        }
    }

    public function checkoutOrder()
    {
        $this->session->start();
        $idProduct = $_POST['id'];
        $idUser = $this->session->get('id', 'user');
        $this->orders->insert($idProduct, $idUser);
        $this->session->delete('cart');
    }
}
