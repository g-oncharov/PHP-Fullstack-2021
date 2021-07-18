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
          <?php foreach($productList as $item): ?>
          <?php extract($item, EXTR_OVERWRITE); ?>
          <li class="product-item">
            <a href="product">
              <div class="product-item__image">
                <img src="<?= $image ?>" alt="">
              </div>
              <div class="product-item__text">
                <p class="product-item__name"><?= $name ?></p>
                <p class="product-item__price"><?= $price ?> $</p>
              </div>
            </a>
          </li>
          <?php endforeach; ?>
        </ul>
      </section>
      <section class="products products--new">
        <h2>New item</h2>
        <ul class="products-list">
            <?php foreach($productList as $item): ?>
                <?php extract($item, EXTR_OVERWRITE); ?>
              <li class="product-item">
                <a href="product">
                  <div class="product-item__image">
                    <img src="<?= $image ?>" alt="">
                  </div>
                  <div class="product-item__text">
                    <p class="product-item__name"><?= $name ?></p>
                    <p class="product-item__price"><?= $price ?> $</p>
                  </div>
                </a>
              </li>
            <?php endforeach; ?>
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