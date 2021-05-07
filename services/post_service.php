<?php

require_once('model/sql_query.php');
require_once('model/db.php');

$db = db_connect();
$query = getPost($_GET['postId']);
$post = db_select($db, $query);