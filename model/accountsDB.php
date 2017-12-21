<?php 
function newAccount($email, $fname, $lname, $phone, $birthday, $gender, $password) {
    global $db;
    $query = 'INSERT INTO accounts (email, fname, lname, phone, birthday, gender, password) VALUES (:email, :firstname, :lastname, :phone, :birthday, :gender, :password)';
    $statement = $db->prepare($query);
    $statement->bindValue(":email", $email);
    $statement->bindValue(":firstname", $fname);
    $statement->bindValue(":lastname", $lname);
    $statement->bindValue(":phone", $phone);
    $statement->bindValue(":birthday", $birthday);
    $statement->bindValue(":gender", $gender);
    $statement->bindValue(":password", $password);
    $statement->execute();
    $statement->closeCursor();
}

function getID($email, $password) {
    global $db;
    $query = 'SELECT * FROM accounts
              WHERE email = :email AND password = :password';
    $statement = $db->prepare($query);
    $statement->bindValue(":email", $email);
    $statement->bindValue(":password", $password);
    $statement->execute();
    $table = $statement->fetch();
    $statement->closeCursor();
    $id = $table['id'];
    return $id;
}

?