<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/header.css">
    <link rel="stylesheet" href="style/post.css">
    <script src="js/post.js" defer></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Post title</title>
</head>
<body>
    <div class="container-main">
        <!-- Content for header and sidebar components -->
        <?php
            $headerTitle = 'Post titel';
            require_once('components/header.php');
            //Service with functionality for posts
            require_once('services/post_service.php');
        ?>
        <div class="container-image">
            <!-- Information about the post -->
            <p class="text-post">
                Författare: <?php echo $post['0']['username']; ?> <br>
                <!-- Info when the post was created -->
                <?php echo $post['0']['created']; ?>
            </p>
            <!-- Title image for the post -->
            <img src="<?php echo $post['0']['filename']; ?>" alt="" class="image-post">
        </div>
        <div class="container-content">
            <div class="container-content-title">
                <!-- Title for the post -->
                <h1><?php echo $post['0']['title']; ?></h1>
            </div>
            <div class="container-content-text">
                <!-- The content of the post -->
                <p class="content-text"><?php echo $post['0']['content']; ?></p>
            </div>
        </div>
    </div>
</body>
</html>