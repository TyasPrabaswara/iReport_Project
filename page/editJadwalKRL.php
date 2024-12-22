<?php
include __DIR__ . '/../db/database.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM KRL WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();
    $stmt->close();
}

if (isset($_POST['update'])) {
    $noSeri = $_POST['noSeri'];
    $nama = $_POST['nama'];
    $asal = $_POST['asal'];
    $tujuan = $_POST['tujuan'];
    $keberangkatan = $_POST['keberangkatan'];
    $kedatangan = $_POST['kedatangan'];

    $sql = "UPDATE KRL SET noSeri=?, nama=?, asal=?, tujuan=?, keberangkatan=?, kedatangan=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssi", $noSeri, $nama, $asal, $tujuan, $keberangkatan, $kedatangan, $id);
    if ($stmt->execute()) {
        header("Location: editjadwalKRL.php?msg=update_success&id=" . $id);
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Jadwal</title>
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
            <form method="POST">
                <div class="mb-3">
                    <label for="noSeri" class="form-label">No Seri</label>
                    <input type="text" class="form-control" id="noSeri" name="noSeri" value="<?php echo htmlspecialchars($data['noSeri']); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo htmlspecialchars($data['nama']); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="asal" class="form-label">Asal</label>
                    <input type="text" class="form-control" id="asal" name="asal" value="<?php echo htmlspecialchars($data['asal']); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="tujuan" class="form-label">Tujuan</label>
                    <input type="text" class="form-control" id="tujuan" name="tujuan" value="<?php echo htmlspecialchars($data['tujuan']); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="keberangkatan" class="form-label">Keberangkatan</label>
                    <input type="datetime-local" class="form-control" id="keberangkatan" name="keberangkatan" value="<?php echo htmlspecialchars($data['keberangkatan']); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="kedatangan" class="form-label">Kedatangan</label>
                    <input type="datetime-local" class="form-control" id="kedatangan" name="kedatangan" value="<?php echo htmlspecialchars($data['kedatangan']); ?>" required>
                </div>
                <button type="submit" class="btn btn-primary" name="update">Update Jadwal</button>
            </form>
            <br>
            <?php
            if (isset($_GET['msg'])) {
                $msg = $_GET['msg'];
                if ($msg == 'update_success') {
                    echo "<div class='alert alert-success'>Jadwal berhasil diupdate!</div>";
                }
            }
            ?>
        </main>

    </div>
</body>

</html>