<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
include '../config/koneksi.php';
include '../componen/header.php';
include '../componen/sidebar.php';

// Statistik total
$total_buku = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM tb_buku"))['total'];
$total_peminjam = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM tb_peminjam"))['total'];
$total_peminjaman = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM tb_peminjaman"))['total'];
$total_penulis = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM tb_penulis"))['total'];

// Peminjaman per bulan
$peminjaman_per_bulan = mysqli_query($conn, "SELECT MONTH(tanggal_pinjam) as bulan, COUNT(*) as total FROM tb_peminjaman WHERE YEAR(tanggal_pinjam) = YEAR(CURDATE()) GROUP BY MONTH(tanggal_pinjam)");
$bulan = array_fill(1, 12, 0);
while ($row = mysqli_fetch_assoc($peminjaman_per_bulan)) {
    $bulan[(int)$row['bulan']] = (int)$row['total'];
}

// Peminjam aktif
$peminjam_aktif = mysqli_query($conn, "SELECT MONTH(tanggal_pinjam) as bulan, COUNT(DISTINCT id_peminjam) as total FROM tb_peminjaman WHERE YEAR(tanggal_pinjam) = YEAR(CURDATE()) GROUP BY MONTH(tanggal_pinjam)");
$aktif_bulanan = array_fill(1, 12, 0);
while ($row = mysqli_fetch_assoc($peminjam_aktif)) {
    $aktif_bulanan[(int)$row['bulan']] = (int)$row['total'];
}

// Laporan bulanan
$peminjaman_bulanan = mysqli_query($conn, "SELECT MONTH(tanggal_pinjam) as bulan, COUNT(*) as total FROM tb_peminjaman WHERE YEAR(tanggal_pinjam) = YEAR(CURDATE()) GROUP BY MONTH(tanggal_pinjam)");
$laporan_bulanan = [];
while ($row = mysqli_fetch_assoc($peminjaman_bulanan)) {
    $laporan_bulanan[(int)$row['bulan']] = $row['total'];
}

// Ringkasan Mingguan
$today = date('Y-m-d');
$monday = date('Y-m-d', strtotime('monday this week'));
$mingguan_pinjam = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM tb_peminjaman WHERE tanggal_pinjam BETWEEN '$monday' AND '$today'"))['total'];
$mingguan_kembali = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM tb_peminjaman WHERE status = 'Dikembalikan' AND tanggal_kembali BETWEEN '$monday' AND '$today'"))['total'];
$mingguan_terlambat = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM tb_peminjaman WHERE status = 'Dipinjam' AND tanggal_kembali < '$today' AND tanggal_pinjam BETWEEN '$monday' AND '$today'"))['total'];
?>

<main class="main-content" style="margin-left: 250px; padding-top: 80px; background-color: #f6f9fc;">
    <div class="container-fluid px-4">
        <h4 class="fw-bold mb-4">Dashboard</h4>

        <!-- Card statistik -->
        <div class="row g-4 mb-4 text-center">
            <div class="col-md-3">
                <div class="card shadow-sm border-0 bg-primary text-white">
                    <div class="card-body">
                        <i class="bi bi-journal-bookmark-fill fs-1 mb-2 d-block"></i>
                        <h6 class="mb-1">Total Buku</h6>
                        <h3 class="fw-bold mb-0"><?= $total_buku ?></h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm border-0 bg-success text-white">
                    <div class="card-body">
                        <i class="bi bi-person-lines-fill fs-1 mb-2 d-block"></i>
                        <h6 class="mb-1">Total Peminjam</h6>
                        <h3 class="fw-bold mb-0"><?= $total_peminjam ?></h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm border-0 bg-warning text-dark">
                    <div class="card-body">
                        <i class="bi bi-arrow-left-right fs-1 mb-2 d-block"></i>
                        <h6 class="mb-1">Total Peminjaman</h6>
                        <h3 class="fw-bold mb-0"><?= $total_peminjaman ?></h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm border-0 bg-danger text-white">
                    <div class="card-body">
                        <i class="bi bi-pen fs-1 mb-2 d-block"></i>
                        <h6 class="mb-1">Total Penulis</h6>
                        <h3 class="fw-bold mb-0"><?= $total_penulis ?></h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <!-- Grafik peminjaman -->
            <div class="col-md-6">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-header bg-light fw-semibold small">
                        <i class="bi bi-bar-chart-line me-2"></i> Statistik Peminjaman Bulanan (<?= date('Y') ?>)
                    </div>
                    <div class="card-body">
                        <canvas id="chartPeminjaman" height="200"></canvas>
                    </div>
                </div>
            </div>

            <!-- Grafik peminjam aktif -->
            <div class="col-md-6">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-header bg-light fw-semibold small">
                        <i class="bi bi-people me-2"></i> Peminjam Aktif Bulanan (<?= date('Y') ?>)
                    </div>
                    <div class="card-body">
                        <canvas id="chartPeminjamAktif" height="200"></canvas>
                    </div>
                </div>
            </div>

            <!-- Ringkasan Mingguan -->
            <div class="col-md-6">
                <div class="card shadow-sm border-0 h-10">
                    <div class="card-header bg-light fw-semibold small">
                        <i class="bi bi-calendar-week me-2"></i> Ringkasan Minggu Ini (<?= date('d M Y', strtotime($monday)) ?> - <?= date('d M Y') ?>)
                    </div>
                    <div class="card-body text-center">
                        <div class="row">
                            <div class="col-4">
                                <h2 class="fw-bold text-primary"><?= $mingguan_pinjam ?></h2>
                                <small>Total Pinjam</small>
                            </div>
                            <div class="col-4">
                                <h2 class="fw-bold text-success"><?= $mingguan_kembali ?></h2>
                                <small>Dikembalikan</small>
                            </div>
                            <div class="col-4">
                                <h2 class="fw-bold text-danger"><?= $mingguan_terlambat ?></h2>
                                <small>Terlambat</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Laporan Bulanan -->
            <div class="col-md-6">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-header bg-light fw-semibold small">
                        <i class="bi bi-clipboard-data me-2"></i> Laporan Peminjaman Bulanan
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush small">
                            <?php for ($i = 1; $i <= 12; $i++): ?>
                                <?php $bulanNama = date('F', mktime(0, 0, 0, $i, 10)); ?>
                                <li class='list-group-item d-flex justify-content-between'>
                                    <span><?= $bulanNama ?></span>
                                    <span class='fw-semibold'><?= $laporan_bulanan[$i] ?? 0 ?></span>
                                </li>
                            <?php endfor; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include '../componen/footer.php'; ?>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('chartPeminjaman');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
            datasets: [{
                label: 'Jumlah Peminjaman',
                data: <?= json_encode(array_values($bulan)) ?>,
                backgroundColor: 'rgba(54, 162, 235, 0.7)',
                borderRadius: 6
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    }
                }
            }
        }
    });

    const ctxAktif = document.getElementById('chartPeminjamAktif');
    new Chart(ctxAktif, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
            datasets: [{
                label: 'Peminjam Aktif',
                data: <?= json_encode(array_values($aktif_bulanan)) ?>,
                fill: true,
                borderColor: '#36a2eb',
                backgroundColor: 'rgba(54,162,235,0.2)',
                tension: 0.3,
                borderWidth: 2,
                pointRadius: 4
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    }
                }
            }
        }
    });
</script>
