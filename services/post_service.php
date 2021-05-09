<?php

require_once('model/db.php');
require_once('model/sql_query.php');

$db = db_connect();
$query = getPost($_GET['postId']); //Information about a specific post
$post = db_select($db, $query); //Array with information about post (only one row at arrayindex "0")

/* get title of the post */
function getPostTitle()
{
    global $post;
    return $post[0]['title'];
}

/* get author of the post (username) */
function getPostAuthor()
{
    global $post;
    return $post[0]['username'];
}

/* get date when post was created */
function getPostDate()
{
    global $post;
    return $post[0]['created'];
}

/* get image to the post */
function getPostImage()
{
    global $post;
    return $post[0]['filename'];
}

/* get the main content of the post */
function getPostContent()
{
    global $post;
    return $post[0]['content'];
}
