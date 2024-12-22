<?php

$pageTitle = 'Edit Profile - iReport';

// Koneksi database
include __DIR__ . '/../db/database.php';

// Validasi session
// if (!isset($_SESSION['id_penumpang'])) {
//     header("Location: index.php?page=login");
//     exit();
// }

// Query dengan Prepared Statement
$stmt = $conn->prepare("SELECT username, nama, email, no_telp FROM user WHERE id_penumpang = ?");
$stmt->bind_param("i", $_SESSION['id_penumpang']);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows === 0) {
    echo "Data user tidak ditemukan.";
    exit();
}

$row = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($pageTitle); ?></title>
    <link rel="stylesheet" href="css/profile.css">
</head>

<body>
    <div class="container">
        <main class="main-content">
            <h1>Edit Profile</h1>
            <form action="page/edit_profile_action.php" method="POST">
                <div class="form-group">
                    <label>Username:</label>
                    <input type="text" name="username" value="<?php echo htmlspecialchars($row['username']); ?>" required>
                </div>
                <div class="form-group">
                    <label>Name:</label>
                    <input type="text" name="nama" value="<?php echo htmlspecialchars($row['nama']); ?>" required>
                </div>
                <div class="form-group">
                    <label>Email:</label>
                    <input type="email" name="email" value="<?php echo htmlspecialchars($row['email']); ?>" required>
                </div>
                <div class="form-group">
                    <label>Phone Number:</label>
                    <input type="text" name="no_telp" value="<?php echo htmlspecialchars($row['no_telp']); ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </form>
        </main>
    </div>
</body>

</html>