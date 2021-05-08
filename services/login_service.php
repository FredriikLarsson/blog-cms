<?php

session_start();

require_once('../model/sql_query.php');
require_once('../model/db.php');


/* 
Skapa en ny användare ifall användarnamnet inte finns i databasen.
@param $name = användarnamnet, $password = lösenordet.
@return true ifall användaren har skapats, @return false ifall användaren inte kunde skapas.
*/
function createUser($name, $password) {
    $db = db_connect();
    $query = getAllUsers();
    $existingUsers = db_select($db, $query);
    foreach ($existingUsers as $value) {
        if ($value['username'] == $name) {
            //användaren finns redan
            return false;
        }
    }
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $queryAddUser = addUser($name, $hashedPassword);
    db_query($db, $queryAddUser);
    //Skapa en ny session med den nya användaren
    $_SESSION['userId'] = $name;
    return true; 
}

/* 
Kontrollerar ifall användarnamnet finns i systemetsfil och om det matchar med lösenordet.
@param $name = användarnamnet, $password = lösenordet.
@return sant ifall användarnamnet finns i filen och lösenordet matchar annars returneras falskt.
*/
function userAuthentication($name, $password) {
    $file = fopen(__DIR__."/../files/file.txt", "r");
    //Ifall filen kan öppnas på servern
    if($file) {
        //Loopa tills nästa rad i filen är tom och returnerar "false"
        while (($line = fgets($file)) !== false) {
            //Splitta upp användarnamn och lösenord i två olika strängar
            $lineWords = explode(" ", $line, 2);
            $userPass = str_replace("\n", "", $lineWords[1]); 
            //Ifall den aktuella radens användarnamn matchar med användarnamnet som kommit från formuläret
            if(strtolower($lineWords[0]) == strtolower($name)) {
                //Ifall den aktuella radens lösenord matchar med lösenordet som kommit från formuläret.
                if (password_verify($password, $userPass)) {
                    //Starta en ny session för webbläsaren
                    $_SESSION['userId'] = $name;
                    fclose($file);
                    return true;
                } else {
                    //Lösenorden matchar inte
                    fclose($file);
                    return false;
                }
            }
        }
        //Användarnamnet finns inte i systemfilen
        fclose($file);
        return false;
    } else {
        //Systemfilen kunde inte öppnas
        fclose($file);
        header("Location: http://www.student.ltu.se/~frelab-8/LoginPHP/login.php?unvalidSystemFile=true");
        exit();
    }
}

/* 
Kontrollerar sessionen i webbläsaren mot serverns fil med användare
$param username är användarnamnet i sessionen
$return sant eller falskt ifall användarnamnet i sessionen finns i filen
*/
function checkSession($username) {
    $file = fopen(__DIR__."/../files/file.txt", "r");
    //Ifall filen gick att öppna
    if($file) {
        //Loopa tills nästa rad i filen är tom och returnerar "false"
        while (($line = fgets($file)) !== false) {
            //Splitta upp användarnamn och lösenord i två olika strängar
            $lineWords = explode(" ", $line, 2);
            //Ifall den aktuella radens användarnamn matchar med användarnamnet som kommit från formuläret
            if(strtolower($lineWords[0]) == strtolower($username)) {
                fclose($file);
                return true;
            }
        }
        //Användarnamnet i sessionen finns inte
        fclose($file);
        return false;
    } else {
        //Systemfilen kunde inte öppnas
        fclose($file);
        return false;
    }
}

/* 
Skriver ut meddelande till inloggad användare
$param username är användarnamnet
$return en paragraf med ett meddelande till användaren.
*/
function userMessage($username) {
    echo '<p>Hej, ' . $username . ' du är nu inloggad</p>';
}