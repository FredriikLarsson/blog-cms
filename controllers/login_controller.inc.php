<?php

require_once('../services/login_service.php');

//Check if username or password input-textfields are empty
if (empty($_POST['username']) || empty($_POST['password'])) {
    //Username or password is missing
    header("Location: http://www.student.ltu.se/~frelab-8/Projekt_Blogg/login.php?noUserOrPass=true");
    exit();
}

//Check if user want to log in
if (isset($_POST['button-login'])) {
    //Check if username and password is valid
    if (userAuthentication($_POST['username'], $_POST['password'])) {
        //Login user
        header("Location: http://www.student.ltu.se/~frelab-8/Projekt_Blogg/controllers/admin_controller.inc.php");
        exit();
    } else {
        //User credentials is not valid
        header("Location: http://www.student.ltu.se/~frelab-8/Projekt_Blogg/login.php?invalidCredentials=true");
        exit();
    }
} elseif (isset($_POST['button-register'])) {
    //User wants to register a new user  
    //check if password including at least 6 characters
    if (strlen($_POST['password']) < 6) {
        //Send user back to login page
        header("Location: http://www.student.ltu.se/~frelab-8/Projekt_Blogg/login.php?unValidPassword=true");
        exit();
    }
    //Check if user could be created without problem
    if (createUser($_POST['username'], $_POST['password'])) {
        //Login user
        header("Location: http://www.student.ltu.se/~frelab-8/Projekt_Blogg/controllers/admin_controller.inc.php");
        exit();
    } else {
        //Send user back to login page
        header("Location: http://www.student.ltu.se/~frelab-8/Projekt_Blogg/login.php?userIdTaken=true");
        exit();
    }
}
