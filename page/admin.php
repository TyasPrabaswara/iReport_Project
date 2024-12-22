<?php
$pageTitle = 'Admin Dashboard';
$additionalCSS = ['admin.css'];
include __DIR__ . '/../includes/header.php';

include __DIR__ . '/../db/database.php';

$table = '';
if (isset($_GET['jenisTransportasi'])) {
    $jenisTransportasi = $_GET['jenisTransportasi'];
    if ($jenisTransportasi == 'keretaApi') {
        $table = 'keretaApi';
    } elseif ($jenisTransportasi == 'KRL') {
        $table = 'KRL';
    } elseif ($jenisTransportasi == 'Bus') {
        $table = 'Bus';
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?></title>
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>

<body>
    <div class="container-fluid">
        <!-- Sidebar -->
        <div class="row">
            <nav class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px; height: 100vh">
                <div class="d-flex flex-column align-items-center">
                    <h2 class="text-center text-light">Admin Dashboard</h2>
                    <ul class="nav flex-column mt-4 w-100">
                        <li class="nav-item active">
                            <a class="nav-link text-white" href="admin.php">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="tambahberita.php">Tambah Berita</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="deletejadwal.php">Tambah Jadwal</a>
                        </li>

                    </ul>
                </div>
            </nav>


            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
                <!-- Dashboard Header -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1 class="h2">Welcome, Admin</h1>
                    <button class="btn btn-outline-danger">Logout</button>
                </div>

                <!-- Tambah Berita -->
                <a href="tambahberita.php" class="btn btn-primary btn-lg ">Tambah Berita</a>
                <!-- Tambah Jadwal -->
                <a href="tambahjadwal.php" class="btn btn-primary btn-lg ms-5">Tambah Jadwal</a>

                <form></form>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>