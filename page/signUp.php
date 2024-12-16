<?php
$pageTitle = 'Sign Up - iReport';
?>
<body>
<div class="hero">
    <div class="signup-container">
        <h2>Sign Up</h2>
        <form action="includes/signup_process.php" method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Sign Up</button>
        </form>
        <p>Already have an account? <a href="index.php?page=login"> Login here </a> instead.</p>
    </div>
</div>
</body>
    