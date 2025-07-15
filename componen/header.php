<?php session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Perpustakaan Amikom</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <div class="d-flex">
        <?php include 'sidebar.php'; ?>
        <div class="flex-grow-1">
            <nav class="navbar navbar-dark bg-dark fixed-top">
                <div class="container-fluid">
                    <span class="navbar-brand mb-0">Perpustakaan Amikom</span>
                    <a href="../logout.php" class="btn btn-primary btn-sm">Logout</a>
                </div>
            </nav>
            <div class="container-fluid" style="margin-top:60px;">