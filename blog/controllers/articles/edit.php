<?php

if (!$_SESSION['admin']) {
  header('Location: ' . BASE_URL);
  $_SESSION['notification']['class'] = "alert-danger";
  $_SESSION['notification']['text'] = "А ну кыш отсюда!";
  $_SESSION['warnings'] += 1;
  if ($_SESSION['warnings'] > 1) {
    $_SESSION['notification']['text'] = "Предупреждаю в последний раз!";
  }
  if ($_SESSION['warnings'] > 2) {
    $_SESSION['banned'] = true;
    $_SESSION['notification']['class'] = "alert-warning";
    $_SESSION['notification']['text'] = "Ну всё, теперь ты забанен!";
  }
  exit();
}

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
$pageContent = render('articles/v-edit', $fields);
