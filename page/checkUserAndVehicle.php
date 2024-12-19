<?php
// checkUserAndVehicle.php

// Include database connection
require 'db/database.php'; // Adjust the path as necessary

// Start the session to access session variables
session_start();

// Initialize variables
$userId = isset($_SESSION['id_penumpang']) ? $_SESSION['id_penumpang'] : null;
$vehiclePlate = isset($_POST['vehicle_plate']) ? $_POST['vehicle_plate'] : null;

// Check if user ID is set
if ($userId) {
    // Query to check if the user exists
    $userQuery = "SELECT * FROM user WHERE id_penumpang = '$userId'";
    $userResult = mysqli_query($conn, $userQuery);

    if (mysqli_num_rows($userResult) > 0) {
        $userData = mysqli_fetch_assoc($userResult);
        echo "User ID: " . $userData['id_penumpang'] . "<br>";
        echo "Name: " . $userData['nama'] . "<br>";
        echo "Email: " . $userData['email'] . "<br>";
    } else {
        echo "User not found.";
    }
} else {
    echo "User ID is not set in the session.";
}

// Check if vehicle plate is submitted
if ($vehiclePlate) {
    // Query to check if the vehicle exists
    $vehicleQuery = "SELECT * FROM transportasi WHERE no_kendaraan = '$vehiclePlate'";
    $vehicleResult = mysqli_query($conn, $vehicleQuery);

    if (mysqli_num_rows($vehicleResult) > 0) {
        $vehicleData = mysqli_fetch_assoc($vehicleResult);
        echo "Vehicle Plate: " . $vehicleData['no_kendaraan'] . "<br>";
        echo "Vehicle Type: " . $vehicleData['jenis_transportasi'] . "<br>";
    } else {
        echo "Vehicle with plate number $vehiclePlate does not exist.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check User and Vehicle</title>
</head>
<body>
    <h1>Check User and Vehicle</h1>
    <form method="POST" action="">
        <label for="vehicle_plate">Enter Vehicle Plate Number:</label>
        <input type="text" id="vehicle_plate" name="vehicle_plate" required>
        <button type="submit">Check Vehicle</button>
    </form>
</body>
</html>
