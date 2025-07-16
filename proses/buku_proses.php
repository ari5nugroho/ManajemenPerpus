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

if (isset($_POST['edit'])) {
    $id = $_POST['id_buku'];
    $judul = $_POST['judul_buku'];
    $tahun = $_POST['tahun_terbit'];
    $kategori = $_POST['id_kategori'];
    $penulis = $_POST['id_penulis'];
    $update = mysqli_query($conn, "UPDATE tb_buku SET judul_buku='$judul', tahun_terbit='$tahun', id_kategori='$kategori', id_penulis='$penulis' WHERE id_buku='$id'");

        if ($update) {
        echo "<script>alert('Data buku berhasil diperbarui'); window.location='../pages/buku.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui data'); window.location='../pages/buku.php';</script>";
    }
}

if (isset($_GET['hapus'])) {
    $id = $_GET['id'];
    mysqli_query($conn, "DELETE FROM tb_buku WHERE id_buku='$id'");
    header("Location: ../pages/buku.php");
}
