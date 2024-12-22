<?php
require_once 'db/database.php'; // Ensure the database connection is included
$pageTitle = 'History - iReport';
$paddingTop = 10; // You can dynamically set this based on conditions
echo "<style>main { padding-top: {$paddingTop}vh; }</style>";

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

//session_start();
$userId = $_SESSION['id_penumpang']; // Get the logged-in user's ID

// Fetch user history
$history = fetchUserReportHistory($userId);
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-9">
            <h3>Report History</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Report ID</th>
                        <th>Complaint Type</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th>Resolved Date</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($history['transportation']) || !empty($history['location'])): ?>
                        <?php foreach ($history['transportation'] as $report): ?>
                            <tr>
                                <td><?= htmlspecialchars($report['id_laporan']) ?></td>
                                <td><?= htmlspecialchars($report['jenis_keluhan']) ?></td>
                                <td><?= htmlspecialchars($report['deskripsi_keluhan']) ?></td>
                                <td><?= htmlspecialchars($report['tanggal_laporan']) ?></td>
                                <td><?= htmlspecialchars($report['tanggal_perubahan']) ?></td>
                                <td><a href="index.php?page=viewReport&id=<?= urlencode($report['id_laporan']) ?>&type=transportation">View</a></td>
                            </tr>
                        <?php endforeach; ?>
                        <?php foreach ($history['location'] as $report): ?>
                            <tr>
                                <td><?= htmlspecialchars($report['id_laporan']) ?></td>
                                <td><?= htmlspecialchars($report['jenis_keluhan']) ?></td>
                                <td><?= htmlspecialchars($report['deskripsi_keluhan']) ?></td>
                                <td><?= htmlspecialchars($report['tanggal_laporan']) ?></td>
                                <td><?= htmlspecialchars($report['tanggal_perubahan']) ?></td>
                                <td><a href="index.php?page=viewReport&id=<?= urlencode($report['id_laporan']) ?>&type=location">View</a></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr><td colspan="6">No reports found.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php $conn->close(); ?>
