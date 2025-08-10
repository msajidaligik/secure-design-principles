<?php
session_start();
//No access control!
echo json_encode([
    'message' => 'Admin data accessed (BAD)',
    'sensitive_data' => 'Payroll, Secrets, Internal Logs'
]);
