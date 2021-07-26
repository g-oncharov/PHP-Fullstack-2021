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
          <li>
            <a href="#" class="drop-down-button site-navigation-link site-navigation-link--wide">Categories</a>
            <ul class="categories-drop-down__list drop-down-list">
              <li class="categories-drop-down__item"><a href="#">Phones</a></li>
              <li class="categories-drop-down__item"><a href="#">Watches</a></li>
              <li class="categories-drop-down__item"><a href="#">Tablets</a></li>
              <li class="categories-drop-down__item"><a href="#">Notebooks</a></li>
              <li class="categories-drop-down__item"><a href="#">Accessories</a></li>
            </ul>
          </li>
          <li><a href="#" class="site-navigation-link">Contact</a></li>
          <li><a href="#" class="site-navigation-link">About</a></li>
        </ul>
      </div>
      <div class="user-navigation">
        <ul>
          <div class="user-navigation__input-wrapper">
            <form action="search">
              <input type="text" name="search" class="user-navigation__input input" id="search" required>
              <li class="icon"><button><i class="fa fa-search fa-lg"></i></button></li>
            </form>
          </div>
          <li><a href="/login"><i class="fa fa-user fa-lg"></i></a></li>
          <li><a href="/cart"><i class="fa fa-shopping-cart fa-lg"></i></a></li>
        </ul>
      </div>
    </nav>
  </div>
</header>