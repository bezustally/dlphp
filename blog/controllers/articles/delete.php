<?php

$id = URL_PARAMS['id'];

deleteArticle($id);

$_SESSION['notification']['class'] = "alert-danger";
$_SESSION['notification']['text'] = "Статья успешно удалена!";

header('Location: ' . BASE_URL);
exit();
