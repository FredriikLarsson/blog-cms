<?php

session_start();
require_once('../services/blog_service.php');
require_once('../services/user_service.php');

$title = $_POST['blog-title'];
$description = $_POST['blog-description']; //Description text about the blog
$upload_dir = "/~frelab-8/Projekt_Blogg/uploads/"; //Directory on server that image is going to be stored in
$target_file = basename($_FILES['blog-image']['name']); //Image name on the server when stored correctly
$imageFilePath = $upload_dir . $target_file;
$userId = getUserId($_SESSION['userId']); //get user id (session userId = database username)

//check if blog title is missing
if (empty($title)) {
    //blog title is missing
    header("Location: http://www.student.ltu.se/~frelab-8/Projekt_Blogg/create_blog.php?noBlogTitle=true");
    exit();
}

//Check if blog got created without a problem
if (createblog($title, $description, $imageFilePath, $userId)) {
    header("Location: http://www.student.ltu.se/~frelab-8/Projekt_Blogg/admin.php");
    exit();
} else {
    //Similar blog already exists and couldnt be created
    header("Location: http://www.student.ltu.se/~frelab-8/Projekt_Blogg/create_blog.php?error=blogAlreadyExists=true");
    exit();
}
