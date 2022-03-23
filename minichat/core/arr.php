<?php

/*
  $target — one-dimensional associative array
  $fields — array with strings

  $target ['a' => 1, 'b' => 2, 'c' =>3, 'd' => 4]
  $fields ['a', 'c']
*/

function extractFields(array $target, array $fields): array {
  $res = [];

  foreach ($fields as $field) {
    $res[$field] = trim($target[$field]);
  }

  return $res;
}
