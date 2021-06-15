<?php

session_start();
require_once('../services/user_service.php');
require_once('../services/post_service.php');

$title = $_POST['post-title'];
$content = $_POST['post-content']; //Description text about the blog
$upload_dir = "/~frelab-8/Projekt_Blogg/uploads/"; //Directory on server that image is going to be stored in
$target_file = basename($_FILES['image']['name']); //Image name on the server when stored correctly
$imageFilePath = $upload_dir . $target_file;
$userId = $_SESSION['userId']; //get user id (session userId = database username)

//check if post title is missing
if (empty($title)) {
    //blog title is missing
    header("Location: http://www.student.ltu.se/~frelab-8/Projekt_Blogg/create_post.php?noBlogTitle=true");
    exit();
}

//Check if post got created without a problem
if (createPost($title, $content, $imageFilePath, $userId)) {
    header("Location: http://www.student.ltu.se/~frelab-8/Projekt_Blogg/admin.php");
    exit();
} else {
    //Post could not be created
    header("Location: http://www.student.ltu.se/~frelab-8/Projekt_Blogg/admin.php?error=postNotCreated");
    exit();
}
