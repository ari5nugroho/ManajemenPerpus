<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
include '../config/koneksi.php';
include '../componen/header.php';
include '../componen/sidebar.php';

$data = mysqli_query($conn, "SELECT * FROM tb_penulis");

$judul = "Penulis";
$judul_singkat = "Penulis";
$tambah_link = "tambah_penulis.php";

$cari = $_GET['cari'] ?? '';
$data = mysqli_query($conn, "
    SELECT * FROM tb_penulis 
    WHERE nama_penulis LIKE '%$cari%' 
    ORDER BY id_penulis DESC
");
?>

<main class="main-content" style="margin-left: 250px; padding-top: 80px; background-color: #f6f9fc;">
    <div class="container-fluid px-4">
        <?php $cari = $_GET['cari'] ?? ''; ?>

        <div class="row align-items-center mb-3">
            <div class="col-md-6">
                <h4 class="fw-bold mb-0">Data <?= $judul ?? 'Data' ?></h4>
            </div>
            <div class="col-md-6 d-flex justify-content-end gap-2">
                <form method="GET" class="d-flex" role="search">
                    <input type="text" name="cari" class="form-control me-2" placeholder="Cari ..." value="<?= htmlspecialchars($cari); ?>">
                    <button class="btn btn-outline-primary" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                </form>
                <a href="<?= $tambah_link ?>" class="btn btn-success">
                    <i class="bi bi-plus-circle me-1"></i> Tambah <?= $judul_singkat ?? 'Data' ?>
                </a>
            </div>
        </div>


        <div class="card border-0 shadow-sm">
            <div class="card-body table-responsive">
                <table class="table align-middle table-bordered table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th style="width: 5%;">No</th>
                            <th>Nama Penulis</th>
                            <th style="width: 15%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        while ($d = mysqli_fetch_array($data)) { ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= htmlspecialchars($d['nama_penulis']); ?></td>
                                <td>
                                    <a href="edit_penulis.php?id=<?= $d['id_penulis']; ?>" class="btn btn-sm btn-warning me-1" title="Edit">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <a href="../proses/penulis_proses.php?hapus&id=<?= $d['id_penulis']; ?>"
                                        class="btn btn-sm btn-danger"
                                        onclick="return confirm('Hapus penulis ini?')">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                        <?php if (mysqli_num_rows($data) == 0): ?>
                            <tr>
                                <td colspan="3" class="text-center text-muted">Belum ada penulis.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<?php include '../componen/footer.php'; ?>