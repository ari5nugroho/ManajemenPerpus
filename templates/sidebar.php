<div class="bg-dark text-light sidebar p-3 vh-100" style="width:220px;">
    <h5 class="text-center">Menu</h5>
    <ul class="nav flex-column">
        <li class="nav-item"><a href="dashboard.php" class="nav-link text-light"><i class="bi bi-speedometer2"></i> Dashboard</a></li>
        <li>
            <a class="nav-link text-light" data-bs-toggle="collapse" href="#menuBuku" role="button">
                <i class="bi bi-book"></i> Buku
            </a>
            <div class="collapse" id="menuBuku">
                <ul class="nav flex-column ms-3">
                    <li class="nav-item"><a href="buku.php" class="nav-link text-light">Data Buku</a></li>
                    <li class="nav-item"><a href="tambah_buku.php" class="nav-link text-light">Tambah Buku</a></li>
                </ul>
            </div>
        </li>
        <div class="d-flex flex-column flex-shrink-0 p-3 text-light sidebar" style="width: 220px; height: 100vh; position: fixed;">
            <a href="dashboard.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <i class="bi bi-journal-bookmark-fill me-2"></i>
                <span class="fs-5">Perpustakaan</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="dashboard.php" class="nav-link text-white">
                        <i class="bi bi-speedometer2 me-2"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a class="nav-link text-white" data-bs-toggle="collapse" href="#menuBuku" role="button" aria-expanded="false" aria-controls="menuBuku">
                        <i class="bi bi-book me-2"></i> Buku
                        <i class="bi bi-chevron-down float-end"></i>
                    </a>
                    <div class="collapse" id="menuBuku">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small ms-3">
                            <li><a href="buku.php" class="nav-link text-white">Data Buku</a></li>
                            <li><a href="tambah_buku.php" class="nav-link text-white">Tambah Buku</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a class="nav-link text-white" data-bs-toggle="collapse" href="#menuKategori" role="button" aria-expanded="false" aria-controls="menuKategori">
                        <i class="bi bi-tags me-2"></i> Kategori
                        <i class="bi bi-chevron-down float-end"></i>
                    </a>
                    <div class="collapse" id="menuKategori">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small ms-3">
                            <li><a href="kategori.php" class="nav-link text-white">Data Kategori</a></li>
                            <li><a href="tambah_kategori.php" class="nav-link text-white">Tambah Kategori</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a class="nav-link text-white" data-bs-toggle="collapse" href="#menuPenulis" role="button" aria-expanded="false" aria-controls="menuPenulis">
                        <i class="bi bi-pencil-square me-2"></i> Penulis
                        <i class="bi bi-chevron-down float-end"></i>
                    </a>
                    <div class="collapse" id="menuPenulis">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small ms-3">
                            <li><a href="penulis.php" class="nav-link text-white">Data Penulis</a></li>
                            <li><a href="tambah_penulis.php" class="nav-link text-white">Tambah Penulis</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a class="nav-link text-white" data-bs-toggle="collapse" href="#menuPeminjam" role="button" aria-expanded="false" aria-controls="menuPeminjam">
                        <i class="bi bi-people-fill me-2"></i> Peminjam
                        <i class="bi bi-chevron-down float-end"></i>
                    </a>
                    <div class="collapse" id="menuPeminjam">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small ms-3">
                            <li><a href="peminjam.php" class="nav-link text-white">Data Peminjam</a></li>
                            <li><a href="tambah_peminjam.php" class="nav-link text-white">Tambah Peminjam</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a class="nav-link text-white" data-bs-toggle="collapse" href="#menuPeminjaman" role="button" aria-expanded="false" aria-controls="menuPeminjaman">
                        <i class="bi bi-box-arrow-in-right me-2"></i> Peminjaman
                        <i class="bi bi-chevron-down float-end"></i>
                    </a>
                    <div class="collapse" id="menuPeminjaman">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small ms-3">
                            <li><a href="peminjaman.php" class="nav-link text-white">Data Peminjaman</a></li>
                            <li><a href="tambah_peminjaman.php" class="nav-link text-white">Tambah Peminjaman</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>

    </ul>
</div>