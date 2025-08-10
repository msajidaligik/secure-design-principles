<?php
// Simple mysqli connector using env vars
$DB_HOST = getenv('DB_HOST') ?: 'db';
$DB_USER = getenv('DB_USER') ?: 'app_user';
$DB_PASS = getenv('DB_PASS') ?: 'app_user';
$DB_NAME = getenv('DB_NAME') ?: 'bank';

function get_db() {
    global $DB_HOST, $DB_USER, $DB_PASS, $DB_NAME;
    $mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
    if ($mysqli->connect_errno) {
        http_response_code(500);
        header('Content-Type: application/json');
        echo json_encode(['error' => 'db_connect', 'msg' => $mysqli->connect_error]);
        exit;
    }
    return $mysqli;
}
?>
