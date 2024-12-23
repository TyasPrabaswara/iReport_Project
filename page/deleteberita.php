<?php
include __DIR__ . '/../db/database.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Siapkan query untuk menghapus data
    $sql = "DELETE FROM berita WHERE id_berita = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        // Redirect dengan pesan sukses
        header("Location: deleteberita.php?msg=delete_success");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

if (isset($_GET['msg'])) {
    if ($_GET['msg'] == 'delete_success') {
        $message = "<div class='alert alert-success'>Berita berhasil dihapus.</div>";
    } elseif ($_GET['msg'] == 'delete_error') {
        $message = "<div class='alert alert-danger'>Gagal menghapus berita.</div>";
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
            <nav class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px;">
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
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Hapus Berita</h1>
                    <a class="btn btn-primary" href="tambahberita.php">Tambah Berita</a>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-12">

                            <main>
                                <section class="daily-news">
                                    <?php
                                    $sql = 'SELECT * FROM berita';
                                    $result = $conn->query($sql); ?>
                                    <div class="container">
                                        <h2 class="text-start">Berita</h2>

                                        <table class="table table-hover">
                                            <thead class="table table-primary">
                                                <tr>
                                                    <th scope="col">Judul</th>
                                                    <th scope="col">Isi</th>
                                                    <th scope="col">Tanggal</th>
                                                    <th scope="col">Tindakan</th> <!-- Kolom Tindakan -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if ($result->num_rows > 0) {
                                                    while ($row = $result->fetch_assoc()) {
                                                        echo "<tr>";
                                                        echo "<td>" . htmlspecialchars($row['judul']) . "</td>";
                                                        echo "<td>" . htmlspecialchars($row['isi_berita']) . "</td>";
                                                        echo "<td>" . htmlspecialchars($row['tanggal_publikasi']) . "</td>";
                                                        echo "<td>
                <a href='editberita.php?id=" . $row['id_berita'] . "' class='btn btn-warning btn-sm'>Edit</a>
                <a href='deleteberita.php?id=" . $row['id_berita'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Apakah Anda yakin ingin menghapus berita ini?\")'>Hapus</a>
                                                             </td>";
                                                        echo "</tr>";
                                                    }
                                                } else {
                                                    echo "<tr><td colspan='4'>Tidak ada berita tersedia.</td></tr>";
                                                }
                                                ?>
                                            </tbody>

                                        </table>
                                </section>
                                <?php if (isset($message)) { ?>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-12">
                                                <?= $message ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </main>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>

</html>