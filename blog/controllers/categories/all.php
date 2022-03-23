<?php

$categories = getCategories();
$args['categories'] = $categories;
$args['isAdmin'] = $_SESSION['admin'];
$pageTitle = 'Categories | BBlog';
$pageContent = render('categories/v-all', $args);
