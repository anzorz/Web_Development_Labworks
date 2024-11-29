<?php
    include 'mathfunctions.php'; // Include your math functions

    // Get the number from the form input
    $num = isset($_GET['number']) ? $_GET['number'] : null;

    if ($num !== null && isPositiveInteger($num)) {
        $result = factorial($num);
        echo "$num! is $result";
    } else {
        echo "Please enter a valid positive integer.";
    }
?>
