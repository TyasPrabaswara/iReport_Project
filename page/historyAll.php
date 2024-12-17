<!-- include navbarMenuItems -->
<!-- include navbarHistory -->

<?php
$pageTitle = 'History - iReport';
// Fetch report data
$sql = "SELECT created_at, description, status FROM reports";
$reports = $conn->query($sql);

// Initialize statistics variables
$totalReports = $reports->num_rows;
$pendingReports = $conn->query("SELECT COUNT(*) as count FROM reports WHERE status='pending'")->fetch_assoc()['count'];
$resolvedReports = $conn->query("SELECT COUNT(*) as count FROM reports WHERE status='resolved'")->fetch_assoc()['count'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- <link rel="stylesheet" href="css/historyAll.css"> -->
</head>

<body>
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
            <?php while ($report = $reports->fetch_assoc()): ?>
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