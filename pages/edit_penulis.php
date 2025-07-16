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
$data = mysqli_query($conn, "SELECT * FROM tb_penulis WHERE id_penulis = '$id'");
$penulis = mysqli_fetch_assoc($data);

if (!$penulis) {
    echo "<script>alert('Data penulis tidak ditemukan'); window.location='penulis.php';</script>";
    exit;
}
?>

<main class="main-content" style="margin-left: 250px; padding-top: 80px; background-color: #f6f9fc;">
    <div class="container-fluid px-4">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-warning text-white fw-semibold">
                        <i class="bi bi-pencil-square me-2"></i> Edit Penulis
                    </div>
                    <div class="card-body">
                        <form method="POST" action="../proses/penulis_proses.php">
                            <input type="hidden" name="id_penulis" value="<?= $penulis['id_penulis']; ?>">
                            <div class="mb-3">
                                <label class="form-label">Nama Penulis</label>
                                <input type="text" name="nama_penulis" class="form-control" value="<?= htmlspecialchars($penulis['nama_penulis']); ?>" required>
                            </div>
                            <div class="d-flex justify-content-between">
                                <a href="penulis.php" class="btn btn-secondary">
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