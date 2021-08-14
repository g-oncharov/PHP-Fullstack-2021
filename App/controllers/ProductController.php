<?php

namespace Controller;

use Framework\Controller\Controller;
use Framework\Url\Url;

class ProductController extends Controller
{
    protected Url $url;

    public function __construct()
    {
        parent::__construct();
        $this->url = new Url();
    }

    public function index()
    {
        $styles = ['index', 'productsSection', 'loader'];
        $scripts = ['json', 'index'];

        $params = ['styles' => $styles, 'scripts' => $scripts];
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
        $styles = ['product', 'loader'];
        $scripts = ['json', 'product'];

        $params = [
            'styles' => $styles,
            'scripts' => $scripts
        ];
        $this->view->render('product', $params);
    }
}
