<?php include '../view/header.php'; ?>
<main>
        
        <form action = "index.php" method = "post">
  
        Email Address&nbsp<input type=text autocomplete=off placeholder = "Email Address" name="email" required><br>

        Password&nbsp<input type=text autocomplete=off placeholder = "Password" name="password" required><br>
        
        <input type = "submit">

        </form>
</main>
<?php include '../view/footer.php'; ?>