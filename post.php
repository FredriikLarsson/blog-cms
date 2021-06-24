<?php
session_start();
require_once('services/post_service.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/post.css">
    <script type="module" src="js/post.js" defer></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>
        <!-- The post title -->
        <?php echo getPostTitle(); ?>
    </title>
</head>

<body>
    <header>
        <?php
        /* Header component */
        require_once('components/header.php');
        ?>
    </header>
    <div class="main">
        <div class="post__image-container">
            <!-- Information about the post -->
            <p class="post__text">
                <!-- Author of the post -->
                Författare: <?php echo getPostAuthor(); ?> <br>
                <!-- Info when the post was created -->
                <?php echo getPostDate(); ?>
            </p>
            <!-- Image for the post -->
            <img src="<?php echo getPostImage(); ?>" alt="" class="post__image">
        </div>
    </div>
    <div class="post__content-container">
        <!-- The content of the post -->
        <p class="post__content"><?php echo getPostContent(); ?></p>
    </div>
</body>

</html>