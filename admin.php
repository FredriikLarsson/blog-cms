<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/admin.css">
    <script src="js/admin.js" defer></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Min blogg</title>
</head>
<body>
    <header class="header">
        <div class="container-header-child">
            <?php
                $headerTitle = 'min blogg';
                $navButton1 = 'inlägg'; 
                $navButton2 = 'bilder'; 
                $navButton3 = ''; 
                require_once('components/header.php'); 
            ?>
        </div>
    </header>
    <main class="main">
        <ul>
            <?php 
                require_once('services/blog_service.php');
                
            ?>
        </ul>
    </main>
</body>
</html>