<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);
error_log("reportFunctionLog.php called 2");

if(session_status() == PHP_SESSION_NONE) {
    session_start();
}

/* //THIS IS FOR TEST ONLY
if(!isset($_SESSION['id_penumpang'])) {
    die("User ID is not set in the session");
}


$user_id = $_SESSION['id_penumpang'] ?? null;
if(!$user_id){
    die("User Id is not set in the session");
}
*/
//var_dump($_SESSION);

// Include the database connection using a relative path
require __DIR__ . '/database.php'; // Adjust the path as necessary
error_log("Request received at reportFunctionLoc.php");


// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $response = addReportLoc($_POST); // Call the function with the POST data
    echo $response; // Echo the response to send it back to the client
}

// Function to handle file uploads
function upload() {
    $namaFile = $_FILES['photo']['name'];
    $ukuranFile = $_FILES['photo']['size'];
    $error = $_FILES['photo']['error'];
    $tmpName = $_FILES['photo']['tmp_name'];
    // echo "<script>alert('masuk bos');</script>";

    // Check if a file was uploaded
    if ($error !== UPLOAD_ERR_OK) {
        echo "<script>alert('Terjadi kesalahan saat mengupload file');</script>";
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
        echo "<script>alert('Yang anda upload bukan gambar');</script>";
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
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;
    // echo " || masuk lagi bos";

    // move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

    // return $namaFileBaru;
    
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
    // // Check if a file was uploaded
    // } else {
    //     // Log the specific upload error
    //     error_log("File upload error: " . (isset($_FILES['media']) ? $_FILES['media']['error'] : 'No file uploaded'));
    //     return false; // Return false if no file was uploaded or there was an error
    // }
}

function addReportLoc($data) {
    global $conn;

    // Check if required keys exist in the POST data
    if (!isset($data['jenis_keluhan'], $data['id_lokasi'], $data['deskripsi'], $data['tanggal'])) {
        return "Required fields are missing.";
    }


    // Extract data from the input array
    $complaintType = $data['jenis_keluhan'];
    $locationId = $data['id_lokasi']; // Use id_lokasi instead of id_transportasi
    $description = $data['deskripsi'];
    $reportDate = $data['tanggal'];

    // Convert the date format to YYYY-MM-DD
    $dateObject = DateTime::createFromFormat('d/m/Y', $reportDate);
    
    // Check if the date was parsed correctly
    if ($dateObject === false) {
        return "Invalid date format. Please use DD/MM/YYYY.";
    }

    // Format the date to YYYY-MM-DD
    $reportDate = $dateObject->format('Y-m-d');

    // Handle file upload
    $media = upload(); // Call the upload function
    if (!$media) {
        return "File upload failed."; // Return error message if upload fails
    }

    // Ensure the session is started and retrieve the user ID
    if (isset($_SESSION['id_penumpang'])) {
        $passengerId = $_SESSION['id_penumpang']; // Get the user ID from the session
    } else {
        return "User ID is not set in the session."; // Handle case where user ID is not set
    }

    // Insert into laporan_lokasi table
    $query = "INSERT INTO laporan_lokasi (id_penumpang, jenis_keluhan, deskripsi_keluhan, tanggal_laporan, id_lokasi, media_laporan) 
              VALUES ('$passengerId', '$complaintType', '$description', '$reportDate', '$locationId', '$media')";
    
    if (mysqli_query($conn, $query)) {
        return "success"; // Return success message
    } else {
        return "Database error: " . mysqli_error($conn); // Return detailed error message
    }
}




?>