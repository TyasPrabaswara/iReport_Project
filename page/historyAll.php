<!-- include navbarMenuItems -->
<!-- include navbarHistory -->

<?php
$pageTitle = 'History - iReport';
?>
<main>
    <div class="tab-pane fade" id="history" role="tabpanel" aria-labelledby="history-tab">
        <h3>Report History</h3>
        <!-- <table class="table table-bordered">
          
        </table> -->

        <table>
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
                // Start session and get the logged-in user's ID
                session_start();
                $userId = $_SESSION['id_penumpang'];

                // Fetch user report history
                $history = fetchUserReportHistory($userId);

                // Check if history is not empty
                if ($history) {
                    // Display transportation history
                    foreach ($history['transportation'] as $report) {
                        echo "<tr>";
                        echo "<td>{$report['id_laporan']}</td>";
                        echo "<td>{$report['jenis_keluhan']}</td>";
                        echo "<td>{$report['deskripsi_keluhan']}</td>";
                        echo "<td>{$report['tanggal_laporan']}</td>";
                        // echo "<td>{$report['resolved_date']}</td>";
                        // echo "<td><a href='viewReport.php?id={$report['id_laporan']}&type=transportation'>View</a></td>";
                        echo "</tr>";
                    }

                    // Display location history
                    foreach ($history['location'] as $report) {
                        echo "<tr>";
                        echo "<td>{$report['id_laporan']}</td>";
                        echo "<td>{$report['jenis_keluhan']}</td>";
                        echo "<td>{$report['deskripsi_keluhan']}</td>";
                        echo "<td>{$report['tanggal_laporan']}</td>";
                        // echo "<td>{$report['resolved_date']}</td>";
                        // echo "<td><a href='viewReport.php?id={$report['id_laporan']}&type=location'>View</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No report history found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

</main>

<?php
// Close the database connection
$conn->close();
?>