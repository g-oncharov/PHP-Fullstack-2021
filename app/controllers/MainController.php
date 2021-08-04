<?php
namespace Controller;

use Core\Controller;
use Core\Authentication;
use Core\Db;

use Model\Product;
class MainController extends Controller {
    protected $product;
    public $auth;


    public function __construct()
    {
        parent::__construct();

        $db = Db::getConnection();
        $this->product = new Product();
        $this->product->setDb($db);
        $this->auth = new Authentication();
    }

    public function actionIndex() {
        $params = ['styles' => ['index', 'products-section'],
                    'PhonesList' => $this->product->findByCategory('Phones'),
                    'TabletsList' => $this->product->findByCategory('Tablets')];
        $this->view->render('index', $params);
    }
    public function actionProducts() {
        $arrUrl = explode('/', $_SERVER['REQUEST_URI']);
        $category = ucfirst(end($arrUrl));
        $params = ['styles' => ['products', 'products-section', 'pagination-section'], 'category' => $category,
                    'ProductsList' => $this->product->findByCategory($category)];
        $this->view->render('products', $params);
    }

    public function actionProduct() {
        $arrUrl = explode('/', $_SERVER['REQUEST_URI']);
        $id = (int)end($arrUrl);
        $item = $this->product->findById($id);
        var_dump($item);
        extract($item, EXTR_OVERWRITE);
        var_dump($title);
        $params = ['styles' => ['product'],
                    'id' => $id,
                    'title' => $title,
                    'image' => $image,
                    'description' => $description,
                    'price' => $price
                    ];
        $this->view->render('product', $params);
    }

    public function actionLogin() {
        $params = ['styles' => ['login']];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            extract($_POST);
            $this->auth->auth($name,$pass);
            if ($this->auth->isAuth()) {
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