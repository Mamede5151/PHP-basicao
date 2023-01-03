<?php

// Connect to the database
$host = "localhost";
$user = "username";
$password = "password";
$dbname = "database_name";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// Create a new record
$sql = "INSERT INTO table_name (column1, column2, column3)
VALUES (:value1, :value2, :value3)";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':value1', $value1);
$stmt->bindParam(':value2', $value2);
$stmt->bindParam(':value3', $value3);

$value1 = "John";
$value2 = "Doe";
$value3 = "john@example.com";
$stmt->execute();

// Read records
$sql = "SELECT * FROM table_name";
$stmt = $conn->prepare($sql);
$stmt->execute();

$result = $stmt->fetchAll();

foreach($result as $row) {
    echo $row['column1'] . " " . $row['column2'] . "<br>";
}

// Update a record
$sql = "UPDATE table_name SET column2 = :value2 WHERE column1 = :value1";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':value1', $value1);
$stmt->bindParam(':value2', $value2);

$value1 = "John";
$value2 = "Smith";
$stmt->execute();

// Delete a record
$sql = "DELETE FROM table_name WHERE column1 = :value1";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':value1', $value1);

$value1 = "John";
$stmt->execute();

?>
