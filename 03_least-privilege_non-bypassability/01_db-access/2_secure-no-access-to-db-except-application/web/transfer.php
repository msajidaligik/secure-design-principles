<?php
require 'db.php';

$from = $_POST['from'] ?? '';
$to = $_POST['to'] ?? '';
$amount = floatval($_POST['amount'] ?? 0);

if (empty($from) || empty($to) || $amount <= 0) {
    die("Invalid input.");
}

$conn = get_db();

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Start transaction
$conn->begin_transaction();

try {
    // Check balance
    $stmt = $conn->prepare("SELECT balance FROM accounts WHERE name = ?");
    $stmt->bind_param("s", $from);
    $stmt->execute();
    $result = $stmt->get_result();

    if (!($row = $result->fetch_assoc())) {
        throw new Exception("Sender not found.");
    }
    if ($row['balance'] < $amount) {
        throw new Exception("Insufficient funds.");
    }

    // Deduct from sender
    $stmt = $conn->prepare("UPDATE accounts SET balance = balance - ? WHERE name = ?");
    $stmt->bind_param("ds", $amount, $from);
    $stmt->execute();

    // Add to receiver
    $stmt = $conn->prepare("UPDATE accounts SET balance = balance + ? WHERE name = ?");
    $stmt->bind_param("ds", $amount, $to);
    $stmt->execute();

    $conn->commit();
    echo "Transfer successful.";
} catch (Exception $e) {
    $conn->rollback();
    echo "Error: " . $e->getMessage();
}

$conn->close();
?>
