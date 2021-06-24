<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/create_blog.css">
    <script src="js/upload.js" defer></script>
    <title>Skapa en ny blogg</title>
</head>

<body>
    <main>
        <!-- Form to create a new blog -->
        <form action="controllers/create_blog_controller.inc.php" id="form" enctype="multipart/form-data" method="POST">
            <div class="form__input-container">
                <!-- Input field for blog title -->
                <div class="form__input">
                    <label for="input-textfield-blog-title" class="form__label">Blogg titel</label>
                    <input type="text" class="form__input--field" name="blog-title" id="input-textfield-blog-title">
                </div>
                <!-- Input field for blog description -->
                <div class="form__input">
                    <label for="input-textfield-blog-presentation" class="form__label">Beskriv din blogg</label>
                    <textarea name="blog-description" id="input-textfield-blog-presentation" cols="30" rows="10" class="form__input--field"></textarea>
                </div>
                <!-- Input field for blog image -->
                <div class="form__input">
                    <label for="input-file-image" class="form__label">Ladda upp en bild</label>
                    <input type="file" name="blog-image" id="input-file-image">
                </div>
                <!-- Status message when uploading image -->
                <p id="message--upload"></p>
                <!-- Button for uploading image to server -->
                <button name="button-upload" type="button" id="button--upload" class="form__button">Ladda upp</button>
                <!-- Button for creating a new blog -->
                <div class="form__button-container">
                    <button name="button-new-blog" type="submit" id="button-new-blog" class="form__button">Skapa ny blogg</button>
                </div>
            </div>
        </form>
    </main>
</body>

</html>