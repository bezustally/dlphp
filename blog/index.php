<?php

session_start();

include_once('init.php');
// addVisitLog();

$url = $_GET['querysystemurl'];
$routes = include('routes.php');
$router = parseUrl($url, $routes);
define('CONTROLLER', $router['controller']);
define('URL_PARAMS', $router['params']);

$pageContent = defineContent();

$html = render('base/v_main', [
	'title' => $pageContent['title'],
	'content' => $pageContent['html']
]);

echo $html;


// 1. Внедрить систему авторизации в блог.
//    Закрыть страницы добавления, удаления и редактирования.

// 2. Реализовать logout.
//    В базовом шаблоне выводить ссылки вход / выход
//    в зависимости от значения переменной user.

// 3. (*) Внедрить в таблицу статей id_user.
//    Разрешить пользователям удалять и редактировать только свои статьи.
