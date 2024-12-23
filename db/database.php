<?php
// connect to database
$hostname = "db";
$dbname = "ireport";     // Sesuaikan dengan nama database
$username = "ireportUser";      // Sesuaikan dengan username MySQL
$password = "ireportUserPassword";          // Sesuaikan dengan password MySQL

// Create connection
$conn = mysqli_connect($hostname, $username, $password, $dbname);

// Check connection
if (!$conn){
  die("Connection failed: " . mysqli_connect_error());
}

/*
// register user
function regist($data)
{
  global $conn;
  $name = $data['name'];
  $username = strtolower($data['username']);
  $phone = $data['phone'];
  $email = $data['email'];
  $password = mysqli_real_escape_string($conn, $data['password']);
  $confirm_password = mysqli_real_escape_string($conn, $data['confirm_password']);

  $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
  if (mysqli_fetch_assoc($result)) {
    echo "<script>
    alert('Username already exists.');
    </script>";
    return false;
  }

  if ($password !== $confirm_password) {
    echo "<script>
    alert('Passwords do not match.');
    </script>";
    return false;
  }

  $hashed_password = password_hash($password, PASSWORD_DEFAULT);

  mysqli_query($conn, "INSERT INTO user (nama, username, no_telp, email, password, user_role) VALUES ('$name', '$username', '$phone', '$email', '$hashed_password', 'user')");

  return mysqli_affected_rows($conn);
}

function addReportLoc($data) {
  global $conn;
  $jenis_keluhan = $data['jenis_keluhan'];
  $lokasi = $data['lokasi'];
  $deskripsi = $data['deskripsi'];
  $tanggal = $data['tanggal'];
  $photo = upload(); // Call the upload function

  if (!$photo) {
      return false; // If upload fails, return false
  }

  $query = "INSERT INTO laporan_lokasi (jenis_keluhan, lokasi, deskripsi, tanggal, photo) VALUES ('$jenis_keluhan', '$lokasi', '$deskripsi', '$tanggal', '$photo')";
  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn); // Return the number of affected rows
}

function addReportTrans($data) {
  global $conn;
  $jenis_keluhan = $data['jenis_keluhan'];
  $nomor_kendaraan = $data['nomor_kendaraan'];
  $deskripsi = $data['deskripsi'];
  $tanggal = $data['tanggal'];
  $photo = upload(); // Call the upload function

  if (!$photo) {
      return false; // If upload fails, return false
  }

  $query = "INSERT INTO laporan_transportasi (jenis_keluhan, nomor_kendaraan, deskripsi, tanggal, photo) VALUES ('$jenis_keluhan', '$nomor_kendaraan', '$deskripsi', '$tanggal', '$photo')";
  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn); // Return the number of affected rows
}

function upload() {
    $namaFile = $_FILES['photo']['name'];
    $ukuranFile = $_FILES['photo']['size'];
    $error = $_FILES['photo']['error'];
    $tmpName = $_FILES['photo']['tmp_name'];

    // Check if no file uploaded
    if ($error === 4) {
        echo "<script>alert('Please upload a file.');</script>";
        return false;
    }

    // Check if file uploaded is not an image
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>alert('Please upload an image file (JPG, JPEG, PNG).');</script>";
        return false;
    }

    // Check if file uploaded exceeds maximum size
    if ($ukuranFile > 1000000) {
        echo "<script>alert('File size exceeds maximum limit (1MB).');</script>";
        return false;
    }

    // Move the uploaded file to the desired directory
    if (move_uploaded_file($tmpName, 'img/' . $namaFile)) {
        return $namaFile; // Return the file name if successful
    } else {
        echo "<script>alert('Failed to move uploaded file.');</script>";
        return false;
    }
}

// function addReport($data)
// {
//   global $conn;
//   $title = $data['title'];
//   $description = $data['description'];
//   $date = $data['date'];
//   $user_id = $data['user_id'];

//   $query = "INSERT INTO reports (title, description, date, user_id) VALUES ('$title', '$description', '$date', '$user_id')";
//   mysqli_query($conn, $query);

//   return mysqli_affected_rows($conn);
// }
*/