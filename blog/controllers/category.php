<?php

$id = URL_PARAMS['id'];

$category = getCategory($id);
$hasCategory = !empty($category);
$articles = getArticles($id);

$args = [
  'hasCategory' => $hasCategory,
  'category' => $category,
  "id" => $id,
  'articles' => $articles
];

if ($hasCategory) {
  $pageTitle = $category['category_name'] . ' articles | BBlog';
  $pageContent = render('v_category', $args);
} else {
  include_once('controllers/404.php');
}
