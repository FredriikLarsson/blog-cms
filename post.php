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
        <?php echo getPostTitle(); ?>
    </title>
</head>

<body>
    <div class="container-main">
        <?php
        /* Here is the page specific content that goes in to the header component */
        $headerTitle = getPostTitle();
        require_once('components/header.php');
        ?>
        <div class="container-image">
            <!-- Information about the post -->
            <p class="text-post">
                <!-- Author of the post -->
                Författare: <?php echo getPostAuthor(); ?> <br>
                <!-- Info when the post was created -->
                <?php echo getPostDate(); ?>
            </p>
            <!-- Image for the post -->
            <img src="<?php echo getPostImage(); ?>" alt="" class="image-post">
        </div>
        <div class="container-content">
            <div class="container-content-text">
                <!-- The content of the post -->
                <p class="content-text"><?php echo getPostContent(); ?></p>
            </div>
        </div>
    </div>
</body>

</html>