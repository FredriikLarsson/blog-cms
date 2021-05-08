<?php

require_once('model/sql_query.php');
require_once('model/db.php');

/* view the 10 most recent created blogs on the cms system */
function viewLatestBlogs() {
    $db = db_connect();
    $query = getLatestBlogs(); //sql query to get the 10 most recent created blogs
    $latestBlogs = db_select($db, $query); //get an array with the 10 blogs
    /* Create a li element for every blog in the array of the 10 blogs */
    foreach($latestBlogs as $value) {
        echo '<li class="listitem-news">
                <a href=\'blog.php?blogId="' . $value['id'] . '"\' class="blogLink">
                    <div class="container-image">
                        <img src="' . $value['image'] . '" alt"" class="listitem-image">
                    </div>
                    <div class="container-listitem-text">
                        <h2 class="listitem-heading">' . $value['title'] . '</h2>
                        <p class="listitem-para">' . $value['presentation'] . '
                        </p>
                    </div>
                </a>
            </li>';
    }
}


function viewLatestPosts() {
    $db = db_connect();
    $query = getLatestPosts();  //sql query to get the 10 most recent created posts
    $latestPosts = db_select($db, $query); //get an array with the 10 posts
    /* Create a li element for every post in the array of the 10 posts */
    foreach($latestPosts as $value) {
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
