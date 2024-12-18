<?php
include 'database.php'; // Include the database connection

function addReportLoc($data) {
    global $conn;

    // Use descriptive variable names based on the SQL structure
    $complaintType = $data['jenis_keluhan']; // Complaint type
    $location = $data['lokasi']; // Location
    $description = $data['deskripsi']; // Description
    $reportDate = $data['tanggal']; // Date of the report
    $media = upload(); // Call the upload function

    if (!$media) {
        return false; // If upload fails, return false
    }

    session_start(); // Start the session to access session variables
    $passengerId = $_SESSION['id_penumpang']; // Get the user ID from the session

    // Insert into laporan_lokasi table
    $query = "INSERT INTO laporan_lokasi (id_penumpang, jenis_keluhan, lokasi, deskripsi, tanggal, media_laporan) 
              VALUES ('$passengerId', '$complaintType', '$location', '$description', '$reportDate', '$media')";
    
    if (mysqli_query($conn, $query)) {
        return mysqli_affected_rows($conn); // Return the number of affected rows
    } else {
        echo "Error: " . mysqli_error($conn); // Output error message
        return false;
    }
}

function addReportTrans($data) {
    global $conn;

    // Extract data from the input array
    $complaintType = $data['jenis_keluhan']; // Complaint type
    $vehiclePlate = $data['nomor_kendaraan']; // Vehicle plate number
    $description = $data['deskripsi']; // Description
    $reportDate = $data['tanggal']; // Date of the report
    $media = upload(); // Call the upload function

    if (!$media) {
        return "Failed to upload media."; // Return error message if upload fails
    }

    // Check if the vehicle exists in the transportasi table
    $query = "SELECT id_transportasi FROM transportasi WHERE nomor_kendaraan = '$vehiclePlate'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        // Vehicle exists, get the id_transportasi
        $row = mysqli_fetch_assoc($result);
        $vehicleId = $row['id_transportasi'];
    } else {
        // Vehicle does not exist, return an error message
        return "Vehicle with plate number $vehiclePlate does not exist."; // Return error message
    }

    session_start(); // Start the session to access session variables
    $passengerId = $_SESSION['id_penumpang']; // Get the user ID from the session

    // Insert into laporan_transportasi table
    $query = "INSERT INTO laporan_transportasi (id_penumpang, id_transportasi, jenis_keluhan, deskripsi_keluhan, tanggal_laporan, media_laporan) 
              VALUES ('$passengerId', '$vehicleId', '$complaintType', '$description', '$reportDate', '$media')";
    
    if (mysqli_query($conn, $query)) {
        return mysqli_affected_rows($conn); // Return the number of affected rows
    } else {
        return "Error: " . mysqli_error($conn); // Return error message
    }
}

function upload() {
    $fileName = $_FILES['photo']['name'];
    $fileSize = $_FILES['photo']['size'];
    $error = $_FILES['photo']['error'];
    $tmpName = $_FILES['photo']['tmp_name'];

    // Check if no file uploaded
    if ($error === 4) {
        echo "<script>alert('Please upload a file.');</script>";
        return false;
    }

    // Check if file uploaded is not an image
    $validImageExtensions = ['jpg', 'jpeg', 'png'];
    $imageExtension = explode('.', $fileName);
    $imageExtension = strtolower(end($imageExtension));
    if (!in_array($imageExtension, $validImageExtensions)) {
        echo "<script>alert('Please upload an image file (JPG, JPEG, PNG).');</script>";
        return false;
    }

    // Check if file uploaded exceeds maximum size
    if ($fileSize > 1000000) {
        echo "<script>alert('File size exceeds maximum limit (1MB).');</script>";
        return false;
    }

    // Move the uploaded file to the desired directory
    if (move_uploaded_file($tmpName, 'img/' . $fileName)) {
        return $fileName; // Return the file name if successful
    } else {
        echo "<script>alert('Failed to move uploaded file.');</script>";
        return false;
    }
}
?>
