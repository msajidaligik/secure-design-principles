<?php
$data = json_decode(file_get_contents('../../db/users.json'), true);

$userId = $_GET['user_id'];
$newEmail = $_GET['email'];

if (!isset($data[$userId])) {
    http_response_code(404);
    echo "User not found.";
    exit;
}

//No permission check
$data[$userId]['email'] = $newEmail;

file_put_contents('../../db/users.json', json_encode($data, JSON_PRETTY_PRINT));
echo "User $userId email updated (insecurely).";
