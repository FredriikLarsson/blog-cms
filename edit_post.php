<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/create_blog.css">
    <script src="js/upload.js" defer></script>
    <title>Edit blog post</title>
</head>

<body>
    <main class="container-main">
        <form action="controllers/post_controller.inc.php" id="form" enctype="multipart/form-data" method="POST">
            <div class="container-input">
                <label for="input-textfield-post-title">Titel</label>
                <input type="text" class="input-textfield" name="post-title" id="input-textfield-post-title">
                <label for="input-textfield-post-content">Innehåll</label>
                <textarea name="post-content" id="input-textfield-post-content" cols="30" rows="10" class="input-textfield"></textarea>
                <label for="input-file-image">Ladda upp en bild</label>
                <input type="file" class="input-textfield" name="image" id="input-file-image">
                <p id="message--upload"></p>
                <button name="button-upload" type="button" id="button--upload" class="button">Ladda upp</button>
                <div class="container-buttons">
                    <button name="edit-post" type="submit" id="button-new-post" class="button" value=<?php echo '\'' . $_GET['postId'] . '\'' ?>>Redigera posten</button>
                </div>
            </div>
        </form>
    </main>
</body>

</html>