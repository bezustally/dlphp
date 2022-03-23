<? if ($hasArticle) : ?>
  <div class="article">
    <div>
      <h1><?= $article['title'] ?></h1>
      <a class="category_link" href="<?= BASE_URL ?>category/<?= $article['category_id'] ?>">#<?= $category['category_name'] ?></a>
    </div>
    <div><?= $article['content'] ?></div>
    <hr>
    <? if (isset($_SESSION['admin'])) : ?>
      <div class="gap10">
        <a class="btn btn-primary" href="<?= BASE_URL ?>edit/<?= $id ?>">Edit</a>
        <a class="btn btn-danger" href="<?= BASE_URL ?>delete/<?= $id ?>">Remove</a>
      </div>
    <? endif; ?>
  </div>
<? else : header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
  $pageContent = render('v_404'); ?>
<? endif; ?>
</div>
