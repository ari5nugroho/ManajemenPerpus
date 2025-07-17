<?php
include '../config/koneksi.php';

if (isset($_POST['tambah'])) {
    $id_buku = $_POST['id_buku'];
    $id_peminjam = $_POST['id_peminjam'];
    $tgl_pinjam = $_POST['tanggal_pinjam'];
    $tgl_kembali = $_POST['tanggal_kembali'];
    mysqli_query($conn, "INSERT INTO tb_peminjaman (id_buku, id_peminjam, tanggal_pinjam, tanggal_kembali, status) 
    VALUES('$id_buku', '$id_peminjam', '$tgl_pinjam', '$tgl_kembali', 'Dipinjam')");

    header("Location: ../pages/peminjaman.php");
}
if (isset($_POST['edit'])) {
    $id = $_POST['id_peminjaman'];
    $id_buku = $_POST['id_buku'];
    $id_peminjam = $_POST['id_peminjam'];
    $tgl_pinjam = $_POST['tanggal_pinjam'];
    $tgl_kembali = $_POST['tanggal_kembali'];

    $update = mysqli_query($conn, "UPDATE tb_peminjaman SET 
        id_buku = '$id_buku', 
        id_peminjam = '$id_peminjam', 
        tanggal_pinjam = '$tgl_pinjam', 
        tanggal_kembali = '$tgl_kembali' 
        WHERE id_peminjaman = '$id'
    ");

    if ($update) {
        echo "<script>alert('Data peminjaman berhasil diperbarui'); window.location='../pages/peminjaman.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui data'); window.location='../pages/peminjaman.php';</script>";
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['status'], $_POST['id_peminjaman'])) {
    $id = $_POST['id_peminjaman'];
    $status = $_POST['status'];

    $update = mysqli_query($conn, "UPDATE tb_peminjaman SET status = '$status' WHERE id_peminjaman = '$id'");

    if ($update) {
        header("Location: ../pages/peminjaman.php?pesan=update_sukses");
    } else {
        header("Location: ../pages/peminjaman.php?pesan=update_gagal");
    }
    exit;
}

if (isset($_GET['hapus'])) {
    $id = $_GET['id'];
    mysqli_query($conn, "DELETE FROM tb_peminjaman WHERE id_peminjaman='$id'");
    header("Location: ../pages/peminjaman.php");
}
