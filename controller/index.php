<?php

require('../model/database.php');
require('../model/accountsDB.php');
require('../model/todosDB.php');

session_start();

 $email = filter_input(INPUT_POST, 'email');
      $password= filter_input(INPUT_POST, 'password');  
      $_SESSION['email'] = $email;
      $_SESSION['password'] = $password;

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_todos';
    }
}
if ($action == 'list_todos') {
    $ownerID = getID($_SESSION['email'], $_SESSION['password']);
    $fname = getFname($_SESSION['email'], $_SESSION['password']);
    $lname = getLname($_SESSION['email'], $_SESSION['password']);
    $todos = getOwnerID($ownerID);
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
	$ownerID = get_id($_SESSION['email'], $_SESSION['password']);
    $duedate = filter_input(INPUT_POST, 'duedate');
	$message = filter_input(INPUT_POST, 'message');
	if ($duedate == NULL || $duedate == FALSE ||
		$message == NULL || $message == FALSE) {
        $error = "Invalid data. Check all fields and try again.";
        include('../errors/error.php');
    } else { 
        new_todo($_SESSION["email"], $ownerID, $duedate, $message);
        header("Location: .?action=list_todos");
    }
} else if($action == 'complete') {
    $id = filter_input(INPUT_POST, 'todo_id', 
            FILTER_VALIDATE_INT);
    taskCompleted($id);
    header("Location: .?action=list_todos");
}
?>