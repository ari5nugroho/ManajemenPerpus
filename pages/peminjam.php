<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
include '../config/koneksi.php';
$data = mysqli_query($conn, "SELECT * FROM tb_peminjam");
?>
<!DOCTYPE html>
<html>

<head>
    <title>Data Peminjam</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <h3>Data Peminjam</h3>
        <a href="tambah_peminjam.php" class="btn btn-success mb-2">Tambah Peminjam</a>
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>No HP</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
            <?php $no = 1;
            while ($d = mysqli_fetch_array($data)) { ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $d['nama_peminjam']; ?></td>
                    <td><?= $d['no_hp']; ?></td>
                    <td><?= $d['alamat']; ?></td>
                    <td>
                        <a href="../proses/peminjam_proses.php?hapus&id=<?= $d['id_peminjam']; ?>"
                            class="btn btn-danger btn-sm" onclick="return confirm('Hapus?')">Hapus</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
        <a href="dashboard.php" class="btn btn-secondary">Kembali</a>
    </div>
</body>

</html>