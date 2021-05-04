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
        <ul class="list-news">
            <li class="listitem-news">
                <a href="blog.php" class="testLink">
                    <div class="container-image">
                        <img src="resources/example.jpg" alt="" class="listitem-image">
                    </div>
                    <div class="container-listitem-text">
                        <h2 class="listitem-heading">Heading</h2>
                        <p class="listitem-para">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Impedit, voluptatum facilis! Accusantium earum vitae vero in itaque qui, maiores illum facere quia. Officia illum, vero dignissimos, culpa ex fugit laboriosam, dolores impedit necessitatibus vitae quam.
                        </p>
                    </div>
                </a>
            </li>
            <li class="listitem-news">
                <a href="post.php" class="testLink">
                    <img src="resources/example.jpg" alt="" class="listitem-image">
                    <div class="container-listitem-text">
                        <h2 class="listitem-heading">Heading</h2>
                        <p class="listitem-para">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Impedit, voluptatum facilis! Accusantium earum vitae vero in itaque qui, maiores illum facere quia. Officia illum, vero dignissimos, culpa ex fugit laboriosam, dolores impedit necessitatibus vitae quam.
                        </p>
                    </div>
                </a>
            </li>
            <li class="listitem-news">
                <img src="resources/example.jpg" alt="" class="listitem-image">
                <div class="container-listitem-text">
                    <h2 class="listitem-heading">Heading</h2>
                    <p class="listitem-para">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Impedit, voluptatum facilis! Accusantium earum vitae vero in itaque qui, maiores illum facere quia. Officia illum, vero dignissimos, culpa ex fugit laboriosam, dolores impedit necessitatibus vitae quam.
                    </p>
                </div>
            </li>
            <li class="listitem-news">
                <img src="resources/example.jpg" alt="" class="listitem-image">
                <div class="container-listitem-text">
                    <h2 class="listitem-heading">Heading</h2>
                    <p class="listitem-para">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Impedit, voluptatum facilis! Accusantium earum vitae vero in itaque qui, maiores illum facere quia. Officia illum, vero dignissimos, culpa ex fugit laboriosam, dolores impedit necessitatibus vitae quam.
                    </p>
                </div>
            </li>
            <li class="listitem-news">
                <img src="resources/example.jpg" alt="" class="listitem-image">
                <div class="container-listitem-text">
                    <h2 class="listitem-heading">Heading</h2>
                    <p class="listitem-para">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Impedit, voluptatum facilis! Accusantium earum vitae vero in itaque qui, maiores illum facere quia. Officia illum, vero dignissimos, culpa ex fugit laboriosam, dolores impedit necessitatibus vitae quam.
                    </p>
                </div>
            </li>
            <li class="listitem-news">
                <img src="resources/example.jpg" alt="" class="listitem-image">
                <div class="container-listitem-text">
                    <h2 class="listitem-heading">Heading</h2>
                    <p class="listitem-para">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Impedit, voluptatum facilis! Accusantium earum vitae vero in itaque qui, maiores illum facere quia. Officia illum, vero dignissimos, culpa ex fugit laboriosam, dolores impedit necessitatibus vitae quam.
                    </p>
                </div>
            </li>
        </ul>
    </div>
    <?php
        require_once('model/sql_query.php');
    ?>
</body>
</html>