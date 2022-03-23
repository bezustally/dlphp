<?php

$id = URL_PARAMS['id'];

$article = getArticle($id);
$hasArticle = !empty($article);

$args = [
  'hasArticle' => $hasArticle,
  'article' => $article,
  "id" => $id,
];

if (!empty($article)) {
  $pageTitle = $article['title'] . ' | BBlog';
  $args["category"] = getCategory($article['category_id']);
  $pageContent = render('articles/v-one', $args);
} else {
  header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
  $pageContent = render('errors/v-404');
}
