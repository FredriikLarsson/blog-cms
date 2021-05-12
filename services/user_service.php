<?php

require_once(__DIR__ . '/../model/db.php');
require_once(__DIR__ . '/../model/sql_query.php');

$db = db_connect();

/* get user_id of user
@param username = username of the user
@return the user_id of the user*/
function getUserId($username)
{
    global $db;
    $query = getUser($username); //Query for getting information about a user
    $user = db_select($db, $query); //Array with a single user (1 row)
    //username should only exist once in the database
    if (!count($user) === 1) {
        //Multiple of the same username exist in the database
        if (count($user) > 1) {
            return 'usernameNotUnique';
            //The username doesnt exist in the database
        } else {
            return 'usernameDontExist';
        }
    } else {
        return $user[0]['id'];
    }
}
