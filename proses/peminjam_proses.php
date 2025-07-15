<?php
include '../config/koneksi.php';
if (isset($_POST['tambah'])) {
    $nama = $_POST['nama_peminjam'];
    $no = $_POST['no_hp'];
    $alamat = $_POST['alamat'];
    mysqli_query($conn, "INSERT INTO tb_peminjam VALUES(null,'$nama','$no','$alamat')");
    header("Location: ../pages/peminjam.php");
}
if (isset($_GET['hapus'])) {
    $id = $_GET['id'];
    mysqli_query($conn, "DELETE FROM tb_peminjam WHERE id_peminjam='$id'");
    header("Location: ../pages/peminjam.php");
}
