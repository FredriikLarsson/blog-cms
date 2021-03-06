<?php

require_once('../services/login_service.php');

//Check if username or password input-textfields are empty
if (empty($_POST['username']) || empty($_POST['password'])) {
    //Username or password is missing
    header("Location: http://localhost/Projekt_Blogg/login.php?noUserOrPass=true");
    exit();
}

//Check if user want to log in
if (isset($_POST['button-login'])) {
    //Check if username and password is valid
    if (userAuthentication($_POST['username'], $_POST['password'])) {
        //Login user
        header("Location: http://localhost/Projekt_Blogg/controllers/admin_controller.inc.php");
        exit();
    } else {
        //User credentials is not valid
        header("Location: http://localhost/Projekt_Blogg/login.php?invalidCredentials=true");
        exit();
    }
} elseif (isset($_POST['button-register'])) {
    //User wants to register a new user  
    //Check if user could be created without problem
    if (createUser($_POST['username'], $_POST['password'])) {
        //Login user
        header("Location: http://localhost/Projekt_Blogg/controllers/admin_controller.inc.php");
        exit();
    } else {
        //Send user back to login page
        header("Location: http://localhost/Projekt_Blogg/login.php?userIdTaken=true");
        exit();
    }
}
