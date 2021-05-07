<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/index.css">
    <script src="js/index.js" defer></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Nyheter</title>
</head>
<body>
    <div class="container-main" id="container-main">
        <!-- Content for header, navmenu and sidebar components -->
        <?php
            $headerTitle = 'Nyheter';
            $navButton1 = 'Senaste inlägg';
            $navButton2 = 'Nya bloggare';
            $navButton3 = '';
            $menuLink1 = 'Logga in/Registrera';
            $menuLink2 = 'Hjälp';
            require_once('components/header.php');
        ?>
        <ul class="list-news" id="list-news-bloggers">
            <?php
                require_once('services/news_service.php');
                viewLatestBlogs();
            ?>
        </ul>
        <ul class="list-news" id="list-news-posts">
            <?php
                require_once('services/news_service.php');
                viewLatestPosts();
            ?>
        </ul>
    </div>
</body>
</html>