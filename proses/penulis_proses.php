<?php
include '../config/koneksi.php';
if (isset($_POST['tambah'])) {
    $nama = $_POST['nama_penulis'];
    mysqli_query($conn, "INSERT INTO tb_penulis VALUES(null,'$nama')");
    header("Location: ../pages/penulis.php");
} 
if (isset($_POST['edit'])) {
    $id = $_POST['id_penulis'];
    $nama = $_POST['nama_penulis'];

    $update = mysqli_query($conn, "UPDATE tb_penulis SET nama_penulis = '$nama' WHERE id_penulis = '$id'");

    if ($update) {
        echo "<script>alert('Data penulis berhasil diperbarui'); window.location='../pages/penulis.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui data'); window.location='../pages/penulis.php';</script>";
    }
}

if (isset($_GET['hapus'])) {
    $id = $_GET['id'];
    mysqli_query($conn, "DELETE FROM tb_penulis WHERE id_penulis='$id'");
    header("Location: ../pages/penulis.php");
}
