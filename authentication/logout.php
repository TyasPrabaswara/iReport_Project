<?php
session_start(); // Start the session
session_unset(); //unset all session variables
// Unset all of the session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to the home page
header("Location: ../index.php");
exit();
?>