<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/index.css">
    <script type="module" src="js/index.js" defer></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Nyheter</title>
</head>

<body>
    <div class="container-main" id="container-main">
        <?php
        /* Here is the page specific content that goes in to the header component */
        $headerTitle = 'Nyheter';
        $navButton1 = 'Senaste inlägg';
        $navButton2 = 'Nya bloggare';
        $navButton3 = '';
        require_once('components/header.php');
        ?>
        <ul class="list-news" id="list__bloggers">
            <?php
            require_once('services/news_service.php');
            /* Generates the 10 most newly created blogs */
            viewLatestBlogs();
            ?>
        </ul>
        <ul class="list-news" id="list__posts">
            <?php
            require_once('services/news_service.php');
            /* Generates the 10 latest posts */
            viewLatestPosts();
            ?>
        </ul>
    </div>
</body>

</html>