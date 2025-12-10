<?php
session_start();
header('Content-Type: application/json');

// Check if user is logged in
$isLoggedIn = isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;

echo json_encode([
    'isLoggedIn' => $isLoggedIn,
    'userId' => isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null
]);
?>