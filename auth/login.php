<?php
session_start();
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    header("Location: ../index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>

    <!-- Bootstrap CDN (use your local version if needed) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body class="bg-light">

<div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="card shadow-sm p-4" style="max-width: 400px; width: 100%;">
        <h4 class="text-center mb-3">Admin Login</h4>

        <?php if (isset($_GET['error'])): ?>
            <div class="alert alert-danger py-2"><?= htmlspecialchars($_GET['error']); ?></div>
        <?php endif; ?>

        <form action="check_login.php" method="POST">
            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" required name="username" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" required name="password" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
    </div>
</div>

</body>
</html>
