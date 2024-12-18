<!-- 
isinya button
1. home
2. berita
3. jadwal   
-->

<?php
//start session
session_start();

//TEST PURPOSES ONLY, REMOVE WHEN PRODUCT IS FINISHED
//Uncomment one of the following lines to test different roles
//$_SESSION['role'] = 'guest'; // for guest
//$_SESSION['role'] = 'user'; //for regular user
//$_SESSION['role'] = 'admin'; //for admin

//check user role
$user_role = isset($_SESSION['role']) ? $_SESSION['role'] : 'guest';
// Get current page name
//$current_page = basename($_SERVER['PHP_SELF']);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navigation System</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/navbar.css">
    <script>
    function confirmLogout(){
        if (confirm("Are you sure you want to log out?")){
            window.location.href = "authentication/logout.php";
        }
    }
    </script>
</head>

<nav class="navbar">
    <div class="nav-links" id="nav-links">
        <a href="index.php?page=home" class="<?php echo $current_page == 'home' ? 'active' : ''; ?>">Home</a>
        <a href="index.php?page=berita" class="<?php echo $current_page == 'berita' ? 'active' : ''; ?>">Berita</a>
        <a href="index.php?page=jadwal" class="<?php echo $current_page == 'jadwal' ? 'active' : ''; ?>">Jadwal</a>
    </div>
    <div class="hamburger" onclick="toggleMenu()">☰</div>
    <?php if ($user_role === 'admin'): ?>
        <!-- dropdown for admin users -->
        <div class="dropdown">
            <button class="dropbtn">Menu</button>
            <div class="dropdown-content">
                <a href="index.php?page=profile">Profile</a>
                <a href="index.php?page=dashboard">Dashboard</a>
                <a href="#" onclick="confirmLogout()">Log Out</a>
            </div>
        </div>
    <?php elseif ($user_role === 'user'): ?>
        <!-- dropdown for logged in users -->
        <div class="dropdown">
            <button class="dropbtn">Menu</button>
            <div class="dropdown-content">
                <a href="index.php?page=profile">My Account</a>
                <a href="#" onclick="confirmLogout()">Log Out</a>
            </div>
        </div>
    <?php else: ?>
        <a href="index.php?page=signup" class="sign-up-btn" style="text-decoration: none;">SIGN UP</a>
    <?php endif; ?>
</nav>

<script>
function toggleMenu(){
    const navLinks = document.getElementById('nav-links');
    navLinks.classList.toggle('active');
}
</script>
