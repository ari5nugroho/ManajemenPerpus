<?php $page = basename($_SERVER['PHP_SELF']); ?>
<div id="sidebar" class="bg-white border-end vh-100 position-fixed" style="width: 250px; top: 56px;">
    <div class="p-3">
        <h5 class="fw-bold text-primary mb-4 mt-2">📚 Perpustakaan</h5>
        <ul class="nav flex-column">
            <li class="nav-item mt-2">
                <a href="dashboard.php" class="nav-link <?= ($page == 'dashboard.php') ? 'active text-primary fw-semibold' : 'text-dark' ?>">
                    <i class="bi bi-house-door me-2"></i> Dashboard
                </a>
            </li>
            <li class="nav-item mt-2">
                <a href="buku.php" class="nav-link <?= ($page == 'buku.php' || $page == 'tambah_buku.php' || $page == 'edit_buku.php') ? 'active text-primary fw-semibold' : 'text-dark' ?>">
                    <i class="bi bi-book me-2"></i> Buku
                </a>
            </li>
            <li class="nav-item mt-2">
                <a href="kategori.php" class="nav-link <?= ($page == 'kategori.php' || $page == 'tambah_kategori.php' || $page == 'edit_kategori.php') ? 'active text-primary fw-semibold' : 'text-dark' ?>">
                    <i class="bi bi-tags me-2"></i> Kategori
                </a>
            </li>
            <li class="nav-item mt-2">
                <a href="genre.php" class="nav-link <?= ($page == 'genre.php' || $page == 'tambah_genre.php' || $page == 'edit_genre.php') ? 'active text-primary fw-semibold' : 'text-dark' ?>">
                    <i class="bi bi-film me-2"></i> Genre
                </a>
            </li>
            <li class="nav-item mt-2">
                <a href="penulis.php" class="nav-link <?= ($page == 'penulis.php' || $page == 'tambah_penulis.php' || $page == 'edit_penulis.php') ? 'active text-primary fw-semibold' : 'text-dark' ?>">
                    <i class="bi bi-pencil me-2"></i> Penulis
                </a>
            </li>
            <li class="nav-item mt-2">
                <a href="peminjam.php" class="nav-link <?= ($page == 'peminjam.php' || $page == 'tambah_peminjam.php' || $page == 'edit_peminjam.php') ? 'active text-primary fw-semibold' : 'text-dark' ?>">
                    <i class="bi bi-people me-2"></i> Peminjam
                </a>
            </li>
            <li class="nav-item mt-2">
                <a href="peminjaman.php" class="nav-link <?= ($page == 'peminjaman.php' || $page == 'tambah_peminjaman.php' || $page == 'edit_peminjaman.php') ? 'active text-primary fw-semibold' : 'text-dark' ?>">
                    <i class="bi bi-arrow-left-right me-2"></i> Peminjaman
                </a>
            </li>
        </ul>
    </div>
</div>