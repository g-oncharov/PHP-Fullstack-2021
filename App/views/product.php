<main class="main inner-main main--product-page">
    <div class="container">
        <nav class="breadcrumb-nav">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item breadcrumb-item--category"><a href="#">Products</a></li>
            <li class="breadcrumb-item breadcrumb-item--product">Item</li>
          </ul>
        </nav>
      <section class="product-about">
        <div class="product-about__wrapper">
            <div class="product-about__item product-item">
              <div class="product-item__wrapper">
                <div class="loader">Loading...</div>
              </div>

              <?php if (isset($id) && isset($status) && $status === 10) : ?>
                <div class="product-item__delete">
                  <a href="/delete/<?=$id?>"><i class="fa fa-remove fa-2x"></i></a>
                </div>
              <?php endif; ?>
          </div>
        </div>
      </section>
    </div>
</main>