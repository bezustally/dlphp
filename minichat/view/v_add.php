<div class="form" style="margin: 0 auto; width: 300px;">
  <form method="post">
    Name:<br>
    <input type="text" autocomplete name="username" autofocus value="<?= $fields['username'] ?>"><br>
    Text:<br>
    <textarea rows="5" cols="18" name="text" name="text"><?= $fields['text'] ?></textarea><br>
    <button>Send</button>
    <div class="error-list">
      <? foreach ($validationErrors as $error) : ?>
        <p><?= $error ?></p>
      <? endforeach; ?>
    </div>
  </form>
</div>
