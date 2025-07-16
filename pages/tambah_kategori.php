<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
include '../componen/header.php';
include '../componen/sidebar.php';
?>

<main class="main-content" style="margin-left: 250px; padding-top: 80px; background-color: #f6f9fc;">
    <div class="container-fluid px-4">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-primary text-white fw-semibold">
                        <i class="bi bi-plus-circle me-2"></i> Tambah Kategori
                    </div>
                    <div class="card-body">
                        <form method="POST" action="../proses/kategori_proses.php">
                            <div class="mb-3">
                                <label class="form-label">Nama Kategori</label>
                                <input type="text" name="nama_kategori" class="form-control" required>
                            </div>
                            <div class="d-flex justify-content-between">
                                <a href="kategori.php" class="btn btn-secondary">
                                    <i class="bi bi-arrow-left"></i> Kembali
                                </a>
                                <button type="submit" name="tambah" class="btn btn-success">
                                    <i class="bi bi-check-circle"></i> Simpan
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