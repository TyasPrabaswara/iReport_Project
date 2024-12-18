<?php
// session_start();
$pageTitle = 'Profile - iReport';

// require 'db/database.php'; // Koneksi database

// Validasi session
// if (!isset($_SESSION['id_user'])) {
//     header("Location: index.php?page=login");
//     exit();
// }

// Peran pengguna
$user_role = isset($_SESSION['role']) ? $_SESSION['role'] : 'guest';
if ($user_role === 'guest') {
    header("Location: index.php?page=home");
    exit();
}

// Query dengan Prepared Statement
$stmt = $conn->prepare("SELECT username, nama, email, no_telp FROM user WHERE id_user = ". $_SESSION['id_user']);
$stmt->bind_param("i", $_SESSION['id_user']); // 'i' untuk integer
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if (!$row) {
    echo "Data user tidak ditemukan.";
    // exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>
    <link rel="stylesheet" href="css/profile.css">
</head>
<body>
    <div class="container">
        <main class="main-content">
            <h1>Edit Profile</h1>
            <form id="profile-form" action="update-profile.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" placeholder="Username" value="<?php echo htmlspecialchars($row['username']); ?>">
                </div>

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" placeholder="Name" value="<?php echo htmlspecialchars($row['nama']); ?>">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Email" value="<?php echo htmlspecialchars($row['email']); ?>">
                </div>

                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="tel" id="phone" name="phone" placeholder="08********89" value="<?php echo htmlspecialchars($row['no_telp']); ?>">
                </div>

                <div class="form-group password-group">
                    <label for="password">Password</label>
                    <div class="password-input-wrapper">
                        <input type="password" id="password" name="password" placeholder="••••••••" disabled>
                        <button type="button" class="change-password-btn">Change Password</button>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="save-btn">Save</button>
                </div>
            </form>
        </main>


    </div>
    <script src="../js/profile.js"></script>
</body>
</html>
