<?php
session_start();

// Check if the session variable 'number' exists, if not, initialize it to 0
if (!isset($_SESSION['number'])) {
    $_SESSION['number'] = 0;
}

// Display the number
echo "<h1>The number is: " . $_SESSION['number'] . "</h1>";
?>

<a href='numberup.php'>Increase</a>
<a href='numberdown.php'>Decrease</a>
<a href='numberreset.php'>Reset</a>
