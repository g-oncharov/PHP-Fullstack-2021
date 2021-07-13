<?php
require_once('../helpers/autoload.php');

$template = new IncludeTemplate;
$params = ['styles' => ['products', 'products-section', 'breadcrumb-section', 'pagination-section']];
print_r($template->render('default', $params, 'products'));
