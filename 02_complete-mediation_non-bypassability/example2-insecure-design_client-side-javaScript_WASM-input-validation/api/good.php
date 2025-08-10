<?php
$amount = $_POST['amount'] ?? 0;

if (!is_numeric($amount) || $amount <= 0 || $amount > 1000) {
    die("Invalid transaction: must be a number between 1 and 1000");
}

echo "Transferred Rs. $amount successfully (Validated on server)";
?>
