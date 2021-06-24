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
    <script type="module" src="js/blog.js" defer></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>
        <?php echo getBlogTitle($_GET['blogId']); ?>
    </title>
</head>

<body>
    <header>
        <?php
        /* Here is the page specific content that goes in to the header component */
        $headerTitle = 'test';
        /* Here is the filtering alternatives of the blogs posts */
        $navButton1 = 'Visa alla';
        $navButton2 = 'Design';
        $navButton3 = 'Systemutveckling';
        require_once('components/header.php');
        ?>
    </header>
    <div class="main">
        <ul class="list">
            <?php
                viewBlogPosts($_GET['blogId']);
            ?>
        </ul>
        <?php 
            require_once('components/info.php');
        ?>
    </div>
</body>

</html>