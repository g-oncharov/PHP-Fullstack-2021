<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Apple Shop</title>
  <link rel="shortcut icon" href="/public/img/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="/public/css/libs/normalize.min.css">
  <link rel="stylesheet" href="/public/css/libs/font-awesome.min.css">
  <link rel="stylesheet" href="/public/css/main.css">
    <?php if (!empty($styles)): ?>
        <?php foreach ($styles as $style): ?>
        <link rel="stylesheet" href="/public/css/<?= $style ?>.css">
        <?php endforeach; ?>
    <?php endif; ?>
</head>
<body>
<header class="header">
  <div class="header__wrapper container">
    <div class="logo"><a href="/"><img src="/public/img/logo.png" alt=""></a></div>
    <nav class="nav-bar">
      <div class="site-navigation">
        <ul>
          <li><a href="products">Products</a></li>
          <li><a href="#">About</a></li>
          <li><a href="#">Contact</a></li>
        </ul>
      </div>
      <div class="user-navigation">
        <ul>
          <li><a href="#"><i class="fa fa-search fa-lg"></i></a></li>
          <li><a href="login"><i class="fa fa-user fa-lg"></i></a></li>
          <li><a href="cart"><i class="fa fa-shopping-cart fa-lg"></i></a></li>
        </ul>
      </div>
    </nav>
  </div>
</header>