<?php
$sensitiveData = [
    'user_id' => 123,
    'username' => 'john_doe',
    'email' => 'john@example.com'
];

// List of allowed origins
$allowed_origins = [
    'http://localhost:80',
    'http://10.1.134.219',
];

// Check if Origin header is present and allowed
if (isset($_SERVER['HTTP_ORIGIN']) && in_array($_SERVER['HTTP_ORIGIN'], $allowed_origins)) {
    // Echo back the exact Origin allowed
    header("Access-Control-Allow-Origin: " . $_SERVER['HTTP_ORIGIN']);
    header("Access-Control-Allow-Credentials: true");
} else {
    // Origin not allowed — you can reject or just omit CORS headers
    http_response_code(403);
    echo json_encode(['error' => 'CORS origin not allowed']);
    exit;
}

header("Content-Type: application/json");
echo json_encode($sensitiveData);
?>
