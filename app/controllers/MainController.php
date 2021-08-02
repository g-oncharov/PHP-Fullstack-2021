<?php
namespace Controller;

use Core;
use Core\Controller;
use Core\Session;
use Core\View;
use Core\Authentication;

use Model\Product;

include_once($_SERVER['DOCUMENT_ROOT'] . '/app/models/Product.php');

class MainController extends Controller {
    protected $product;
    public $session;
    public $auth;


    public function __construct()
    {
        parent::__construct();
        $productList = include_once($_SERVER['DOCUMENT_ROOT'] . '/app/helpers/products-list.php');
        $this->product = new Product($productList);
        $this->session = new Session();
        $this->auth = new Authentication();
    }

    public function actionIndex() {
        $params = ['styles' => ['index', 'products-section'], 'productList' => $this->product->getProducts()];
        $this->view->render('index', $params);
    }
    public function actionProducts() {
        $arrUrl = explode('/', $_SERVER['REQUEST_URI']);
        $category = ucfirst(end($arrUrl));
        $params = ['styles' => ['products', 'products-section', 'pagination-section'], 'category' => $category];
        $this->view->render('products', $params);
    }

    public function actionProduct() {
        $params = ['styles' => ['product']];
        $this->view->render('product', $params);
    }

    public function actionLogin() {
        $params = ['styles' => ['login']];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            extract($_POST);
            $this->auth->auth($name,$pass);
            if ($this->auth->isAuth()) {
                $this->session->start();
                $this->session->set("auth", true);
                $this->session->set("login", $name);
                var_dump('authorized');
            }
            var_dump($_SESSION);
            exit;
        }

        $this->view->render('login', $params);
    }

    public function actionSignin() {
        $params = ['styles' => ['signin']];
        $this->view->render('signin', $params);
    }

    public function actionCart() {
        $params = ['styles' => ['cart']];
        $this->view->render('cart', $params);
    }

    public function actionSearch() {
        $params = ['styles' => ['search']];
        $this->view->render('search', $params);
    }


    public function action404() {
        $params = ['styles' => ['404']];
        $this->view->render('404', $params);
    }

}