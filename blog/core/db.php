<?php

function dbInstance(): PDO {
  static $db;

  if (!$db) {
    $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET . '', DB_USER, DB_PASS, [
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
