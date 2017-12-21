<?php
    require('../model/database.php');
    require('../model/accountsDB.php');
 
      
      $email = filter_input(INPUT_POST, 'Email');
      $password= filter_input(INPUT_POST, 'Password');
      $firstname = filter_input(INPUT_POST, 'First Name');
      $lastname= filter_input(INPUT_POST, 'Last Name');
      $phone = filter_input(INPUT_POST, 'number');
      $birthday= filter_input(INPUT_POST, 'Birthday');
      $gender = filter_input(INPUT_POST, 'Gender');
      newAccount($email,$firstname,$lastname,$phone,$birthday,$gender,$password);
      
      include("login.php");
      
    
    ?>