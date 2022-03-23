<?php
	include_once('functions.php');
	$articles = getArticles();

	$id = (int)($_GET['id'] ?? '');
	$post = $articles[$id] ?? null;
	$hasPost = ($post !== null);

?>
<div class="content">
	<? if($hasPost): ?>
		<div class="article">
			<h1><?=$post['title']?></h1>
			<div><?=$post['content']?></div>
		</div>
		<br>
		<a href="index.php">На главную</a>
	<? else: ?>
		<div class="e404">
			<h1>Страница не найдена!</h1>
			<a href="index.php">На главную</a>
		</div>
	<? endif; ?>
</div>
