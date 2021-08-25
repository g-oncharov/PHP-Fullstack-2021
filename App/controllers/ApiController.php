<?php

namespace Controller;

use Framework\Url\Url;
use Framework\Json\Json;
use Framework\Session\Session;
use Model\Product;
use Model\User;

class ApiController
{
    /** @var Product */
    private Product $product;

    /** @var Json */
    private Json $json;

    /** @var Url */
    private Url $url;

    /** @var Session */
    private Session $session;

    /** @var User */
    protected User $user;

    public function __construct()
    {
        $this->url = new Url();
        $this->json = new Json();
        $this->product = new Product();
        $this->session = new Session();
        $this->user = new User();
    }

    public function category()
    {
        $category = ucfirst($this->url->getLastPartUrl());
        $productsList = $this->product->findByCategory($category);
        $this->json->getObjects($productsList, ['db', 'createdAt', 'updatedAt']);
    }

    public function product()
    {
        $id = (int) $this->url->getLastPartUrl();
        $item = $this->product->findById($id);
        $this->json->getObject($item, ['db', 'createdAt', 'updatedAt']);
    }

    public function user()
    {
        $this->session->start();
        $user = $this->session->get('user');
        if (isset($user)) {
            $this->json->getArrays($user);
        } else {
            $this->json->getEmpty();
        }
    }

    public function cart()
    {
        $this->session->start();
        $cart = $this->session->get('cart');
        if (isset($cart)) {
            $this->json->getArray($cart);
        } else {
            $this->json->getEmpty();
        }
    }
}
