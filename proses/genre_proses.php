<?php
include '../config/koneksi.php';

if (isset($_POST['tambah'])) {
    $nama = $_POST['nama_genre'];
    $tambah = mysqli_query($conn, "INSERT INTO tb_genre (nama_genre) VALUES ('$nama')");
    header("Location: ../pages/genre.php");
}

if (isset($_POST['edit'])) {
    $id = $_POST['id_genre'];
    $nama = $_POST['nama_genre'];
    $edit = mysqli_query($conn, "UPDATE tb_genre SET nama_genre='$nama' WHERE id_genre=$id");
    header("Location: ../pages/genre.php");
}

if (isset($_GET['hapus'])) {
    $id = $_GET['id'];
    mysqli_query($conn, "DELETE FROM tb_genre WHERE id_genre=$id");
    header("Location: ../pages/genre.php");
}
