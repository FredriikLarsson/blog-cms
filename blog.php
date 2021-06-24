<?php
session_start();
require_once('services/blog_service.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/blog.css">
    <script type="module" src="js/blog.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Title of the blog -->
    <title>
        <?php echo getBlogTitle($_GET['blogId']); ?>
    </title>
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
    <div class="main">
        <!-- List with all the posts for a blog -->
        <ul class="list">
            <?php
            viewBlogPosts($_GET['blogId']);
            ?>
        </ul>
        <!-- Information about the blog -->
        <?php
        require_once('components/info.php');
        ?>
    </div>
</body>

</html>