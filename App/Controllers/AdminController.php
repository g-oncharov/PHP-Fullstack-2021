<?php

namespace Controller;

use Framework\Controller\Controller;
use Framework\Session\Session;
use Model\Categories;
use Model\Product;
use Model\Admin;

class AdminController extends Controller
{
    /** @var Categories */
    private Categories $categories;

    /** @var Product */
    private Product $product;

    /** @var Admin */
    private Admin $admin;

    /** @var Session */
    protected Session $session;

    public function __construct()
    {
        parent::__construct();
        $this->categories = new Categories();
        $this->product = new Product();
        $this->admin = new Admin();
        $this->session = new Session();
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

    public function update()
    {
        if ($this->auth->isAdmin()) {
            $idProduct = (int) $this->url->getLastPartUrl();
            $product = $this->product->findById($idProduct);
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $data = $_POST;
                $data['id'] = $idProduct;
                $data['image'] = $product->getImage();
                if ($this->admin->update($data)) {
                    $this->url->goToPage("product/$idProduct");
                }
            }
            $categories = $this->categories->findAll();
            $category_id = $product->getCategoryId();

            for ($i = 0; $i < count($categories); $i++) {
                if ($categories[$i]->getId() === $category_id) {
                    unset($categories[$i]);
                }
            }

            $error = $this->admin->getError();

            $styles = ['orders', 'add'];
            $scripts = ['add'];
            $params = [
                'categories' => $categories,
                'error' => $error,
                'title' => $product->getTitle(),
                'description' => $product->getDescription(),
                'price' => $product->getPrice(),
                'category' => $product->getCategory(),
                'categoryId' => $category_id,
                'image' => $product->getImage(),
                'styles' => $styles,
                'scripts' => $scripts,
            ];

            $this->view->render('update', $params);
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
