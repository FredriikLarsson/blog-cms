<?php

require_once('model/db.php');
require_once('model/sql_query.php');

$db = db_connect();

/* Generate all posts from a specific blog
$param blogId = the id of the specific blog */
function viewBlogPosts($blogId)
{
    global $db;
    $query = getBlogPosts($blogId);  //sql query to get all blog posts from a blog
    $blogPosts = db_select($db, $query); //array with the blogposts
    /* Create a li element for every post in the array of all the blogposts */
    foreach ($blogPosts as $value) {
        echo '<li class="listitem-news">
                <a href=\'post.php?postId="' . $value['id'] . '"\' class="postLink">
                    <div class="container-image">
                        <img src="' . $value['filename'] . '" alt"" class="listitem-image">
                    </div>
                    <div class="container-listitem-text">
                        <h2 class="listitem-heading">' . $value['title'] . '</h2>
                    </div>
                </a>
            </li>';
    }
}

/* Get the title of the blog
$param blogId = the id of the specific blog
$return blog title */
function getBlogTitle($blogId)
{
    global $db;
    $query = getBlog($blogId);  //information about a specific blog
    $blog = db_select($db, $query);
    return $blog[0]['title'];
}
