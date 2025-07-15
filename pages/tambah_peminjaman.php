<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
include '../config/koneksi.php';

$buku = mysqli_query($conn, "SELECT * FROM tb_buku");
$peminjam = mysqli_query($conn, "SELECT * FROM tb_peminjam");
?>
<!DOCTYPE html>
<html>

<head>
    <title>Tambah Peminjaman</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <h3>Tambah Peminjaman</h3>
        <form method="POST" action="../proses/peminjaman_proses.php">
            <div class="mb-3">
                <label>Buku</label>
                <select name="id_buku" class="form-control" required>
                    <option value="">Pilih Buku</option>
                    <?php while ($b = mysqli_fetch_array($buku)) { ?>
                        <option value="<?= $b['id_buku']; ?>"><?= $b['judul_buku']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-3">
                <label>Peminjam</label>
                <select name="id_peminjam" class="form-control" required>
                    <option value="">Pilih Peminjam</option>
                    <?php while ($p = mysqli_fetch_array($peminjam)) { ?>
                        <option value="<?= $p['id_peminjam']; ?>"><?= $p['nama_peminjam']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-3">
                <label>Tanggal Pinjam</label>
                <input type="date" name="tanggal_pinjam" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Tanggal Kembali</label>
                <input type="date" name="tanggal_kembali" class="form-control" required>
            </div>
            <button type="submit" name="tambah" class="btn btn-primary">Simpan</button>
            <a href="peminjaman.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>

</html>