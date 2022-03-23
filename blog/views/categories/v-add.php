<div class="form">
  <form method="post">
    <input type="hidden" name="user_id" value="1">
    <div class="form-group">
      <label for="category_name">Name</label>
      <input type="text" name="category_name" value="<?= $category_name ?>">
    </div>
    <div class="form-group">
      <label for="category_description">Description</label>
      <textarea name="category_description"><?= $category_description ?></textarea>
    </div>
    <div class="form-group">
      <label for="category_url">URL</label>
      <textarea name="category_url" <?= $category_url ?>></textarea>
    </div>
    <br>
    <button class="submit">Send</button>
    <div class="errors">
      <? if ($validationErrors) : ?>
        <script>
          const errors = document.querySelector('.errors');
          document.addEventListener('click', () => errors.innerHTML = '')
        </script>
        <? foreach ($validationErrors as $error) : ?>
          <div class="error" style="color: red"><?= $error ?></div>
        <? endforeach; ?>
      <? endif; ?>
    </div>
  </form>
</div>
