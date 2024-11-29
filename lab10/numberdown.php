<?php
session_start();

// Check if the session variable 'number' exists, if not, initialize it to 0
if (!isset($_SESSION['number'])) {
    $_SESSION['number'] = 0;
}

// Decrement the number
$_SESSION['number']--;

// Redirect back to number.php
header("Location: number.php");
exit();
