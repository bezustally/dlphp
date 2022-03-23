<div class="form">
  <form method="post">
    <input type="hidden" name="user_id" value="1">
    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" name="title" value="<?= $title ?>">
    </div>
    <div class="form-group">
      <label for="content">Content</label>
      <textarea name="content"><?= $content ?></textarea>
    </div>
    <div class="form-group">
      <label for="category_id">Category</label>
      <select name="category_id">
        <? foreach ($categories as $category) : ?>
          <? if ($category['category_id'] === $category_id) : ?>
            <option value="<?= $category['category_id'] ?>" selected><?= $category['category_name'] ?></option>
          <? else : ?>
            <option value="<?= $category['category_id'] ?>"><?= $category['category_name'] ?></option>
          <? endif; ?>
        <? endforeach; ?>
      </select>
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
