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
Kontrollerar ifall användarnamnet finns i databasen och om det matchar med lösenordet.
@param $name = användarnamnet, $password = lösenordet.
@return sant ifall användarnamnet finns i databasen och lösenordet matchar annars returneras falskt.
*/
function userAuthentication($name, $password) {
    $db = db_connect();
    $query = getAllUsers();
    $existingUsers = db_select($db, $query);
    foreach ($existingUsers as $value) {
        if ($value['username'] == $name) {
            if (password_verify($password, $value['password'])) {
                //Starta en ny session för webbläsaren
                $_SESSION['userId'] = $name;
                return true;
            } else {
                //Lösenorden matchar inte
                return false;
            }
        }
    }
    //Användarnamnet finns inte i databasen
    return false;      
}

/* 
Kontrollerar sessionen i webbläsaren mot serverns databas med användare
$param username är användarnamnet i sessionen
$return sant eller falskt ifall användarnamnet i sessionen finns i databasen
*/
function checkSession($username) {
    $db = db_connect();
    $query = getAllUsers();
    $existingUsers = db_select($db, $query);
    foreach ($existingUsers as $value) {
        if ($value['username'] == $username) {
            return true;
        }
    }
    //Användarnamnet i sessionen finns inte
    return false;   
}