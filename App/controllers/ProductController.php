<?php

namespace Controller;

use Framework\Controller\Controller;
use Framework\Db\Db;
use Controller\ErrorController;
use Model\Product;
use PDOException;
use PDO;

class ProductController extends Controller
{
    protected $product;
    protected $db;

    public function __construct()
    {
        parent::__construct();
        $db = new Db();
        if ($db->pdo instanceof PDO) {
            $this->product = new Product();
        } else {
            $errorController = new ErrorController();
            $errorController->actionCustomError($db);
        }
        $this->db = $db;
    }

    public function actionIndex()
    {
        if ($this->db->pdo instanceof PDO) {
            $PhonesList = $this->product->findByCategory('Phones');
            $TabletsList = $this->product->findByCategory('Tablets');
            $styles = ['index', 'productsSection'];
            $params = ['styles' => $styles,
                        'PhonesList' => $PhonesList,
                        'TabletsList' => $TabletsList];
            $this->view->render('index', $params);
        }
    }

    public function actionProducts()
    {
        if ($this->db->pdo instanceof PDO) {
            $category = ucfirst(parent::getLastPartUrl());
            $ProductsList = $this->product->findByCategory($category);
            $params = ['styles' => ['products', 'productsSection', 'paginationSection'], 'category' => $category,
                'ProductsList' => $ProductsList];
            $this->view->render('products', $params);
        }
    }

    public function actionProduct()
    {
        if ($this->db->pdo instanceof PDO) {
            $id = (int) parent::getLastPartUrl();
            $item = $this->product->findById($id);
            $params = ['styles' => ['product'],
                'item' => $item
            ];
            $this->view->render('product', $params);
        }
    }
}
