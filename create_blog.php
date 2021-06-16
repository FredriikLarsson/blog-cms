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
        <form action="controllers/create_blog_controller.inc.php" id="form" enctype="multipart/form-data" method="POST">
            <div class="container-input">
                <div class="form__input-container">
                    <label for="input-textfield-blog-title" class="form__label">Blogg titel</label>
                    <input type="text" class="form__input" name="blog-title" id="input-textfield-blog-title">
                </div>
                <div class="form__input-container">
                    <label for="input-textfield-blog-presentation" class="form__label">Beskriv din blogg</label>
                    <textarea name="blog-description" id="input-textfield-blog-presentation" cols="30" rows="10" class="form__input"></textarea>
                </div>
                <div class="form__input-container">
                    <label for="input-file-image" class="form__label">Ladda upp en bild</label>
                    <input type="file" name="blog-image" id="input-file-image">
                </div>
                <p id="message--upload"></p>
                <button name="button-upload" type="button" id="button--upload" class="form__button">Ladda upp</button>
                <div class="container-buttons">
                    <button name="button-new-blog" type="submit" id="button-new-blog" class="form__button">Skapa ny blogg</button>
                </div>
            </div>
        </form>
    </main>
</body>

</html>