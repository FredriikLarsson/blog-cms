<?php

require_once('sql_query.php');
require_once('db.php');

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
                        <h2 class="listitem-heading>' . $value['title'] . '</h2>
                        <p class="listitem-para">' . $value['presentation'] . '
                        </p>
                    </div>
                </a>
            </li>';
    }
}
