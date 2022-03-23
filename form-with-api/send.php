<?php

include_once('model/requests.php');

$response = [
	'res' => false,
	'error' => ''
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$name = trim($_POST['name']);
	$phone = trim($_POST['phone']);

	if ($name === '' || $phone === '') {
		$response['error'] = 'Заполните все поля!';
	} else if (mb_strlen($name, 'UTF8') < 2) {
		$response['error'] = 'Имя не короче 2 символов!';
	} else if (mb_strlen($name, 'UTF8') > 20) {
		$response['error'] = 'Имя не длиннее 20 символов!';
	} else if (mb_strlen($phone, 'UTF8') < 7) {
		$response['error'] = 'Номер не короче 7 символов!';
	} else if (mb_strlen($phone, 'UTF8') > 15) {
		$response['error'] = 'Номер не длиннее 15 символов!';
	} else {
		addRequest($name, $phone);
		$response['res'] = true;
	}
} else {
	$response = "";
}

echo json_encode($response);
