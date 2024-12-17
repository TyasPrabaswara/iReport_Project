<!-- 
 isinya button
 1. account (edit profile, change password, logout)
 2. history
 3. settings
 4. Costumer Service
 5. About Us
-->

<?php
// $current_page = basename(__FILE__);
// // $additionalCSS = ['navbarReport.css'];
?>
<aside class="sidebar">
    <nav class="sidebar-nav">
        <ul class="sidebar-menu">
            <li class="sidebar-item <?php echo ($_GET['page'] == 'profile') ? 'active' : ''; ?>">
                <a href="index.php?page=profile">Profile</a>
            </li>
            <li class="sidebar-item <?php echo ($_GET['page'] == 'historyAll') ? 'active' : ''; ?>">
                <a href="index.php?page=historyAll">History</a>
            </li>
            <li class="sidebar-item <?php echo ($_GET['page'] == 'settings') ? 'active' : ''; ?>">
                <a href="index.php?page=settings">Settings</a>
            </li>
            <li class="sidebar-item <?php echo ($_GET['page'] == 'customerService') ? 'active' : ''; ?>">
                <a href="index.php?page=customerService">Customer Service</a>
            </li>
            <li class="sidebar-item <?php echo ($_GET['page'] == 'aboutUs') ? 'active' : ''; ?>">
                <a href="index.php?page=aboutUs">About Us</a>
            </li>
        </ul>
    </nav>

</aside>
