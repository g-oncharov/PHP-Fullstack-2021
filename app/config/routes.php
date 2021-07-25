<?php
//return [
//    '' => [
//        'controller' => 'main',
//        'action' => 'index',
//    ],
//    'products' => [
//        'controller' => 'main',
//        'action' => 'products',
//    ],
//    'product' => [
//        'controller' => 'main',
//        'action' => 'product',
//    ],
//    'search/([0-9]+)' => [
//        'controller' => 'main',
//        'action' => 'search',
//    ],
//    'login' => [
//        'controller' => 'main',
//        'action' => 'login',
//    ],
//    'signin' => [
//        'controller' => 'main',
//        'action' => 'signin',
//    ],
//    'cart' => [
//        'controller' => 'main',
//        'action' => 'cart',
//    ],
//    '404' => [
//        'controller' => 'main',
//        'action' => '404',
//    ],
//];

return [
    [
        'url' => '',
        'controller' => 'main',
        'action' => 'index',
    ],
    [
        'url' => 'search/([0-9A-z_]+)',
        'controller' => 'main',
        'action' => 'search',
        'getKey' => 'search',
        'uniquePage' => true
    ],
    [
        'url' => 'products',
        'controller' => 'main',
        'action' => 'products',
    ],
    [
        'url' => 'product',
        'controller' => 'main',
        'action' => 'product',
    ],
    [
        'url' => 'login',
        'controller' => 'main',
        'action' => 'login',
    ],
    [
        'url' => 'signin',
        'controller' => 'main',
        'action' => 'signin',
    ],
    [
        'url' => 'cart',
        'controller' => 'main',
        'action' => 'cart',
    ],
    [
        'url' => '404',
        'controller' => 'main',
        'action' => '404',
    ],
    [
        'url' => '([0-9A-z_]+)',
        'controller' => 'main',
        'action' => '404',
        'uniquePage' => true
    ],

];