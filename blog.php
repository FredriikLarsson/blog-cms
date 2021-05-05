<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/blog.css">
    <script src="js/blog.js" defer></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Välkommen till ... blogg</title>
</head>
<body>
    <div class="container-main" id="container-main">
        <!-- Content for component header, navmenu and sidebar -->
        <?php
            $headerTitle = 'Blogg titel';
            $menuLink1 = 'Om mig';
            $menuLink2 = 'Hjälp';
            $menuLink3 = 'Kontakta mig';
            $navButton1 = 'Visa alla';
            $navButton2 = 'Design';
            $navButton3 = 'Systemutveckling';
            require_once('components/header.php');
        ?>
        <ul class="list-news">
            <?php
                require_once('model/blogs_service.php');
                viewBlogPosts($_GET['blogId']);
            ?>
        </ul>
    </div>
</body>
</html>