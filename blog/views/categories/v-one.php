<div class="content">
  <? if ($hasCategory) : ?>
    <div class="category">
      <h1><?= $category['category_name'] ?></h1>
      <div><?= $category['category_description'] ?></div>
      <hr>
      <? if ($articles) : ?>
        <div class="articles">
          <? foreach ($articles as $article) : ?>
            <div class="article">
              <h1><a href="<?= BASE_URL ?>article/<?= $article['article_id'] ?>"><?= $article['title'] ?></a></h1>
              <div><?= $article['content'] ?></div>
              <hr>
            </div>
          <? endforeach; ?>
        </div>
      <? else : ?>
        <div>There's no articles yet..</div>
      <? endif; ?>
    </div>
  <? else : header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
    $pageContent = render('v_404'); ?>
  <? endif; ?>
</div>
