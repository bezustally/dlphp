<?php

function getCategories(): array {
  $query = dbExecuteQuery('SELECT * FROM Categories ORDER BY category_name DESC');
  $categories = $query->fetchAll();
  if ($categories) {
    return $categories;
  }
  return [];
}

function getCategory($id): array {
  $sql = 'SELECT * FROM Categories WHERE category_id=' . $id;

  $query = dbExecuteQuery($sql);
  $category = $query->fetch();
  if ($category) {
    return $category;
  }
  return [];
}

function checkIfNameIsTaken(string $name): bool {
  $sql = 'SELECT * FROM Categories WHERE category_name=' . "'" . $name . "'";

  $query = dbExecuteQuery($sql);
  $category = $query->fetch();
  if ($category) {
    return true;
  }
  return false;
}

function validateCategory(array &$fields): array {
  $errors = [];
  $categoryLength = mb_strlen($fields['category_name'], 'UTF8');
  $descriptionLength = mb_strlen($fields['category_description'], 'UTF8');
  $urlLength = mb_strlen($fields['category_url'], 'UTF8');

  if ($categoryLength < 2) {
    if ($categoryLength == 0) {
      $errors[] = 'Заполните название категории!';
    } else {
      $errors[] = 'Название категории не короче 2 символов!';
    }
  }

  if ($descriptionLength > 8192) {
    $errors[] = 'Описание не более 8192 символов.';
  }

  if ($descriptionLength == 0) {
    $errors[] = 'Вы должны заполнить описание!';
  }

  if ($urlLength < 2) {
    $errors[] = 'URL must be at least 2 characters';
  }

  if ($urlLength > 64) {
    $errors[] = "URL can't be more than 64 characters long";
  }

  if ($urlLength == 0) {
    $errors[] = 'Нужно задать URL!';
  }

  $fields['category_name'] = htmlspecialchars($fields['category_name']);
  $fields['category_description'] = htmlspecialchars($fields['category_description']);
  $fields['category_url'] = htmlspecialchars($fields['category_url']);

  return $errors;
}

function addCategory(array $params): bool {
  $categoryExists = checkIfNameIsTaken($params['category_name']);
  if ($categoryExists) {
    return false;
  }

  $sql = '
          INSERT Categories (category_name, category_description, category_url)
          VALUES(:category_name, :category_description, :category_url)
          ';
  dbExecuteQuery($sql, $params);
  return true;
}
