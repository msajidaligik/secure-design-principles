<?php
require 'auth.php';
require_role('admin');

echo json_encode([
    'message' => 'Admin data accessed (GOOD)',
    'sensitive_data' => 'Payroll, Secrets, Internal Logs'
]);
