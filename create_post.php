<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/create_blog.css">
    <script src="js/upload.js" defer></script>
    <title>Create a new blog</title>
</head>

<body>
    <main class="container-main">
        <form action="controllers/create_post_controller.inc.php" id="form" enctype="multipart/form-data" method="POST">
            <div class="container-input">
                <div class="form__input-container">
                    <label for="input-textfield-post-title" class="form__label">Titel</label>
                    <input type="text" class="form__input" name="post-title" id="input-textfield-post-title">
                </div>
                <div class="form__input-container">
                    <label for="input-textfield-post-content">Innehåll</label>
                    <textarea name="post-content" id="input-textfield-post-content" cols="30" rows="10" class="form__input"></textarea>
                </div>
                <div class="form__input-container">
                    <label for="input-file-image">Ladda upp en bild</label>
                    <input type="file" name="image" id="input-file-image">
                </div>
                <p id="message--upload"></p>
                <button name="button-upload" type="button" id="button--upload" class="form__button">Ladda upp</button>
                <div class="container-buttons">
                    <button name="button-new-post" type="submit" id="button-new-post" class="form__button">Skapa en ny post</button>
                </div>
            </div>
        </form>
    </main>
</body>

</html>