<?php

$_SESSION['token'] = null;
$_SESSION['admin'] = null;

$_SESSION['notification']['class'] = "alert-primary";
$_SESSION['notification']['text'] = "Вы успешно вышли!";
header('Location: ' . BASE_URL);
exit();
