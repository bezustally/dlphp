<?php

include_once('core/db.php');

function getAllMessages(): array {
  $query = dbExecuteQuery('SELECT * FROM messages ORDER BY timestamp DESC');
  $messages = $query->fetchAll();
  return $messages;
}

function sendMessage(array $params): bool {
  $sql = 'INSERT messages (username, text) VALUES(:username, :text)';
  dbExecuteQuery($sql, $params);
  return true;
}

function validateMessage(array &$fields): array {
  $errors = [];
  $usernameLength = mb_strlen($fields['username'], 'UTF8');
  $textLength = mb_strlen($fields['text'], 'UTF8');

  if ($usernameLength < 2) {
    if ($usernameLength == 0) {
      $errors[] = 'Заполните имя!';
    } else {
      $errors[] = 'Имя не короче 2 символов!';
    }
  }

  if ($textLength > 140) {
    $errors[] = 'Текст не более 140 символов.';
  }

  if ($textLength == 0) {
    $errors[] = 'Вы не можете отправить пустое сообщение!';
  }

  $fields['username'] = htmlspecialchars($fields['username']);
  $fields['text'] = htmlspecialchars($fields['text']);

  return $errors;
}
