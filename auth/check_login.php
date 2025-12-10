<?php
session_start();
require_once "../config/db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = trim($_POST['username']);
    $password = $_POST['password'];

    // Prepare: username lookup
    $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = :username");
    $stmt->execute([':username' => $username]);

    // Check if user exists
    if ($stmt->rowCount() === 1) {
        $row = $stmt->fetch();

        if (password_verify($password, $row['password'])) {

            // Auth successful → store session vars
            $_SESSION['logged_in'] = true;
            $_SESSION['user_id']   = $row['id'];

            header("Location: ../index.php");
            exit;
        }
    }

    // Login failed
    header("Location: login.php?error=Invalid credentials");
    exit;
}
?>
