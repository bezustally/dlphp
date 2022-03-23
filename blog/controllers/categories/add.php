<?php

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
