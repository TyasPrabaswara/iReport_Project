<!-- include navbarMenuItems -->
<!-- include navbarHistory -->

<?php
$pageTitle = 'History - iReport';

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

error_log("Including reportFunctions.php");

// Prevent multiple inclusions
// require_once __DIR__ . './db/database.php'; // Use require_once here

?>

<div class="tab-pane fade" id="history" role="tabpanel" aria-labelledby="history-tab">
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
            <?php
            $userId = $_SESSION['id_penumpang']; // Get the logged-in user's ID
            $history = fetchUserReportHistory($userId);

            // Display transportation history
            foreach ($history['transportation'] as $report) {
                echo "<tr>";
                echo "<td>{$report['id_laporan']}</td>";
                echo "<td>{$report['jenis_keluhan']}</td>";
                echo "<td>{$report['deskripsi_keluhan']}</td>";
                echo "<td>{$report['tanggal_laporan']}</td>";
                echo "<td>{$report['tanggal_perubahan']}</td>";
                echo "<td><a href='viewReport.php?id={$report['id_laporan']}&type=transportation'>View</a></td>";
                echo "</tr>";
            }

            // Display location history
            foreach ($history['location'] as $report) {
                echo "<tr>";
                echo "<td>{$report['id_laporan']}</td>";
                echo "<td>{$report['jenis_keluhan']}</td>";
                echo "<td>{$report['deskripsi_keluhan']}</td>";
                echo "<td>{$report['tanggal_laporan']}</td>";
                echo "<td>{$report['tanggal_perubahan']}</td>";
                echo "<td><a href='viewReport.php?id={$report['id_laporan']}&type=location'>View</a></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php $conn->close(); ?>