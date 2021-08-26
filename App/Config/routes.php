<?php

return [
    [
        'url' => 'api/product/([0-9]+)',
        'controller' => 'api',
        'action' => 'product',
        'regex' => true
    ],
    [
        'url' => 'api/cart',
        'controller' => 'api',
        'action' => 'cart'
    ],
    [
        'url' => 'api/user',
        'controller' => 'api',
        'action' => 'user'
    ],
    [
        'url' => 'api/phones/([0-9]+)',
        'controller' => 'api',
        'action' => 'category',
        'regex' => true
    ],
    [
        'url' => 'api/watches/([0-9]+)',
        'controller' => 'api',
        'action' => 'category',
        'regex' => true
    ],
    [
        'url' => 'api/tablets/([0-9]+)',
        'controller' => 'api',
        'action' => 'category',
        'regex' => true
    ],
    [
        'url' => 'api/notebooks/([0-9]+)',
        'controller' => 'api',
        'action' => 'category',
        'regex' => true
    ],
    [
        'url' => 'api/accessories/([0-9]+)',
        'controller' => 'api',
        'action' => 'category',
        'regex' => true
    ],
    [
        'url' => 'phones',
        'controller' => 'product',
        'action' => 'category'
    ],
    [
        'url' => 'phones/([0-9]+)',
        'controller' => 'product',
        'action' => 'category',
        'regex' => true
    ],
    [
        'url' => 'watches',
        'controller' => 'product',
        'action' => 'category'
    ],
    [
        'url' => 'watches/([0-9]+)',
        'controller' => 'product',
        'action' => 'category',
        'regex' => true
    ],
    [
        'url' => 'tablets',
        'controller' => 'product',
        'action' => 'category'
    ],
    [
        'url' => 'tablets/([0-9]+)',
        'controller' => 'product',
        'action' => 'category',
        'regex' => true
    ],
    [
        'url' => 'notebooks',
        'controller' => 'product',
        'action' => 'category'
    ],
    [
        'url' => 'notebooks/([0-9]+)',
        'controller' => 'product',
        'action' => 'category',
        'regex' => true
    ],
    [
        'url' => 'accessories',
        'controller' => 'product',
        'action' => 'category'
    ],
    [
        'url' => 'accessories/([0-9]+)',
        'controller' => 'product',
        'action' => 'category',
        'regex' => true
    ],
    [
        'url' => 'checkout-order',
        'controller' => 'cart',
        'action' => 'checkoutOrder'
    ],
    [
        'url' => 'delete-from-cart',
        'controller' => 'cart',
        'action' => 'delete'
    ],
    [
        'url' => 'delete/([0-9]+)',
        'controller' => 'admin',
        'action' => 'delete',
        'regex' => true
    ],
    [
        'url' => 'update/([0-9]+)',
        'controller' => 'admin',
        'action' => 'update',
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
        'url' => 'buy',
        'controller' => 'cart',
        'action' => 'buy',
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
