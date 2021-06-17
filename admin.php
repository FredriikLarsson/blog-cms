<?php
session_start();
require_once('services/blog_service.php');
//Control if client is logged in (has a started session)
if (!isset($_SESSION['userId'])) {
    //If client is not logged in then redirect to login page 
    header('Location: http://localhost/Projekt_Blogg/login.php');
} else if (getUserBlog($_SESSION['userId']) === false) {
    header('Location: http://localhost/Projekt_Blogg/create_blog.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/admin.css">
    <script type="module" src="js/admin.js" defer></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Min blogg</title>
</head>

<body>
    <header>
            <?php
            /* Here is the page specific content that goes in to the header component */
            $headerTitle = 'min blogg';
            $navButton1 = 'inlägg';
            $navButton2 = 'bilder';
            $navButton3 = '';
            /* Header component */
            require_once('components/header.php');
            ?>
    </header>
    <main class="main">
        <div class="button--new-post">
            <a href="./create_post.php" class="link--new-post">Skapa ny post</a>
        </div>
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