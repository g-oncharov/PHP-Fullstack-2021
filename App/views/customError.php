<main class="main inner-main main--ce">
    <div class="container">
        <nav class="breadcrumb-nav">
            <ul class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li><?= $code?></li>
            </ul>
        </nav>
        <section class="e404-section">
            <h2><?= $code?></h2>
            <div class="e404-section__wrapper">
                <div class="oops-block">
                    <h2>Oops!</h2>
                </div>
                <div class="text-block">
                      <h3>Sorry, unexpected error</h3>
                    <p><?= $message?></p>
                    <a href="/">Go back to Homepage</a>
                </div>
            </div>
        </section>
    </div>
</main>