<?php
// function connectDatabase() {
$hostname = "localhost";
$dbname = "ireport";    // Sesuaikan dengan nama database
$username = "root";      // Sesuaikan dengan username MySQL
$password = "";          // Sesuaikan dengan password MySQL


// Create connection
$conn = new mysqli($hostname, $username, $password, $dbname);


// Check connection

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} else {
  echo "Connected successfully";
}

// return $conn;
// }
?>


