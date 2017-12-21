<?php include '../view/header.php'; ?>
<main>
    
    <h2>Edit</h2>
    <form action="index.php" method="post">
        <input type="hidden" name="action" value="save">
        
            <label>Due Date:</label>
            <input type="text" name="duedate"  autocomplete=off>
        
        
            <label>Message:</label>
            <input form="edit_form" name="message" autocomplete=off>
    
        <input type="submit" value="Save">
    </form>
 
</main>
<?php include '../view/footer.php'; ?>