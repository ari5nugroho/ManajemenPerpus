<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
include '../config/koneksi.php';
$data = mysqli_query($conn, "SELECT * FROM tb_penulis");
?>
<!DOCTYPE html>
<html>

<head>
    <title>Data Penulis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <h3>Data Penulis</h3>
        <a href="tambah_penulis.php" class="btn btn-success mb-2">Tambah Penulis</a>
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Nama Penulis</th>
                <th>Aksi</th>
            </tr>
            <?php $no = 1;
            while ($d = mysqli_fetch_array($data)) { ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $d['nama_penulis']; ?></td>
                    <td>
                        <a href="../proses/penulis_proses.php?hapus&id=<?= $d['id_penulis']; ?>"
                            class="btn btn-danger btn-sm" onclick="return confirm('Hapus?')">Hapus</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
        <a href="dashboard.php" class="btn btn-secondary">Kembali</a>
    </div>
</body>

</html>