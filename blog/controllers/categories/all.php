<?php

$categories = getCategories();
$args['categories'] = $categories;
$args['isAdmin'] = URL_PARAMS['admin'];
$pageTitle = 'Categories | BBlog';
$pageContent = render('categories/v-all', $args);
