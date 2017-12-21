<?php include '../view/header.php'; ?>
<main>
    
    <h2>Add </h2>
    <form action="index.php" method="post">
        <input type="hidden" name="action" value="add_todo">
        
            Due Date&nbsp<input type="text" name="duedate" autocomplete=off>
        
        
            Message<input type = "text" name="message" autocomplete=off>
        
        <input type="submit" value="Save" class="button">
        
    </form>
  
</main>
<?php include '../view/footer.php'; ?>