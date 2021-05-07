<?php

require_once('model/sql_query.php');
require_once('model/db.php');

function viewBlogPosts($blogId) {
    $db = db_connect();
    $query = getBlogPosts($blogId);  //sql query to get all blog post from a blog
    $blogPosts = db_select($db, $query); //get an array with the blogposts
    /* Create a li element for every post in the array of all the blogposts */
    foreach($blogPosts as $value) {
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