<?php

namespace Controller;

use Framework\Url\Url;
use Framework\Json\Json;
use Model\Product;

class ApiController
{
    protected Product $product;
    public Url $url;
    public Json $json;

    public function __construct()
    {
        $this->url = new Url();
        $this->json = new Json();
        $this->product = new Product();
    }

    public function category()
    {
        $category = ucfirst($this->url->getLastPartUrl());
        $productsList = $this->product->findByCategory($category);
        $this->json->getJsonByArray($productsList, ['db', 'createdAt', 'updatedAt']);
    }

    public function product()
    {
        $id = (int) $this->url->getLastPartUrl();
        $item = $this->product->findById($id);
        $this->json->getJson($item, ['db', 'createdAt', 'updatedAt']);
    }
}
