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

$buku = mysqli_query($conn, "
    SELECT b.*, k.nama_kategori, p.nama_penulis 
    FROM tb_buku b 
    LEFT JOIN tb_kategori k ON b.id_kategori = k.id_kategori 
    LEFT JOIN tb_penulis p ON b.id_penulis = p.id_penulis
    WHERE b.judul_buku LIKE '%$cari%' 
       OR k.nama_kategori LIKE '%$cari%' 
       OR p.nama_penulis LIKE '%$cari%'
        OR b.tahun_terbit LIKE '%$cari%'
    ORDER BY b.id_buku DESC
");
?>

<main class="main-content" style="margin-left:250px; padding-top:80px; background-color:#f6f9fc;">
    <div class="container-fluid px-4">
        
        <div class="row align-items-center mb-3">
            <div class="col-md-6">
                <h4 class="fw-bold mb-0">Data Buku</h4>
            </div>
            <div class="col-md-6 d-flex justify-content-end gap-2">
                <form method="GET" class="d-flex" role="search">
                    <input type="text" name="cari" class="form-control me-2" placeholder="Cari ..." value="<?= htmlspecialchars($cari); ?>">
                    <button class="btn btn-outline-primary" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                </form>
                <a href="tambah_buku.php" class="btn btn-success">
                    <i class="bi bi-plus-circle me-1"></i> Tambah Buku
                </a>
            </div>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-body table-responsive">
                <table class="table table-bordered table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th style="width: 5%;">No</th>
                            <th>Judul</th>
                            <th>Tahun</th>
                            <th>Kategori</th>
                            <th>Penulis</th>
                            <th style="width: 15%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (mysqli_num_rows($buku) > 0): ?>
                            <?php $no = 1;
                            while ($d = mysqli_fetch_array($buku)) { ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= htmlspecialchars($d['judul_buku']); ?></td>
                                    <td><?= $d['tahun_terbit']; ?></td>
                                    <td><?= $d['nama_kategori']; ?></td>
                                    <td><?= $d['nama_penulis']; ?></td>
                                    <td>
                                        <a href="edit_buku.php?id=<?= $d['id_buku']; ?>" class="btn btn-sm btn-warning me-1">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <a href="../proses/buku_proses.php?hapus&id=<?= $d['id_buku']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus?')">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center text-muted">Data tidak ditemukan.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</main>

<?php include '../componen/footer.php'; ?>