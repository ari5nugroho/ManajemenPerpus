<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
include '../config/koneksi.php';
include '../componen/header.php';
include '../componen/sidebar.php';

$cari = $_GET['cari'] ?? '';
$data = mysqli_query($conn, "
    SELECT g.*, COUNT(bg.id_buku) AS jumlah_buku 
    FROM tb_genre g 
    LEFT JOIN tb_buku_genre bg ON g.id_genre = bg.id_genre
    WHERE g.nama_genre LIKE '%$cari%'
    GROUP BY g.id_genre
");
?>

<main class="main-content" style="margin-left:250px; padding-top:80px;">
    <div class="container-fluid px-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div class="col-md-6">
                <h4 class="fw-bold mb-0">Data Genre</h4>
            </div>
            <div class="col-md-6 d-flex justify-content-end gap-2">
                <form method="GET" class="d-flex" role="search">
                    <input type="text" name="cari" class="form-control me-2" placeholder="Cari genre..." value="<?= htmlspecialchars($cari); ?>">
                    <button class="btn btn-outline-primary" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                </form>
                <a href="tambah_genre.php" class="btn btn-success">
                    <i class="bi bi-plus-circle me-1"></i> Tambah Genre
                </a>
            </div>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-body table-responsive">
                <table class="table table-bordered table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th style="width:5%;">No</th>
                            <th>Nama Genre</th>
                            <th>Jumlah Buku</th>
                            <th style="width:15%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        while ($d = mysqli_fetch_array($data)) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= htmlspecialchars($d['nama_genre']); ?></td>
                                <td><?= $d['jumlah_buku']; ?> Buku</td>
                                <td>
                                    <a href="edit_genre.php?id=<?= $d['id_genre']; ?>" class="btn btn-warning btn-sm">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <a href="../proses/genre_proses.php?hapus&id=<?= $d['id_genre']; ?>" onclick="return confirm('Hapus genre ini?')" class="btn btn-danger btn-sm">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                        <?php if (mysqli_num_rows($data) === 0): ?>
                            <tr>
                                <td colspan="4" class="text-center text-muted">Genre tidak ditemukan.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<?php include '../componen/footer.php'; ?>