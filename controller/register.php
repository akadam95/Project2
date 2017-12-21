<?php include '../view/header.php'; ?>
<main>
      <p> SIGN UP </p>    
            <form action="addAccount.php" method="post">
  
  <label> First Name: </label><input type="text" name="First Name" placeholder="Your First Name">
  <br>
  
   <label> Last Name: </label><input type="text" name="Last Name" placeholder="Your Last Name">
  <br>     
  
  <label> Email: </label><input type="email" name="Email" placeholder="Your Email">
  <br>
 
  <label> Phone Number: </label><input type="text" name="number" placeholder="Your Phone Number">
  <br>
   
  <label> Birthday: </label><input type="text" name="Birthday" placeholder="Your Birth Date">
  <br>
   <label> Gender: </label><input type="text" name="Gender" placeholder="Gender">
  <br>
     <label> Password: </label><input type="text" name="Password" placeholder="Password">
  <br>
  </div>
  <br><br>
  <div class= "submit">
  <input type="submit" value="Submit">
  </div>
  </main>
  <?php include '../view/footer.php'; ?>
