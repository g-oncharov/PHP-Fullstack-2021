<main class="main inner-main main--product-page">
    <div class="container">
        <nav class="breadcrumb-nav">
          <ul class="breadcrumb">
            <li><a href="/">Home</a></li>
            <li><a href="/products">Products</a></li>
            <li>Item</li>
          </ul>
        </nav>
      <section class="product-about">
        <div class="product-about__wrapper">
          <div class="product-about__image">
            <img src="/Public/products/<?= $item->getImage()?>" alt="">
          </div>
          <div class="product-about__text">
            <p class="product-about__name"><?= $item->getTitle()?></p>
            <p class="product-about__description"><?= $item->getDescription()?></p>
            <div class="product-about__price-wrapper">
              <p class="product-about__price"><?= $item->getPrice()?> $</p>
              <button class="product-about__btn btn-purple btn">Add to cart</button>
            </div>
          </div>
        </div>
      </section>
    </div>
</main>