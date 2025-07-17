<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
include '../config/koneksi.php';
include '../componen/header.php';
include '../componen/sidebar.php';

$id = $_GET['id'];
$buku = mysqli_fetch_assoc(mysqli_query($conn, "
    SELECT * FROM tb_buku WHERE id_buku = '$id'
"));

$kategori = mysqli_query($conn, "SELECT * FROM tb_kategori");
$penulis = mysqli_query($conn, "SELECT * FROM tb_penulis");
$genre_all = mysqli_query($conn, "SELECT * FROM tb_genre");

// Ambil genre yang dimiliki buku ini
$genre_selected = [];
$get_genre = mysqli_query($conn, "SELECT id_genre FROM tb_buku_genre WHERE id_buku = '$id'");
while ($g = mysqli_fetch_array($get_genre)) {
    $genre_selected[] = $g['id_genre'];
}
?>

<main class="main-content" style="margin-left:250px; padding-top:80px; background-color:#f6f9fc;">
    <div class="container-fluid px-4">
        <h4 class="fw-bold mb-3">Edit Buku</h4>
        <div class="card p-4" style="max-width:700px;">
            <form method="POST" action="../proses/buku_proses.php">
                <input type="hidden" name="id_buku" value="<?= $buku['id_buku']; ?>">

                <div class="mb-3">
                    <label class="form-label">Judul Buku</label>
                    <input type="text" name="judul_buku" class="form-control" value="<?= htmlspecialchars($buku['judul_buku']); ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tahun Terbit</label>
                    <input type="number" name="tahun_terbit" class="form-control" value="<?= $buku['tahun_terbit']; ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Kategori</label>
                    <select name="id_kategori" class="form-select" required>
                        <option value="">-- Pilih Kategori --</option>
                        <?php while ($k = mysqli_fetch_array($kategori)) : ?>
                            <option value="<?= $k['id_kategori']; ?>" <?= ($buku['id_kategori'] == $k['id_kategori']) ? 'selected' : '' ?>>
                                <?= $k['nama_kategori']; ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Penulis</label>
                    <select name="id_penulis" class="form-select" required>
                        <option value="">-- Pilih Penulis --</option>
                        <?php while ($p = mysqli_fetch_array($penulis)) : ?>
                            <option value="<?= $p['id_penulis']; ?>" <?= ($buku['id_penulis'] == $p['id_penulis']) ? 'selected' : '' ?>>
                                <?= $p['nama_penulis']; ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Genre</label><br>
                    <?php while ($g = mysqli_fetch_array($genre_all)) : ?>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="genre[]" value="<?= $g['id_genre']; ?>"
                                <?= in_array($g['id_genre'], $genre_selected) ? 'checked' : '' ?>>
                            <label class="form-check-label"><?= $g['nama_genre']; ?></label>
                        </div>
                    <?php endwhile; ?>
                </div>

                <div class="mt-3">
                    <button type="submit" name="update" class="btn btn-primary">Simpan Perubahan</button>
                    <a href="buku.php" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</main>

<?php include '../componen/footer.php'; ?>
