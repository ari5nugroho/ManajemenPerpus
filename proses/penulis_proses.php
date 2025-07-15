<?php
include '../config/koneksi.php';
if (isset($_POST['tambah'])) {
    $nama = $_POST['nama_penulis'];
    mysqli_query($conn, "INSERT INTO tb_penulis VALUES(null,'$nama')");
    header("Location: ../pages/penulis.php");
}
if (isset($_GET['hapus'])) {
    $id = $_GET['id'];
    mysqli_query($conn, "DELETE FROM tb_penulis WHERE id_penulis='$id'");
    header("Location: ../pages/penulis.php");
}
