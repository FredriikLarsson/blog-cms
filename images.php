<?php
session_start();
require_once('services/blog_service.php');
//Check if client is logged in (has a started session)
if (!isset($_SESSION['userId'])) {
    //If client is not logged in then redirect to login page 
    header('Location: http://www.student.ltu.se/~frelab-8/Projekt_Blogg/login.php');
} else if (getUserBlog($_SESSION['userId']) === false) {
    //If logged in user doesnt have a blog created
    header('Location: http://www.student.ltu.se/~frelab-8/Projekt_Blogg/create_blog.php');
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
        $navButton1 = '';
        $navButton2 = '';
        $navButton3 = '';
        /* Header component */
        require_once('components/header.php');
        ?>
    </header>
    <main>
        <!-- Button to open form for uploading a new image -->
        <div class="button-container--upload">
            <button type="button" id="button_form" class="button--upload">Ladda upp bild</button>
        </div>
        <!-- Form for uploading a new image -->
        <div class="form-container" id="myForm">
            <form class="form" id="form" method="POST" enctype="multipart/form-data">
                <!-- Input for image file to upload -->
                <label for="input-file-image"><b>Ladda upp en bild</b></label>
                <input type="file" name="image" id="input-file-image" required>
                <!-- Input for alt-text to uploaded image -->
                <label for="alt_text"><b>Beskrivande text</b></label>
                <input type="text" placeholder="Alt text" class="form__input" name="alt_text" id="alt_text" required>
                <!-- Button to upload image -->
                <button type="submit" name="button_submit" class="form__button" id="button_upload">Ladda upp</button>
                <!-- Button to cancel the current image upload -->
                <button type="button" class="form__button" id="button_cancel">Close</button>
            </form>
        </div>
        <!-- List of images -->
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