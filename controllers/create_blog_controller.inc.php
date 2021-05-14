<?php

session_start();
require_once('../services/blog_service.php');
require_once('../services/user_service.php');

$title = $_POST['blog-title'];
$presentation = $_POST['blog-presentation']; //Presentation text about the blog
$upload_dir = "/Projekt_Blogg/uploads/"; //Directory on server that image is going to be stored in
$target_file = basename($_FILES['blog-image']['name']); //Image name on the server when stored correctly
$imageFilePath = $upload_dir . $target_file;
//check if blog title is missing
if (!empty($title)) {
    $userId = getUserId($_SESSION['userId']); //get user_id (session userId = database username)
    //If blog got created without a problem
    if (createblog($title, $presentation, $imageFilePath, $userId)) {
        header("Location: http://localhost/Projekt_Blogg/admin.php");
    } else {
        //A similar blog already exists and couldnt be created
        header("Location: http://localhost/Projekt_Blogg/create_blog.php?error=blogAlreadyExists=true");
    }
} else {
    //blog title is missing
    header("Location: http://localhost/Projekt_Blogg/create_blog.php?noBlogTitle=true");
}
