<?php
class MainController extends Controller {

    public function actionIndex() {
        $productList = include_once($_SERVER['DOCUMENT_ROOT'] . '/app/helpers/products-list.php');
        $params = ['styles' => ['index', 'products-section'], 'productList' => $productList];
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