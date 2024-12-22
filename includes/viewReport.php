<?php
// Check if 'id' and 'type' are passed in the URL
if (isset($_GET['id']) && isset($_GET['type'])) {
    $id = $_GET['id'];
    $type = $_GET['type'];

    // Make sure the 'type' is valid (either 'transportation' or 'location')
    if ($type === 'transportation') {
        // Alias the columns to avoid conflicts
        $query = "
            SELECT lt.id_laporan AS id_laporan lt.jenis_keluhan, lt.deskripsi_keluhan, lt.tanggal_laporan, 
                   lt.id_transportasi, lt.media_laporan
            FROM laporan_transportasi lt
            WHERE lt.id_laporan = '$id'
        ";
    } elseif ($type === 'location') {
        // Alias the columns to avoid conflicts
        $query = "
            SELECT ll.id_laporan AS laporan_id, ll.jenis_keluhan, ll.deskripsi_keluhan, ll.tanggal_laporan, 
                   ll.id_lokasi, ll.media_laporan
            FROM laporan_lokasi ll
            WHERE ll.id_laporan = '$id'
        ";
    } else {
        die("Invalid report type.");
    }

    // Fetch the report data
    $result = mysqli_query($conn, $query);
    $report = mysqli_fetch_assoc($result);

    // Check if the report exists
    if ($report) {
        echo "<h1>Report Details</h1>";
        echo "<p>ID: {$report['id_laporan']}</p>"; // Use the aliased column name
        echo "<p>Type: {$report['jenis_keluhan']}</p>";
        echo "<p>Description: {$report['deskripsi_keluhan']}</p>";
        echo "<p>Date: {$report['tanggal_laporan']}</p>";
        if ($type === 'transportation') {
            echo "<p>Transport ID: {$report['id_transportasi']}</p>";
        } else {
            echo "<p>Location ID: {$report['id_lokasi']}</p>";
        }
        echo "<p><a href='{$report['media_laporan']}' target='_blank'>View Media</a></p>";
    } else {
        echo "Report not found.";
    }
} else {
    // If 'id' or 'type' is missing, show an error message
    echo "Missing report ID or type.";
}
?>
