<?php 
function getOwnerID($ownerID) {
    global $db;
    $query = 'SELECT * FROM todos
              WHERE ownerid = :ownerid
              ORDER BY createddate DESC';
    $statement = $db->prepare($query);
    $statement->bindValue(":ownerid", $ownerID);
    $statement->execute();
    $iDS = $statement->fetchAll();
    $statement->closeCursor();
    return $iDS;
}

function deleteTodo($id) {
    global $db;
    $query = 'DELETE FROM todos
              WHERE id = :id';
    $statement = $db->prepare($query);
    $statement->bindValue(":id", $id);
    $statement->execute();
    $statement->closeCursor();
}

function updateTodo($id, $duedate, $message) {
    global $db;
    date_default_timezone_set("America/New_York");
    $datetime = date("Y-m-d H:i:sa");
    $query = 'UPDATE todos SET createddate = :createddate, duedate = :duedate, message = :message WHERE id = :id';
    $statement = $db->prepare($query);
    $statement->bindValue(":createddate", $datetime);
    $statement->bindValue(":duedate", $duedate);
    $statement->bindValue(":message", $message);
    $statement->bindValue(":id", $id);
    $statement->execute();
    $statement->closeCursor();
}

function newTask($email, $ownerID, $duedate, $message) {
    global $db;
    date_default_timezone_set("America/New_York");
    $datetime = date("Y-m-d H:i:sa");
    $query = 'INSERT INTO todos (owneremail, ownerid, createddate, duedate, message, isdone) VALUES (:email, :ownerid, :createddate, :duedate, :message, :isdone)';
    $statement = $db->prepare($query);
    $statement->bindValue(":email", $email);
    $statement->bindValue(":ownerid", $ownerID);
    $statement->bindValue(":createddate", $datetime);
    $statement->bindValue(":duedate", $duedate);
    $statement->bindValue(":message", $message);
    $statement->bindValue(":isdone", 0);
    $statement->execute();
    $statement->closeCursor();
}

function taskCompleted($id) {
    global $db;
    $query = 'UPDATE todos SET isdone = :isdone WHERE id = :id';
    $statement = $db->prepare($query);
    $statement->bindValue(":isdone", 1);
    $statement->bindValue(":id", $id);
    $statement->execute();
    $statement->closeCursor();
}
