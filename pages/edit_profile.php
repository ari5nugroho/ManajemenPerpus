<?php
session_start();
include '../config/koneksi.php';
include '../componen/header.php';
include '../componen/sidebar.php';

$username = $_SESSION['login'];
$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username'"));

if (isset($_POST['update'])) {
    $nama = htmlspecialchars($_POST['nama_lengkap']);
    $email = htmlspecialchars($_POST['email']);

    if ($_FILES['foto']['name'] != '') {
        $file_name = uniqid() . '_' . $_FILES['foto']['name'];
        $tmp_name = $_FILES['foto']['tmp_name'];
        move_uploaded_file($tmp_name, '../uploads/' . $file_name);


        if ($user['foto'] !== 'default.png') {
            @unlink('../uploads/' . $user['foto']);
        }

        $update = mysqli_query($conn, "UPDATE tb_user SET nama_lengkap='$nama', email='$email', foto='$file_name' WHERE username='$username'");
    } else {
        $update = mysqli_query($conn, "UPDATE tb_user SET nama_lengkap='$nama', email='$email' WHERE username='$username'");
    }

    header("Location: profile.php?update=success");
    exit;
}
?>

<main class="main-content" style="margin-left: 250px; padding-top: 80px;">
    <div class="container px-4">
        <h4 class="fw-bold mb-4">Edit Profil</h4>

        <div class="card shadow-sm">
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="text-center mb-3">
                        <img src="../uploads/<?= $user['foto'] ?>" width="100" class="rounded-circle shadow">
                        <div><small class="text-muted">Foto saat ini</small></div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" class="form-control" value="<?= $user['nama_lengkap'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" value="<?= $user['email'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Ganti Foto (Opsional)</label>
                        <input type="file" name="foto" class="form-control">
                    </div>

                    <button type="submit" name="update" class="btn btn-success">
                        <i class="bi bi-save me-1"></i> Simpan Perubahan
                    </button>
                    <a href="profile.php" class="btn btn-secondary ms-2">Batal</a>
                </form>
            </div>
        </div>
    </div>
</main>

<?php include '../componen/footer.php'; ?>