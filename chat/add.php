<?php

include_once('model/messages.php');
include_once('core/arr.php');

$fields = ['username' => '', 'text' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $fields = extractFields($_POST, ['username', 'text']);
  $validationErrors = validateMessage($fields);

  if (empty($validationErrors)) {
    $username = $fields['username'];
    $text = $fields['text'];

    sendMessage($fields);

    header('Location: index.php');
    exit();
  }
} else {
  $fields = ['username' => '', 'text' => ''];
  $validationErrors = [];
}

include("view/v_add.php");
