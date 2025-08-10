<?php
$sensitiveData = [
    'user_id' => 123,
    'username' => 'john_doe',
    'email' => 'john@example.com'
];

// Overly permissive CORS - least privilege violated
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

echo json_encode($sensitiveData);
?>
