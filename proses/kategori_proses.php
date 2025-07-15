<?php
include '../config/koneksi.php';

if (isset($_POST['tambah'])) {
    $nama = $_POST['nama_kategori'];
    mysqli_query($conn, "INSERT INTO tb_kategori VALUES(null,'$nama')");
    header("Location: ../pages/kategori.php");
}

if (isset($_POST['edit'])) {
    $id = $_POST['id_kategori'];
    $nama = $_POST['nama_kategori'];
    mysqli_query($conn, "UPDATE tb_kategori SET nama_kategori='$nama' WHERE id_kategori='$id'");
    header("Location: ../pages/kategori.php");
}

if (isset($_GET['hapus'])) {
    $id = $_GET['id'];
    mysqli_query($conn, "DELETE FROM tb_kategori WHERE id_kategori='$id'");
    header("Location: ../pages/kategori.php");
}
