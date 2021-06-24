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
    <main>
        <!-- Form to login or register a new user on the cms system -->
        <form action="controllers/login_controller.inc.php" class="form" method="POST">
            <div class="form__input-container">
                <!-- Inputfield for username -->
                <label for="input-textfield-username">Användarnamn</label>
                <input type="text" class="form__input" name="username" id="input-textfield-username" required>
                <!-- Inputfield for password -->
                <label for="input-textfield-password">Lösenord</label>
                <input type="password" class="form__input" name="password" id="input-textfield-password" minlength="6" required>
                <!-- Msg to user if something went wrong with login or register -->
                <p id="error-msg"></p>
                <!-- Buttons to either login or register a new user -->
                <div class="form__button-container">
                    <button name="button-login" id="button-login" class="form__button">Logga in</button>
                    <button name="button-register" id="button-register" class="form__button">Registrera dig</button>
                </div>
            </div>
        </form>
    </main>
</body>

</html>