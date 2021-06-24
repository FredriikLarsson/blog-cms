<?php

require_once('model/db.php');
require_once('model/sql_query.php');

$db = db_connect();

/* View the 10 most recent created blogs in the cms system */
function viewLatestBlogs()
{
    global $db;
    $query = getLatestBlogs(); //Sql query to get the 10 most recent created blogs
    $latestBlogs = db_select($db, $query); //Array with the 10 blogs
    /* Create a li element for every blog in the array of the 10 blogs */
    foreach ($latestBlogs as $value) {
        echo '<li class="list__item">
                <a href=\'blog.php?blogId=' . $value['id'] . '\' class="list__item--link">
                    <div class="list__item--image-container">
                        <img src="' . $value['image'] . '" alt="" class="list__item--image">
                    </div>
                    <div class="list__item--text">
                        <div class="list__item--text-container">
                            <h2>' . $value['title'] . '</h2>
                            <p>' . $value['presentation'] . '</p>
                        </div>
                    </div>
                </a>
            </li>';
    }
}

/* View all created blogs in the cms system */
function viewAllBlogs()
{
    global $db;
    $query = getAllBlogs(); //Sql query to get all created blogs in the cms system
    $allBlogs = db_select($db, $query); //Array with all blogs in the cms system
    /* Create a li element for every blog in the array of all the blogs */
    foreach ($allBlogs as $value) {
        echo '<li class="list__item">
                <a href=\'blog.php?blogId=' . $value['id'] . '\' class="list__item--link">
                    <div class="list__item--image-container">
                        <img src="' . $value['image'] . '" alt="" class="list__item--image">
                    </div>
                    <div class="list__item--text">
                        <div class="list__item--text-container">
                            <h2>' . $value['title'] . '</h2>
                            <p>' . $value['presentation'] . '</p>
                        </div>
                    </div>
                </a>
            </li>';
    }
}

/* View the 10 most recent created posts in the cms system */
function viewLatestPosts()
{
    global $db;
    $query = getLatestPosts();  //Sql query to get the 10 most recent created posts
    $latestPosts = db_select($db, $query); //Array with the 10 posts
    /* Create a li element for every post in the array of the 10 posts */
    foreach ($latestPosts as $value) {
        echo '<li class="list__item">
                <a href=\'post.php?postId=' . $value['id'] . '\' class="list__item--link">
                    <div class="list__item--image-container">
                        <img src="' . $value['image'] . '" alt="" class="list__item--image">
                    </div>
                    <div class="list__item--text">
                        <div class="list__item--text-container">
                            <h2>' . $value['title'] . '</h2>
                        </div>
                    </div>
                </a>
            </li>';
    }
}
