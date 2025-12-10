<?php
// Database credentials
$host = "localhost";
$user = "root";          // change if needed
$pass = "";              // change if needed
$db   = "my_resume_2025";

try {
    $conn = new PDO(
        "mysql:host=$host;dbname=$db;charset=utf8mb4",
        $user,
        $pass,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Throw exceptions on errors
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Fetch associative arrays
            PDO::ATTR_EMULATE_PREPARES => false, // Use real prepared statements
        ]
    );
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
