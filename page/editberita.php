<?php
$pageTitle = 'Edit Berita - iReport';
$additionalCSS = ['editjadwal.css'];
include 'includes/header.php';

include __DIR__ . '/../db/database.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM berita WHERE id_berita = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        header("Location: deleteberita.php");
        exit;
    }
    $stmt->close();
} else {
    header("Location: deleteberita.php");
    exit;
}

if (isset($_POST['submit'])) {
    $judul = $_POST['judul'];
    $isi_berita = $_POST['isi_berita'];
    $tanggal_publikasi = $_POST['tanggal_publikasi'];
    $penulis = $_POST['penulis'];

    $sql = "UPDATE berita SET judul = ?, isi_berita = ?, tanggal_publikasi = ?, penulis = ? WHERE id_berita = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $judul, $isi_berita, $tanggal_publikasi, $penulis, $id);

    if ($stmt->execute()) {
        header("Location: deleteberita.php");
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Berita</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>

<body>
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
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h2">Edit Jadwal</h1>
                <button class="btn btn-outline-danger">Logout</button>
            </div>
            <section class="container">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul" value="<?= htmlspecialchars($row['judul']) ?>">
                    </div>
                    <div class="mb-3">
                        <label for="isi_berita" class="form-label">Isi Berita</label>
                        <textarea class="form-control" id="isi_berita" name="isi_berita" rows="10"><?= htmlspecialchars($row['isi_berita']) ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_publikasi" class="form-label">Tanggal Publikasi</label>
                        <input type="date" class="form-control" id="tanggal_publikasi" name="tanggal_publikasi" value="<?= htmlspecialchars($row['tanggal_publikasi']) ?>">
                    </div>
                    <div class="mb-3">
                        <label for="penulis" class="form-label">Penulis</label>
                        <input type="text" class="form-control" id="penulis" name="penulis" value="<?= htmlspecialchars($row['penulis']) ?>">
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
                </form>
            </section>
        </main>
    </div>
</body>

</html>