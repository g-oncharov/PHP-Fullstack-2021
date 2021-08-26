<main class="main inner-main main--ce">
    <div class="container">
        <nav class="breadcrumb-nav">
            <ul class="breadcrumb">
                <li><a href="/">Home</a></li>
                <?php if (isset($code)) : ?>
                  <li><?= $code?></li>
                <?php else : ?>
                  <li>404</li>
                <?php endif; ?>
            </ul>
        </nav>
        <section class="e404-section">
            <?php if (isset($code)) : ?>
              <h2><?= $code?></h2>
            <?php else : ?>
              <h2>404</h2>
            <?php endif; ?>
            <div class="e404-section__wrapper">
                <div class="oops-block">
                  <h2>Oops!</h2>
                </div>
                <div class="text-block">
                  <h3>Sorry, unexpected error</h3>
                  <?php if (isset($message)) : ?>
                    <p><?= $message?></p>
                  <?php else : ?>
                    <p>Error</p>
                  <?php endif; ?>
                  <a href="/">Go back to Homepage</a>
                </div>
            </div>
        </section>
    </div>
</main>