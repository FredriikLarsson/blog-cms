<?php

require_once(__DIR__ . '/../model/db.php');
require_once(__DIR__ . '/../model/sql_query.php');

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

/* Get a blog owned by a specific user
@param userId = id of the user
@return false if user doesnt own a blog, otherwise blog info is returned */
function getUserBlog($userId) {
    global $db;
    $query = selectUserBlog($userId); //information about a blog
    $blog = db_select($db, $query);
    //check if user doesnt have a blog
    if (count($blog) < 1) {
        return false;
    } else {
        return $blog[0];
    }
}

/* Create a new blog
@param $title = blogtitle, $presentation = blogpresentation, $image = filepath to blog image
@return true in case blog was successfully created, false if something went wrong */
function createblog($title, $presentation, $image, $userId) {
    global $db;
    $query = getAllBlogs(); //Query for getting all blogs from the database
    $existingBlogs = db_select($db, $query); //Array of all the blogs in the database
    //check if blog title ($title) already exists in the database
    foreach ($existingBlogs as $value) {
        if ($value['title'] == $title) {
            //blogtitle already taken
            return false;
        }
    }
    $_image = $image; //In case no image is going to be stored at database
    $_presentation = $presentation; //In case no blog presentation is going to be stored at the database
    /* check if user havent sent in any image
    @param $image = the image post variable that came from the form user sent in to the server */
    if (is_null($image)) {
        $_image = '';
    }
    /* check if user havent sent in any presentation text
    @param $presentation = the presentation text post variable that came from the form user sent in to the server */
    if (is_null($presentation)) {
        $_presentation = '';
    }
    $queryAddBlog = addBlog($title, $_presentation, $_image, date("Y/m/d"), $userId); //Query for adding a new blog to the database
    db_query($db, $queryAddBlog); //Add the blog to the database
    return true;
}


/* Move image that is sent in through a form, to a specific permanently location on the server */
function uploadImage() {
    $tmp_file = $_FILES['blog-image']['tmp_name']; //Temp filename on server for sent in image through post request
    $upload_dir = "../uploads/"; //Directory on server that image is going to be stored in
    $target_file = basename($_FILES['blog-image']['name']); //Image name on the server when stored correctly
        //check if image upload went through
        if(move_uploaded_file($tmp_file, $upload_dir . $target_file))
        {
            $message = "Filen har laddats upp.";
        }
    
        //Something went wrong during the upload
        else
        {
            $error = $_FILES['blog-image']['error'];
            //$message = $upload_errors[$error];
        }
}