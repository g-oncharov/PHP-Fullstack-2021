<?php

namespace Controller;

use Framework\Controller\Controller;
use Framework\Validator\Validator;
use Model\Product;

class SearchController extends Controller
{
    /** @var Product */
    private Product $product;

    /** @var Validator */
    private Validator $validator;

    public function __construct()
    {
        parent::__construct();
        $this->product = new Product();
        $this->validator = new Validator();
    }

    public function search()
    {
        $result = (string) $this->url->getLastPartUrl();
        $result = $this->url->parseSpaceUrl($result);
        $result = $this->validator->clean($result);

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
