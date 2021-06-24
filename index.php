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
    <header>
        <?php
        /* Here is the page specific content that goes in to the header component */
        $navButton1 = 'Senaste inlägg';
        $navButton2 = 'Nya bloggare';
        $navButton3 = 'Alla bloggar';
        /* Header component */
        require_once('components/header.php');
        ?>
    </header>
    <div class="main-container">
        <!-- List with the 10 most newly created blogs -->
        <ul class="list" id="list__bloggers">
            <?php
            require_once('services/news_service.php');
            /* Generates the 10 most newly created blogs */
            viewLatestBlogs();
            ?>
        </ul>
        <!-- List with the 10 latest posts -->
        <ul class="list" id="list__posts">
            <?php
            require_once('services/news_service.php');
            /* Generates the 10 latest posts */
            viewLatestPosts();
            ?>
        </ul>
        <!-- List with all blogs in the cms system -->
        <ul class="list" id="list__bloggers--all">
            <?php
            require_once('services/news_service.php');
            /* Generates all created blogs in the cms system */
            viewAllBlogs();
            ?>
        </ul>
    </div>
</body>

</html>