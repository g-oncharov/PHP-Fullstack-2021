<?php
require_once('../helpers/autoload.php');

$template = new IncludeTemplate;
$params = ['styles' => ['login', 'breadcrumb-section']];
print_r($template->render('default', $params, 'login'));
