<!-- 
isinya button
1. transporation reports
2. location reports 
-->

<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>
<aside class="sidebar">
    <nav class="sidebar-container">
        <ul class="sidebar-menu">
            <li class="sidebar-item <?php echo ($_GET['page'] == 'reportTransport') ? 'active' : ''; ?>">
                <a href="index.php?page=reportTransport">Transport</a>
            </li>
            <li class="sidebar-item <?php echo ($_GET['page'] == 'reportLocation') ? 'active' : ''; ?>">
                <a href="index.php?page=reportLocation">Location</a>
            </li>
        </ul>
    </nav>
</aside>