<?php

require_once('../services/login_service.php');

//Inget av fälten med användarnamn eller lösenord är tomma
if (!empty($_POST['username']) && !empty($_POST['password'])) {
    //Logga in användaren
    if (isset($_POST['button-login'])) {
        //Authentisering av användaruppgifter
        /*if (userAuthentication($_POST['username'], $_POST['password'])) {
            //Logga in användare
            header("Location: http://www.student.ltu.se/~frelab-8/LoginPHP/index.php");
        } else {
            header("Location: http://www.student.ltu.se/~frelab-8/LoginPHP/login.php?invalidCredentials=true");
        }*/
    //Skapa en ny användare
    } elseif (isset($_POST['button-register'])) {
        //Kontroll ifall användare är skapad eller inte
        $isCreated = createUser($_POST['username'], $_POST['password']);
        if ($isCreated == true) {
            //Logga in användare
            header("Location: http://localhost/Projekt_Blogg/admin.php?blogId=1");
        } else {
            header("Location: http://localhost/Projekt_Blogg/login.php?userIdTaken=true");
        }
    } 
} else {
    //Användarnamn eller lösenord saknas
    header("Location: http://localhost/Projekt_Blogg/login.php?noUserOrPass=true");
}