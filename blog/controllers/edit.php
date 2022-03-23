<?php

$categories = getCategories();

$id = URL_PARAMS['id'];

$article = getArticle($id);

if (empty($article)) {
  header('Location: ' . BASE_URL);
  exit();
}

$pageTitle = "Edit article" . " " . $article['title'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $fields = extractFields($_POST, ['title', 'content', 'article_id', 'category_id']);

  $validationErrors = validateArticle($fields);

  if (empty($validationErrors)) {
    editArticle($fields);
    $_SESSION['notification']['class'] = "alert-primary";
    $_SESSION['notification']['text'] = "Статья успешно отредактирована!";
    header('Location: ' . BASE_URL);
    exit();
  }
} else {
  $fields = [
    'title' => $article['title'],
    'content' => $article['content'],
    'article_id' => $article['article_id'],
    'category_id' => $article['category_id'],
    'categories' => $categories,
  ];
  $validationErrors = [];
}

$fields['validationErrors'] = $validationErrors;
$fields['categories'] = $categories;
$pageContent = render('v_edit', $fields);
