<?php

include_once('model/messages.php');
$messages = getAllMessages();
$isTable = ($_GET['view'] ?? '') === 'table';
$template = $isTable ? 'v_index_table' : 'v_index';

include("view/$template.php");
