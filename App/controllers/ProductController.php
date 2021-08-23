<?php

namespace Controller;

use Framework\Controller\Controller;
use Framework\Session\Session;

class ProductController extends Controller
{
    protected Session $session;

    public function __construct()
    {
        parent::__construct();
        $this->session = new Session();
    }

    public function index()
    {
        $styles = ['index', 'productsSection', 'loader'];
        $scripts = ['json', 'index'];

        $params = [
            'styles' => $styles,
            'scripts' => $scripts
        ];
        $this->view->render('index', $params);
    }

    public function category()
    {
        $styles = ['category', 'productsSection', 'paginationSection', 'loader'];
        $scripts = ['json', 'category'];

        $params = [
            'styles' => $styles,
            'scripts' => $scripts,
        ];
        $this->view->render('category', $params);
    }

    public function product()
    {
        $id = $this->url->getLastPartUrl();
        $styles = ['product', 'loader'];
        $scripts = ['json', 'product'];

        $params = [
            'id' => $id,
            'styles' => $styles,
            'scripts' => $scripts
        ];
        $this->view->render('product', $params);
    }
}
