<?php
    include 'mathfunctions.php'; // Include your math functions

    $num = 5; // Hardcoded number for testing
    if (isPositiveInteger($num)) {
        $result = factorial($num);
        echo "$num! is $result";
    } else {
        echo "$num is not a positive integer.";
    }

?>
