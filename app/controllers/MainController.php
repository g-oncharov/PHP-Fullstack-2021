<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/app/models/Product.php');
class MainController extends Controller {
    protected $product;

    public function __construct()
    {
        $productList = include_once($_SERVER['DOCUMENT_ROOT'] . '/app/helpers/products-list.php');
        $this->product = new Product($productList);
    }

    public function actionIndex() {
        $params = ['styles' => ['index', 'products-section'], 'productList' => $this->product->getProducts()];
        View::render('index', $params);
    }
    public function actionProducts() {
        $params = ['styles' => ['products', 'products-section', 'pagination-section']];
        View::render('products', $params);
    }

    public function actionProduct() {
        $params = ['styles' => ['product']];
        View::render('product', $params);
    }

    public function actionLogin() {
        $params = ['styles' => ['login']];
        View::render('login', $params);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            extract($_POST);
            Authentication::auth($name,$pass);
            if (Authentication::isAuth()) {
                var_dump('authorized');
                Session::set("auth", true);
                Session::set("login", $name);
            }
        }
    }

    public function actionSignin() {
        $params = ['styles' => ['signin']];
        View::render('signin', $params);
    }

    public function actionCart() {
        $params = ['styles' => ['cart']];
        View::render('cart', $params);
    }

    public function actionSearch() {
        $params = ['styles' => ['search']];
        View::render('search', $params);
    }

    public function action404() {
        $params = ['styles' => ['404']];
        View::render('404', $params);
    }

}