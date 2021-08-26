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
        $category = explode("/", $this->url->getUrl())[1];
        $currentPage = explode("/", $this->url->getUrl());

        if (count($currentPage) > 2) {
            $currentPage = (int) $currentPage[2];
        } else {
            $currentPage = 1;
        }

        $pagesCount = $this->product->getPagesCount($category);

        if ($currentPage > $pagesCount || $currentPage < 1) {
            $currentPage = 1;
        }
        $productsList = $this->product->getPage($category, $currentPage);

        $result = [
            'pagesCount' => $pagesCount,
        ];

        foreach ($productsList as $item) {
            $result['products'][] = $this->json->dismount(
                $item,
                ['db', 'createdAt', 'updatedAt', 'category', 'description', 'categoryId']
            );
        }
        $this->json->getArrays($result);
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
