<?php
include __DIR__ . '/../db/database.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['tambahjadwal'])) {
    $jenisTransportasi = $_POST['jenisTransportasi'];
    $noSeri = $_POST['noSeri'];
    $nama = $_POST['nama'];
    $asal = $_POST['asal'];
    $tujuan = $_POST['tujuan'];
    $keberangkatan = $_POST['keberangkatan'];
    $kedatangan = $_POST['kedatangan'];

    // Tentukan tabel berdasarkan jenis transportasi
    $table = '';
    if ($jenisTransportasi == 'keretaApi') {
        $table = 'keretaApi';
    } elseif ($jenisTransportasi == 'KRL') {
        $table = 'KRL';
    } elseif ($jenisTransportasi == 'Bus') {
        $table = 'Bus';
    }

    if ($table) {
        $stmt = $conn->prepare("INSERT INTO $table (noSeri, nama, asal, tujuan, keberangkatan, kedatangan) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $noSeri, $nama, $asal, $tujuan, $keberangkatan, $kedatangan);

        if ($stmt->execute()) {
            $message = "Jadwal berhasil ditambahkan";
        } else {
            $message = "Error: " . $stmt->error;
        }

        $stmt->close();
    }
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
                    <a href="../page/deletejadwal.php" class="btn btn-outline-danger">Hapus Jadwal</a>
                </div>
                <section id="schedule-section">
                    <div class="card shadow-sm">
                        <div class="card-header bg-info text-white">
                            <h3 class="mb-0">Tambah Jadwal</h3>
                        </div>
                        <div class="card-body">
                            <form action="../page/tambahjadwal.php" method="post">
                                <div class="mb-3">
                                    <label for="jenisTransportasi" class="form-label">Jenis Transportasi</label>
                                    <select class="form-select" id="jenisTransportasi" name="jenisTransportasi" required>
                                        <option value="keretaApi">Kereta Api</option>
                                        <option value="KRL">KRL</option>
                                        <option value="Bus">Bus</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="noSeri" class="form-label">No Seri</label>
                                    <input type="text" class="form-control" id="noSeri" name="noSeri" placeholder="Masukkan no seri" required>
                                </div>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama" required>
                                </div>
                                <div class="mb-3">
                                    <label for="asal" class="form-label">Asal</label>
                                    <input type="text" class="form-control" id="asal" name="asal" placeholder="Masukkan asal" required>
                                </div>
                                <div class="mb-3">
                                    <label for="tujuan" class="form-label">Tujuan</label>
                                    <input type="text" class="form-control" id="tujuan" name="tujuan" placeholder="Masukkan tujuan" required>
                                </div>
                                <div class="mb-3">
                                    <label for="keberangkatan" class="form-label">Keberangkatan</label>
                                    <input type="datetime-local" class="form-control" id="keberangkatan" name="keberangkatan" required>
                                </div>
                                <div class="mb-3">
                                    <label for="kedatangan" class="form-label">Kedatangan</label>
                                    <input type="datetime-local" class="form-control" id="kedatangan" name="kedatangan" required>
                                </div>
                                <button type="submit" class="btn btn-primary" name="tambahjadwal">Tambahkan Jadwal</button>
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