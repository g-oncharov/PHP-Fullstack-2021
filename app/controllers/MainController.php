<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/app/models/Product.php');
class MainController extends Controller {
    protected $model;
    public $view;

    public function __construct()
    {
        $productList = include_once($_SERVER['DOCUMENT_ROOT'] . '/app/helpers/products-list.php');
        $this->model = new Product($productList);;
        $this->view = new View;
    }

    public function actionIndex() {
        $params = ['styles' => ['index', 'products-section'], 'productList' => $this->model->getProducts()];
        $this->view->render('index', $params);
    }
    public function actionProducts() {
        $params = ['styles' => ['products', 'products-section', 'breadcrumb-section', 'pagination-section']];
        $this->view->render('products', $params);
    }

    public function actionProduct() {
        $params = ['styles' => ['product', 'breadcrumb-section']];
        $this->view->render('product', $params);
    }

    public function actionLogin() {
        $params = ['styles' => ['login', 'breadcrumb-section']];
        $this->view->render('login', $params);
    }

    public function actionCart() {
        $params = ['styles' => ['cart', 'breadcrumb-section']];
        $this->view->render('cart', $params);
    }

    public function actionError404() {
        $params = [];
        $this->view->render('404', $params);
    }

}