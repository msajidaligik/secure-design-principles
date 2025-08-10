<?php
$amount = $_POST['amount'] ?? 0;
// No validation! Trusts input from browser
echo "Transferred Rs. $amount successfully (No server-side validation!)";
?>
