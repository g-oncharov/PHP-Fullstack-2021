<main class="main inner-main main--product-page">
  <div class="container">
    <nav class="breadcrumb-nav">
      <ul class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li>Sign in</li>
      </ul>
    </nav>
    <section class="signin-section">
      <h2>Sign in</h2>
      <form method="post">
        <div class="signin-section__input-list">
          <div class="signin-section__input-item">
            <label for="firstName"><b>First name</b></label>
            <input type="text" name="firstName" class="input" id="firstName" required>
          </div>
          <div class="signin-section__input-item">
            <label for="lastName"><b>Last name</b></label>
            <input type="text" name="lastName" class="input" id="lastName" required>
          </div>
          <div class="signin-section__input-item">
            <label for="email"><b>Email</b></label>
            <input type="text" name="email" class="input" id="email" required>
          </div>
          <div class="signin-section__input-item">
            <label for="login"><b>Login</b></label>
            <input type="text" name="login" class="input" id="login" required>
          </div>
          <div class="signin-section__input-item">
            <label for="telephone"><b>Telephone</b></label>
            <input type="text" name="telephone" class="input" id="telephone" required>
          </div>
          <div class="signin-section__input-item">
            <label for="pass"><b>Password</b></label>
            <input type="password" name="pass" class="input" id="pass" required>
          </div>
          <div class="signin-section__input-item">
            <label for="pass2"><b>Confirm Password</b></label>
            <input type="password" name="pass2" class="input" id="pass2" required>
          </div>
          <div class="signin-section__input-item error-text">
              <?php if (isset($error)) : ?>
                  <?= $error ?>
              <?php else : ?>
                  <?= 'Error'?>
              <?php endif; ?>
          </div>
        </div>
          <div class="signin-section__footer">
            <button type="submit" class="btn btn-purple">Sign in</button>
            <a href="login" class="login-link">I have an account</a>
          </div>
        </div>

        <div class="button-wrapper" style="background-color:#f1f1f1">
        </div>
      </form>
    </section>
  </div>
</main>