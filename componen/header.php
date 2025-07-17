<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Perpustakaan Digital</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap & Icon -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-primary bg-primary shadow-sm fixed-top" style="z-index: 1040;">
        <div class="container-fluid px-4">
            <button class="btn text-white me-2" id="toggleSidebar"><i class="bi bi-list fs-4"></i></button>
            <span class="navbar-brand text-white fw-bold">Perpustakaan Digital</span>
            <div class="ms-auto d-flex align-items-center">

                <!-- Form search -->
                <form action="buku.php" method="GET" class="d-none d-md-block me-3">
                    <input type="text" name="cari" class="form-control form-control-sm rounded" placeholder="Search buku...">
                </form>

                <!-- Notifikasi -->
                <i class="bi bi-bell text-white fs-5 me-3"></i>

                <!-- Dropdown User -->
                <div class="dropdown">
                    <button class="btn btn-sm text-white dropdown-toggle d-flex align-items-center" type="button" id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle fs-5"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end shadow-sm" aria-labelledby="dropdownUser">
                        <li><a class="dropdown-item" href="profile.php"><i class="bi bi-person me-2"></i>Profil</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item text-danger" href="../logout.php"><i class="bi bi-box-arrow-right me-2"></i>Logout</a></li>
                    </ul>
                </div>

            </div>
        </div>
    </nav>