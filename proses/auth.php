<?php
session_start();
include '../config/koneksi.php';

$username = $_POST['username'];
$password = md5($_POST['password']);

$q = mysqli_query($conn, "SELECT * FROM tb_user WHERE username='$username' AND password='$password'");
if (mysqli_num_rows($q) > 0) {
    $data = mysqli_fetch_assoc($q);
    $_SESSION['login'] = $data['username'];

    header("Location: ../pages/dashboard.php");
} else {
    echo "<script>alert('Login gagal!');window.location.href='../pages/login.php';</script>";
}
