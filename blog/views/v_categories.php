<div class="categories">
  <? foreach ($categories as $id => $category) : ?>
    <div class="categories">
      <a class="category__link" href="<?= BASE_URL ?>category/<?= $category['category_id'] ?>">
        <h2><?= $category['category_name'] ?></h2>
      </a>
    </div>
  <? endforeach; ?>
</div>
