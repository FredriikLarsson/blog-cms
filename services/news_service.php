<?php

require_once('model/db.php');
require_once('model/sql_query.php');

$db = db_connect();

/* view the 10 most recent created blogs on the cms system */
function viewLatestBlogs()
{
    global $db;
    $query = getLatestBlogs(); //sql query to get the 10 most recent created blogs
    $latestBlogs = db_select($db, $query); //array with the 10 blogs
    /* Create a li element for every blog in the array of the 10 blogs */
    foreach ($latestBlogs as $value) {
        echo '<li class="list__item--news">
                <a href=\'blog.php?blogId="' . $value['id'] . '"\' class="list__item--link">
                    <div class="image__container">
                        <img src="' . $value['image'] . '" alt"" class="list__item--image">
                    </div>
                    <div class="list__item--text">
                        <h2>' . $value['title'] . '</h2>
                        <p>' . $value['presentation'] . '
                        </p>
                    </div>
                </a>
            </li>';
    }
}

/* view the 10 most recent created posts on the cms system */
function viewLatestPosts()
{
    global $db;
    $query = getLatestPosts();  //sql query to get the 10 most recent created posts
    $latestPosts = db_select($db, $query); //array with the 10 posts
    /* Create a li element for every post in the array of the 10 posts */
    foreach ($latestPosts as $value) {
        echo '<li class="list__item--news">
                <a href=\'post.php?postId="' . $value['id'] . '"\' class="list__item--link">
                    <div class="image__container">
                        <img src="' . $value['image'] . '" alt"" class="list__item--image">
                    </div>
                    <div class="list__item--text">
                        <h2>' . $value['title'] . '</h2>
                    </div>
                </a>
            </li>';
    }
}
