<?php session_start(); ?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Login - Perpustakaan Amikom</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Outfit', sans-serif;
            background-image: url('../assets/img/library.jpg');

            background-size: cover;
            background-position: center;
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        body {
            font-family: 'Outfit', sans-serif;
            background: url('../assets/img/library.jpg') no-repeat center center fixed;
            background-size: cover;
            position: relative;
            height: 100vh;
            margin: 0;
            overflow: hidden;
        }

        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);

            z-index: 0;
        }

        .login-card {
            position: relative;
            z-index: 1;
        }


        .login-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 16px;
            padding: 30px;
            width: 100%;
            max-width: 380px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            animation: fadeIn 0.6s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login-card h4 {
            font-weight: 600;
            color: #4e54c8;
            text-align: center;
            margin-bottom: 24px;
        }

        .form-check-label {
            font-size: 0.9rem;
        }
    </style>
</head>

<body>
    <div class="login-card">
        <h4><i class="bi bi-book-half me-1"></i> Perpustakaan Amikom</h4>
        <form action="../proses/auth.php" method="POST">
            <div class="mb-3">
                <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
            </div>
            <div class="mb-3">
                <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="showPassword">
                <label class="form-check-label" for="showPassword">Tampilkan Password</label>
            </div>
            <button type="submit" class="btn btn-primary w-100">Masuk</button>
        </form>
    </div>

    <script>
        const toggle = document.getElementById("showPassword");
        const password = document.getElementById("password");
        toggle.addEventListener("change", () => {
            password.type = toggle.checked ? "text" : "password";
        });
    </script>
</body>

</html>