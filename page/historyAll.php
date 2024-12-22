<!-- include navbarMenuItems -->
<!-- include navbarHistory -->

<?php
$pageTitle = 'History - iReport';
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
                echo "<td>{$report['resolved_date']}</td>";
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
                echo "<td>{$report['resolved_date']}</td>";
                echo "<td><a href='viewReport.php?id={$report['id_laporan']}&type=location'>View</a></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php $conn->close(); ?>