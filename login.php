<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/login.css">
    <title>Logga in/Registrera</title>
</head>

<body>
    <main class="container-main">
        <form action="admin.php" class="form">
            <div class="container-input-textfields">
                <label for="input-textfield-username">Användarnamn</label>
                <input type="text" class="input-textfield" id="input-textfield-username">
                <label for="input-textfield-username">Lösenord</label>
                <input type="text" class="input-textfield" id="input-textfield-username">
                <div class="container-buttons">
                    <button value="login" id="button-login" class="button">Logga in</button>
                    <button value="register" id="button-register" class="button">Registrera dig</button>
                </div>
            </div>
        </form>
    </main>
</body>

</html>