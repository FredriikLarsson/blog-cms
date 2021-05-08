<?php

require_once('../services/login_service.php');

//Ifall användaren klickat på knappen "logga ut"
if (isset($_GET['logout'])) {
    //Logga ut med webbläsaren från "min administrationssida"
    unset($_SESSION['userId']);
    header("Location: http://localhost/Projekt_Blogg");
} else {
    //Ifall en session redan existerar i webbläsaren
    if (isset($_SESSION['userId'])) {
        //Ifall sessionens användarnamn existerar på servern
        if (checkSession($_SESSION['userId'])) {
            header('Location: http://localhost/Projekt_Blogg/admin.php');
        } else {
            //Sessionen är inte giltig
            header('Location: http://localhost/login.php?sessionNotValid=true');
        }
    } else {
        //Ingen existerande session finns
        header('Location: http://localhost/login.php?noSessionActive=true');
    }
}
