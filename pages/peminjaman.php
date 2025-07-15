<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
include '../config/koneksi.php';

$data = mysqli_query($conn, "SELECT pj.*, b.judul_buku, p.nama_peminjam 
                            FROM tb_peminjaman pj 
                            LEFT JOIN tb_buku b ON pj.id_buku=b.id_buku
                            LEFT JOIN tb_peminjam p ON pj.id_peminjam=p.id_peminjam");
?>
<!DOCTYPE html>
<html>

<head>
    <title>Data Peminjaman</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <h3>Data Peminjaman</h3>
        <a href="tambah_peminjaman.php" class="btn btn-success mb-2">Tambah Peminjaman</a>
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Buku</th>
                <th>Peminjam</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Aksi</th>
            </tr>
            <?php $no = 1;
            while ($d = mysqli_fetch_array($data)) { ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $d['judul_buku']; ?></td>
                    <td><?= $d['nama_peminjam']; ?></td>
                    <td><?= $d['tanggal_pinjam']; ?></td>
                    <td><?= $d['tanggal_kembali']; ?></td>
                    <td>
                        <a href="../proses/peminjaman_proses.php?hapus&id=<?= $d['id_peminjaman']; ?>"
                            class="btn btn-danger btn-sm" onclick="return confirm('Hapus?')">Hapus</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
        <a href="dashboard.php" class="btn btn-secondary">Kembali</a>
    </div>
</body>

</html>