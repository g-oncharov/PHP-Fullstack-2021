<?php

return [
    [
        'url' => 'api/product/([0-9]+)',
        'controller' => 'api',
        'action' => 'product',
        'regex' => true
    ],
    [
        'url' => 'api/phones',
        'controller' => 'api',
        'action' => 'category'
    ],
    [
        'url' => 'api/watches',
        'controller' => 'api',
        'action' => 'category'
    ],
    [
        'url' => 'api/tablets',
        'controller' => 'api',
        'action' => 'category'
    ],
    [
        'url' => 'api/notebooks',
        'controller' => 'api',
        'action' => 'category'
    ],
    [
        'url' => 'api/accessories',
        'controller' => 'api',
        'action' => 'category'
    ],
    [
        'url' => 'phones',
        'controller' => 'product',
        'action' => 'category'
    ],
    [
        'url' => 'watches',
        'controller' => 'product',
        'action' => 'category'
    ],
    [
        'url' => 'tablets',
        'controller' => 'product',
        'action' => 'category'
    ],
    [
        'url' => 'notebooks',
        'controller' => 'product',
        'action' => 'category'
    ],
    [
        'url' => 'accessories',
        'controller' => 'product',
        'action' => 'category'
    ],
    [
        'url' => 'delete/([0-9]+)',
        'controller' => 'admin',
        'action' => 'delete',
        'regex' => true
    ],
    [
        'url' => 'add',
        'controller' => 'admin',
        'action' => 'add',
    ],
    [
        'url' => 'orders',
        'controller' => 'order',
        'action' => 'order',
    ],
    [
        'url' => 'product/([0-9]+)',
        'controller' => 'product',
        'action' => 'product',
        'regex' => true
    ],
    [
        'url' => 'search/([\%0-9A-z_-]+)',
        'controller' => 'search',
        'action' => 'search',
        'getKey' => 'search',
        'regex' => true
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
        'url' => 'logout',
        'controller' => 'authorization',
        'action' => 'logout',
    ],
    [
        'url' => 'signin',
        'controller' => 'authorization',
        'action' => 'signin',
    ],
    [
        'url' => '([0-9A-z_]+)',
        'controller' => 'error',
        'action' => 'notFound',
        'regex' => true
    ],
    [
        'url' => '',
        'controller' => 'product',
        'action' => 'index',
    ],

];
