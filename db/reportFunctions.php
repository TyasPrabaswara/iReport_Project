<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);
error_log("reportFunctions.php called 3");


if(session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SERVER['HTTP_REFERER'])) {
    error_log("Referer: " . $_SERVER['HTTP_REFERER']);
} else {
    error_log("Referer header not set.");
}


// Include the database connection using a relative path
require __DIR__ . '/database.php'; // Adjust the path as necessary



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    error_log("Form Submitted.");
    error_log("POST Data: " . print_r($_POST, true));
    if (isset($_POST['form_id'])) {
        error_log("Form ID: " . $_POST['form_id']);
        $result = '';
        switch ($_POST['form_id']) {
            case 'form1':
                error_log("Calling addReportTrans");
                $result = addReportTrans($_POST);
                break;
            case 'form2':
                error_log("Calling addReportLoc");
                $result = addReportLoc($_POST);
                break;
            default:
                $result = "Unknown form submitted.";
        }

        // Handle the result
        if ($result === "success") {
            echo "<script>
            alert('Report submitted successfully.');
            window.location.href = '/iReport_Project/index.php?page=home';
            </script>";
        } else {
            echo "<script>
            alert('Error: $result');
            window.location.href = '/iReport_Project/index.php?page=reportLocation';
            </script>";
        }
    } else {
        echo "<script>
        alert('No form identifier provided.');
        window.location.href = '/iReport_Project/index.php?page=reportLocation';
        </script>";
    }
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
}

// Function to add a report
function addReportTrans($data) {
    global $conn;

    // Check if required keys exist in the POST data
    if (!isset($data['jenis_keluhan'], $data['no_kendaraan'], $data['deskripsi'], $data['tanggal'])) {
        return "Required fields are missing balls.";
    }

    // Extract data from the input array
    $complaintType = $data['jenis_keluhan'];
    $vehiclePlate = $data['no_kendaraan'];
    $description = $data['deskripsi'];
    $reportDate = $data['tanggal'];


    //converting the date format to YYYY-MM-DD because MySQL says so
    $reportDate = DateTime::createFromFormat('d/m/Y', $reportDate)->format('Y-m-d');

    // Handle file upload
    $media = upload(); // Call the upload function
    if (!$media) {
        return "File Upload Failed."; // Return error message if upload fails
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
        /*
        $reportId = mysqli_insert_id($conn);
        $historyQuery = "INSERT INTO riwayat_laporan_transportasi (id_laporan, id_penumpang, id_transportasi, jenis_keluhan, deskripsi_keluhan, tanggal_laporan, media_laporan, status) 
                         SELECT id_laporan, id_penumpang, id_transportasi, jenis_keluhan, deskripsi_keluhan, tanggal_laporan, media_laporan, status 
                         FROM laporan_transportasi WHERE id_laporan = '$reportId'";
        mysqli_query($conn, $historyQuery);*/
        return "success"; // Return success message
    } else {
        return "Database error: " . mysqli_error($conn); // Return detailed error message
    }
}

function addReportLoc($data) {
    global $conn;

    error_log("Full POST Data: " . print_r($_POST, true));  // Log the entire POST array

    error_log("POST Data: " . print_r($data, true));
    if (!isset($data['jenis_keluhan'])) {
        error_log("jenis_keluhan is missing.");
    }
    if (!isset($data['lokasi'])) {
        error_log("lokasi is missing.");
    }
    if (!isset($data['deskripsi'])) {
        error_log("deskripsi is missing.");
    }
    if (!isset($data['tanggal'])) {
        error_log("tanggal is missing.");
    }
    
    if (!array_key_exists('lokasi', $data)) {
        error_log("lokasi key is missing in POST data.");
        return "Required fields are missing loc.";
    }
    
    

    // Check if required keys exist in the POST data
    if (!isset($data['jenis_keluhan'], $data['lokasi'], $data['deskripsi'], $data['tanggal'])) {
        return "Required fields are missing loc.";
    }
    
    // Extract data from the input array
    $complaintType = $data['jenis_keluhan'];
    $locationId = $data['lokasi']; // Use id_lokasi instead of id_transportasi
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

    $query = "SELECT id_lokasi FROM lokasi WHERE id_lokasi = '$locationId'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $locationId = $row['id_lokasi'];
    } else {
        return "Location with ID $locationId does not exist."; // Return error message
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
        /*
        $reportId = mysqli_insert_id($conn);
        // Save to history table
        $historyQuery = "INSERT INTO riwayat_laporan_lokasi (id_laporan, id_penumpang, jenis_keluhan, deskripsi_keluhan, tanggal_laporan, id_lokasi, media_laporan, status) 
                         SELECT id_laporan, id_penumpang, jenis_keluhan, deskripsi_keluhan, tanggal_laporan, id_lokasi, media_laporan, status 
                         FROM laporan_lokasi WHERE id_laporan = '$reportId'";
        mysqli_query($conn, $historyQuery);*/
        return "success"; // Return success message
    } else {
        return "Database error: " . mysqli_error($conn); // Return detailed error message
    }
}

function resolveReport($reportId, $type) {
    global $conn;

    $table = $type === "location" ? "laporan_lokasi" : "laporan_transportasi";
    $query = "UPDATE $table SET status = 'resolved' WHERE id_laporan = '$reportId'";
    if (mysqli_query($conn, $query)) {
        return "success";
    } else {
        return "Database error: " . mysqli_error($conn);
    }
}

function fetchUserReportHistory($userId) {
    global $conn;

    // Fetch transportation history
    $queryTransport = "
        SELECT rt.id_laporan, lt.jenis_keluhan, lt.deskripsi_keluhan, lt.tanggal_laporan, lt.id_transportasi, rt.resolved_date
        FROM riwayat_laporan_transportasi rt
        JOIN laporan_transportasi lt ON rt.id_laporan = lt.id_laporan
        WHERE lt.id_penumpang = '$userId'
    ";
    $resultTransport = mysqli_query($conn, $queryTransport);
    $transportHistory = mysqli_fetch_all($resultTransport, MYSQLI_ASSOC);

    // Fetch location history
    $queryLocation = "
        SELECT rl.id_laporan, ll.jenis_keluhan, ll.deskripsi_keluhan, ll.tanggal_laporan, ll.id_lokasi, rl.resolved_date
        FROM riwayat_laporan_lokasi rl
        JOIN laporan_lokasi ll ON rl.id_laporan = ll.id_laporan
        WHERE ll.id_penumpang = '$userId'
    ";
    $resultLocation = mysqli_query($conn, $queryLocation);
    $locationHistory = mysqli_fetch_all($resultLocation, MYSQLI_ASSOC);

    // Combine both histories
    return [
        'transportation' => $transportHistory,
        'location' => $locationHistory
    ];
}

?>