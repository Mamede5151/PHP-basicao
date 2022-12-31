<form action="" method="post">
    <input type="text" name="num1" placeholder="Enter a number">
    <input type="text" name="num2" placeholder="Enter another number">
    <select name="operator">
        <option>None</option>
        <option>Add</option>
        <option>Subtract</option>
        <option>Multiply</option>
        <option>Divide</option>
    </select>
    <br>
    <button type="submit" name="submit" value="submit">Calculate</button>
</form>

<?php
if (isset($_POST['submit'])) {
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $operator = $_POST['operator'];
    
    switch ($operator) {
        case "None":
		
            echo "You need to select an operator!";
            break;
        case "Add":
            echo $num1 + $num2;
            break;
        case "Subtract":
            echo $num1 - $num2;
            break;
        case "Multiply":
            echo $num1 * $num2;
            break;
        case "Divide":
            echo $num1 / $num2;
            break;
    }
}
?>
