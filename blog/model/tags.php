<?php

function getTags(): array {
  $query = dbExecuteQuery('SELECT * FROM Tags ORDER BY tag_name  DESC');
  $categories = $query->fetchAll();
  return $categories;
}
