<?php

$articles = getArticles();
$args['articles'] = $articles;
$pageTitle = 'Articles | BBlog';
$pageContent = render('articles/v-all', $args);
