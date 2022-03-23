<?php

if (!isset($_COOKIE['login'])) {
  setcookie('login', 'admin', time() + 3600 * 24 * 30);
}

if (!isset($_COOKIE['password'])) {
  setcookie('password', '12345', time() + 3600 * 24 * 7);
}

echo '<pre>';
print_r($_COOKIE);
echo '</pre>';
