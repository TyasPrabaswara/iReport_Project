<?php
// session_start();
$pageTitle = 'Profile - iReport';
$paddingTop = 10; // You can dynamically set this based on conditions
echo "<style>main { padding-top: {$paddingTop}vh; }</style>";
// Koneksi database
require 'db/database.php';

// Validasi session
if (!isset($_SESSION['id_penumpang'])) {
    header("Location: index.php?page=login");
    exit();
}

// Query dengan Prepared Statement
$stmt = $conn->prepare("SELECT username, nama, email, no_telp FROM user WHERE id_penumpang = ?");
$stmt->bind_param("i", $_SESSION['id_penumpang']);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
if (!$row) {
    echo "Data user tidak ditemukan.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($pageTitle); ?></title>
    <!-- <link rel="stylesheet" href="css/profile.css"> -->
</head>

<body>
    <div class="container">
        <main class="main-content">
            <h1>Profile</h1>
            <div class="form-group">
                <label>Username:</label>
                <p><?php echo htmlspecialchars($row['username']); ?></p>
            </div>
            <div class="form-group">
                <label>Name:</label>
                <p><?php echo htmlspecialchars($row['nama']); ?></p>
            </div>
            <div class="form-group">
                <label>Email:</label>
                <p><?php echo htmlspecialchars($row['email']); ?></p>
            </div>
            <div class="form-group">
                <label>Phone Number:</label>
                <p><?php echo htmlspecialchars($row['no_telp']); ?></p>
            </div>
            <a href="page/edit_profile.php" class="btn btn-warning" action="" method="POST">Edit Profile</a>
        </main>
    </div>
</body>

</html>