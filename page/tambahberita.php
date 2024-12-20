<?php
include __DIR__ . '/../db/database.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['tambahberita'])) {
    $judul = $_POST['judul'];
    $isi_berita = $_POST['isi_berita'];
    $penulis = $_POST['penulis'];
    $tanggal_publikasi = $_POST['tanggal_publikasi'];

    // Tentukan tabel berdasarkan jenis transportasi

    $stmt = $conn->prepare("INSERT INTO berita (judul, isi_berita, penulis, tanggal_publikasi) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $judul, $isi_berita, $penulis, $tanggal_publikasi);

    if ($stmt->execute()) {
        $message = "Berita berhasil ditambahkan.";
    } else {
        $message = "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="../css/bootstrap.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <nav class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px; height: 100vh">
                <div class="d-flex flex-column align-items-center">
                    <h2 class="text-center text-light">Admin Dashboard</h2>
                    <ul class="nav flex-column mt-4 w-100">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="../page/admin.php">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="../page/tambahberita.php">Tambah Berita</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link text-white" href="../page/tambahjadwal.php">Tambah Jadwal</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1 class="h2">Welcome, Admin</h1>
                    <button class="btn btn-outline-danger">Logout</button>
                </div>
                <section id="schedule-section">
                    <div class="card shadow-sm">
                        <div class="card-header bg-warning text-white">
                            <h3 class="mb-0">Tambah Berita</h3>
                        </div>
                        <div class="card-body">
                            <form action="../page/tambahberita.php" method="post">
                                <div class="mb-3">
                                    <label for="noSeri" class="form-label">Judul</label>
                                    <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan judul" required>
                                </div>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Isi Berita</label>
                                    <textarea class="form-control" id="isi_berita" name="isi_berita" placeholder="Masukkan isi berita" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="asal" class="form-label">Penulis</label>
                                    <input type="text" class="form-control" id="penulis" name="penulis" placeholder="Masukkan penulis" required>
                                </div>
                                <div class="mb-3">
                                    <label for="keberangkatan" class="form-label">Tanggal Publikasi</label>
                                    <input type="date" class="form-control" id="tanggal_publikasi" name="tanggal_publikasi" required>
                                </div>
                                <button type="submit" class="btn btn-primary" name="tambahberita">Tambahkan Berita</button>
                            </form>
                        </div>
                        <?php if (isset($message)) { ?>
                            <div class="alert alert-info mt-3">
                                <?= htmlspecialchars($message) ?>
                            </div>
                        <?php } ?>
                    </div>
                </section>
            </main>
        </div>
    </div>
</body>
</html>

