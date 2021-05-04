<?php

require_once('db.php');

$db = db_connect();
$query = getBlog(3);
$result = db_select($db, $query);
console_log($result);

function getLatestPosts() {
    return 'SELECT * FROM posts ORDER BY created DESC LIMIT 10';
}

function getLatestBlogs() {
    return 'SELECT * FROM blogs ORDER BY created DESC LIMIT 10';
}

function getBlog($blog) {
    return 'SELECT * FROM blogs WHERE id=' . $blog;
}

?>