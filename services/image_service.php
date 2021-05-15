<?php

require_once(__DIR__ . '/../model/db.php');
require_once(__DIR__ . '/../model/sql_query.php');

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
                    <button type="button" class="image-list__item-button--delete" value="' . $value['id'] . '">Ta bort</button>
                    <button type="button" class="image-list__item-button--edit">Redigera</button>
                </li>';
    }
}

/* Check if blog of current session user has the image id */
function checkBlogImage($imageId, $blogId)
{
    global $db;
    $query = selectAllBlogImages($blogId); //sql query to get all images from a blog
    $images = db_select($db, $query); //array with all the images
    foreach ($images as $value) {
        //If blog have an image with the specific imageId
        if ($imageId == $value['id']) {
            return true;
        }
    }
    return false;
}

/* Delete an image from a blog */
function deleteImage($imageId)
{
    global $db;
    $query = deleteBlogImage($imageId); //sql query to delete one image from a blog
    $query_filepath = selectImage($imageId); //sql query for getting one image
    $filename = db_select($db, $query_filepath)[0]['name']; //get the image filename
    //check if file exists in the server filesystem
    if (file_exists(dirname(__FILE__) . '/../uploads/' . $filename)) {
        unlink(dirname(__FILE__) . '/../uploads/' . $filename); //delete image from the server filesystem
        db_query($db, $query); //delete an image from the database
        return true;
    } else {
        //The image does not exist on the server filesystem
        return false;
    }
}
