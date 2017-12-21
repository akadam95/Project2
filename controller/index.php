<?php

require('../model/database.php');
require('../model/accountsDB.php');
require('../model/todosDB.php');

session_start();

$email = $_SESSION["email"];
$password = $_SESSION["password"];
 
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_todos';
    }
}
if ($action == 'list_todos') {
    $ownerID = getID($email, $password);
    $fname = getFirstName($email, $password);
    $lname = getLastName($email, $password);
    $todos = getOwnerId($ownerID);
    include('list.php');
    
} else if ($action == 'delete_todo') {
    $id = filter_input(INPUT_POST, 'todo_id', 
            FILTER_VALIDATE_INT);
    if ($id == NULL || $id == FALSE) {
        $error = "Missing or incorrect id.";
        include('../errors/error.php');
    } else { 
        deleteTodo($id);
        header("Location: .?action=list_todos");
    }
} else if ($action == 'todo_form') {
	$id = filter_input(INPUT_POST, 'todo_id', 
            FILTER_VALIDATE_INT);
	$duedate = filter_input(INPUT_POST, 'todo_duedate');
	$message = filter_input(INPUT_POST, 'todo_message');
	include('editTask.php');       
} else if ($action == 'save') {
    $id = filter_input(INPUT_POST, 'id');
	$duedate = filter_input(INPUT_POST, 'duedate');
	$message = filter_input(INPUT_POST, 'message');
    if ($duedate == NULL || $duedate == FALSE ||
        $message == NULL || $message == FALSE) {
        $error = "Invalid data. Check all fields and try again.";
        include('../errors/error.php');
    } else { 
        updateTodo($id, $duedate, $message);
        header("Location: .?action=list_todos");
    }
} else if ($action == 'add_form') {
    include('addTask.php');
} else if ($action == 'add_todo') {
	$ownerID = get_id($email, $password);
    $duedate = filter_input(INPUT_POST, 'duedate');
	$message = filter_input(INPUT_POST, 'message');
	if ($duedate == NULL || $duedate == FALSE ||
		$message == NULL || $message == FALSE) {
        $error = "Invalid data. Check all fields and try again.";
        include('../errors/error.php');
    } else { 
        new_todo($email, $ownerID, $duedate, $message);
        header("Location: .?action=list_todos");
    }
} else ($action == 'complete') {
    $id = filter_input(INPUT_POST, 'todo_id', 
            FILTER_VALIDATE_INT);
    newTask($id);
    header("Location: .?action=list_todos");
}
?>