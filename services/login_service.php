<?php

session_start();
require_once('../model/db.php');
require_once('../model/sql_query.php');

$db = db_connect();

/* Create a new user and store it in the database
@param $name = username, $password = password
@return true in case user could be created, false in case the user could not be created */
function createUser($name, $password)
{
    global $db;
    $query = getAllUsers(); //Query for getting all users from the database
    $existingUsers = db_select($db, $query); //Array of all the users in the database
    //check if username ($name) already exists in the database
    foreach ($existingUsers as $value) {
        if ($value['username'] == $name) {
            //username already taken
            return false;
        }
    }
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT); //hashed password to store in database
    $queryAddUser = addUser(db_escape($db, $name), db_escape($db, $hashedPassword)); //Query for adding a new user to the database
    db_query($db, $queryAddUser); //Add the user to the database
    //Create a new session with the newly created user (login user)
    $_SESSION['userId'] = $name;
    return true;
}

/* Check if user-credentials is valid
@param $name = username, $password = password
@return true in case username exist and password is matching, else return false */
function userAuthentication($name, $password)
{
    global $db;
    $query = getAllUsers(); //Query for getting all users from the database
    $existingUsers = db_select($db, $query); //Array of all the users in the database
    //check if username exists and if password is matching
    foreach ($existingUsers as $value) {
        if ($value['username'] == $name) {
            //if input password matching with database password
            if (password_verify($password, $value['password'])) {
                //Create a new session (login user)
                $_SESSION['userId'] = $name;
                return true;
            } else {
                //password is not valid
                return false;
            }
        }
    }
    //username is not existing in the database
    return false;
}

/* 
Kontrollerar sessionen i webbläsaren mot serverns databas med användare
$param username är användarnamnet i sessionen
$return sant eller falskt ifall användarnamnet i sessionen finns i databasen
*/

/* check if current browser session is valid
@param username = username in the current session
@return true if username exists in the database, else return false */
function checkSession($username)
{
    global $db;
    $query = getAllUsers(); //Query for getting all users from the database
    $existingUsers = db_select($db, $query); //Array of all the users in the database
    //check if session username match any username in the current database
    foreach ($existingUsers as $value) {
        if ($value['username'] == $username) {
            return true;
        }
    }
    //session username is not valid (doesnt exist in the database)
    return false;
}
