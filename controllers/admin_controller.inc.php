<?php

require_once('../services/login_service.php');
require_once('../services/blog_service.php');



//Check if user want to logout
if (isset($_GET['logout'])) {
    //Logout browser from the admin page of the blog
    unset($_SESSION['userId']);
    header("Location: http://www.student.ltu.se/~frelab-8/Projekt_Blogg");
    exit();
}

//Check if user is logged in
if (!isset($_SESSION['userId'])) {
    //No user is logged in (no session is active)
    header('Location: http://www.student.ltu.se/~frelab-8/Projekt_Blogg/login.php?noSessionActive=true');
    exit();
}

//Check if session is valid
if (!checkSession($_SESSION['userId'])) {
    //The session is not valid
    header('Location: http://www.student.ltu.se/~frelab-8/Projekt_Blogg/login.php?sessionNotValid=true');
    exit();
}

//Check if user doesnt have a blog
if (getUserBlog($_SESSION['userId']) === false) {
    header('Location: http://www.student.ltu.se/~frelab-8/Projekt_Blogg/create_blog.php');
    exit();
}

//Check if user want to view his images or view all posts on the blog
if ($_GET['images'] == true) {
    header('Location: http://www.student.ltu.se/~frelab-8/Projekt_Blogg/images.php');
} else {
    header('Location: http://www.student.ltu.se/~frelab-8/Projekt_Blogg/admin.php');
}
