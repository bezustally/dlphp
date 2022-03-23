<?php

function dbInstance(): PDO {
  $dbuser = 'root';
  $dbpass = 'root';

  static $db;

  if (!$db) {
    $db = new PDO('mysql:host=localhost;dbname=d-l-chat;charset=utf8', $dbuser, $dbpass, [
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
  }

  return $db;
}

function dbExecuteQuery(string $sql, array $params = []): PDOStatement {
  $db = dbInstance();
  $query = $db->prepare($sql);
  $query->execute($params);

  dbCheckError($query);

  // $db = null;
  return $query;
}

function dbCheckError(PDOStatement $query): bool {
  $errorInfo = $query->errorInfo();

  if ($errorInfo[0] !== PDO::ERR_NONE) {
    echo $errorInfo[0];
    exit();
  }

  return true;
}
