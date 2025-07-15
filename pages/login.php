<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Login - Perpustakaan Amikom</title>
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-primary text-white d-flex justify-content-center align-items-center" style="height:100vh;">
    <div class="card p-4 text-dark" style="width: 300px;">
        <h4 class="text-center">Perpustakaan Amikom</h4>
        <form action="../proses/auth.php" method="POST">
            <div class="mb-3">
                <input type="text" name="username" class="form-control" placeholder="Username" required>
            </div>
            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
    </div>
</body>

</html>