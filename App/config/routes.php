<?php

return [
    [
        'url' => 'phones',
        'controller' => 'product',
        'action' => 'products'
    ],
    [
        'url' => 'watches',
        'controller' => 'product',
        'action' => 'products'
    ],
    [
        'url' => 'tablets',
        'controller' => 'product',
        'action' => 'products'
    ],
    [
        'url' => 'notebooks',
        'controller' => 'product',
        'action' => 'products'
    ],
    [
        'url' => 'accessories',
        'controller' => 'product',
        'action' => 'products'
    ],
    [
        'url' => 'products',
        'controller' => 'product',
        'action' => 'products',
    ],
    [
        'url' => 'product/([0-9]+)',
        'controller' => 'product',
        'action' => 'product'
    ],
    [
        'url' => 'search/([0-9A-z_-]+)',
        'controller' => 'search',
        'action' => 'search',
        'getKey' => 'search'
    ],
    [
        'url' => 'cart',
        'controller' => 'cart',
        'action' => 'cart',
    ],
    [
        'url' => 'login',
        'controller' => 'authorization',
        'action' => 'login',
    ],
    [
        'url' => 'signin',
        'controller' => 'authorization',
        'action' => 'signin',
    ],
    [
        'url' => '',
        'controller' => 'product',
        'action' => 'index',
    ],
    [
        'url' => '([0-9A-z_]+)',
        'controller' => 'error',
        'action' => '404'
    ],

];
