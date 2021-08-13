<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Apple Shop</title>
  <link rel="shortcut icon" href="/Public/img/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="/Public/css/libs/normalize.min.css">
  <link rel="stylesheet" href="/Public/css/libs/fontAwesome.min.css">
  <link rel="stylesheet" href="/Public/css/main.css">
    <?php if (!empty($styles)) : ?>
        <?php foreach ($styles as $style) : ?>
        <link rel="stylesheet" href="/Public/css/<?= $style ?>.css">
        <?php endforeach; ?>
    <?php endif; ?>
</head>
<body>
<header class="header">
  <div class="header__wrapper container">
    <div class="logo"><a href="/"><img src="/Public/img/logo.png" alt=""></a></div>
    <nav class="nav-bar">
      <div class="site-navigation">
        <ul>
          <li>
            <p class="drop-down-button site-navigation-link">Categories</p>
            <ul class="categories-drop-down__list drop-down-list">
              <li class="categories-drop-down__item"><a href="/phones">Phones</a></li>
              <li class="categories-drop-down__item"><a href="/watches">Watches</a></li>
              <li class="categories-drop-down__item"><a href="/tablets">Tablets</a></li>
              <li class="categories-drop-down__item"><a href="/notebooks">Notebooks</a></li>
              <li class="categories-drop-down__item"><a href="/accessories">Accessories</a></li>
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
          <?php if ($isAuth) :?>
          <li><a href="/cabinet"><i class="fa fa-user fa-lg"></i></a></li>
          <?php else :?>
          <li><a href="/login"><i class="fa fa-user fa-lg"></i></a></li>
          <?php endif;?>
          <li><a href="/cart"><i class="fa fa-shopping-cart fa-lg"></i></a></li>
        </ul>
      </div>
    </nav>
  </div>
</header>