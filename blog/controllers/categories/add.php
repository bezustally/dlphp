<?php

if (!$_SESSION['admin']) {
	header('Location: ' . BASE_URL);
	$_SESSION['notification']['class'] = "alert-danger";
	$_SESSION['notification']['text'] = "А ну кыш отсюда!";
	$_SESSION['warnings'] += 1;
	if ($_SESSION['warnings'] > 1) {
		$_SESSION['notification']['text'] = "Предупреждаю в последний раз!";
	}
	if ($_SESSION['warnings'] > 2) {
		$_SESSION['banned'] = true;
		$_SESSION['notification']['class'] = "alert-warning";
		$_SESSION['notification']['text'] = "Ну всё, теперь ты забанен!";
	}
	exit();
}

$pageTitle = "Add new category | BBlog";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$fields = extractFields($_POST, ['category_name', 'category_description', 'category_url']);

	$validationErrors = validateCategory($fields);

	if (empty($validationErrors)) {
		$result = addCategory($fields);
		if ($result) {
			$_SESSION['notification']['class'] = "alert-success";
			$_SESSION['notification']['text'] = "Категория успешно добавлена!";
			header('Location: ' . BASE_URL);
			exit();
		} else {
			$validationErrors = ['Категория с таким названием уже существует!'];
		}
	}
} else {
	$fields = ['category_name' => '', 'category_description' => '', 'category_url' => ''];
	$validationErrors = [];
}

$fields['validationErrors'] = $validationErrors;
$pageContent = render('categories/v-add', $fields);
