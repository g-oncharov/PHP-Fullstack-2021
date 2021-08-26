<main class="main inner-main main--update-page">
  <div class="container">
    <nav class="breadcrumb-nav">
      <ul class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li>Update</li>
      </ul>
    </nav>
    <section class="add-section">
      <h2>Update</h2>
      <?php if (
              isset($title)
              && isset($description)
              && isset($price)
              && isset($categoryId)
              && isset($category)
              && isset($image)
) : ?>
      <form method="post" enctype="multipart/form-data">
        <div class="add-section__input-list">
          <div class="add-section__input-item">
            <label for="title"><b>Title</b></label>
            <input type="text" name="title" class="input" id="title" value="<?= $title ?>" required>
          </div>
          <div class="add-section__input-item">
            <label for="description"><b>Description</b></label>
            <textarea name="description" id="description" class="textarea"><?= $description ?></textarea>
          </div>
          <div class="add-section__input-item">
            <label for="price"><b>Price</b></label>
            <input type="text" name="price" class="input" id="price" value="<?= $price ?>" required>
          </div>
          <div class="add-section__input-item">
            <label class="select-label">
              <b>Category: </b>
              <select class="select" name="category">
                <option value="<?=$categoryId?>"><?=$category?></option>
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
                <img src="/public/products/<?= $image ?>" alt="preview">
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
      <?php endif; ?>
  </section>
  </div>
</main>