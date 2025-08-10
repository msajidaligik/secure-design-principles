<?php
session_start();

function require_login() {
    if (!isset($_SESSION['user'])) {
        http_response_code(401);
        echo json_encode(['error' => 'Unauthorized']);
        exit;
    }
}

function require_role($roles) {
    require_login();
    $user = $_SESSION['user'];
    if (!in_array($user['role'], (array)$roles)) {
        http_response_code(403);
        echo json_encode(['error' => 'Forbidden - insufficient permissions']);
        exit;
    }
}
