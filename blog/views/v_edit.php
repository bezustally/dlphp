<div class="form">
  <form method="post">
    <input type="hidden" name="article_id" value="<?= $article_id ?>">
    Title:<br>
    <input type="text" name="title" value="<?= $title ?>">
    <br>
    Content:<br>
    <textarea name="content"><?= $content ?></textarea>
    <br>
    Category: <br>
    <select name="category_id">
      <? foreach ($categories as $category) : ?>
        <? if ($category['category_id'] === $category_id) : ?>
          <option value="<?= $category['category_id'] ?>" selected><?= $category['category_name'] ?></option>
        <? else : ?>
          <option value="<?= $category['category_id'] ?>"><?= $category['category_name'] ?></option>
        <? endif; ?>
      <? endforeach; ?>
    </select>
    <br>
    <button>Save</button>
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
