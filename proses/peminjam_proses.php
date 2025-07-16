<?php
include '../config/koneksi.php';
if (isset($_POST['tambah'])) {
    $nama = $_POST['nama_peminjam'];
    $no = $_POST['no_hp'];
    $alamat = $_POST['alamat'];
    mysqli_query($conn, "INSERT INTO tb_peminjam VALUES(null,'$nama','$no','$alamat')");
    header("Location: ../pages/peminjam.php");
}
if (isset($_POST['edit'])) {
    $id     = $_POST['id_peminjam'];
    $nama   = $_POST['nama_peminjam'];
    $no_hp  = $_POST['no_hp'];
    $alamat = $_POST['alamat'];

    $update = mysqli_query($conn, "UPDATE tb_peminjam SET 
        nama_peminjam = '$nama', 
        no_hp = '$no_hp', 
        alamat = '$alamat' 
        WHERE id_peminjam = '$id'");

    if ($update) {
        echo "<script>alert('Data peminjam berhasil diperbarui'); window.location='../pages/peminjam.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui data'); window.location='../pages/peminjam.php';</script>";
    }
}

if (isset($_GET['hapus'])) {
    $id = $_GET['id'];
    mysqli_query($conn, "DELETE FROM tb_peminjam WHERE id_peminjam='$id'");
    header("Location: ../pages/peminjam.php");
}
