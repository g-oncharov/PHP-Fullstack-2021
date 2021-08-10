<?php

namespace Controller;

use Framework\Controller\Controller;
use Framework\Url\Url;
use Model\Product;

class ProductController extends Controller
{
    protected Product $product;
    protected Url $url;

    public function __construct()
    {
        parent::__construct();
        $this->product = new Product();
        $this->url = new Url();
    }

    public function index()
    {
        $phonesList = $this->product->findByCategory('Phones');
        $tabletsList = $this->product->findByCategory('Tablets');
        $styles = ['index', 'productsSection'];
        $params = ['styles' => $styles,
                    'phonesList' => $phonesList,
                    'tabletsList' => $tabletsList];
        $this->view->render('index', $params);
    }

    public function products()
    {
        $category = ucfirst($this->url->getLastPartUrl());
        $productsList = $this->product->findByCategory($category);
        $params = ['styles' => ['products', 'productsSection', 'paginationSection'], 'category' => $category,
            'productsList' => $productsList];
        $this->view->render('products', $params);
    }

    public function product()
    {
        $id = (int) $this->url->getLastPartUrl();
        $item = $this->product->findById($id);
        $params = ['styles' => ['product'],
            'item' => $item
        ];
        $this->view->render('product', $params);
    }
}
