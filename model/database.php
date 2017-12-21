<?php
    $dsn = 'mysql:host=sql2.njit.edu;dbname=ak985';
    $username = 'ak985';
    $password = 'DNEyqDeMx';
    try {
        $db = new PDO($dsn, $username, $password);
        echo ("Connected successfully");
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }
?>