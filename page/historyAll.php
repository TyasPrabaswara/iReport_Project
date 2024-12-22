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

    <?php
    // Check if both transportation and location history are empty
    if (empty($history['transportation']) && empty($history['location'])) {
        echo "<p>No report history available.</p>"; // Message if no reports are found
    } else {
        // If there is data, display the table
        echo '<table class="table table-bordered">
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
                <tbody>';

        // Display transportation history
        foreach ($history['transportation'] as $report) {
            echo "<tr>";
            echo "<td>{$report['id_laporan']}</td>";
            echo "<td>{$report['jenis_keluhan']}</td>";
            echo "<td>{$report['deskripsi_keluhan']}</td>";
            echo "<td>{$report['tanggal_laporan']}</td>";
            echo "<td>{$report['resolved_date']}</td>";
            echo '<td><a href="viewReport.php?id=' . $report['id_laporan'] . '&type=transportation">View</a></td>';
            echo "</tr>";
        }

        // Display location history
        foreach ($history['location'] as $report) {
            echo "<tr>";
            echo "<td>{$report['id_laporan']}</td>";
            echo "<td>{$report['jenis_keluhan']}</td>";
            echo "<td>{$report['deskripsi_keluhan']}</td>";
            echo "<td>{$report['tanggal_laporan']}</td>";
            echo "<td>{$report['resolved_date']}</td>";
            echo '<td><a href="viewReport.php?id=' . $report['id_laporan'] . '&type=location">View</a></td>';
            echo "</tr>";
        }

        echo '</tbody></table>';
    }
    ?>

</div>

<?php $conn->close(); ?>
