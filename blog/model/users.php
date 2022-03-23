<?php

function validateEmail(string $email): bool {
  return preg_match('/[(\w\d)]+@[(\w\d)]+\.[(\w\d)]+/', $email);
}

function checkEmailInDatabase($email): bool {
  $sql = 'SELECT COUNT(*) AS count FROM Users WHERE email=:email';
  $query = dbExecuteQuery($sql, ['email' => $email]);

  $result = $query->fetch();

  if ($result['count']) {
    return true;
  }
  return false;
}

function loginUser(string $email, string $password): bool {
  $sql = 'SELECT COUNT(*) AS count FROM Users WHERE email=:email AND password=:password';
  $query = dbExecuteQuery($sql, ['email' => $email, 'password' => $password]);

  $result = $query->fetch();

  if ($result['count']) {
    return true;
  }
  return false;
}

function isUserAdmin(string $email) {
  $sql = 'SELECT COUNT(*) AS count FROM Users WHERE email=:email AND role="admin"';
  $query = dbExecuteQuery($sql, ['email' => $email]);

  $result = $query->fetch();

  if ($result['count']) {
    return true;
  }
  return false;
}
