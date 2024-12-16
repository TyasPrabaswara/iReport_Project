<!-- include navbarMenuItems -->
<!-- include navbarHistory -->

<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Database connection
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get statistics
$userId = $_SESSION['user_id'];
$totalReports = $conn->query("SELECT COUNT(*) as total FROM reports")->fetch_assoc()['total'];
$pendingReports = $conn->query("SELECT COUNT(*) as pending FROM reports WHERE status = 'pending'")->fetch_assoc()['pending'];
$resolvedReports = $conn->query("SELECT COUNT(*) as resolved FROM reports WHERE status = 'resolved'")->fetch_assoc()['resolved'];

// Get reports
$reports = $conn->query("SELECT * FROM reports ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="/webfolder/css/historyAll.css">
</head>
<body>
    <!-- Navigation -->
    <nav class="top-nav">
        <div class="nav-links">
            <a href="#" class="active">Home</a>
            <a href="#">Berita</a>
            <a href="#">Jadwal</a>
        </div>
        <div class="user-profile">
            <img src="user-avatar.png" alt="User" class="avatar">
        </div>
    </nav>

    <div class="container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <ul>
                <li><a href="#" class="active">Account</a></li>
                <li><a href="#">History</a></li>
                <li><a href="#">Settings</a></li>
                <li><a href="#">Customer Service</a></li>
                <li><a href="#">About Us</a></li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <!-- Filters -->
            <div class="filters">
                <button class="filter-btn active">All</button>
                <button class="filter-btn">Transport</button>
                <button class="filter-btn">Location</button>
            </div>

            <!-- Statistics Cards -->
            <div class="stats-container">
                <div class="stat-card">
                    <h3>Total Reports</h3>
                    <div class="stat-number blue"><?php echo $totalReports; ?></div>
                    <p>All time reports submitted</p>
                </div>
                <div class="stat-card">
                    <h3>Pending</h3>
                    <div class="stat-number orange"><?php echo $pendingReports; ?></div>
                    <p>Reports awaiting response</p>
                </div>
                <div class="stat-card">
                    <h3>Total Reports</h3>
                    <div class="stat-number green"><?php echo $resolvedReports; ?></div>
                    <p>Successfully resolved reports</p>
                </div>
            </div>

            <!-- Reports List -->
            <div class="reports-list">
                <?php while($report = $reports->fetch_assoc()): ?>
                    <div class="report-item">
                        <div class="report-image">
                            <img src="report-placeholder.png" alt="Report">
                        </div>
                        <div class="report-content">
                            <h4>Laporan <?php echo $report['created_at']; ?></h4>
                            <p>Jenis Keluhan: <?php echo htmlspecialchars($report['description']); ?></p>
                        </div>
                        <div class="report-status <?php echo $report['status']; ?>">
                            <?php echo ucfirst($report['status']); ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </main>
    </div>

    <script src="script.js"></script>
</body>
</html>

<?php $conn->close(); ?>