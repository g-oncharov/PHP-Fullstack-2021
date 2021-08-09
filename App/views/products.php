<main class="main main--products-page">
  <section class="product-section">
    <div class="container">
      <section class="products products--all">
        <nav>
          <ul class="breadcrumb">
            <li><a href="/">Home</a></li>
            <li><?= $category?></li>
          </ul>
        </nav>
        <h2><?= $category?></h2>
        <ul class="products-list">
            <?php foreach ($ProductsList as $item) : ?>
              <li class="product-item">
                <a href="/product/<?= $item->getId()?>">
                  <div class="product-item__image">
                    <img src="/Public/products/<?= $item->getImage() ?>" alt="">
                  </div>
                  <div class="product-item__text">
                    <p class="product-item__name"><?= $item->getTitle() ?></p>
                    <p class="product-item__price"><?= $item->getPrice() ?> $</p>
                  </div>
                </a>
              </li>
            <?php endforeach; ?>
          </ul>
      </section>
      <section class="pagination-section">
        <ul class="pagination">
          <li><a href="#" class="prev">< Prev</a></li>
          <li class="page-number active"><a href="#">1</a></li>
          <li class="page-number"><a href="#">2</a></li>
          <li class="page-number"><a href="#">3</a></li>
          <li class="page-number"><a href="#">4</a></li>
          <li class="page-number"><a href="#">5</a></li>
          <li class="page-number"><a href="#">6</a></li>
          <li><a href="#" class="next">Next ></a></li>
        </ul>
      </section>
    </div>
  </section>
