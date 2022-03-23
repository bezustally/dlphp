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
