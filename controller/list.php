<?php include '../view/header.php'; ?>
<main>
    <h2><?php echo "$fname $lname's To-Do List"; ?></h2>

    <section>
        <!-- display a table of incomplete todos -->
        <h2>Incomplete To-Do Items</h2>
        <a href="?action=add_form">New</a>
        <table>
            <tr>
                <th>Created</th>
                <th>Due Date</th>
                <th>Message</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($todos as $todo) :
            
              $duedate = $todo['duedate'];
              $message = $todo['message'];
              $id = $todo['id'];
            	if ($todo['isdone'] == 1) {
            		continue;
            	}
            	else { ?>
		            <tr>
		                <td><?php echo $todo['createddate']; ?></td>
		                <td><?php echo $todo['duedate']; ?></td>
		                <td><?php echo $todo['message']; ?></td>
		                <td><form action="." method="post">
		                    <input type="hidden" name="action"
		                           value="todo_form">
		                    <input type="hidden" name="todo_id"
		                           value="<?php echo $id; ?>">
                            <input type="hidden" name="todo_duedate"
                                   value="<?php echo $duedate; ?>">
                            <input type="hidden" name="todo_message"
                                   value="<?php echo $message; ?>">
		                    <input type="submit" value="Edit">
		                </form></td>
		                <td><form action="." method="post">
		                    <input type="hidden" name="action"
		                           value="delete_todo">
		                    <input type="hidden" name="todo_id"
		                           value="<?php echo $id; ?>">
		                    <input type="hidden" name="todo_duedate"
		                           value="<?php echo $duedate; ?>">
		                    <input type="hidden" name="todo_message"
		                           value="<?php echo $message; ?>">
		                    <input type="submit" value="Delete">
		                </form></td>
		                <td><form action="." method="post">
		                    <input type="hidden" name="action"
		                           value="complete">
		                    <input type="hidden" name="todo_id"
		                           value="<?php echo $id; ?>">
		                    <input type="submit" value="Complete">
		                </form></td>
		            </tr>
		    <?php }
            endforeach; ?>
        </table>     
    </section>
    <section>
        <!-- display a table of complete todos -->
        <h2>Completed To-Do Items</h2>
        <table>
            <tr>
                <th>Created</th>
                <th>Due Date</th>
                <th>Message</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($todos as $todo):
            	if ($todo['isdone'] == 0) {
            		continue;
            	}
            	else { ?>
		            <tr>
		                <td class="dates"><?php echo $todo['createddate']; ?></td>
		                <td class="dates"><?php echo $todo['duedate']; ?></td>
		                <td class="message"><?php echo $todo['message']; ?></td>
		            </tr>
		    <?php }
            endforeach; ?>
        </table>     
    </section>
</main>
<?php include '../view/footer.php'; ?>