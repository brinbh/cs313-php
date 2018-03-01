<?php
// connect to database
require "database.php";

function getUserById(){

}

// add
function addUser($userName, $userPass) {
    $db = get_db();
    $query = 'INSERT INTO portfolio.users (user_name, user_pass)
              VALUES (:user_name, :user_pass)';
    $stmt = $db->prepare($query);
    $stmt->bindValue(':user_name', $userName);
    $stmt->bindValue(':user_pass', $userPass);
    $stmt->execute();
    $stmt->closeCursor();

    return "Thanks for signing up $userName!";

}


// update

?>