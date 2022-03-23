<? if (isset($_SESSION['notification'])) : ?>
  <div class="alert <?= $_SESSION['notification']['class'] ?> center fit">
    <?= $_SESSION['notification']['text'] ?>
  </div>
  <? $_SESSION['notification'] = null; ?>
<? endif; ?>
<div class="articles">
  <? if ($articles) : ?>
    <? foreach ($articles as $id => $article) : ?>
      <div class="article">
        <h2><?= $article['title'] ?></h2>
        <a href="<?= BASE_URL ?>article/<?= $article['article_id'] ?>">Read more</a>
      </div>
    <? endforeach; ?>
  <? else : ?>
    <h2>There's no articles yet.</h2>
    <h3>Log in and add one!</h3>
  <? endif; ?>
</div>
