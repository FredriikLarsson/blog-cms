<?php

require_once('../services/login_service.php');
require_once('../services/blog_service.php');

//Check if user want to logout
if (isset($_GET['logout'])) {
    //Logout browser from the admin page of the blog
    unset($_SESSION['userId']);
    header("Location: http://localhost/Projekt_Blogg");
} else {
    //Check if user is logged in
    if (isset($_SESSION['userId'])) {
        //Check if session user exists in the database
        if (checkSession($_SESSION['userId'])) {
            //Check if user doesnt have a blog
            if (getUserBlog($_SESSION['userId']) === false) {
                header('Location: http://localhost/Projekt_Blogg/create_blog.php');
            } else {
                header('Location: http://localhost/Projekt_Blogg/admin.php');
            }
        } else {
            //The session is not valid
            header('Location: http://localhost/login.php?sessionNotValid=true');
        }
    } else {
        //No user is logged in (no session is active)
        header('Location: http://localhost/login.php?noSessionActive=true');
    }
}
