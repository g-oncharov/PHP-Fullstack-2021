<main class="main inner-main main--product-page">
    <div class="container">
        <nav class="breadcrumb-nav">
            <ul class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li>Your orders</li>
            </ul>
        </nav>
        <section class="search">
            <h2>Your orders</h2>
            <?php if (!empty($products) && isset($productsCount)) : ?>
            <div class="search-result">
              <p>You have <span class="search-result__count"><?= $productsCount; ?></span> orders in total</p>
            </div>
            <ul class="search-list">
                <?php foreach ($products as $item) : ?>
                <li class="search-item">
                    <div>
                        <a href="/product/<?= $item->getId() ?>">
                            <div class="search-item__image">
                              <img src="/public/products/<?= $item->getImage() ?>" alt="">
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
            </ul>
            <?php else : ?>
              <div class="search-section__wrapper">
                  <h2>You have no orders yet!</h2>
              </div>
            <?php endif; ?>
        </section>
    </div>
</main>