<main class="main inner-main main--product-page">
    <div class="container">
        <nav class="breadcrumb-nav">
            <ul class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li>Search</li>
            </ul>
        </nav>
        <section class="search">
          <h2>Search</h2>
            <div class="search-result">
              <p>
                <?php if (isset($count) && isset($result)) : ?>
                <span class="search-result__count"><?= $count ?></span>
                results found for the keyword «<span class="search-result__text"><?= $result ?></span>»</p>
                <?php endif; ?>
            </div>
            <ul class="search-list">
                <?php if (!empty($productList)) : ?>
                    <?php foreach ($productList as $item) : ?>
                      <li class="search-item">
                        <div>
                          <a href="/product/<?= $item->getId() ?>">
                            <div class="search-item__image">
                              <img src="/Public/products/<?= $item->getImage() ?>" alt="">
                            </div>
                            <div class="search-item__name"><?= $item->getTitle() ?></div>
                            <div class="search-item__price"><?= $item->getPrice() ?> $</div>
                            <div class="search-item__delete">
                              <button class="search-about__btn btn-purple btn">Read more</button>
                            </div>
                          </a>
                        </div>
                      </li>
                    <?php endforeach; ?>
                <?php else : ?>
                  <div class="oops-block">
                    <h2>Nothing found!</h2>
                  </div>
                <?php endif; ?>
            </ul>
        </section>
    </div>
</main>