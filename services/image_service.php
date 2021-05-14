<?php

require_once('model/db.php');
require_once('model/sql_query.php');

$db = db_connect();

/* view all images that the blog has uploaded */
function viewAllImages($blogId)
{
    global $db;
    $query = selectAllBlogImages($blogId); //sql query to get all images from a blog
    $images = db_select($db, $query); //array with all the images
    /* Create a li element for every image in the array */
    foreach ($images as $value) {
        echo '<li class="image-list__item">
                    <div class="image-list__item-container">
                        <img src="' . $value['filename'] . '" alt"" class="image-list__item-image">
                    </div>
                    <button type="button" class="image-list__item-button">Ta bort</button>
                    <button type="button" class="image-list__item-button">Redigera</button>
                </li>';
    }
}