<?php

require_once('../services/login_service.php');
require_once('../services/blog_service.php');
require_once('../services/image_service.php');

//Id of the image
$imageId = json_decode(file_get_contents('php://input'), true);

//Check if user is logged in
if (isset($_SESSION['userId'])) {
    //Check if session user exists in the database
    if (checkSession($_SESSION['userId'])) {
        //Check if user doesnt have a blog
        if (getUserBlog($_SESSION['userId']) === false) {
            header('Location: http://localhost/Projekt_Blogg/create_blog.php');
        } else {
            //id of the blog
            $blogId = getUserBlog($_SESSION['userId'])['id'];
            //check if the blog has the image stored in the database
            if (checkBlogImage($imageId, $blogId)) {
                //Delete the image from the filesystem and database
                deleteImage($imageId);
                $message = 'Bilden ar nu borttagen';
                print_r(json_encode($message));
            } else {
                //User blog doesnt have an image with that id
                header('Location: http://localhost/Projekt_Blogg/index.php?invalidImageRequest=true');
            }
        }
    } else {
        //The session is not valid
        header('Location: http://localhost/login.php?sessionNotValid=true');
    }
} else {
    //No user is logged in (no session is active)
    header('Location: http://localhost/login.php?noSessionActive=true');
}
