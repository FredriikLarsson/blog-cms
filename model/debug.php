<?php

include("db.php");

$fileName = 'testName';
$filePath = 'testPath';
$description = 'testDesc';
$created = '2008-10-10';
$blogId = 38;

$title = 'Testing 99';
$content = '';
$image = '/~frelab-8/Projekt_Blogg/uploads/Anders_blog.jpg';
$created = '2008-10-10';
$blogId = 42;

$db = db_connect();
$query = 'SELECT * FROM images';
$columns = db_select($db, $query);
console_log($columns);


/*
$db = db_connect();
$query = 'INSERT INTO posts (title, content, image, created, blog_id) 
VALUES (\'' . $title . '\', \'' . $content . '\', \'' . $image . '\', \'' . $created . '\', \'' . $blogId . '\');';
$columns = db_query($db, $query);
console_log($columns);
*/

?>