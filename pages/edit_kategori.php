<?php
include '../config/koneksi.php';
include '../componen/header.php';
$id = $_GET['id'];
$d = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM tb_kategori WHERE id_kategori='$id'"));
?>
<h3 class="mb-3">Edit Kategori</h3>
<form method="POST" action="../proses/kategori_proses.php" class="card p-3">
    <input type="hidden" name="id_kategori" value="<?= $d['id_kategori']; ?>">
    <div class="mb-3">
        <label>Nama Kategori</label>
        <input type="text" name="nama_kategori" class="form-control" value="<?= $d['nama_kategori']; ?>" required>
    </div>
    <button type="submit" name="edit" class="btn btn-primary">Update</button>
    <a href="kategori.php" class="btn btn-secondary">Kembali</a>
</form>
<?php include '../componen/footer.php'; ?>