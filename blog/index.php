<?php

session_start();

if (isset($_SESSION['banned'])) {
	echo '<body style="background-color:black">';
	echo "<h1 style='color: red; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%)'>Banned</h1>";
	exit();
}

include_once('init.php');
// addVisitLog();

$url = $_GET['querysystemurl'];
$routes = include('routes.php');
$router = parseUrl($url, $routes);
define('CONTROLLER', $router['controller']);
define('URL_PARAMS', $router['params']);

$pageContent = defineContent();

$html = render('base/v-main', [
	'title' => $pageContent['title'],
	'content' => $pageContent['html']
]);

echo $html;
