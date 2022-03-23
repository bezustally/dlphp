<?php

const BASE_URL = '/dlphp/blog/';

const DB_HOST = 'localhost';
const DB_NAME = 'Blog';
const DB_USER = 'root';
const DB_PASS = '';
const DB_CHARSET = 'utf8';

include_once('core/arr.php');
include_once('core/db.php');
include_once('core/system.php');

include_once('model/articles.php');
include_once('model/categories.php');
include_once('model/users.php');
include_once('model/tags.php');

include_once('model/logs.php');
