<?php

$pageTitle = "Login | BBlog";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  print_r($_POST);
  $fields = extractFields($_POST, ['email', 'password']);

  $isValidEmail = validateEmail($fields['email']);

  if ($isValidEmail) {
    $isExistingInDatabaseEmail = checkEmailInDatabase($fields['email']);
  } else {
    $_SESSION['notification']['class'] = "alert-warning";
    $_SESSION['notification']['text'] = "Это не email!";
  }

  if ($isExistingInDatabaseEmail) {
    $result = loginUser($fields['email'], $fields['password']);
  } else {
    $_SESSION['notification']['class'] = "alert-warning";
    $_SESSION['notification']['text'] = "Такого email нет!";
  }

  if ($result) {
    $_SESSION['notification']['class'] = "alert-success";
    $_SESSION['notification']['text'] = "Вы успешно авторизованы";
    $_SESSION['token'] = 1111111;
    header('Location: ' . BASE_URL);
    exit();
  } else {
    $_SESSION['notification']['class'] = "alert-primary";
    $_SESSION['notification']['text'] = "Пароль не подходит";
  }
} else {
  $fields = ['email' => '', 'password' => ''];
}

$pageContent = render('v-login', $fields);
