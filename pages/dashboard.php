<?php
include '../config/koneksi.php';
include '../templates/header.php';
$jml_buku = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_buku"));
$jml_kategori = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_kategori"));
$jml_peminjam = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_peminjam"));
$jml_penulis = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_penulis"));
?>
<h3 class="mb-4">Dashboard</h3>
<div class="row">
    <div class="col-md-3">
        <div class="card mb-3">
            <div class="card-body text-center">
                <h4><?= $jml_buku; ?></h4>
                <p>Total Buku</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card mb-3">
            <div class="card-body text-center">
                <h4><?= $jml_kategori; ?></h4>
                <p>Total Kategori</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card mb-3">
            <div class="card-body text-center">
                <h4><?= $jml_peminjam; ?></h4>
                <p>Total Peminjam</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card mb-3">
            <div class="card-body text-center">
                <h4><?= $jml_penulis; ?></h4>
                <p>Total Penulis</p>
            </div>
        </div>
    </div>
</div>
<?php include '../templates/footer.php'; ?>