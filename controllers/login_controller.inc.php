<?php

require_once('../services/login_service.php');

//Both username and password input textfields are not empty
if (!empty($_POST['username']) && !empty($_POST['password'])) {
    //If user want to log in
    if (isset($_POST['button-login'])) {
        //Check if username and password is valid
        if (userAuthentication($_POST['username'], $_POST['password'])) {
            //Login user
            header("Location: http://localhost/Projekt_Blogg/controllers/admin_controller.inc.php");
        } else {
            //User credentials is not valid
            header("Location: http://localhost/Projekt_Blogg/login.php?invalidCredentials=true");
        }
    //Register a new user
    } elseif (isset($_POST['button-register'])) {
        //Create a new user
        $isCreated = createUser($_POST['username'], $_POST['password']);
        //Check if user could be created without problem
        if ($isCreated == true) {
            //Login user
            header("Location: http://localhost/Projekt_Blogg/controllers/admin_controller.inc.php");
            //If user could not be created
        } else {
            //Send user back to login page
            header("Location: http://localhost/Projekt_Blogg/login.php?userIdTaken=true");
        }
    }
} else {
    //Username or password is missing
    header("Location: http://localhost/Projekt_Blogg/login.php?noUserOrPass=true");
}
