<?php

class Product {
    public $id;
    public $products;
    public $product;

    public function __construct($products)
    {
        $this->products = $products;
    }

    public function getProducts() {
        return $this->products;
    }
    public function getProduct(int $id) {
        foreach ($this->products as $product) {
            if ($product['id'] == $id) {
                $this->product = $product;
                break;
            }
        }
        return $this->product;
    }
}