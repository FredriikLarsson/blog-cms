<?php

require_once('../services/login_service.php');
require_once('../services/blog_service.php');
require_once('../services/image_service.php');


$imageId = json_decode(file_get_contents('php://input'), true); //Id of the image
$blogId = getUserBlog($_SESSION['userId'])['id']; //id of the blog

//Check if user is logged in
if (!isset($_SESSION['userId'])) {
    //No user is logged in (no session is active)
    header('Location: http://localhost/login.php?noSessionActive=true');
    exit();
}

//Check if session user exists in the database (if the session is valid)
if (!checkSession($_SESSION['userId'])) {
    //The session is not valid
    header('Location: http://localhost/login.php?sessionNotValid=true');
    exit();
}

//Check if user doesnt have a blog
if (getUserBlog($_SESSION['userId']) === false) {
    header('Location: http://localhost/Projekt_Blogg/create_blog.php');
    exit();
}

//Check if user want to edit an image
if (isset($_POST['edit-image'])) {
    $imageId_ = $_POST['edit-image']; //id of the image user want to edit
    $altText = $_POST['alt-text']; //The new alt-text to the image
    //Check if the blog has the image linked to it in the database
    if (checkBlogImage($imageId_, $blogId)) {
        changeImage($imageId_, $altText);
        header('Location: http://localhost/Projekt_Blogg/images.php');
        exit();
    } else {
        //User blog doesnt have an image with that id in the database
        header('Location: http://localhost/Projekt_Blogg/index.php?invalidImageRequest=true');
        exit();
    }
} else {
    //User want to delete an image
    //check if the blog has the image linked to it in the database
    if (checkBlogImage($imageId, $blogId)) {
        //Delete the image from the filesystem and database
        deleteImage($imageId);
        $message = 'Bilden ar nu borttagen';
        print_r(json_encode($message));
    } else {
        //User blog doesnt have an image with that id in the database
        header('Location: http://localhost/Projekt_Blogg/index.php?invalidImageRequest=true');
        exit();
    }
}
