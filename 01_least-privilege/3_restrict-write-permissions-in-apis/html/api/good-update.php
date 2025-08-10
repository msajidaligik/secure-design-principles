<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo "Method Not Allowed";
    exit;
}

if (!isset($_SESSION['user_id'])) {
    http_response_code(403);
    echo "You must log in first.";
    exit;
}

$currentUserId = $_SESSION['user_id'];
$newEmail = $_POST['email'] ?? null;

if (!$newEmail) {
    http_response_code(400);
    echo "Email is required.";
    exit;
}

$filePath = '../../db/users.json';
$data = json_decode(file_get_contents($filePath), true);

if (!isset($data[$currentUserId])) {
    http_response_code(404);
    echo "User not found.";
    exit;
}

$data[$currentUserId]['email'] = $newEmail;
file_put_contents($filePath, json_encode($data, JSON_PRETTY_PRINT));

echo "[Good] Email updated for user {$currentUserId}.";
