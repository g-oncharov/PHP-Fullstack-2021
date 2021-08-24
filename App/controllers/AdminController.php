<?php

namespace Controller;

use Framework\Controller\Controller;
use Model\Categories;
use Model\Product;
use Model\Admin;

class AdminController extends Controller
{
    private Categories $categories;
    private Product $product;
    private Admin $admin;

    public function __construct()
    {
        parent::__construct();
        $this->categories = new Categories();
        $this->product = new Product();
        $this->admin = new Admin();
    }

    public function add()
    {
        if ($this->auth->isAdmin()) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if ($this->admin->add($_POST)) {
                    $lastId = $this->product->findLastId()->getId();
                    $this->url->goToPage("product/$lastId");
                }
            }

            $categories = $this->categories->findAll();
            $error = $this->admin->getError();

            $styles = ['orders', 'add'];
            $scripts = ['add'];
            $params = [
                'styles' => $styles,
                'scripts' => $scripts,
                'categories' => $categories,
                'error' => $error
            ];

            $this->view->render('add', $params);
        } else {
            $this->url->goToHomePage();
        }
    }

    public function delete()
    {
        if ($this->auth->isAdmin()) {
            $id = (int) $this->url->getLastPartUrl();
            $product = $this->product->findById($id);
            $category = strtolower($product->getCategory());
            $image = $product->getImage();

            $this->product->delete($id);
            $this->admin->deleteImage($image);
            $this->url->goToPage($category);
        } else {
            $this->url->goToHomePage();
        }
    }
}
