<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/login.css">
    <script src="js/login.js" defer></script>
    <title>Logga in/Registrera</title>
</head>

<body>
    <main class="container-main">
        <form action="controllers/login_controller.inc.php" class="form" method="POST">
            <div class="container-input-textfields">
                <label for="input-textfield-username">Användarnamn</label>
                <input type="text" class="input-textfield" name="username">
                <label for="input-textfield-username">Lösenord</label>
                <input type="password" class="input-textfield" name="password" minlength="6">
                <div class="container-buttons">
                    <button name="button-login" id="button-login" class="button">Logga in</button>
                    <button name="button-register" id="button-register" class="button">Registrera dig</button>
                </div>
            </div>
        </form>
    </main>
</body>

</html>