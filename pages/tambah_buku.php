<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
include '../config/koneksi.php';

$kategori = mysqli_query($conn, "SELECT * FROM tb_kategori");
$penulis = mysqli_query($conn, "SELECT * FROM tb_penulis");
?>
<!DOCTYPE html>
<html>

<head>
    <title>Tambah Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <h3>Tambah Buku</h3>
        <form method="POST" action="../proses/buku_proses.php">
            <div class="mb-3">
                <input type="text" name="judul_buku" class="form-control" placeholder="Judul Buku" required>
            </div>
            <div class="mb-3">
                <input type="number" name="tahun_terbit" class="form-control" placeholder="Tahun Terbit" required>
            </div>
            <div class="mb-3">
                <select name="id_kategori" class="form-control" required>
                    <option value="">Pilih Kategori</option>
                    <?php while ($k = mysqli_fetch_array($kategori)) { ?>
                        <option value="<?= $k['id_kategori']; ?>"><?= $k['nama_kategori']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-3">
                <select name="id_penulis" class="form-control" required>
                    <option value="">Pilih Penulis</option>
                    <?php while ($p = mysqli_fetch_array($penulis)) { ?>
                        <option value="<?= $p['id_penulis']; ?>"><?= $p['nama_penulis']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <button type="submit" name="tambah" class="btn btn-primary">Simpan</button>
            <a href="buku.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>

</html>