<?php

require_once(__DIR__ .  '/../model/db.php');
require_once(__DIR__ .  '/../model/sql_query.php');

$db = db_connect();

if (isset($_GET['postId'])) {
    $query = getPost($_GET['postId']); //Information about a specific post
$post = db_select($db, $query); //Array with information about post (only one row at arrayindex "0")
}

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

/* Create a new post
@param $title = post title, $content = content of the post, $image = filepath to post image
@return true in case post was successfully created, false if something went wrong */
function createPost($title, $content, $image, $userId)
{
    global $db;
    $query = selectUserBlog($userId); //Query for getting a blog from a specific user
    $blogId = db_select($db, $query); //The id of the specific blog
    $_image = $image; //In case no image is going to be stored at database
    $_content = $content; //In case no post content is going to be stored at the database
    /* check if user havent sent in any image
    @param $image = the image post variable that came from the form user sent in to the server */
    if (is_null($image)) {
        $_image = '';
    }
    /* check if user havent sent in any presentation text
    @param $presentation = the presentation text post variable that came from the form user sent in to the server */
    if (is_null($content)) {
        $_content = '';
    }
    $queryAddPost = addPost($title, $_content, $_image, date("Y/m/d"), $blogId[0]['id']); //Query for adding a new post to the database
    db_query($db, $queryAddPost); //Add the post to the database
    return true;
}

/* view all posts that the blog has uploaded */
function viewAllPosts($blogId)
{
    global $db;
    $query = getBlogPosts($blogId); //sql query to get all posts from a blog
    $posts = db_select($db, $query); //array with all the posts
    /* Create a li element for every post in the array */
    foreach ($posts as $value) {
        echo '<li class="list__item--post">
                <a href=\'post.php?postId="' . $value['id'] . '"\' class="list__item--link">
                    <div class="list__item--image-container">
                        <img src="' . $value['image'] . '" alt"" class="list__item--image">
                    </div>
                    <div class="list__item--text-container">
                        <h2 class="list__item--heading">' . $value['title'] . '</h2>
                    </div>
                </a>
                <button type="button" name="delete-post" class="list__item--delete" value="' . $value['id'] . '">Radera</button>
                <a href=\'edit_post.php?postId="' . $value['id'] . '"\' class="list__item--edit">Redigera</a>
            </li>';
    }
}

/* Delete a post from a blog */
function deletePost($postId)
{
    global $db;
    $query = deleteBlogPost($postId); //sql query to delete one post from a blog
    db_query($db, $query); //delete a post from the database
}

/* Change a specific post */
function changePost($postId, $title, $content, $image) {
    global $db;
    $query = alterPost($postId, $title, $content, $image);
    db_query($db, $query);
    return true;
}
