<?php
session_start();
$_SESSION['user'] = ['username' => 'alice', 'role' => 'user']; // Simulated login

echo json_encode([
    'message' => 'User data accessed (BAD)',
    'user' => $_SESSION['user']
]);
