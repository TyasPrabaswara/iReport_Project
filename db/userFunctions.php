<?php
include 'database.php'; // Include the database connection

function regist($data) {
    global $conn;
    $name = $data['name'];
    $username = strtolower($data['username']);
    $phone = $data['phone'];
    $email = $data['email'];
    $password = mysqli_real_escape_string($conn, $data['password']);
    $confirm_password = mysqli_real_escape_string($conn, $data['confirm_password']);

    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>alert('Username already exists.');</script>";
        return false;
    }

    if ($password !== $confirm_password) {
        echo "<script>alert('Passwords do not match.');</script>";
        return false;
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    mysqli_query($conn, "INSERT INTO user (nama, username, no_telp, email, password, user_role) VALUES ('$name', '$username', '$phone', '$email', '$hashed_password', 'user')");

    return mysqli_affected_rows($conn);
}
?>
