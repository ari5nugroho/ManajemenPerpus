<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
include '../config/koneksi.php';
include '../componen/header.php';
include '../componen/sidebar.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    echo "<script>alert('ID tidak valid'); window.location='genre.php';</script>";
    exit;
}

$data = mysqli_query($conn, "SELECT * FROM tb_genre WHERE id_genre = $id");
$genre = mysqli_fetch_assoc($data);
if (!$genre) {
    echo "<script>alert('Data tidak ditemukan'); window.location='genre.php';</script>";
    exit;
}
?>

<main class="main-content" style="margin-left:250px; padding-top:80px;">
    <div class="container-fluid px-4">
        <h4 class="fw-bold mb-3">Edit Genre</h4>
        <div class="card p-4" style="max-width:500px;">
            <form method="POST" action="../proses/genre_proses.php">
                <input type="hidden" name="id_genre" value="<?= $genre['id_genre']; ?>">
                <div class="mb-3">
                    <label class="form-label">Nama Genre</label>
                    <input type="text" name="nama_genre" class="form-control" value="<?= htmlspecialchars($genre['nama_genre']); ?>" required>
                </div>
                <button type="submit" name="edit" class="btn btn-primary">Simpan Perubahan</button>
                <a href="genre.php" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</main>

<?php include '../componen/footer.php'; ?>