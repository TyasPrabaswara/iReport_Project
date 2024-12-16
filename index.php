<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iReport</title>
    <link rel="stylesheet" href="css/style.css">
    <?php
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
            // echo '<link rel="stylesheet" href="css/navbarMenuItems.css">';
            echo '<link rel="stylesheet" href="css/navbarReport.css">';
            echo '<link rel="stylesheet" href="css/profile.css">';
            break;
        case 'reportTransport':
            echo '<link rel="stylesheet" href="css/navbarReport.css">';
            echo '<link rel="stylesheet" href="css/report.css">';
            break;
        case 'reportLocation':
            echo '<link rel="stylesheet" href="css/navbarReport.css">';
            echo '<link rel="stylesheet" href="css/report.css">';
            break;
            // case 'navbarReport':
            //     break;
            // case 'navbarMenuItems':
            //     break;

        default:
            echo '<link rel="stylesheet" href="css/home.css">';
    }
    ?>
</head>

<body>
    <?php
    include 'includes/header.php';
    // include 'db/database.php';
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
                case 'profile':
                    include 'includes/navbarMenuItems.php';
                    $file_path = "page/profile.php";
                    break;
                case 'reportTransport':
                    include 'includes/navbarReport.php';
                    $file_path = "page/reportTransport.php";
                    break;
                case 'reportLocation':
                    include 'includes/navbarReport.php';
                    $file_path = "page/reportLocation.php";
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

    <?php include 'includes/footer.php'; ?>
</body>

</html>