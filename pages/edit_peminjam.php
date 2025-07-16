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
$data = mysqli_query($conn, "SELECT * FROM tb_peminjam WHERE id_peminjam = '$id'");
$peminjam = mysqli_fetch_assoc($data);

if (!$peminjam) {
    echo "<script>alert('Data tidak ditemukan'); window.location='peminjam.php';</script>";
    exit;
}
?>

<main class="main-content" style="margin-left: 250px; padding-top: 80px; background-color: #f6f9fc;">
    <div class="container-fluid px-4">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-warning text-white fw-semibold">
                        <i class="bi bi-pencil-square me-2"></i> Edit Peminjam
                    </div>
                    <div class="card-body">
                        <form method="POST" action="../proses/peminjam_proses.php">
                            <input type="hidden" name="id_peminjam" value="<?= $peminjam['id_peminjam']; ?>">

                            <div class="mb-3">
                                <label class="form-label">Nama</label>
                                <input type="text" name="nama_peminjam" class="form-control" required value="<?= htmlspecialchars($peminjam['nama_peminjam']); ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">No HP</label>
                                <input type="text" name="no_hp" class="form-control" value="<?= htmlspecialchars($peminjam['no_hp']); ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Alamat</label>
                                <textarea name="alamat" class="form-control"><?= htmlspecialchars($peminjam['alamat']); ?></textarea>
                            </div>
                            <div class="d-flex justify-content-between">
                                <a href="peminjam.php" class="btn btn-secondary">
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