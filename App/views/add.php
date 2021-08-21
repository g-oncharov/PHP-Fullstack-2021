<main class="main inner-main main--product-page">
  <div class="container">
    <nav class="breadcrumb-nav">
      <ul class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li>Add</li>
      </ul>
    </nav>
    <section class="add-section">
      <h2>Add</h2>
      <form method="post" enctype="multipart/form-data">
        <div class="add-section__input-list">
          <div class="add-section__input-item">
            <label for="title"><b>Title</b></label>
            <input type="text" name="title" class="input" id="title" required>
          </div>
          <div class="add-section__input-item">
            <label for="description"><b>Description</b></label>
            <textarea name="description" id="description" class="textarea"></textarea>
          </div>
          <div class="add-section__input-item">
            <label for="price"><b>Price</b></label>
            <input type="text" name="price" class="input" id="price" required>
          </div>
          <div class="add-section__input-item">
            <label class="select-label">
              <b>Category: </b>
              <select class="select" name="category">
                  <?php if (isset($categories)) : ?>
                      <?php foreach ($categories as $category) : ?>
                        <option value="<?=$category->getId()?>"><?=$category->getTitle()?></option>
                      <?php endforeach; ?>
                  <?php endif; ?>
              </select>
              <i class="fa fa-caret-down fa-lg"></i>
            </label>
            <div class="add-section__input-item">
              <label for="price"><b>Image: </b></label>
              <input type="file" name="image" id="image" class="input input--file">
            </div>

            <div class="add-section__input-item add-section__input-item--preview">
              <label><b>Preview: </b></label>
              <div class="preview-block__image">
                <img src="" alt="preview">
              </div>
            </div>

          </div>
          <div class="add-section__input-item error-text">
              <?php if (isset($error)) : ?>
                <?= $error ?>
              <?php else : ?>
                  <?= 'Error'?>
              <?php endif; ?>
          </div>
          <div class="add-section__footer">
            <button type="submit" class="btn btn-purple">Submit</button>
          </div>
        </div>
        </form>
  </section>
  </div>
</main>
<script>
    function loadFile(e) {
        if (this.files && this.files[0]) {
            let reader = new FileReader();
            document.querySelector('.add-section__input-item--preview').classList.add('d-block');
            reader.addEventListener('load', function(e) {
                document.querySelector('.preview-block__image img').src = e.target.result;
            });
            reader.readAsDataURL(this.files[0]);
        }
    }
    document.querySelector(".input--file").addEventListener('change', loadFile);
</script>