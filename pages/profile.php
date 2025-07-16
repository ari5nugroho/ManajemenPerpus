<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
include '../config/koneksi.php';
include '../componen/header.php';
include '../componen/sidebar.php';

$username = $_SESSION['login'];
$query = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username'");

if (mysqli_num_rows($query) > 0) {
    $user = mysqli_fetch_assoc($query);
} 
?>

<main class="main-content" style="margin-left: 250px; padding-top: 80px;">
    <div class="container px-4">
        <h4 class="fw-bold mb-4">Profil Saya</h4>

        <div class="card shadow-sm">
            <div class="card-body text-center">

                <img src="../uploads/<?= htmlspecialchars($user['foto']) ?>" class="rounded-circle mb-3" width="120" height="120" style="object-fit: cover;">

                <h5 class="fw-bold mb-1"><?= htmlspecialchars($user['nama_lengkap']) ?></h5>
                <p class="text-muted mb-3"><?= htmlspecialchars($user['email']) ?></p>

                <table class="table table-borderless w-50 mx-auto text-start">
                    <tr>
                        <th>Username</th>
                        <td>: <?= htmlspecialchars($user['username']) ?></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>: <?= htmlspecialchars($user['email']) ?></td>
                    </tr>
                    <tr>
                        <th>Nama Lengkap</th>
                        <td>: <?= htmlspecialchars($user['nama_lengkap']) ?></td>
                    </tr>
                </table>

                <a href="edit_profile.php" class="btn btn-outline-primary mt-3">
                    <i class="bi bi-pencil-square me-1"></i> Edit Profil
                </a>
            </div>
        </div>
    </div>
</main>

<?php include '../componen/footer.php'; ?>