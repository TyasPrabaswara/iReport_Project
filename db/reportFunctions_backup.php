<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

// Include the database connection using a relative path
require __DIR__ . 'db/database.php'; // Adjust the path as necessary

// Function to handle file uploads
function upload() {
    $namaFile = $_FILES['photo']['name'];
    $ukuranFile = $_FILES['photo']['size'];
    $error = $_FILES['photo']['error'];
    $tmpName = $_FILES['photo']['tmp_name'];
    // echo "<script>alert('masuk bos');</script>";

    // Check if a file was uploaded
    if ($error !== UPLOAD_ERR_OK) {
        error_log("File Upload error: " . $error);
        return false;
    } 
    // else {
    //     echo "masuk bos";
    // }

    // Check if the uploaded file is an image
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        error_log("Invalid file type: " . $ekstensiGambar);
        return false;
    } 
    // else {
    //     echo " || masuk lagi bos";
    // }


    // Check if the uploaded file is within the size limit
    if ($ukuranFile > 1000000) {
        echo "<script>alert('Ukuran gambar terlalu besar');</script>";
        return false;
    } else {
    }
    
    
    // Generate a unique name for the uploaded file
    $namaFileBaru = uniqid() . '.' . $ekstensiGambar;
    $path = realpath(__DIR__ . '/../uploads/') . '/' . $namaFileBaru;
    // echo " || masuk lagi bos";

    //attmpt to move the uploaded file
    if(!move_uploaded_file($tmpName, $path)){
        error_log("Failed to move uploaded file to: " . $path);
        return false;
    }

    return $namaFileBaru;
    // move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

    // return $namaFileBaru;
    
    /*
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == UPLOAD_ERR_OK) {
        $uploadDir = __DIR__ . '/../uploads/'; // Directory to save uploaded files

        // Create the uploads directory if it doesn't exist
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
        $uploadFile = $uploadDir . basename($_FILES['photo']['name']);
        
        // Move the uploaded file to the desired directory
        if (move_uploaded_file($tmpName, $uploadFile)) {
            return $uploadFile; // Return the path to the uploaded file
        } else {
            error_log("Failed to move uploaded file."); // Log the error
            return false; // Return false if the file could not be moved
        }
    }
        */
    // // Check if a file was uploaded
    // } else {
    //     // Log the specific upload error
    //     error_log("File upload error: " . (isset($_FILES['media']) ? $_FILES['media']['error'] : 'No file uploaded'));
    //     return false; // Return false if no file was uploaded or there was an error
    // }
}

// Function to add a report
function addReportTrans($data) {
    global $conn;

    // Check if required keys exist in the POST data
    if (!isset($data['jenis_keluhan'], $data['no_kendaraan'], $data['deskripsi'], $data['tanggal'])) {
        return "Required fields are missing.";
    }

    // Extract data from the input array
    $complaintType = $data['jenis_keluhan'];
    $vehiclePlate = $data['no_kendaraan'];
    $description = $data['deskripsi'];
    $reportDate = $data['tanggal'];

    // Handle file upload
    $media = upload(); // Call the upload function
    if (!$media) {

        return ; // Return error message if upload fails
    }

    // Check if the vehicle exists in the transportasi table
    $query = "SELECT id_transportasi FROM transportasi WHERE no_kendaraan = '$vehiclePlate'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $vehicleId = $row['id_transportasi'];
    } else {
        return "Vehicle with plate number $vehiclePlate does not exist."; // Return error message
    }

    // Ensure the session is started and retrieve the user ID
    if (isset($_SESSION['id_penumpang'])) {
        $passengerId = $_SESSION['id_penumpang']; // Get the user ID from the session
    } else {
        return "User ID is not set in the session."; // Handle case where user ID is not set
    }

    // Insert into laporan_transportasi table
    $query = "INSERT INTO laporan_transportasi (id_penumpang, id_transportasi, jenis_keluhan, deskripsi_keluhan, tanggal_laporan, media_laporan) 
              VALUES ('$passengerId', '$vehicleId', '$complaintType', '$description', '$reportDate', '$media')";
    
    if (mysqli_query($conn, $query)) {
        return "success"; // Return success message
    } else {
        return "Database error: " . mysqli_error($conn); // Return detailed error message
    }
}

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $response = addReportTrans($_POST); // Call the function with the POST data
    echo $response; // Echo the response to send it back to the client
}

