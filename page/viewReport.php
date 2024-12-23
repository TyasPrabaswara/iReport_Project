<?php
require_once 'db/database.php'; // Include database connection
//session_start();
$paddingTop = 5; // You can dynamically set this based on conditions
echo "<style>main { padding-top: {$paddingTop}vh; }</style>";

if (isset($_GET['id']) && isset($_GET['type'])) {
    $id = $_GET['id'];
    $type = $_GET['type'];

    // Validate type and prepare the query
    if ($type === 'transportation') {
        $stmt = $conn->prepare("
            SELECT id_laporan AS laporan_id, jenis_keluhan, deskripsi_keluhan, tanggal_laporan, id_transportasi, media_laporan
            FROM laporan_transportasi
            WHERE id_laporan = ?
        ");
    } elseif ($type === 'location') {
        $stmt = $conn->prepare("
            SELECT id_laporan AS laporan_id, jenis_keluhan, deskripsi_keluhan, tanggal_laporan, id_lokasi, media_laporan
            FROM laporan_lokasi
            WHERE id_laporan = ?
        ");
    } else {
        die("Invalid report type.");
    }

    // Execute query
    $stmt->bind_param('s', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $report = $result->fetch_assoc();

    if ($report) {
        ?>
        <div class="container mt-4">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title text-center">Report Details</h1>
                    <hr>
                    <p><strong>ID:</strong> <?= htmlspecialchars($report['laporan_id']) ?></p>
                    <p><strong>Type:</strong> <?= htmlspecialchars($report['jenis_keluhan']) ?></p>
                    <p><strong>Description:</strong> <?= htmlspecialchars($report['deskripsi_keluhan']) ?></p>
                    <p><strong>Date:</strong> <?= htmlspecialchars($report['tanggal_laporan']) ?></p>
                    <?php if ($type === 'transportation'): ?>
                        <p><strong>Transport ID:</strong> <?= htmlspecialchars($report['id_transportasi']) ?></p>
                    <?php else: ?>
                        <p><strong>Location ID:</strong> <?= htmlspecialchars($report['id_lokasi']) ?></p>
                    <?php endif; ?>
                    <p><strong>Media:</strong> <a href="<?= htmlspecialchars($report['media_laporan']) ?>" target="_blank">View Media</a></p>
                    <a href="index.php?page=historyAll" class="btn btn-primary mt-3">Back to History</a>
                </div>
            </div>
        </div>
        <?php
    } else {
        echo "<div class='container mt-4'><div class='alert alert-danger'>Report not found.</div></div>";
    }
} else {
    //echo "<div class='container mt-4'><div class='alert alert-danger'>Missing report ID or type.</div></div>";
}
?>
