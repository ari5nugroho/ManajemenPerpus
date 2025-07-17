<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
include '../componen/header.php';
include '../componen/sidebar.php';
?>

<main class="main-content" style="margin-left:250px; padding-top:80px;">
    <div class="container-fluid px-4">
        <h4 class="fw-bold mb-3">Tambah Genre</h4>
        <div class="card p-4" style="max-width:500px;">
            <form method="POST" action="../proses/genre_proses.php">
                <div class="mb-3">
                    <label class="form-label">Nama Genre</label>
                    <input type="text" name="nama_genre" class="form-control" required>
                </div>
                <button type="submit" name="tambah" class="btn btn-primary">Simpan</button>
                <a href="genre.php" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</main>

<?php include '../componen/footer.php'; ?>