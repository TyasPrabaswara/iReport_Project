<?php
$pageTitle = "Dashboard";

?>

<div class="container mt-5">
        <h1 class="text-center mb-4">Admin Dashboard</h1>
        <ul class="nav nav-tabs" id="reportTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="location-tab" data-bs-toggle="tab" data-bs-target="#location" type="button" role="tab" aria-controls="location" aria-selected="true">Location Reports</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="transportation-tab" data-bs-toggle="tab" data-bs-target="#transportation" type="button" role="tab" aria-controls="transportation" aria-selected="false">Transportation Reports</button>
            </li>
        </ul>
        <div class="tab-content mt-3" id="reportTabsContent">
            <!-- Location Reports Tab -->
            <div class="tab-pane fade show active" id="location" role="tabpanel" aria-labelledby="location-tab">
                <h3>Location Reports</h3>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Passenger ID</th>
                            <th>Complaint Type</th>
                            <th>Description</th>
                            <th>Date</th>
                            <th>Location ID</th>
                            <th>Media</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Fetch location reports
                        include 'reportFunctions.php';
                        $locationReports = fetchLocationReports();
                        foreach ($locationReports as $report) {
                            echo "<tr>";
                            echo "<td>{$report['id_laporan']}</td>";
                            echo "<td>{$report['id_penumpang']}</td>";
                            echo "<td>{$report['jenis_keluhan']}</td>";
                            echo "<td>{$report['deskripsi_keluhan']}</td>";
                            echo "<td>{$report['tanggal_laporan']}</td>";
                            echo "<td>{$report['id_lokasi']}</td>";
                            echo "<td><a href='{$report['media_laporan']}' target='_blank'>View</a></td>";
                            echo "<td><button class='btn btn-success btn-sm' onclick='resolveReport(" . $report['id_laporan'] . ", \"location\")'>Resolve</button></td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <!-- Transportation Reports Tab -->
            <div class="tab-pane fade" id="transportation" role="tabpanel" aria-labelledby="transportation-tab">
                <h3>Transportation Reports</h3>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Passenger ID</th>
                            <th>Complaint Type</th>
                            <th>Description</th>
                            <th>Date</th>
                            <th>Transport ID</th>
                            <th>Media</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Fetch transportation reports
                        $transportationReports = fetchTransportationReports();
                        foreach ($transportationReports as $report) {
                            echo "<tr>";
                            echo "<td>{$report['id_laporan']}</td>";
                            echo "<td>{$report['id_penumpang']}</td>";
                            echo "<td>{$report['jenis_keluhan']}</td>";
                            echo "<td>{$report['deskripsi_keluhan']}</td>";
                            echo "<td>{$report['tanggal_laporan']}</td>";
                            echo "<td>{$report['id_transportasi']}</td>";
                            echo "<td><a href='{$report['media_laporan']}' target='_blank'>View</a></td>";
                            echo "<td><button class='btn btn-success btn-sm' onclick='resolveReport({$report['id_laporan']}, \"transportation\")'>Resolve</button></td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="js/resolveReport.js"></script>
