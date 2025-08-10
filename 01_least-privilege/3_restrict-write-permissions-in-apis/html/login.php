<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo "Method Not Allowed";
    exit;
}

$userId = isset($_POST['user_id']) ? intval($_POST['user_id']) : null;

if (in_array($userId, [1, 2])) {
    $_SESSION['user_id'] = $userId;
    header("Location: /index.php");
    exit;
}

http_response_code(400);
echo "Invalid login.";
