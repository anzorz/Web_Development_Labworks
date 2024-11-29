<?php
session_start();

// Unset all session variables
session_unset();

// Destroy the session
session_destroy();

// Redirect back to number.php
header("Location: number.php");
exit();
