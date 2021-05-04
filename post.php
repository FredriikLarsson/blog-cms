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
        <?php
            require_once('components/header.php');
        ?>
        <div class="container-image">
            <p class="text-post">
                Författare: Fredrik Larsson <br>
                Datum: 26/4-21
            </p>
            <img src="resources/example.jpg" alt="" class="image-post">
        </div>
        <div class="container-content">
            <div class="container-content-title">
                <h1>Rubrik till posten</h1>
            </div>
            <div class="container-content-text">
                <p class="content-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Labore vero perferendis sed incidunt explicabo impedit doloremque in provident qui, quidem beatae quod, officiis libero ut est quaerat. Excepturi, neque fugit.</p>
            </div>
        </div>
    </div>
</body>
</html>