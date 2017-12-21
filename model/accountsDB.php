<?php 
function getOwnerID($ownerID) {
    global $db;
    $query = 'SELECT * FROM todos
              WHERE ownerid = :ownerID
              ORDER BY createddate DESC';
    $statement = $db->prepare($query);
    $statement->bindValue(":ownerOD", $ownerID);
    $statement->execute();
    $table = $statement->fetchAll();
    $statement->closeCursor();
    return $table;
}
?