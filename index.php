<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iReport</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include 'db/database.php';
    error_log("Database Included");

    include 'db/userFunctions.php';
    include_once 'db/reportFunctions.php';

    $page = isset($_GET['page']) ? $_GET['page'] : 'home';

    switch ($page) {
        case 'home':
            echo '<link rel="stylesheet" href="css/home.css">';
            break;
        case 'berita':
            echo '<link rel="stylesheet" href="css/berita.css">';
            break;
        case 'jadwal':
            echo '<link rel="stylesheet" href="css/jadwal.css">';
            break;
        case 'signup':
            echo '<link rel="stylesheet" href="css/signup.css">';
            break;
        case 'login':
            echo '<link rel="stylesheet" href="css/login.css">';
            break;
        case 'profile':
            echo '<link rel="stylesheet" href="css/sidebar.css">';
            echo '<link rel="stylesheet" href="css/profile.css">';
            break;
        case 'reportTransport':
            echo '<link rel="stylesheet" href="css/sidebar.css">';
            echo '<link rel="stylesheet" href="css/report.css">';
            break;
        case 'reportLocation':
            echo '<link rel="stylesheet" href="css/sidebar.css">';
            echo '<link rel="stylesheet" href="css/report.css">';
            break;
        case 'historyAll':
            echo '<link rel="stylesheet" href="css/sidebar.css">';
            echo '<link rel="stylesheet" href="css/historyAll.css">';
            break;
        case 'settings':
            echo '<link rel="stylesheet" href="css/sidebar.css">';
            echo '<link rel="stylesheet" href="css/settings.css">';
            break;
        case 'customerService':
            echo '<link rel="stylesheet" href="css/sidebar.css">';
            echo '<link rel="stylesheet" href="css/customerService.css">';
            break;

        default:
            echo '<link rel="stylesheet" href="css/home.css">';
    }
    ?>
</head>

<body>
    <?php
    include 'includes/header.php';
    //include 'db/database.php';
    ?>
    <main>
        <?php
        $file_path = "page/home.php";  // Default path
        if (isset($_GET['page'])) {
            switch ($_GET['page']) {
                case 'berita':
                    $file_path = "page/berita.php";
                    break;
                case 'jadwal':
                    $file_path = "page/jadwal.php";
                    break;
                case 'signup':
                    $file_path = "authentication/signUp.php";
                    break;
                case 'login':
                    $file_path = "authentication/login.php";
                    break;
                case 'reportTransport':
                    include 'includes/navbarReport.php';
                    //include 'js/reportTransport.js';
                    $file_path = "page/reportTransport.php";
                    break;
                case 'reportLocation':
                    include 'includes/navbarReport.php';
                    //include 'js/reportLocation.js';
                    $file_path = "page/reportLocation.php";
                    break;
                case 'profile':
                    include 'includes/navbarMenuItems.php';
                    $file_path = "page/profile.php";
                    break;
                case 'historyAll':
                    include 'includes/navbarMenuItems.php';
                    $file_path = "page/historyAll.php";
                    break;
                case 'settings':
                    include 'includes/navbarMenuItems.php';
                    $file_path = "page/settings.php";
                    break;
                case 'customerService':
                    include 'includes/navbarMenuItems.php';
                    $file_path = "page/customerService.php";
                    break;
                case 'checkUserAndVehicle':
                    $file_path = "page/checkUserAndVehicle.php";
                    break;
            }
        }

        if (file_exists($file_path)) {
            include $file_path;
        } else {
            echo "<p>Maaf, halaman yang Anda cari tidak ditemukan.</p>";
        }
        ?>
    </main>
    <!-- <script src="js/reportTransport.js"></script>
    <script src="js/reportLocation.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <?php include 'includes/footer.php'; ?>
</body>

</html>