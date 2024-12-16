<!-- 
isinya button
1. transporation reports
2. location reports 
-->

<?php
$current_page = basename($_SERVER['PHP_SELF']);
$additionalCSS = ['navbarReport.css'];
?>
<aside class="sidebar">
    <nav class="sidebar-nav">
        <ul class="sidebar-menu">
            <li class="sidebar-item <?php echo ($current_page == 'transport.php') ? 'active' : ''; ?>">
                <a href="index.php?page=reportTransport">Transport</a>
            </li>
            <li class="sidebar-item <?php echo ($current_page == 'location.php') ? 'active' : ''; ?>">
                <a href="index.php?page=reportLocation">Location</a>
            </li>
        </ul>
    </nav>
</aside>