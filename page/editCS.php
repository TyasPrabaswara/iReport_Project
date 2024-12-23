<?php
include __DIR__ . '/../db/database.php';

// Mendapatkan semua keluhan
$sql = "SELECT * FROM pengaduan";
$result = $conn->query($sql);

// Pesan umpan balik
$feedbackMessage = isset($message) ? "<div class='alert alert-$feedbackType text-center'>$message</div>" : "";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Keluhan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="row">
        <nav class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px;">
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
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h2">Welcome, Admin</h1>
            </div>
            <div class="container my-5">
                <h1 class="text-center">Dashboard Keluhan</h1>
                <?= $feedbackMessage ?>

                <div class="table-responsive mt-4">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Telepon</th>
                                <th>Tanggal</th>
                                <th>Pesan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($result && $result->num_rows > 0): ?>
                                <?php while ($row = $result->fetch_assoc()): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($row['id']) ?></td>
                                        <td><?= htmlspecialchars($row['nama']) ?></td>
                                        <td><?= htmlspecialchars($row['email']) ?></td>
                                        <td><?= htmlspecialchars($row['tel']) ?></td>
                                        <td><?= htmlspecialchars($row['tanggal']) ?></td>
                                        <td><?= nl2br(htmlspecialchars($row['pesan'])) ?></td>
                                    </tr>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="7" class="text-center">Tidak ada keluhan yang tersedia.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>