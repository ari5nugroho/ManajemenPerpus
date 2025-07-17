<?php
include '../config/koneksi.php';

if (isset($_POST['tambah'])) {
    $judul = $_POST['judul_buku'];
    $tahun = $_POST['tahun_terbit'];
    $kategori = $_POST['id_kategori'];
    $penulis = $_POST['id_penulis'];
    $genre = $_POST['genre'] ?? [];

    $simpan = mysqli_query($conn, "INSERT INTO tb_buku (judul_buku, tahun_terbit, id_kategori, id_penulis)
                VALUES ('$judul', '$tahun', '$kategori', '$penulis')");

    if ($simpan) {
        $id_baru = mysqli_insert_id($conn);
        foreach ($genre as $g) {
            mysqli_query($conn, "INSERT INTO tb_buku_genre (id_buku, id_genre) VALUES ('$id_baru', '$g')");
        }
    }
    header("Location: ../pages/buku.php");
}

if (isset($_POST['update'])) {
    $id = $_POST['id_buku'];
    $judul = $_POST['judul_buku'];
    $tahun = $_POST['tahun_terbit'];
    $kategori = $_POST['id_kategori'];
    $penulis = $_POST['id_penulis'];
    $genre = $_POST['genre'] ?? [];

    $update = mysqli_query($conn, "UPDATE tb_buku SET 
        judul_buku='$judul',
        tahun_terbit='$tahun',
        id_kategori='$kategori',
        id_penulis='$penulis'
        WHERE id_buku='$id'
    ");

    if ($update) {
        mysqli_query($conn, "DELETE FROM tb_buku_genre WHERE id_buku='$id'");

        foreach ($genre as $g) {
            mysqli_query($conn, "INSERT INTO tb_buku_genre (id_buku, id_genre) VALUES ('$id', '$g')");
        }

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
