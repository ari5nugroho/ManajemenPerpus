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
$data = mysqli_query($conn, "SELECT * FROM tb_buku WHERE id_buku = '$id'");
$buku = mysqli_fetch_assoc($data);

$kategori = mysqli_query($conn, "SELECT * FROM tb_kategori");
$penulis = mysqli_query($conn, "SELECT * FROM tb_penulis");
?>

<main class="main-content" style="margin-left: 250px; padding-top: 80px; background-color: #f6f9fc;">
    <div class="container-fluid px-4">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-warning text-white fw-semibold">
                        <i class="bi bi-pencil-square me-2"></i> Edit Buku
                    </div>
                    <div class="card-body">
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
                                    <?php while ($k = mysqli_fetch_array($kategori)) { ?>
                                        <option value="<?= $k['id_kategori']; ?>" <?= ($buku['id_kategori'] == $k['id_kategori']) ? 'selected' : '' ?>>
                                            <?= $k['nama_kategori']; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Penulis</label>
                                <select name="id_penulis" class="form-select" required>
                                    <option value="">-- Pilih Penulis --</option>
                                    <?php while ($p = mysqli_fetch_array($penulis)) { ?>
                                        <option value="<?= $p['id_penulis']; ?>" <?= ($buku['id_penulis'] == $p['id_penulis']) ? 'selected' : '' ?>>
                                            <?= $p['nama_penulis']; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="d-flex justify-content-between">
                                <a href="buku.php" class="btn btn-secondary">
                                    <i class="bi bi-arrow-left"></i> Kembali
                                </a>
                                <button type="submit" name="edit" class="btn btn-primary">
                                    <i class="bi bi-save"></i> Simpan Perubahan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include '../componen/footer.php'; ?>