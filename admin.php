<?php
session_start();
require_once('services/blog_service.php');
//Check if client is logged in (has a started session)
if (!isset($_SESSION['userId'])) {
    //If client is not logged in then redirect to login page 
    header('Location: http://www.student.ltu.se/~frelab-8/Projekt_Blogg/login.php');
} else if (getUserBlog($_SESSION['userId']) === false) {
    //If the user that is logged in doesnt have a blog
    header('Location: http://www.student.ltu.se/~frelab-8/Projekt_Blogg/create_blog.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/admin.css">
    <script type="module" src="js/admin.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Min blogg</title>
</head>

<body>
    <?php
    /* Here is the page specific content that goes in to the header component */
    $navButton1 = '';
    $navButton2 = '';
    $navButton3 = '';
    /* Header component */
    require_once('components/header.php');
    ?>
    <main class="main">
        <!-- Link to add a new post -->
        <div class="link-container--new-post">
            <a href="./create_post.php" class="link--new-post">Skapa ny post</a>
        </div>
        <!-- List with all the posts in the blog -->
        <ul class="list">
            <?php
            require_once('services/post_service.php');
            $blogId = getUserBlog($_SESSION['userId'])['id'];
            viewAllPosts($blogId);
            ?>
        </ul>
    </main>
</body>

</html>