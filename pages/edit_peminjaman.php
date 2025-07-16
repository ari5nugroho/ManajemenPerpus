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
$data = mysqli_query($conn, "SELECT * FROM tb_peminjaman WHERE id_peminjaman = '$id'");
$peminjaman = mysqli_fetch_assoc($data);

if (!$peminjaman) {
    echo "<script>alert('Data tidak ditemukan'); window.location='peminjaman.php';</script>";
    exit;
}

$buku = mysqli_query($conn, "SELECT * FROM tb_buku");
$peminjam = mysqli_query($conn, "SELECT * FROM tb_peminjam");
?>

<main class="main-content" style="margin-left: 250px; padding-top: 80px; background-color: #f6f9fc;">
    <div class="container-fluid px-4">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-warning text-white fw-semibold">
                        <i class="bi bi-pencil-square me-2"></i> Edit Peminjaman
                    </div>
                    <div class="card-body">
                        <form method="POST" action="../proses/peminjaman_proses.php">
                            <input type="hidden" name="id_peminjaman" value="<?= $peminjaman['id_peminjaman']; ?>">
                            <div class="mb-3">
                                <label class="form-label">Judul Buku</label>
                                <select name="id_buku" class="form-select" required>
                                    <option value="">-- Pilih Buku --</option>
                                    <?php while ($b = mysqli_fetch_array($buku)) { ?>
                                        <option value="<?= $b['id_buku']; ?>" <?= ($b['id_buku'] == $peminjaman['id_buku']) ? 'selected' : '' ?>>
                                            <?= $b['judul_buku']; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Peminjam</label>
                                <select name="id_peminjam" class="form-select" required>
                                    <option value="">-- Pilih Peminjam --</option>
                                    <?php while ($p = mysqli_fetch_array($peminjam)) { ?>
                                        <option value="<?= $p['id_peminjam']; ?>" <?= ($p['id_peminjam'] == $peminjaman['id_peminjam']) ? 'selected' : '' ?>>
                                            <?= $p['nama_peminjam']; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tanggal Pinjam</label>
                                <input type="date" name="tanggal_pinjam" class="form-control" value="<?= $peminjaman['tanggal_pinjam']; ?>" required>
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Tanggal Kembali</label>
                                <input type="date" name="tanggal_kembali" class="form-control" value="<?= $peminjaman['tanggal_kembali']; ?>" required>
                            </div>
                            <div class="d-flex justify-content-between">
                                <a href="peminjaman.php" class="btn btn-secondary">
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