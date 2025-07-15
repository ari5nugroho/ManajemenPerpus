<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
include '../config/koneksi.php';

$buku = mysqli_query($conn, "SELECT b.*, k.nama_kategori, p.nama_penulis 
                            FROM tb_buku b 
                            LEFT JOIN tb_kategori k ON b.id_kategori=k.id_kategori 
                            LEFT JOIN tb_penulis p ON b.id_penulis=p.id_penulis");
?>
<!DOCTYPE html>
<html>

<head>
    <title>Data Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand">Perpustakaan Amikom</a>
            <a class="btn btn-light" href="dashboard.php">Dashboard</a>
        </div>
    </nav>
    <div class="container mt-4">
        <h3>Data Buku</h3>
        <a href="tambah_buku.php" class="btn btn-success mb-2">Tambah Buku</a>
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Tahun</th>
                <th>Kategori</th>
                <th>Penulis</th>
                <th>Aksi</th>
            </tr>
            <?php $no = 1;
            while ($d = mysqli_fetch_array($buku)) { ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $d['judul_buku']; ?></td>
                    <td><?= $d['tahun_terbit']; ?></td>
                    <td><?= $d['nama_kategori']; ?></td>
                    <td><?= $d['nama_penulis']; ?></td>
                    <td>
                        <a href="../proses/buku_proses.php?hapus&id=<?= $d['id_buku']; ?>" class="btn btn-danger btn-sm"
                            onclick="return confirm('Hapus?')">Hapus</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>

</html>