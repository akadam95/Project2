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