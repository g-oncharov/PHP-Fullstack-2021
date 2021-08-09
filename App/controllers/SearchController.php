<?php

namespace Controller;

use Framework\Controller\Controller;
use Framework\Db\Db;
use Controller\ErrorController;
use Model\Product;
use PDO;

class SearchController extends Controller
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

    public function actionSearch()
    {
        $result = (string) parent::getLastPartUrl();
        $ProductList = $this->product->findByTitle($result);
        $count = count($ProductList);
        $styles = ['search'];
        $params = [
            'styles' => $styles,
            'result' => $result,
            'count' => $count,
            'ProductList' => $ProductList
            ];
        $this->view->render('search', $params);
    }
}
