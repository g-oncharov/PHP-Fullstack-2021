<?php

namespace Controller;

use Framework\Controller\Controller;
use Framework\Session\Session;
use Model\Product;
use Model\Orders;

class OrderController extends Controller
{
    /** @var Session */
    private Session $session;

    /** @var Orders */
    private Orders $orders;

    /** @var Product */
    private Product $product;

    public function __construct()
    {
        parent::__construct();
        $this->orders = new Orders();
        $this->session = new Session();
        $this->product = new Product();
    }

    public function order()
    {
        if ($this->auth->isAdmin()) {
            $this->url->goToPrevPage();
        }
        if ($this->auth->isAuth()) {
            $products = [];
            $id = $this->session->get('id', 'user');
            $orders = $this->orders->findByUser($id);
            foreach ($orders as $order) {
                $products[] = $this->product->findById($order->getIdProduct());
            }
            $productsCount = count($products);

            $styles = ['orders', '404'];
            $params = [
                'styles' => $styles,
                'products' => $products,
                'productsCount' => $productsCount
            ];

            $this->view->render('orders', $params);
        } else {
            $this->url->goToHomePage();
        }
    }
}
