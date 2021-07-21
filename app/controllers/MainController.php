<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/app/models/Product.php');
class MainController extends Controller {
    protected $model;
    public $view;
    public $authentication;
    public $session;

    public function __construct()
    {
        $productList = include_once($_SERVER['DOCUMENT_ROOT'] . '/app/helpers/products-list.php');
        $this->model = new Product($productList);
        $this->view = new View;
        $this->authentication = new Authentication;
        $this->session = new Session;
    }

    public function actionIndex() {
        $params = ['styles' => ['index', 'products-section'], 'productList' => $this->model->getProducts()];
        $this->view->render('index', $params);
    }
    public function actionProducts() {
        $params = ['styles' => ['products', 'products-section', 'pagination-section']];
        $this->view->render('products', $params);
    }

    public function actionProduct() {
        $params = ['styles' => ['product']];
        $this->view->render('product', $params);
    }

    public function actionLogin() {
        $params = ['styles' => ['login']];
        $this->view->render('login', $params);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            extract($_POST);
            $this->authentication->auth($name,$pass);
            if ($this->authentication->isAuth()) {
                var_dump('authorized');
                $this->session->set("auth", true);
                $this->session->set("login", $name);
            }
        }
    }

    public function actionCart() {
        $params = ['styles' => ['cart']];
        $this->view->render('cart', $params);
    }

    public function action404() {
        $params = ['styles' => ['404']];
        $this->view->render('404', $params);
    }

}