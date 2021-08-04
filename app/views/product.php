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
            <img src="/public/products/<?= $image?>" alt="">
<!--            <img src="/public/img/item_not_found.png" alt="">-->
          </div>
          <div class="product-about__text">
            <p class="product-about__name"><?= $title?></p>
            <p class="product-about__description"><?= $description?></p>
            <div class="product-about__price-wrapper">
              <p class="product-about__price"><?= $price?> $</p>
              <button class="product-about__btn btn-purple btn">Add to cart</button>
            </div>
          </div>
        </div>
      </section>
    </div>
</main>