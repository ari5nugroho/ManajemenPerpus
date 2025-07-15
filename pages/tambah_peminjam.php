<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Tambah Peminjam</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <h3>Tambah Peminjam</h3>
        <form method="POST" action="../proses/peminjam_proses.php">
            <div class="mb-3">
                <input type="text" name="nama_peminjam" class="form-control" placeholder="Nama" required>
            </div>
            <div class="mb-3">
                <input type="text" name="no_hp" class="form-control" placeholder="No HP">
            </div>
            <div class="mb-3">
                <textarea name="alamat" class="form-control" placeholder="Alamat"></textarea>
            </div>
            <button type="submit" name="tambah" class="btn btn-primary">Simpan</button>
            <a href="peminjam.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>

</html>