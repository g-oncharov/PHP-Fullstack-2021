<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Apple Shop</title>
  <link rel="shortcut icon" href="/public/img/favicon.ico" type="image/x-icon">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Sniglet:wght@400;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/public/css/main.css">
  <link rel="stylesheet" href="/public/css/index.css">
  <link rel="stylesheet" href="/public/css/products-section.css">
  <script src="https://use.fontawesome.com/86cb787e9f.js"></script>
</head>
<body>
  <header class="header">
    <div class="header__wrapper container">
      <div class="logo"><a href="index.php"><img src="/public/img/logo.png" alt=""></a></div>
      <nav class="nav-bar">
        <div class="site-navigation">
          <ul>
            <li><a href="products.php">Products</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Contact</a></li>
          </ul>
        </div>
        <div class="user-navigation">
          <ul>
            <li><a href="#"><i class="fa fa-search fa-lg"></i></a></li>
            <li><a href="login.php"><i class="fa fa-user fa-lg"></i></a></li>
            <li><a href="cart.php"><i class="fa fa-shopping-cart fa-lg"></i></a></li>
          </ul>
        </div>
      </nav>
    </div>
  </header>
  <main class="main">
      <section class="description">
        <div class="container">
          <div class="description__wrapper">
            <h1>Apple Shop</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum, iste!</p>
            <a href="#" class="btn">View more</a>
          </div>
        </div>
      </section>
      <section class="product-section">
        <div class="container">
          <section class="products products--popular">
            <h2>Popular item</h2>
            <ul class="products-list">
              <li class="product-item">
                <a href="product.php">
                  <div class="product-item__image">
                    <img src="/public/img/item_not_found.png" alt="">
                  </div>
                  <div class="product-item__text">
                    <p class="product-item__name">Item Name</p>
                    <p class="product-item__price">20 $</p>
                  </div>
                </a>
              </li>
              <li class="product-item">
                <a href="product.php">
                  <div class="product-item__image">
                    <img src="/public/img/item_not_found.png" alt="">
                  </div>
                  <div class="product-item__text">
                    <p class="product-item__name">Item Name</p>
                    <p class="product-item__price">20 $</p>
                  </div>
                </a>
              </li>
              <li class="product-item">
                <a href="product.php">
                  <div class="product-item__image">
                    <img src="/public/img/item_not_found.png" alt="">
                  </div>
                  <div class="product-item__text">
                    <p class="product-item__name">Item Name</p>
                    <p class="product-item__price">20 $</p>
                  </div>
                </a>
              </li>
              <li class="product-item">
                <a href="product.php">
                  <div class="product-item__image">
                    <img src="/public/img/item_not_found.png" alt="">
                  </div>
                  <div class="product-item__text">
                    <p class="product-item__name">Item Name</p>
                    <p class="product-item__price">20 $</p>
                  </div>
                </a>
              </li>
            </ul>
          </section>
          <section class="products products--new">
            <h2>New item</h2>
            <ul class="products-list">
              <li class="product-item">
                <a href="product.php">
                  <div class="product-item__image">
                    <img src="/public/img/item_not_found.png" alt="">
                  </div>
                  <div class="product-item__text">
                    <p class="product-item__name">Item Name</p>
                    <p class="product-item__price">20 $</p>
                  </div>
                </a>
              </li>
              <li class="product-item">
                <a href="product.php">
                  <div class="product-item__image">
                    <img src="/public/img/item_not_found.png" alt="">
                  </div>
                  <div class="product-item__text">
                    <p class="product-item__name">Item Name</p>
                    <p class="product-item__price">20 $</p>
                  </div>
                </a>
              </li>
              <li class="product-item">
                <a href="product.php">
                  <div class="product-item__image">
                    <img src="/public/img/item_not_found.png" alt="">
                  </div>
                  <div class="product-item__text">
                    <p class="product-item__name">Item Name</p>
                    <p class="product-item__price">20 $</p>
                  </div>
                </a>
              </li>
              <li class="product-item">
                <a href="product.php">
                  <div class="product-item__image">
                    <img src="/public/img/item_not_found.png" alt="">
                  </div>
                  <div class="product-item__text">
                    <p class="product-item__name">Item Name</p>
                    <p class="product-item__price">20 $</p>
                  </div>
                </a>
              </li>
            </ul>
          </section>
        </div>
      </section>
      <section class="advantages">
        <div class="container">
          <ul class="advantages__list">
            <li class="advantages__item advantages__item--delivery">
              <div class="item__desc">
                <b>Free delivery</b>
                <p>Lorem ipsum dolor sit amet,
                  consectetur adipisicing elit. Dolor excepturi,
                  tempore?</p>
              </div>
            </li>
            <li class="advantages__item advantages__item--returns">
              <div class="item__desc">
                <b>Easy returns</b>
                <p>Lorem ipsum dolor sit amet,
                  consectetur adipisicing elit. Dolor excepturi,
                  tempore?</p>
              </div>
            </li>
            <li class="advantages__item advantages__item--verification">
              <div class="item__desc">
                <b>Wide choice</b>
                <p>Lorem ipsum dolor sit amet,
                  consectetur adipisicing elit. Dolor excepturi,
                  tempore?</p>
              </div>
            </li>
          </ul>
        </div>
      </section>
  </main>
  <footer class="footer">
    <div class="container">
      <div class="footer__about-us">
        © 2021 Alexey Goncharov.
        Made in Ukraine
      </div>
      <div class="footer__categories">
        <h2>Categories</h2>
        <ul class="categories__list">
          <li class="categories__item"><a href="#">Phones</a></li>
          <li class="categories__item"><a href="#">Watches</a></li>
          <li class="categories__item"><a href="#">Tablets</a></li>
          <li class="categories__item"><a href="#">Accessories</a></li>
          <li class="categories__item"><a href="#">TV</a></li>
        </ul>
      </div>
      <div class="footer__about">
        <h2>About</h2>
        <ul class="about__list">
          <li class="about__item"><a href="#">About us</a></li>
          <li class="about__item"><a href="#">Delivery</a></li>
          <li class="about__item"><a href="#">Contact</a></li>
        </ul>
      </div>
      <div class="footer__social-links">
        <ul class="social-links__list">
            <li><a href="#"><i class="fa fa-facebook fa-2x"></i></a></li>
            <li><a href="#"><i class="fa fa-instagram fa-2x"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter fa-2x"></i></a></li>
        </ul>
      </div>
    </div>
  </footer>
</body>
</html>