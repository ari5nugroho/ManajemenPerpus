<?php
include '../config/koneksi.php';

if (isset($_POST['tambah'])) {
    $id_buku = $_POST['id_buku'];
    $id_peminjam = $_POST['id_peminjam'];
    $tgl_pinjam = $_POST['tanggal_pinjam'];
    $tgl_kembali = $_POST['tanggal_kembali'];
    mysqli_query($conn, "INSERT INTO tb_peminjaman VALUES(null,'$id_buku','$id_peminjam','$tgl_pinjam','$tgl_kembali')");
    header("Location: ../pages/peminjaman.php");
}
if (isset($_GET['hapus'])) {
    $id = $_GET['id'];
    mysqli_query($conn, "DELETE FROM tb_peminjaman WHERE id_peminjaman='$id'");
    header("Location: ../pages/peminjaman.php");
}
