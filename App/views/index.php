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
        <h2>Phones</h2>
        <ul class="products-list">
          <?php foreach ($phonesList as $item) : ?>
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
      <section class="products products--new">
        <h2>Tablets</h2>
        <ul class="products-list">
            <?php foreach ($tabletsList as $item) : ?>
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
<script>
    const status = function (response) {
        if (response.status !== 200) {
            return Promise.reject(new Error(response.statusText))
        }
        return Promise.resolve(response)
    }
    const json = function (response) {
        return response.json()
    }

    fetch('http://www.mocky.io/v2/5944e07213000038025b6f30', {
        method: 'post',
        body: 'test=1'
    })
        .then(status)
        .then(json)
        .then(function (data) {
            console.log('data', data)
        })
        .catch(function (error) {
            console.log('error', error)
        })
</script>