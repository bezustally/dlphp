<?php

$categories = getCategories();
$args['categories'] = $categories;
$pageTitle = 'Categories | BBlog';
$pageContent = render('v_categories', $args);
