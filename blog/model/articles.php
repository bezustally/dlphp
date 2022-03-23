<?php

function getArticles($id = null): array {
  if ($id) {
    $query = dbExecuteQuery('SELECT * FROM Articles WHERE category_id=' . $id);
  } else {
    $query = dbExecuteQuery('SELECT * FROM Articles ORDER BY added DESC');
  }
  $articles = $query->fetchAll();
  if ($articles) {
    return $articles;
  }
  return [];
}

function getArticle(int $id): array {
  $sql = 'SELECT * FROM Articles WHERE article_id=' . $id;

  $query = dbExecuteQuery($sql);
  $article = $query->fetch();
  if ($article) {
    return $article;
  }
  return [];
}

function checkIfTitleIsTaken(string $title): bool {
  $sql = 'SELECT * FROM Articles WHERE title=' . "'" . $title . "'";

  $query = dbExecuteQuery($sql);
  $article = $query->fetch();
  if ($article) {
    return true;
  }
  return false;
}

function addArticle(array $params): bool {
  $articleExists = checkIfTitleIsTaken($params['title']);
  if ($articleExists) {
    return false;
  }

  $sql = '
          INSERT Articles (title, content, user_id, category_id)
          VALUES(:title, :content, :user_id, :category_id)
          ';
  dbExecuteQuery($sql, $params);
  return true;
}

function deleteArticle(int $id): bool {
  $sql = 'DELETE FROM Articles WHERE article_id=' . $id;
  dbExecuteQuery($sql);
  return true;
}

function editArticle($params): bool {
  $sql = '
          UPDATE Articles
          SET title=:title, content=:content, category_id=:category_id
          WHERE article_id = :article_id
          ';
  dbExecuteQuery($sql, $params);
  return true;
}

function validateArticle(array &$fields): array {
  $errors = [];
  $usernameLength = mb_strlen($fields['title'], 'UTF8');
  $textLength = mb_strlen($fields['content'], 'UTF8');
  $givenCategoryId = (int)($fields['category_id']);
  $categoriesLength = sizeof(getCategories());

  if ($givenCategoryId > $categoriesLength || $givenCategoryId < 1) {
    $errors[] = 'Такой категории не существует!';
  }

  if ($usernameLength < 2) {
    if ($usernameLength == 0) {
      $errors[] = 'Заполните название статьи!';
    } else {
      $errors[] = 'Название статьи не короче 2 символов!';
    }
  }

  if ($textLength > 140) {
    $errors[] = 'Текст не более 140 символов.';
  }

  if ($textLength == 0) {
    $errors[] = 'Вы должны заполнить содержание!';
  }

  $fields['title'] = htmlspecialchars($fields['title']);
  $fields['content'] = htmlspecialchars($fields['content']);

  return $errors;
}
