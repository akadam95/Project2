<?php
    $dsn = 'mysql:host=sql2.njit.edu;dbname=ak985';
    $username = 'ak985';
    $password = 'XwA5ITTI';
    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }
?>