<?php

include("db.php");

$fileName = 'testName';
$filePath = 'testPath';
$description = 'testDesc';
$created = '2008-10-10';
$blogId = 38;


$db = db_connect();
$query = 'SELECT * FROM blogs';
$columns = db_select($db, $query);
console_log($columns)


/*
$db = db_connect();
$query = 'DELETE FROM images WHERE id=53';
$columns = db_query($db, $query);
console_log($columns);
*/

?>