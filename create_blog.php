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
                <label for="input-textfield-blog-title">Blogg titel</label>
                <input type="text" class="input-textfield" name="blog-title" id="input-textfield-blog-title">
                <label for="input-textfield-blog-presentation">Beskriv din blogg</label>
                <textarea name="blog-description" id="input-textfield-blog-presentation" cols="30" rows="10" class="input-textfield"></textarea>
                <label for="input-file-image">Ladda upp en bild</label>
                <input type="file" class="input-textfield" name="blog-image" id="input-file-image">
                <p id="upload-message"></p>
                <button name="button-upload" type="button" id="button-upload" class="button">Ladda upp</button>
                <div class="container-buttons">
                    <button name="button-new-blog" type="submit" id="button-new-blog" class="button">Skapa ny blogg</button>
                </div>
            </div>
        </form>
    </main>
</body>

</html>