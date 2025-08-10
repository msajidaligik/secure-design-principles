<?php
require 'auth.php';
require_role(['user', 'admin']);

echo json_encode([
    'message' => 'User data accessed (GOOD)',
    'user' => $_SESSION['user']
]);
