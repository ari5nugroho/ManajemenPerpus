<?php
include '../config/koneksi.php';
include '../templates/header.php';
$data = mysqli_query($conn, "SELECT * FROM tb_kategori");
?>
<h3 class="mb-3">Data Kategori</h3>
<a href="tambah_kategori.php" class="btn btn-primary mb-2"><i class="bi bi-plus"></i> Tambah Kategori</a>
<table id="example1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Kategori</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        while ($d = mysqli_fetch_array($data)) { ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $d['nama_kategori']; ?></td>
                <td>
                    <a href="edit_kategori.php?id=<?= $d['id_kategori']; ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="../proses/kategori_proses.php?hapus&id=<?= $d['id_kategori']; ?>"
                        onclick="return confirm('Hapus?')" class="btn btn-danger btn-sm">Hapus</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<?php include '../templates/footer.php'; ?>