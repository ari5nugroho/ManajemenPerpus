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
    SELECT pj.*, b.judul_buku, pm.nama_peminjam
    FROM tb_peminjaman pj
    LEFT JOIN tb_buku b ON pj.id_buku = b.id_buku
    LEFT JOIN tb_peminjam pm ON pj.id_peminjam = pm.id_peminjam
    WHERE b.judul_buku LIKE '%$cari%' OR pm.nama_peminjam LIKE '%$cari%'
    ORDER BY pj.id_peminjaman DESC
");
?>

<main class="main-content" style="margin-left: 250px; padding-top: 80px; background-color: #f6f9fc;">
    <div class="container-fluid px-4">
        <div class="row align-items-center mb-3">
            <div class="col-md-6">
                <h4 class="fw-bold mb-0">Data Peminjaman</h4>
            </div>
            <div class="col-md-6 d-flex justify-content-end gap-2">
                <form method="GET" class="d-flex" role="search">
                    <input type="text" name="cari" class="form-control me-2" placeholder="Cari buku/peminjam..." value="<?= htmlspecialchars($cari); ?>">
                    <button class="btn btn-outline-primary" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                </form>
                <a href="tambah_peminjaman.php" class="btn btn-success">
                    <i class="bi bi-plus-circle me-1"></i> Tambah Peminjaman
                </a>
            </div>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-body table-responsive">
                <table class="table table-bordered table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th style="width: 5%;">No</th>
                            <th>Buku</th>
                            <th>Peminjam</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            <th style="width: 180px;">Status</th>
                            <th style="width: 15%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        while ($d = mysqli_fetch_array($data)) { ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= htmlspecialchars($d['judul_buku']); ?></td>
                                <td><?= htmlspecialchars($d['nama_peminjam']); ?></td>
                                <td><?= $d['tanggal_pinjam']; ?></td>
                                <td><?= $d['tanggal_kembali']; ?></td>
                                <td class="position-relative">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="badge 
                                            <?= $d['status'] == 'Dikembalikan' ? 'bg-success' : ($d['status'] == 'Terlambat' ? 'bg-danger' : 'bg-warning text-dark') ?>">
                                            <?= $d['status']; ?>
                                        </span>

                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-outline-secondary dropdown-toggle py-0 px-2" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="bi bi-check2-circle"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <form method="POST" action="../proses/peminjaman_proses.php">
                                                    <input type="hidden" name="id_peminjaman" value="<?= $d['id_peminjaman']; ?>">
                                                    <li><button type="submit" name="status" value="Dipinjam" class="dropdown-item">Dipinjam</button></li>
                                                    <li><button type="submit" name="status" value="Dikembalikan" class="dropdown-item">Dikembalikan</button></li>
                                                    <li><button type="submit" name="status" value="Terlambat" class="dropdown-item">Terlambat</button></li>
                                                </form>
                                            </ul>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <a href="edit_peminjaman.php?id=<?= $d['id_peminjaman']; ?>" class="btn btn-sm btn-warning me-1">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <a href="../proses/peminjaman_proses.php?hapus&id=<?= $d['id_peminjaman']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus?')">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                        <?php if (mysqli_num_rows($data) == 0): ?>
                            <tr>
                                <td colspan="7" class="text-center text-muted">Data tidak ditemukan.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<?php include '../componen/footer.php'; ?>