<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/create_blog.css">
    <script src="js/upload.js" defer></script>
    <title>Redigera blogg inlägg</title>
</head>

<body>
    <main>
        <!-- Form to edit a blog post -->
        <form action="controllers/post_controller.inc.php" id="form" enctype="multipart/form-data" method="POST">
            <div class="form__input-container">
                <!-- Input field for post title -->
                <div class="form__input">
                    <label for="input-textfield-post-title" class="form__label">Titel</label>
                    <input type="text" class="form__input--field" name="post-title" id="input-textfield-post-title">
                </div>
                <!-- Input field for post content -->
                <div class="form__input">
                    <label for="input-textfield-post-content">Innehåll</label>
                    <textarea name="post-content" id="input-textfield-post-content" cols="30" rows="10" class="form__input--field"></textarea>
                </div>
                <!-- Input field for image in the post -->
                <div class="form__input">
                    <label for="input-file-image">Ladda upp en bild</label>
                    <input type="file" name="image" id="input-file-image">
                </div>
                <!-- Status message when uploading image -->
                <p id="message--upload"></p>
                <!-- Button for uploading image to server -->
                <button name="button-upload" type="button" id="button--upload" class="form__button">Ladda upp</button>
                <!-- Button for creating a new post -->
                <div class="form__button-container">
                    <button name="edit-post" type="submit" id="button-new-post" class="form__button" value=<?php echo $_GET['postId'] ?>>Redigera posten</button>
                </div>
            </div>
        </form>
    </main>
</body>

</html>