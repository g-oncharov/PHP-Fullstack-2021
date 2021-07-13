<?php
require_once('../helpers/products-list.php');
require_once('../helpers/autoload.php');

$template = new IncludeTemplate;
$params = ['styles' => ['index', 'products-section'], 'productList' => $productList];
print_r($template->render('default', $params, 'index'));
