<?php include '../templates/header.php'; ?>
<h3 class="mb-3">Tambah Kategori</h3>
<div class="card p-4" style="max-width:500px;">
    <form method="POST" action="../proses/kategori_proses.php">
        <div class="mb-3">
            <label class="form-label">Nama Kategori</label>
            <input type="text" name="nama_kategori" class="form-control" required>
        </div>
        <button type="submit" name="tambah" class="btn btn-primary">Simpan</button>
        <a href="kategori.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
<?php include '../templates/footer.php'; ?>