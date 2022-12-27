<?php

// Check if the form has been submitted
if (isset($_POST['submit'])) {
  // Add the new todo item to the list
  $todo_list[] = $_POST['todo'];
}

// Check if the "Clear Completed" button has been clicked
if (isset($_POST['clear'])) {
  // Remove completed items from the list
  $todo_list = array_filter($todo_list, function($item) {
    return !$item['done'];
  });
}

?>

<!-- HTML for the todo list form -->
<form method="post">
  <label for="todo">Add a new todo:</label>
  <input type="text" name="todo" id="todo">
  <input type="submit" name="submit" value="Add">
</form>

<!-- HTML for the todo list -->
<ul>
  <?php foreach ($todo_list as $item): ?>
    <li>
      <input type="checkbox" name="done" value="1" <?php echo $item['done'] ? 'checked' : ''; ?>>
      <?php echo $htmlentities($item['text']); ?>
    </li>
  <?php endforeach; ?>
</ul>

<!-- HTML for the "Clear Completed" button -->
<form method="post">
  <input type="submit" name="clear" value="Clear Completed">
</form>
