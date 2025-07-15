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
    <title>Tambah Penulis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <h3>Tambah Penulis</h3>
        <form method="POST" action="../proses/penulis_proses.php">
            <div class="mb-3">
                <input type="text" name="nama_penulis" class="form-control" placeholder="Nama Penulis" required>
            </div>
            <button type="submit" name="tambah" class="btn btn-primary">Simpan</button>
            <a href="penulis.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>

</html>