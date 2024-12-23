<?php
$pageTitle = 'Admin Dashboard';
$additionalCSS = ['admin.css'];
include __DIR__ . '/../includes/header.php';

include __DIR__ . '/../db/database.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM keretaApi WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        $message = "Jadwal berhasil dihapus.";
    } else {
        $message = "Gagal menghapus jadwal: " . $stmt->error;
    }
    $stmt->close();

    $sql = "DELETE FROM KRL WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        $message = "Jadwal berhasil dihapus.";
    } else {
        $message = "Gagal menghapus jadwal: " . $stmt->error;
    }
    $stmt->close();

    $sql = "DELETE FROM Bus WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        $message = "Jadwal berhasil dihapus.";
    } else {
        $message = "Gagal menghapus jadwal: " . $stmt->error;
    }
    $stmt->close();
}

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
                            <a class="nav-link text-white" href="deleteberita.php">Berita</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="deletejadwal.php">Jadwal</a>
                        </li>
                        <li>
                            <a class="nav-link text-white" href="editCS.php">Customers Service</a>
                        </li>

                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Hapus Jadwal</h1>
                    <a class="btn btn-primary" href="tambahjadwal.php">Tambah Jadwal</a>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-12">

                            <main>
                                <section class="hero">
                                    <div class="hero-overlay"></div>
                                    <h1>Jadwal</h1>
                                </section>

                                <section class="daily-news">
                                    <?php
                                    $sql = 'SELECT * FROM keretaApi';
                                    $result = $conn->query($sql); ?>
                                    <div class="container">
                                        <h2 class="text-start">Kereta Api</h2>


                                        <table class="table table-hover">
                                            <thead class="table table-primary">
                                                <tr>
                                                    <th scope="col">Nomor Seri</th>
                                                    <th scope="col">Nama</th>
                                                    <th scope="col">Asal</th>
                                                    <th scope="col">Tujuan</th>
                                                    <th scope="col">Keberangkatan</th>
                                                    <th scope="col">Kedatangan</th>
                                                    <th scope="col">Tindakan</th> <!-- Kolom Tindakan -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if ($result->num_rows > 0) {
                                                    while ($row = $result->fetch_assoc()) {
                                                        echo "<tr>";
                                                        echo "<td>" . htmlspecialchars($row['noSeri']) . "</td>";
                                                        echo "<td>" . htmlspecialchars($row['nama']) . "</td>";
                                                        echo "<td>" . htmlspecialchars($row['asal']) . "</td>";
                                                        echo "<td>" . htmlspecialchars($row['tujuan']) . "</td>";
                                                        echo "<td>" . htmlspecialchars($row['keberangkatan']) . "</td>";
                                                        echo "<td>" . htmlspecialchars($row['kedatangan']) . "</td>";
                                                        echo "<td>
                <a href='editJadwalKereta.php?id=" . $row['id'] . "' class='btn btn-warning btn-sm'>Edit</a>
                <a href='deletejadwal.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Apakah Anda yakin ingin menghapus jadwal ini?\")'>Hapus</a>
                                                             </td>";
                                                        echo "</tr>";
                                                    }
                                                } else {
                                                    echo "<tr><td colspan='7'>Tidak ada jadwal tersedia.</td></tr>";
                                                }
                                                ?>
                                            </tbody>

                                        </table>
                                </section>
                                <section class="daily-news">
                                    <?php
                                    $sql = 'SELECT * FROM KRL';
                                    $result = $conn->query($sql); ?>
                                    <div class="container">
                                        <h2 class="text-start">KRL</h2>


                                        <table class="table table-hover">
                                            <thead class="table table-primary">
                                                <tr>
                                                    <th scope="col">Nomor Seri</th>
                                                    <th scope="col">Nama</th>
                                                    <th scope="col">Asal</th>
                                                    <th scope="col">Tujuan</th>
                                                    <th scope="col">Keberangkatan</th>
                                                    <th scope="col">Kedatangan</th>
                                                    <th scope="col">Tindakan</th> <!-- Kolom Tindakan -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if ($result->num_rows > 0) {
                                                    while ($row = $result->fetch_assoc()) {
                                                        echo "<tr>";
                                                        echo "<td>" . htmlspecialchars($row['noSeri']) . "</td>";
                                                        echo "<td>" . htmlspecialchars($row['nama']) . "</td>";
                                                        echo "<td>" . htmlspecialchars($row['asal']) . "</td>";
                                                        echo "<td>" . htmlspecialchars($row['tujuan']) . "</td>";
                                                        echo "<td>" . htmlspecialchars($row['keberangkatan']) . "</td>";
                                                        echo "<td>" . htmlspecialchars($row['kedatangan']) . "</td>";
                                                        echo "<td>
                <a href='editJadwalKRL.php?id=" . $row['id'] . "' class='btn btn-warning btn-sm'>Edit</a>
                <a href='deletejadwal.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Apakah Anda yakin ingin menghapus jadwal ini?\")'>Hapus</a>
                                                            </td>";
                                                        echo "</tr>";
                                                    }
                                                } else {
                                                    echo "<tr><td colspan='7'>Tidak ada jadwal tersedia.</td></tr>";
                                                }
                                                ?>
                                            </tbody>

                                        </table>
                                </section>
                                <section class="daily-news">
                                    <?php
                                    $sql = 'SELECT * FROM Bus';
                                    $result = $conn->query($sql); ?>
                                    <div class="container">
                                        <h2 class="text-start">Bus</h2>


                                        <table class="table table-hover">
                                            <thead class="table table-primary">
                                                <tr>
                                                    <th scope="col">Nomor Seri</th>
                                                    <th scope="col">Nama</th>
                                                    <th scope="col">Asal</th>
                                                    <th scope="col">Tujuan</th>
                                                    <th scope="col">Keberangkatan</th>
                                                    <th scope="col">Kedatangan</th>
                                                    <th scope="col">Tindakan</th> <!-- Kolom Tindakan -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if ($result->num_rows > 0) {
                                                    while ($row = $result->fetch_assoc()) {
                                                        echo "<tr>";
                                                        echo "<td>" . htmlspecialchars($row['noSeri']) . "</td>";
                                                        echo "<td>" . htmlspecialchars($row['nama']) . "</td>";
                                                        echo "<td>" . htmlspecialchars($row['asal']) . "</td>";
                                                        echo "<td>" . htmlspecialchars($row['tujuan']) . "</td>";
                                                        echo "<td>" . htmlspecialchars($row['keberangkatan']) . "</td>";
                                                        echo "<td>" . htmlspecialchars($row['kedatangan']) . "</td>";
                                                        echo "<td>

                <a href='editJadwalBus.php?id=" . $row['id'] . "'><button class='btn btn-warning btn-sm'>Edit</button></a>
                <a href='deletejadwal.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Apakah Anda yakin ingin menghapus jadwal ini?\")'>Hapus</a>
                                                             </td>";
                                                        echo "</tr>";
                                                    }
                                                } else {
                                                    echo "<tr><td colspan='7'>Tidak ada jadwal tersedia.</td></tr>";
                                                }
                                                ?>
                                            </tbody>

                                        </table>
                                </section>
                                <?php if (isset($message)) { ?>
                                    <div class="alert alert-info mt-3">
                                        <?= htmlspecialchars($message) ?>
                                    </div>
                                <?php } ?>
                            </main>