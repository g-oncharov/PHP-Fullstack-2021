<?php

namespace Controller;

use Framework\Controller\Controller;

class ProductController extends Controller
{
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
