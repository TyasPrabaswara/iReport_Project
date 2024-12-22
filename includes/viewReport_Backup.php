<?php
require_once 'db/database.php'; // Ensure the database connection is included

if (isset($_GET['id']) && isset($_GET['type'])) {
    $id = $_GET['id'];
    $type = $_GET['type'];

    $stmt = $conn->prepare($type === 'transportation' ? 
        "SELECT id_laporan AS laporan_id, jenis_keluhan, deskripsi_keluhan, tanggal_laporan, id_transportasi, media_laporan FROM laporan_transportasi WHERE id_laporan = ?" :
        "SELECT id_laporan AS laporan_id, jenis_keluhan, deskripsi_keluhan, tanggal_laporan, id_lokasi, media_laporan FROM laporan_lokasi WHERE id_laporan = ?"
    );
    $stmt->bind_param('s', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $report = $result->fetch_assoc();

    if ($report) {
        echo "<h1>Report Details</h1>";
        echo "<p>ID: " . htmlspecialchars($report['laporan_id']) . "</p>";
        echo "<p>Type: " . htmlspecialchars($report['jenis_keluhan']) . "</p>";
        echo "<p>Description: " . htmlspecialchars($report['deskripsi_keluhan']) . "</p>";
        echo "<p>Date: " . htmlspecialchars($report['tanggal_laporan']) . "</p>";
        if ($type === 'transportation') {
            echo "<p>Transport ID: " . htmlspecialchars($report['id_transportasi']) . "</p>";
        } else {
            echo "<p>Location ID: " . htmlspecialchars($report['id_lokasi']) . "</p>";
        }
        echo "<p><a href='" . htmlspecialchars($report['media_laporan']) . "' target='_blank'>View Media</a></p>";
    } else {
        echo "Report not found.";
    }
} else {
    echo "Missing report ID or type.";
}
?>
