<?php
include '../config/koneksi.php';

if (isset($_POST['tambah'])) {
    $judul = $_POST['judul_buku'];
    $tahun = $_POST['tahun_terbit'];
    $kategori = $_POST['id_kategori'];
    $penulis = $_POST['id_penulis'];
    mysqli_query($conn, "INSERT INTO tb_buku VALUES(null,'$judul','$tahun','$kategori','$penulis')");
    header("Location: ../pages/buku.php");
}

// Hapus
if (isset($_GET['hapus'])) {
    $id = $_GET['id'];
    mysqli_query($conn, "DELETE FROM tb_buku WHERE id_buku='$id'");
    header("Location: ../pages/buku.php");
}
