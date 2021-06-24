<?php

require_once('../services/login_service.php');
require_once('../services/blog_service.php');
require_once('../services/post_service.php');

$postId = json_decode(file_get_contents('php://input'), true); //Id of the post
$blogId = getUserBlog($_SESSION['userId'])['id']; //id of the blog

//Check if user is logged in
if (!isset($_SESSION['userId'])) {
    //No user is logged in (no session is active)
    header('Location: http://www.student.ltu.se/~frelab-8/Projekt_Blogg/login.php?noSessionActive=true');
    exit();
}

//Check if session user exists in the database (if the session is valid)
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

//Check if user want to edit a post
if (isset($_POST['edit-post'])) {
    $postId_ = $_POST['edit-post']; //id of the post user want to edit
    $postTitle = $_POST['post-title']; //The new title to the post
    $postContent = $_POST['post-content']; //The new content to the post
    $upload_dir = "/~frelab-8/Projekt_Blogg/uploads/"; //Directory on server that image is going to be stored in
    $target_file = basename($_FILES['image']['name']); //Image name on the server when stored correctly
    $postImage = $upload_dir . $target_file; //The new image to the post
    changePost($postId_, $postTitle, $postContent, $postImage);
    header('Location: http://www.student.ltu.se/~frelab-8/Projekt_Blogg/admin.php');
    exit();
} else {
    deletePost($postId);
    $message = 'Posten ar nu borttagen';
    print_r(json_encode($message));
    exit();
}
