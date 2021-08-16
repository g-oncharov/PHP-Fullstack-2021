<?php

namespace Controller;

use Framework\Controller\Controller;
use Framework\Url\Url;
use Model\Product;

class SearchController extends Controller
{
    protected Product $product;
    protected Url $url;

    public function __construct()
    {
        parent::__construct();
        $this->product = new Product();
        $this->url = new Url();
    }

    public function search()
    {
        $result = (string) $this->url->getLastPartUrl();
        $productList = $this->product->findByTitle($result);
        $count = count($productList);
        $styles = ['search'];
        $params = [
            'styles' => $styles,
            'result' => $result,
            'count' => $count,
            'productList' => $productList
            ];
        $this->view->render('search', $params);
    }
}
