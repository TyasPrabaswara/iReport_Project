<!-- 
isinya button
1. home
2. berita
3. jadwal   
-->

<?php
// Get current page name
$current_page = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Navigation System</title> -->
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <nav class="navbar">
        <div class="nav-links">
            <a href="index.php?page=home" class="<?php echo $current_page == 'home' ? 'active' : ''; ?>">Home</a>
            <a href="index.php?page=berita" class="<?php echo $current_page == 'berita' ? 'active' : ''; ?>">Berita</a>
            <a href="index.php?page=jadwal" class="<?php echo $current_page == 'jadwal' ? 'active' : ''; ?>">Jadwal</a>
        </div>
        <a href="index.php?page=signup" class="sign-up-btn" style="text-decoration: none;">SIGN UP</a>
    </nav>