<footer class="footer">
    <div class="container">
        <div class="footer__about-us">
            © 2021 Alexey Goncharov.
            Made in Ukraine
        </div>
        <div class="footer__categories">
            <h2>Categories</h2>
            <ul class="categories__list">
              <li class="categories__item"><a href="/phones">Phones</a></li>
              <li class="categories__item"><a href="/watches">Watches</a></li>
              <li class="categories__item"><a href="/tablets">Tablets</a></li>
              <li class="categories__item"><a href="/notebooks">Notebooks</a></li>
              <li class="categories__item"><a href="/accessories">Accessories</a></li>
            </ul>
        </div>
        <div class="footer__about">
            <h2>About</h2>
            <ul class="about__list">
                <li class="about__item"><a href="#">About us</a></li>
                <li class="about__item"><a href="#">Delivery</a></li>
                <li class="about__item"><a href="#">Contact</a></li>
            </ul>
        </div>
        <div class="footer__social-links">
            <ul class="social-links__list">
                <li><a href="#"><i class="fa fa-facebook fa-2x"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram fa-2x"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter fa-2x"></i></a></li>
            </ul>
        </div>
    </div>
</footer>
<?php if (!empty($scripts)) : ?>
    <?php foreach ($scripts as $script) : ?>
    <script src="/Public/js/<?= $script ?>.js"></script>
    <?php endforeach; ?>
<?php endif; ?>
<script src="/Public/js/dropdown.js"></script>
</body>
</html>