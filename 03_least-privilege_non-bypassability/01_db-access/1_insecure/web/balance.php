<?php
require 'db.php';

$name = $_GET['name'] ?? '';

if (empty($name)) {
    die("Error: Name is required.");
}
$conn = get_db();
//$conn = new mysqli('db', 'bank_user', 'bankpass', 'bankdb');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$stmt = $conn->prepare("SELECT balance FROM accounts WHERE name = ?");
$stmt->bind_param("s", $name);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    echo "<h1>Balance for {$name}: {$row['balance']}</h1>";
} else {
    echo "Account not found.";
}

$stmt->close();
$conn->close();
?>
