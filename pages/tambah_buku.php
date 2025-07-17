<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
include '../config/koneksi.php';
include '../componen/header.php';
include '../componen/sidebar.php';

$kategori = mysqli_query($conn, "SELECT * FROM tb_kategori");
$penulis = mysqli_query($conn, "SELECT * FROM tb_penulis");
$genre_all = mysqli_query($conn, "SELECT * FROM tb_genre");
?>

<main class="main-content" style="margin-left:250px; padding-top:80px; background-color:#f6f9fc;">
    <div class="container-fluid px-4">
        <h4 class="fw-bold mb-3">Tambah Buku</h4>
        <div class="card p-4" style="max-width:700px;">
            <form method="POST" action="../proses/buku_proses.php">
                <div class="mb-3">
                    <label class="form-label">Judul Buku</label>
                    <input type="text" name="judul_buku" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tahun Terbit</label>
                    <input type="number" name="tahun_terbit" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Kategori</label>
                    <select name="id_kategori" class="form-select" required>
                        <option value="">-- Pilih Kategori --</option>
                        <?php while ($k = mysqli_fetch_array($kategori)) : ?>
                            <option value="<?= $k['id_kategori']; ?>"><?= $k['nama_kategori']; ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Penulis</label>
                    <select name="id_penulis" class="form-select" required>
                        <option value="">-- Pilih Penulis --</option>
                        <?php while ($p = mysqli_fetch_array($penulis)) : ?>
                            <option value="<?= $p['id_penulis']; ?>"><?= $p['nama_penulis']; ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Genre</label><br>
                    <?php while ($g = mysqli_fetch_array($genre_all)) : ?>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="genre[]" value="<?= $g['id_genre']; ?>">
                            <label class="form-check-label"><?= $g['nama_genre']; ?></label>
                        </div>
                    <?php endwhile; ?>
                </div>

                <button type="submit" name="tambah" class="btn btn-primary">Simpan</button>
                <a href="buku.php" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</main>

<?php include '../componen/footer.php'; ?>