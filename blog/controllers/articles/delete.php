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

$id = URL_PARAMS['id'];

deleteArticle($id);

$_SESSION['notification']['class'] = "alert-danger";
$_SESSION['notification']['text'] = "Статья успешно удалена!";

header('Location: ' . BASE_URL);
exit();
