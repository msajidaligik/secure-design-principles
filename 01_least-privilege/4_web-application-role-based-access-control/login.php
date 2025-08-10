<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $role = $_POST['role'] ?? 'user'; // default to user

    // In a real app, validate this against a DB
    $_SESSION['user'] = ['username' => $username, 'role' => $role];
    header('Location: index.php');
    exit;
}
