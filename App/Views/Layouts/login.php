<main class="main inner-main main--product-page">
  <div class="container">
    <nav class="breadcrumb-nav">
      <ul class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li>Login</li>
      </ul>
    </nav>
    <section class="login-section">
      <h2>Login</h2>
      <form method="post">
        <div class="login-section__input-list">
          <div class="login-section__input-item">
            <label for="email"><b>Email</b></label>
            <input type="text" name="email" class="input" id="email" required>
          </div>
          <div class="login-section__input-item">
            <label for="pass"><b>Password</b></label>
            <input type="password" name="pass" class="input" id="pass" required>
            <span class="forgot-pass"><a href="#">Forgot password?</a></span>
          </div>
          <div class="login-section__input-item error-text">
              <?php if (isset($error)) : ?>
                  <?= $error?>
              <?php else : ?>
                  <?= 'Error'?>
              <?php endif; ?>
          </div>
          <div class="login-section__footer">
            <button type="submit" class="btn btn-purple">Log in</button>
            <a href="signin" class="register-link">I don`t have an account</a>
          </div>
        </div>
        <div class="button-wrapper" style="background-color:#f1f1f1">
        </div>
      </form>
    </section>
  </div>
</main>