<?php

$categories = getCategories();
$tags = getTags();

$pageTitle = "Add new article | BBlog";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$fields = extractFields($_POST, ['title', 'content', 'user_id', 'category_id']);

	$validationErrors = validateArticle($fields);

	if (empty($validationErrors)) {
		$result = addArticle($fields);
		if ($result) {
			$_SESSION['notification']['class'] = "alert-success";
			$_SESSION['notification']['text'] = "Статья успешно добавлена!";
			header('Location: ' . BASE_URL);
			exit();
		} else {
			$validationErrors = ['Статья с таким названием уже существует!'];
		}
	}
} else {
	$fields = ['title' => '', 'content' => '', 'user_id' => '', 'category_id' => ''];
	$validationErrors = [];
}

$fields['validationErrors'] = $validationErrors;
$fields['categories'] = $categories;
$pageContent = render('articles/v-add', $fields);
