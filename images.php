<?php
session_start();
require_once('services/blog_service.php');
//Control if client is logged in (has a started session)
if (!isset($_SESSION['userId'])) {
    //If client is not logged in then redirect to login page 
    header('Location: http://localhost/Projekt_Blogg/login.php');
} else if (getUserBlog($_SESSION['userId']) === false) {
    //If logged in user doesnt have a blog created
    header('Location: http://localhost/Projekt_Blogg/create_blog.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/image.css">
    <script type="module" src="js/images.js" defer></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Mina bilder</title>
</head>

<body>
    <header>
        <?php
        /* Here is the page specific content that goes in to the header component */
        $headerTitle = 'min blogg';
        $navButton1 = '';
        $navButton2 = '';
        $navButton3 = '';
        /* Header component */
        require_once('components/header.php');
        ?>
    </header>
    <main class="main">
        <div class="button-container--show-form">
            <button type="button" id="button_form" class="button--show-form">Ladda upp bild</button>
        </div>
        <div class="form-container" id="myForm">
            <form class="form" id="form" method="POST" enctype="multipart/form-data">
                <label for="input-file-image"><b>Ladda upp en bild</b></label>
                <input type="file" name="image" id="input-file-image" required>
                <label for="alt_text"><b>Beskrivande text</b></label>
                <input type="text" placeholder="Alt text" class="form__input" name="alt_text" id="alt_text" required>
                <button type="submit" name="button_submit" class="form__button" id="button_upload">Ladda upp</button>
                <button type="button" class="form__button" id="button_cancel">Close</button>
            </form>
        </div>
        <ul class="list">
            <?php
            require_once('services/image_service.php');
            $blog = getUserBlog($_SESSION['userId']); //Get the blog from which the list of images is presented from
            $blogId = $blog['id']; //Get the id of the blog in the database
            viewAllImages($blogId); //Generate all li items for every image on the blog
            ?>
        </ul>
    </main>
</body>

</html>