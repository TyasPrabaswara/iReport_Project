<?php
$servername = "localhost";
$username = "your_db_username";
$password = "your_db_password";
$dbname = "your_db_name";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

//encrypt the email and password
$encrypted_email = base64_encode($email);
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $username, $encrypted_email, $hashed_password);

if($stmt->execute()){
    echo "New record created successfully";
}else{
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>