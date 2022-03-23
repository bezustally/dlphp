<?php

$articles = getArticles();
$args['articles'] = $articles;
$pageTitle = 'Articles | BBlog';
$pageContent = render('v_articles', $args);
